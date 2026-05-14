<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Request $request, Question $question){
        $questionIds = session('question_ids', []);
        $currentStep = session('current_step', 0);

        if(empty($questionIds)){
            return redirect('/quizzes')->with('error', 'start a quiz first!');
        }

        if(!in_array($question->id, $questionIds)){
            return redirect('/quizzes')->with('error', 'Invalid question');
        }

        $expectedQuestionId = $questionIds[$currentStep];
        if($question->id !== $expectedQuestionId){
            return redirect("/questions/{$expectedQuestionId}");
        }

        $session_key = 'answer_order_' . $question->id;

        if(!isset($request->answer)){
            $answers = $question->answers->shuffle();
            session([$session_key => $answers->pluck('id')->toArray()]);
            return view('question', compact('question', 'answers'));
        }
        $orderedIds = session($session_key, $question->answers->pluck('id')->toArray());
        $answers = $question->answers->sortBy(function($answer) use ($orderedIds) {
            return array_search($answer->id, $orderedIds);
        });

        $result = (bool) $request->answer;

        $summary = session('quiz_summary', []);
        $summary[] = [
            'question' => $question->question,
            'your_answer' => $request->submition,
            'correct' => $result,
            'correct_answer' => $question->answers->where('correct', true)->first()->answer
        ];
        session(['quiz_summary' => $summary]);

        if($result){
            session(['score' => session('score', 0) + 1]);
        }
        $nextStep = $currentStep + 1;
        session(['current_step' => $nextStep]);
        $score = session('score', 0);
        
        if($nextStep >= count($questionIds)){
            $existing = History::where('user_id', Auth::id())->where('quiz_id', session('quiz_id'))->first();
            if($existing){
                if($score > $existing->score){
                    $existing->update(['score' => $score]);
                }
            } else {
                History::create([
                    'score'   => $score,
                    'max_score' => count($questionIds),
                    'quiz_id' => session('quiz_id'),
                    'user_id' => Auth::id(),
                ]);
            }
            return redirect('/results');
        }

        $nextQuestionId = $questionIds[$nextStep];

        return view('question', compact('question', 'answers', 'result', 'score', 'nextQuestionId'));
    }
    
}