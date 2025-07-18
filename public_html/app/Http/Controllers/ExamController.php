<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Answer;

class ExamController extends Controller
{
    public function show($testId)
    {
        $test = Test::findOrFail($testId);
        $questions = $test->questions()->with('answers')->get();

        return view('exam.show', compact('test', 'questions'));
    }

    public function submit(Request $request, $testId)
    {
        $test = Test::findOrFail($testId);
        $questions = $test->questions()->with('answers')->get();

        $score = 0;
        $total = $questions->count();

        foreach ($questions as $question) {
            $selected = $request->input('question_' . $question->id);
            $correct = $question->answers->firstWhere('is_correct', 1);

            if ($correct && $selected == $correct->id) {
                $score++;
            }
        }

        return view('exam.result', compact('score', 'total'));
    }
}