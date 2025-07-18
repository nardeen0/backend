<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Тест: {{ $test->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-5 rounded shadow-sm">

            <h2 class="mb-4 text-center text-primary">📝 Тест: {{ $test->title }}</h2>

            <form action="{{ route('exam.submit', $test->id) }}" method="POST">
                @csrf

                @foreach($questions as $question)
                <div class="mb-4">
                    <h5>{{ $loop->iteration }}. {{ $question->text }}</h5>

                    @foreach($question->answers as $answer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}"
                            id="answer_{{ $answer->id }}" value="{{ $answer->id }}" required>
                        <label class="form-check-label" for="answer_{{ $answer->id }}">
                            {{ $answer->text }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @endforeach

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Отправить тест</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>