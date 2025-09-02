<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            width: 80px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 22px;
            margin: 0;
            color: #00695c;
        }
        .date {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .info {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info h3 {
            margin-top: 0;
            color: #444;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .row {
            margin: 6px 0;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo">
        <h1>{{ $title }}</h1>
    </div>

    <div class="date">
        Generated on: {{ $date }}
    </div>

    <div class="info">
        <h3>Client Information</h3>
        <div class="row"><span class="label">Name:</span> {{ $name }}</div>
        <div class="row"><span class="label">Email:</span> {{ $email }}</div>
        <div class="row"><span class="label">Phone:</span> {{ $phone }}</div>
    </div>

    <div class="info">
        <h3>Reservation Details</h3>
        <div class="row"><span class="label">Type:</span> {{ $type }}</div>
        <div class="row"><span class="label">Number of Persons:</span> {{ $nmbre_perssone }}</div>
        <div class="row"><span class="label">Start Date:</span> {{ $date_debut }}</div>
        <div class="row"><span class="label">End Date:</span> {{ $date_fin }}</div>
    </div>
</body>
</html>
