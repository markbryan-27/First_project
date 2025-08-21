<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; // Make sure you create this model (see below)

class PropertyController extends Controller
{
    public function search(Request $request)
    {
        $offerType = $request->input('offer_type', 'all');
        $propertyType = $request->input('property_type', 'all');
        $location = $request->input('location', '');

        $allProperties = $this->getAllProperties();

        $properties = array_filter($allProperties, function($property) use ($offerType, $propertyType, $location) {
            if ($offerType !== 'all' && strtolower($property['offer_type']) !== strtolower($offerType)) {
                return false;
            }
            if ($propertyType !== 'all' && strtolower($property['property_type']) !== strtolower($propertyType)) {
                return false;
            }
            if (!empty($location) && stripos($property['location'], $location) === false) {
                return false;
            }
            return true;
        });

        return view('welcome', ['properties' => $properties]);
    }

    public function showAllHouses()
    {
        $properties = $this->getAllProperties();
        return view('all-houses', ['properties' => $properties]);
    }

    public function showBuyHouses()
    {
        $properties = array_filter($this->getAllProperties(), function ($property) {
            return strtolower($property['offer_type']) === 'buy';
        });
        return view('all-houses', ['properties' => $properties]);
    }

    public function showRentHouses()
    {
        $properties = array_filter($this->getAllProperties(), function ($property) {
            return strtolower($property['offer_type']) === 'rent';
        });
        return view('all-houses', ['properties' => $properties]);
    }

    private function getAllProperties()
    {
        return [
            ['id' => 1, 'image' => 'image4/house 1.png', 'description' => 'House lot: 288 sqm - House And Lot For Sale Rush (Negotiable) In Biñan, Laguna', 'price' => 96000, 'offer_type' => 'Buy', 'property_type' => 'House', 'location' => 'Biñan, Laguna'],
            ['id' => 2, 'image' => 'image5/house 2.png', 'description' => 'House lot: 200 sqm - House And Lot For Sale In Taytay, Rizal', 'price' => 36000, 'offer_type' => 'Buy', 'property_type' => 'House', 'location' => 'Taytay, Rizal'],
            ['id' => 3, 'image' => 'image6/house 3.png', 'description' => 'House lot: 250 sqm - House And Lot For Sale In Quezon City', 'price' => 65000, 'offer_type' => 'Buy', 'property_type' => 'House', 'location' => 'Quezon City'],
            ['id' => 4, 'image' => 'image7/house 4.png', 'description' => 'House lot: 288 sqm - House And Lot For Sale In Quezon City', 'price' => 84000, 'offer_type' => 'Buy', 'property_type' => 'House', 'location' => 'Quezon City'],
            ['id' => 5, 'image' => 'image8/house 5.png', 'description' => 'House lot: 150 sqm - House And Lot For Rent In Muntinlupa City', 'price' => 55000, 'offer_type' => 'Rent', 'property_type' => 'House', 'location' => 'Muntinlupa City'],
            ['id' => 6, 'image' => 'image9/house 6.png', 'description' => 'House lot: 300 sqm - House And Lot For Rent In San Pedro, Laguna', 'price' => 76000, 'offer_type' => 'Rent', 'property_type' => 'House', 'location' => 'San Pedro, Laguna'],
            ['id' => 7, 'image' => 'image10/house 7.png', 'description' => 'House lot: 320 sqm - House And Lot For Rent In Dasmariñas, Cavite', 'price' => 95000, 'offer_type' => 'Rent', 'property_type' => 'House', 'location' => 'Dasmariñas, Cavite'],
            ['id' => 8, 'image' => 'image11/house 8.png', 'description' => 'House lot: 400 sqm - House And Lot For Rent In Antipolo City', 'price' => 120000, 'offer_type' => 'Rent', 'property_type' => 'House', 'location' => 'Antipolo City'],
        ];
    }
}
