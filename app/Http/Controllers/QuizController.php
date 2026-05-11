<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
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
            'score' => 0
        ]);

        $firstQuestionId = $questionIds[0];
        return view('quiz', compact('quiz', 'firstQuestionId'));

    }

    public function create() {
        return view('admin.create');
    }
}