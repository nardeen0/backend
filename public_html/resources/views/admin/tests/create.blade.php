<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить тест</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-4 rounded shadow-sm">

            <h2 class="mb-4">Добавить новый тест</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('tests.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Название теста</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Продолжительность (в минутах)</label>
                    <input type="number" name="duration_minutes" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Количество попыток</label>
                    <input type="number" name="attempts" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

</body>

</html>