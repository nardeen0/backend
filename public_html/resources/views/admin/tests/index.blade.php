<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Список тестов</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-4 rounded shadow-sm">
            <h2 class="mb-4">📋 Список тестов</h2>

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Длительность (мин)</th>
                        <th>Попытки</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->title }}</td>
                        <td>{{ $test->duration_minutes }}</td>
                        <td>{{ $test->attempts }}</td>
                        <td>
                            <a href="{{ route('questions.create', ['test' => $test->id]) }}"
                                class="btn btn-sm btn-outline-primary">
                                ➕ Добавить вопрос
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>