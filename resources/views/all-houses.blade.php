<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Houses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .property-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .property-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .property-card .card-body {
            padding: 15px;
        }
        .property-price {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Available Properties</h2>

    <div class="row">
        @if(count($properties) > 0)
            @foreach ($properties as $property)
                <div class="col-md-4">
                    <div class="card property-card">
                        <img src="{{ asset($property['image']) }}" alt="House Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property['location'] }}</h5>
                            <p class="card-text">{{ $property['description'] }}</p>
                            <p class="property-price">₱{{ number_format($property['price'], 0) }}</p>
                            <span class="badge bg-primary">{{ $property['offer_type'] }}</span>
                            <span class="badge bg-secondary">{{ $property['property_type'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No properties found.</p>
        @endif
    </div>
</div>
</body>
</html>
php
