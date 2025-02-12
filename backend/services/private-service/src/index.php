<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// OPTIONS kérések kezelése CORS miatt
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Backend szolgáltatások címének beállítása
$services = [
    "public" => "http://localhost:8001/api/public",
    "private" => "http://localhost:8001/api/private"
];

// A kért útvonal meghatározása
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Ellenőrizzük, hogy az útvonal egy ismert service-hez tartozik-e
foreach ($services as $key => $serviceUrl) {
    if (strpos($requestUri, "/api/$key") === 0) {
        // A teljes cél URL felépítése
        $targetUrl = $serviceUrl . str_replace("/api/$key", "", $requestUri);
        
        // Kérés továbbítása a megfelelő service-hez
        $ch = curl_init($targetUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestMethod);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        // Ha van POST/PUT adat, akkor továbbítsuk
        if ($requestMethod === 'POST' || $requestMethod === 'PUT') {
            $input = file_get_contents('php://input');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        }

        // Küldjük a kérést és válaszoljunk a kapott adatokkal
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        http_response_code($httpCode);
        echo $response;
        exit();
    }
}

// Ha nincs megfelelő útvonal
http_response_code(404);
echo json_encode(["error" => "Route not found"]);