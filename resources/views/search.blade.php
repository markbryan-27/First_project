<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            font-family: 'Alata', sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .listings {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }
        .house-item {
            width: 300px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .house-item:hover {
            transform: scale(1.05);
        }
        .house-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .house-description {
            padding: 15px;
            font-size: 14px;
            color: #333;
        }
        a.back-btn {
            display: inline-block;
            margin: 10px auto 30px auto;
            padding: 10px 20px;
            background: #00c3ff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Search Results: {{ ucfirst($offerType) }}</h1>

<a href="{{ route('dashboard') }}" class="back-btn">← Back to Dashboard</a>

<div class="listings">
    @foreach ($houses as $house)
        <div class="house-item">
            <img src="{{ asset($house['image']) }}" alt="House {{ $house['id'] }}" />
            <div class="house-description">
                {{ $house['description'] }}<br />
                ₱ {{ number_format($house['price'], 2) }}
            </div>
        </div>
    @endforeach

    @if(count($houses) === 0)
        <p>No listings found for "{{ ucfirst($offerType) }}".</p>
    @endif
</div>

</body>
</html>
