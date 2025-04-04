<?php
function predictPropertyPrice($input_data, $serverUrl = 'http://localhost:8501', $modelName = 'property_forecast')
{

    //Tensorflow Serving REST API endpoint
    $endpoint = "$serverUrl/v1/models/$modelName:predict";

    // List of expected features in the correct order
    $features = [
        'Postcode',
        'Year',
        'Avg_Rooms',
        'Avg_Bathroom',
        'Avg_Car',
        'Avg_Landsize',
        'Avg_BuildingArea',
        'Avg_Distance',
        'Avg_Lattitude',
        'Avg_Longtitude',
        'Price_Change'
    ];

    // Validate that all required features are present
    foreach ($features as $feature) {
        if (!isset($input_data[$feature])) {
            throw new Exception("Missing required feature: $feature");
        }
    }

    // Create array with values in the correct order
    $data = [];
    foreach ($features as $feature) {
        $data[] = (float)$input_data[$feature];
    }

    // Create the request payload
    $payload = [
        "instances" => [$data]
    ];

    // Encode the payload as JSON
    $json_payload = json_encode($payload);

    //Initialize cURL
    $ch = curl_init($endpoint);

    //Set cURL options
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, "$serverUrl/v1/models/$modelName:predict");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_payload)
    ]);

    //Execute the request
    $response = curl_exec($ch);

    //Check for errors
    if ($response === FALSE) {
        die('Error: ' . curl_error($ch));
    } else {
        //Decode the response
        $result = json_decode($response, true);
        return $result;
    }

    //Close cURL session
    curl_close($ch);

    return $result;
}
