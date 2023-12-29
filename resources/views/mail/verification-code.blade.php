<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Код подтверждения в приложении {{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        h1 {
            color: #007bff;
            font-size: 36px;
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Вас приветствует приложение {{ config('app.name') }}</h2>
    <p>Ваш код подтверждения:</p>
    <h1>{{ $verificationCode }}</h1>
    <p>Мы ценим ваше участие!</p>
</div>

</body>
</html>
