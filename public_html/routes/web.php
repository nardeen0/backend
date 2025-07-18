<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalChairController;
use App\Http\Controllers\TestController; // ← نضيف هذا للسطر
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// الصفحة الرئيسية
Route::get('/', [DigitalChairController::class, 'index']);

// تسجيل مستخدم
Route::post('/register', [DigitalChairController::class, 'register'])->name('digital-chair.register');

// 👇 مسارات "منشئ الاختبارات"
Route::get('/admin/tests/create', [TestController::class, 'create'])->name('tests.create');
Route::post('/admin/tests', [TestController::class, 'store'])->name('tests.store');
Route::get('/admin/tests', [TestController::class, 'index'])->name('tests.index');
Route::get('/admin/questions/create/{test}', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/admin/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/admin/answers/create/{question}', [AnswerController::class, 'create'])->name('answers.create');
Route::post('/admin/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/exam/{test}', [ExamController::class, 'show'])->name('exam.show');
Route::post('/exam/{test}/submit', [ExamController::class, 'submit'])->name('exam.submit');
