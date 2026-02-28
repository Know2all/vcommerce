<?php
// Simple Mock API / Webhook Handler for Vcommerce Plugin

// Set search path for local storage simulation if needed, 
// but for a dummy demo we just echo back the received data.

header('Content-Type: application/json');

// Handle incoming webhook data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if ($data) {
        // In a real app, you would save this to a database
        // For this demo, we'll just acknowledge receipt
        echo json_encode([
            'status' => 'success',
            'message' => 'Webhook received successfully',
            'received_data' => $data,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
        exit;
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
        exit;
    }
}

// Handle Mock API for Product Data
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_products') {
    $products = [
        [
            'id' => '1',
            'name' => 'Heritage Chrono',
            'description' => 'Experience luxury in motion with our signature timepiece.',
            'ytLink' => 'https://www.youtube.com/shorts/eISrhxab4wE',
            'price' => '$1,299',
            'mrp' => '$1,999',
            'discount' => '35%',
            'category' => 'Watches'
        ],
        [
            'id' => '2',
            'name' => 'Sonic Pro Gen-X',
            'description' => 'Active Noise Cancellation for an immersive audio experience.',
            'ytLink' => 'https://www.youtube.com/shorts/he9P0oj1dzs',
            'price' => '$349',
            'mrp' => '$499',
            'discount' => '30%',
            'category' => 'Audio'
        ],
        [
            'id' => '3',
            'name' => 'Nitro Runner V2',
            'description' => 'Ultra-light mesh tech designed for peak performance.',
            'ytLink' => 'https://www.youtube.com/shorts/klJYK-KpSJk',
            'price' => '$189',
            'mrp' => '$299',
            'discount' => '37%',
            'category' => 'Footwear'
        ],
        [
            'id' => '4',
            'name' => 'Aviator Gold',
            'description' => 'Polarized 24k Finish for the ultimate summer style.',
            'ytLink' => 'https://www.youtube.com/shorts/ja3R1TVSvZo',
            'price' => '$450',
            'mrp' => '$599',
            'discount' => '25%',
            'category' => 'Eyewear'
        ],
        [
            'id' => '5',
            'name' => 'Retro Cam 35mm',
            'description' => "Collector's Edition vintage camera for the analog enthusiast.",
            'ytLink' => 'https://www.youtube.com/shorts/9qmlaq1FXSY',
            'price' => '$899',
            'mrp' => '$1,299',
            'discount' => '30%',
            'category' => 'Photography'
        ]
    ];
    echo json_encode($products);
    exit;
}

// If no specific action, render the Demo Page
?>