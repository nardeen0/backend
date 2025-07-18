<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить вопрос</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-4 rounded shadow-sm">
            <h2 class="mb-4">Добавить вопрос к тесту:</h2>
            <h4 class="text-primary mb-4">{{ $test->title }}</h4>

            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="test_id" value="{{ $test->id }}">

                <div class="mb-3">
                    <label class="form-label">Текст вопроса</label>
                    <textarea name="text" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>

</body>

</html>