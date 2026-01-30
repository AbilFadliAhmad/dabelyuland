<?php
class LocationController {

    public function getLocation() {
        if (isset($_GET['lat']) && isset($_GET['lon'])) {
            $lat = $_GET['lat'];
            $lon = $_GET['lon'];
            
            $url = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=$lat&lon=$lon";
    
            // Nominatim MEWAJIBKAN User-Agent
            $opts = [
                "http" => [
                    "method" => "GET",
                    "header" => "User-Agent: MyPropertyApp/1.0 (contact@example.com)\r\n"
                ]
            ];
    
            $context = stream_context_create($opts);
            $response = file_get_contents($url, false, $context);
            var_dump($response);
    
            echo $response;
        }
    }
}

?>