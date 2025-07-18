<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function create($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('admin.answers.create', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answers.*.text' => 'required|string',
            'correct_answer' => 'required|integer',
        ]);

        foreach ($request->answers as $index => $answer) {
            Answer::create([
                'question_id' => $request->question_id,
                'text' => $answer['text'],
                'is_correct' => $index == $request->correct_answer
            ]);
        }

        return redirect()->route('tests.index')->with('success', 'Ответы сохранены!');
    }
}