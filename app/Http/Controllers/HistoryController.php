<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $user = Auth::user();
        $results = $user->history()->with('quiz')->get();
        return view('history', compact('results'));
    }
}
