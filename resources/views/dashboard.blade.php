<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Import Alata font -->
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Alata', sans-serif;
            background-color: #f2f2f2;
            overflow-x: hidden; /* prevent horizontal scroll on whole page */
        }

        .hero {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
        }

        .overlay h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
        }

        .overlay p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
        }

        .search-form {
            background-color: white;
            border-radius: 12px;
            padding: 20px 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            align-items: flex-end;
            max-width: 1000px;
            width: 90%;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1 1 200px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: black;
        }

        .search-input,
        .search-select {
            padding: 10px;
            font-size: 1rem;
            background-color: #e5e5e5;
            border: none;
            border-radius: 5px;
        }

        .search-button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #00c3ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Recently Posted Listings Title */
        .recent-listings-title {
            text-align: left;
            font-size: 20px;
            font-family: 'Alata', sans-serif;
            margin: 20px 40px 10px 40px;
            color: black;
        }

        /* Scroll container for horizontal scrolling */
        .scroll-container {
            overflow-x: auto;
            padding: 10px 40px 20px 40px;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            background: white;
            box-sizing: border-box;
        }

        .listings-inline {
            display: inline-flex;
            gap: 60px;
            align-items: flex-start;
        }

        .house-item {
            flex: 0 0 auto;
            width: 320px;
            text-align: left;
            font-family: 'Alata', sans-serif;
            color: black;
            vertical-align: top;
            cursor: pointer;
            position: relative;
            border-radius: 8px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            padding-bottom: 15px;
            box-sizing: border-box;
        }

        .house-item img {
            width: 100%;
            height: 212px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
            display: block;
            margin-bottom: 10px;
        }

        .house-description {
            font-size: 14px;
            line-height: 1.5;
            white-space: normal;
            padding: 0 15px 0 15px;
        }

        /* Floating detail modal styles */
        .house-item.active {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 600px;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 1001;
            background: white;
            border-radius: 10px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
            transform: translate(-50%, -50%);
            cursor: default;
            display: flex;
            flex-direction: column;
        }

        .house-item.active img {
            height: 300px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 0;
        }

        .house-item.active .house-description {
            font-size: 16px;
            padding: 20px;
        }

        /* Close button */
        .close-btn {
            position: absolute;
            top: 12px;
            right: 15px;
            font-size: 28px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            user-select: none;
            display: none; /* hide by default */
        }

        .house-item.active .close-btn {
            display: block; /* show only when active */
        }

        /* Dim background when modal open */
        .modal-overlay {
            display: none;
            position: fixed;
            top:0; left:0; right:0; bottom:0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }

        .modal-overlay.active {
            display: block;
        }

        /* Involved image container full width below the listings */
        .involved-image-container {
            width: 100vw;
            margin: 20px 0 40px 0;
            box-sizing: border-box;
        }

        .involved-image-container img {
            width: 100%;
            display: block;
            object-fit: cover;
            border-radius: 0;
        }

        /* View All Houses Button Styling */
        .view-all-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 160px;
            height: 212px;
            flex: 0 0 auto;
        }

        .view-all-button {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #00c3ff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .view-all-button:hover {
            background-color: #009fcc;
        }

        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
                align-items: stretch;
                padding: 15px;
            }

            .search-button {
                width: 100%;
            }

            .overlay h1 {
                font-size: 1.8rem;
            }

            .overlay p {
                font-size: 1rem;
            }

            .scroll-container {
                padding: 10px 20px 20px 20px;
            }

            .house-item {
                width: 90%;
                margin-bottom: 30px;
            }

            .house-item img {
                height: auto;
            }

            .listings-inline {
                gap: 30px;
                flex-wrap: nowrap;
            }

            .house-item.active {
                width: 90vw;
                height: auto;
                max-height: 80vh;
                overflow-y: auto;
            }

            .house-item.active img {
                height: auto;
                max-height: 300px;
            }

            .view-all-container {
                width: 90%;
                height: 50px;
                justify-content: center;
            }

            .view-all-button {
                width: 100%;
                height: 100%;
                font-size: 18px;
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="hero">
    <img src="{{ asset('image2/balcony.png') }}" alt="Balcony View" />
    <div class="overlay">
        <h1>Real estate search made simple.</h1>
        <p>Find the best residential and commercial properties in the Philippines.</p>

        <form class="search-form">
            <div class="form-group">
                <label for="offer-type">Offer Type:</label>
                <select id="offer-type" class="search-select">
                    <option>All</option>
                    <option>Buy</option>
                    <option>Rent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="property-type">Property Type:</label>
                <select id="property-type" class="search-select">
                    <option>All</option>
                    <option>House</option>
                    <option>Condo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" class="search-input" placeholder="Search for location" />
            </div>
            <div class="form-group" style="justify-content: flex-end;">
                <label>&nbsp;</label>
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Recently Posted Listings -->
<div class="recent-listings-title">Recently Posted Listings</div>

<!-- House Listings with horizontal scroll and generous spacing -->
<div class="scroll-container" tabindex="0" aria-label="House listings">
    <div class="listings-inline">

        <!-- House 1 -->
        <div class="house-item" tabindex="0" data-id="1">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image4/house 1.png') }}" alt="House 1" />
            <div class="house-description">
                House lot: 288 sqm<br />
                ₱ 96,000.00<br />
                House And Lot For Sale Rush (Negotiable) In Biñan, Laguna
            </div>
        </div>

        <!-- House 2 -->
        <div class="house-item" tabindex="0" data-id="2">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image5/house 2.png') }}" alt="House 2" />
            <div class="house-description">
                House lot: 200 sqm<br />
                ₱ 36,000.00<br />
                House And Lot For Sale In Taytay, Rizal
            </div>
        </div>

        <!-- House 3 -->
        <div class="house-item" tabindex="0" data-id="3">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image6/house 3.png') }}" alt="House 3" />
            <div class="house-description">
                House lot: 250 sqm<br />
                ₱ 65,000.00<br />
                House And Lot For Sale In Quezon City
            </div>
        </div>

        <!-- House 4 -->
        <div class="house-item" tabindex="0" data-id="4">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image7/house 4.png') }}" alt="House 4" />
            <div class="house-description">
                House lot: 288 sqm<br />
                ₱ 84,000.00<br />
                House And Lot For Sale In Quezon City
            </div>
        </div>

        <!-- House 5 -->
        <div class="house-item" tabindex="0" data-id="5">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image8/house 5.png') }}" alt="House 5" />
            <div class="house-description">
                House lot: 150 sqm<br />
                ₱ 55,000.00<br />
                House And Lot For Sale In Muntinlupa City
            </div>
        </div>

        <!-- House 6 -->
        <div class="house-item" tabindex="0" data-id="6">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image9/house 6.png') }}" alt="House 6" />
            <div class="house-description">
                House lot: 300 sqm<br />
                ₱ 76,000.00<br />
                House And Lot For Sale In San Pedro, Laguna
            </div>
        </div>

        <!-- House 7 -->
        <div class="house-item" tabindex="0" data-id="7">
            <span class="close-btn" title="Close">&times;</span>
            <img src="{{ asset('image10/house 7.png') }}" alt="House 7" />
            <div class="house-description">
                House lot: 320 sqm<br />
                ₱ 95,000.00<br />
                House And Lot For Sale In Dasmariñas, Cavite
            </div>
        </div>

        <!-- House 8 -->
        <div class="house-item" tabindex="0" data-id="8">
            <span class="close-btn" title="Close">&time
                s;</span>
            <img src="{{ asset('image11/house 8.png') }}" alt="House 8" />
            <div class="house-description">
                House lot: 400 sqm<br />
                ₱ 120,000.00<br />
                House And Lot For Sale In Antipolo City
            </div>
        </div>

        <!-- View All Houses Button -->
        <div class="view-all-container">
            <a href="{{ url('/all-houses') }}" class="view-all-button" aria-label="View all houses" style="text-decoration: none; display: inline-block; text-align: center;">
                View All Houses
            </a>
        </div>

    </div>
</div>

<!-- Large Image Below Listings -->
<div class="involved-image-container">
    <img src="{{ asset('image12/involved.png') }}" alt="Featured House" />
</div>

<script>
    // JavaScript to handle opening/closing house details modal style

    // Grab all house items
    const houses = document.querySelectorAll('.house-item');
    const overlay = document.createElement('div');
    overlay.classList.add('modal-overlay');
    document.body.appendChild(overlay);

    houses.forEach(house => {
        const closeBtn = house.querySelector('.close-btn');

        house.addEventListener('click', (e) => {
            // Prevent click on close button from triggering open
            if (e.target === closeBtn) return;

            // Open modal for this house
            houses.forEach(h => h.classList.remove('active'));
            overlay.classList.add('active');
            house.classList.add('active');
            document.body.style.overflow = 'hidden'; // disable scroll
        });

        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            house.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = ''; // enable scroll
        });
    });

    // Close modal when clicking outside the active house
    overlay.addEventListener('click', () => {
        houses.forEach(h => h.classList.remove('active'));
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    });

    // Accessibility: close modal on Escape key
    document.addEventListener('keydown', e => {
        if (e.key === "Escape") {
            houses.forEach(h => h.classList.remove('active'));
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
</script>

</body>
</html>
