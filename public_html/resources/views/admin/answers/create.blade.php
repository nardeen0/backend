<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить ответы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-4 rounded shadow-sm">
            <h2 class="mb-4">Добавить ответы к вопросу:</h2>
            <h4 class="text-primary mb-4">{{ $question->text }}</h4>

            <form action="{{ route('answers.store') }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">

                @for ($i = 0; $i < 4; $i++) <div class="mb-3">
                    <label class="form-label">Ответ {{ $i + 1 }}</label>
                    <input type="text" name="answers[{{ $i }}][text]" class="form-control" required>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="correct_answer" value="{{ $i }}"
                            id="correct{{ $i }}" required>
                        <label class="form-check-label" for="correct{{ $i }}">
                            Это правильный ответ
                        </label>
                    </div>
        </div>
        @endfor

        <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
    </div>

</body>

</html>