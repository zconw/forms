<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $authNumber = $_GET['auth'];
    $filePath = 'database.json';

    if (file_exists($filePath)) {
        $currentData = json_decode(file_get_contents($filePath), true);

        $filteredData = array_filter($currentData, function ($entry) use ($authNumber) {
            return $entry['authorizationNumber'] === $authNumber;
        });

        echo json_encode(array_values($filteredData));
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}


