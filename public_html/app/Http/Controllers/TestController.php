<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function create()
    {
        return view('admin.tests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'attempts' => 'required|integer|min:1',
        ]);

        Test::create($request->all());

        return redirect()->route('tests.create')->with('success', 'Тест успешно создан!');
    }
    public function index()
    {
        $tests = \App\Models\Test::all();
        return view('admin.tests.index', compact('tests'));
    }

}