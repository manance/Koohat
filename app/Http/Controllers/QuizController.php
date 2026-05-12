<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        $quizzes = Quiz::all();
        return view('home', compact('quizzes'));
    }

    public function show(Quiz $quiz){
        
        $questionIds = $quiz->questions->shuffle()->pluck('id')->toArray();
        $questionIds = array_slice($questionIds, 0, 15);

        session([
            'quiz_id'      => $quiz->id,
            'question_ids' => $questionIds,
            'current_step' => 0,
            'score' => 0,
            'quiz_summary' => [],
        ]);

        $firstQuestionId = $questionIds[0];
        return view('quiz', compact('quiz', 'firstQuestionId'));

    }

    public function results() {
        $score = session('score', 0);
        $summary = session('quiz_summary', []);
        $total = count(session('question_ids', []));

        session()->forget(['score', 'quiz_summary', 'question_ids', 'current_step', 'quiz_id']);

        if(empty($summary)){
            return redirect('/quizzes')->with('error', 'No quizzes results found!');
        }
        return view('results', compact('score', 'summary', 'total'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'                            => 'required|string|max:255',
            'questions'                        => 'required|array|min:1',
            'questions.*.text'                 => 'required|string',
            'questions.*.answers'              => 'required|array|min:4',
            'questions.*.answers.*.text'       => 'required|string',
            'questions.*.answers.*.is_correct' => 'required|boolean',
        ]);

        DB::transaction(function () use ($request) {
            $quiz = Quiz::create([
                'name' => $request->title,
            ]);

            foreach ($request->questions as $questionData) {
                $question = $quiz->questions()->create([
                    'question' => $questionData['text'],
                ]);

                foreach ($questionData['answers'] as $answerData) {
                    $question->answers()->create([
                        'answer'       => $answerData['text'],
                        'correct' => $answerData['is_correct'],
                    ]);
                }
            }
        });

        return redirect('/quizzes')->with('success', 'Quiz created!');
    }
}