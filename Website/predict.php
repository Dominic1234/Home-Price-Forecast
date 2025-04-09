<?php

/**
 * Handles form submission and calls Tensorflow Serving
 */

//Include Tensorflow Serving client
require_once 'serving_client.php';

//Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate that all required fields are present
    $required_fields = [
        'Postcode',
        'Year',
        'Month',
        'Avg_Rooms',
        'Avg_Bathroom',
        'Avg_Car',
        'Avg_Landsize',
        'Avg_BuildingArea',
        'Avg_Distance'
    ];

    $missing_fields = [];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || $_POST[$field] === '') {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        die('Missing required fields: ' . implode(', ', $missing_fields));
    }

    try {
        // Call the prediction function with form data
        $result = predictPropertyPrice($_POST);

        // Extract the Precentage result
        $precentage[] = 0.0;
        for($i=1;$i<=11;$i++) {
            $precentage[] = ($result['predictions'][$i]-$result['predictions'][($i-1)])/$result['predictions'][($i-1)];
        }

        $data = [
            'month' => ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"],
            'precentage' => $precentage,
            'prices' => $result['predictions']
        ];
        
        // Log the prediction for debugging
        error_log("Property prediction result: " . json_encode($data));

        // Redirect back to the form with the result
        header("Location: result.html?result=" . urlencode(json_encode($data)));
        exit;

    } catch (Exception $e) {
        // Log the error
        error_log("Prediction error: " . $e->getMessage());

        // Display error message
        die("Error making prediction: " . htmlspecialchars($e->getMessage()));
    }
}
