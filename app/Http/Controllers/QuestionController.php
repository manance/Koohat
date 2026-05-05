<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Request $request, Question $question){
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
        $result = (bool) $request->correct;
        return view('question', compact('question', 'answers', 'result'));
    }
}
