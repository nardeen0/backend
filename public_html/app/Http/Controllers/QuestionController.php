<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create($testId)
    {
        $test = Test::findOrFail($testId);
        return view('admin.questions.create', compact('test'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'test_id' => 'required|exists:tests,id',
        ]);

        Question::create([
            'test_id' => $request->test_id,
            'text' => $request->text,
        ]);

        return redirect()->route('tests.index')->with('success', 'Вопрос добавлен!');
    }
}