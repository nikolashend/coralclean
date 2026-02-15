<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #2ec4c6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2ec4c6;
            margin: 0;
            font-size: 24px;
        }
        .field {
            margin-bottom: 15px;
            padding: 12px;
            background: #f9f9f9;
            border-left: 4px solid #2ec4c6;
            border-radius: 4px;
        }
        .field strong {
            color: #555;
            display: inline-block;
            width: 150px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧹 Новая заявка с сайта CoralClean</h1>
        </div>

        <div class="field">
            <strong>Имя:</strong> {{ $contactRequest->name }}
        </div>

        <div class="field">
            <strong>Телефон:</strong> <a href="tel:{{ $contactRequest->phone }}">{{ $contactRequest->phone }}</a>
        </div>

        @if($contactRequest->email)
        <div class="field">
            <strong>Email:</strong> <a href="mailto:{{ $contactRequest->email }}">{{ $contactRequest->email }}</a>
        </div>
        @endif

        @if($contactRequest->service)
        <div class="field">
            <strong>Услуга:</strong> {{ $contactRequest->service }}
        </div>
        @endif

        @if($contactRequest->preferred_date)
        <div class="field">
            <strong>Предпочитаемая дата:</strong> {{ $contactRequest->preferred_date->format('d.m.Y') }}
        </div>
        @endif

        @if($contactRequest->message)
        <div class="field">
            <strong>Сообщение:</strong><br>
            {{ $contactRequest->message }}
        </div>
        @endif

        <div class="field">
            <strong>Язык:</strong> {{ strtoupper($contactRequest->locale) }}
        </div>

        <div class="field">
            <strong>Дата получения:</strong> {{ $contactRequest->created_at->format('d.m.Y H:i') }}
        </div>

        <div class="footer">
            <p>Это автоматическое уведомление с сайта coralclean.ee</p>
        </div>
    </div>
</body>
</html>
