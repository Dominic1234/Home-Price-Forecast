<?php

function predictPropertyPrice($input_data, $serverUrl = 'http://localhost:5000') {
// Validate input data
if (!is_array($input_data)) {
throw new InvalidArgumentException('Input data must be an array of features');
}

$selected_features = [
    (float)$input_data['Postcode'],
    (float)$input_data['Year'],
    (float)$input_data['Avg_Rooms'],
    (float)$input_data['Avg_Bathroom'],
    (float)$input_data['Avg_Car'],
    (float)$input_data['Avg_Landsize'],
    (float)$input_data['Avg_BuildingArea'],
    (float)$input_data['Avg_Distance']
];

// Prepare the request data
$requestData = [
'features' => $selected_features
];

// Initialize cURL session
$ch = curl_init($serverUrl . '/predict');

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/json',
'Accept: application/json'
]);

// Execute the request
$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL session
curl_close($ch);

// Check for errors
if ($error) {
error_log("cURL Error: $error");
return null;
}

// Check HTTP status code
if ($httpCode !== 200) {
error_log("HTTP Error: Server returned status code $httpCode");
return null;
}

// Decode JSON response
$decodedResponse = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
error_log("JSON Error: " . json_last_error_msg());
return null;
}

return $decodedResponse;
}

?>