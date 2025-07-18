<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Результат теста</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="bg-white p-5 rounded shadow text-center">

            <h2 class="mb-4">🎓 Результат теста</h2>

            <h4 class="mb-3">Ваш результат: <span class="text-primary">{{ $score }}</span> из
                <strong>{{ $total }}</strong></h4>

            @php
            $percentage = round(($score / $total) * 100);
            @endphp

            <p class="fs-5">Процент правильных ответов: <strong>{{ $percentage }}%</strong></p>

            @if($percentage >= 70)
            <p class="fs-4 text-success">🎉 Поздравляем! Вы прошли тест.</p>
            @else
            <p class="fs-4 text-danger">😢 К сожалению, вы не прошли тест.</p>
            @endif

        </div>
    </div>

</body>

</html>