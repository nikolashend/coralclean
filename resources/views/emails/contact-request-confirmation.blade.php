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
        .content {
            margin-bottom: 25px;
        }
        .content p {
            margin: 12px 0;
            font-size: 15px;
        }
        .details {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
            border-left: 4px solid #2ec4c6;
        }
        .details h3 {
            margin-top: 0;
            color: #2ec4c6;
            font-size: 16px;
        }
        .details p {
            margin: 8px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #2ec4c6;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
        .footer a {
            color: #2ec4c6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✅ 
                @if($contactRequest->locale === 'ru')
                    Ваша заявка принята!
                @elseif($contactRequest->locale === 'en')
                    Your Request Received!
                @else
                    Teie päring on vastu võetud!
                @endif
            </h1>
        </div>

        <div class="content">
            @if($contactRequest->locale === 'ru')
                <p>Здравствуйте, <strong>{{ $contactRequest->name }}</strong>!</p>
                <p>Спасибо за обращение в <strong>CoralClean</strong>. Мы получили вашу заявку и свяжемся с вами в ближайшее время.</p>
            @elseif($contactRequest->locale === 'en')
                <p>Hello, <strong>{{ $contactRequest->name }}</strong>!</p>
                <p>Thank you for contacting <strong>CoralClean</strong>. We have received your request and will contact you shortly.</p>
            @else
                <p>Tere, <strong>{{ $contactRequest->name }}</strong>!</p>
                <p>Täname, et võtsite ühendust <strong>CoralClean</strong>iga. Oleme teie päringu kätte saanud ja võtame teiega peagi ühendust.</p>
            @endif
        </div>

        <div class="details">
            <h3>
                @if($contactRequest->locale === 'ru')
                    Детали вашей заявки:
                @elseif($contactRequest->locale === 'en')
                    Your Request Details:
                @else
                    Teie päringu üksikasjad:
                @endif
            </h3>
            
            @if($contactRequest->service)
            @php
                try {
                    // Try to find readable name for service/package
                    $serviceName = $contactRequest->service;
                    $service = \App\Models\Service::where('slug', $contactRequest->service)->first();
                    if ($service) {
                        $trans = $service->translations->where('locale', $contactRequest->locale)->first();
                        $serviceName = $trans ? $trans->title : $service->slug;
                    } else {
                        $package = \App\Models\Package::where('slug', $contactRequest->service)->first();
                        if ($package) {
                            $trans = $package->translations->where('locale', $contactRequest->locale)->first();
                            $serviceName = $trans ? ('📦 ' . $trans->title) : $package->slug;
                        }
                    }
                } catch (\Exception $e) {
                    $serviceName = $contactRequest->service;
                }
            @endphp
            <p><strong>
                @if($contactRequest->locale === 'ru')
                    Услуга:
                @elseif($contactRequest->locale === 'en')
                    Service:
                @else
                    Teenus:
                @endif
            </strong> <span style="color: #2ec4c6;">{{ $serviceName }}</span></p>
            @endif

            @if($contactRequest->preferred_date)
            <p><strong>
                @if($contactRequest->locale === 'ru')
                    Предпочитаемая дата:
                @elseif($contactRequest->locale === 'en')
                    Preferred Date:
                @else
                    Eelistatud kuupäev:
                @endif
            </strong> {{ $contactRequest->preferred_date->format('d.m.Y') }}</p>
            @endif

            <p><strong>
                @if($contactRequest->locale === 'ru')
                    Телефон:
                @elseif($contactRequest->locale === 'en')
                    Phone:
                @else
                    Telefon:
                @endif
            </strong> {{ $contactRequest->phone }}</p>

            @if($contactRequest->email)
            <p><strong>
                @if($contactRequest->locale === 'ru')
                    Email:
                @elseif($contactRequest->locale === 'en')
                    Email:
                @else
                    E-post:
                @endif
            </strong> {{ $contactRequest->email }}</p>
            @endif

            @if($contactRequest->message)
            <p><strong>
                @if($contactRequest->locale === 'ru')
                    Сообщение:
                @elseif($contactRequest->locale === 'en')
                    Message:
                @else
                    Sõnum:
                @endif
            </strong><br>
            <span style="white-space: pre-wrap;">{{ $contactRequest->message }}</span></p>
            @endif
        </div>

        <div style="text-align: center;">
            @if($contactRequest->locale === 'ru')
                <p>Наш менеджер свяжется с вами в ближайшее время для уточнения деталей.</p>
            @elseif($contactRequest->locale === 'en')
                <p>Our manager will contact you shortly to clarify the details.</p>
            @else
                <p>Meie juht võtab teiega peagi ühendust, et täpsustada üksikasju.</p>
            @endif
        </div>

        <div class="footer">
            <p>
                <strong>CoralClean</strong><br>
                @if($contactRequest->locale === 'ru')
                    Профессиональная уборка в Таллинне
                @elseif($contactRequest->locale === 'en')
                    Professional Cleaning in Tallinn
                @else
                    Professionaalne koristus Tallinnas
                @endif
            </p>
            <p>
                <a href="https://coralclean.ee">coralclean.ee</a> | 
                <a href="tel:+37258301348">+372 5830 1348</a> | 
                <a href="mailto:info@coralclean.ee">info@coralclean.ee</a>
            </p>
        </div>
    </div>
</body>
</html>
