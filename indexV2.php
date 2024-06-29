<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours du Bitcoin</title>
</head>
<body>
<h1>Cours du Bitcoin</h1>
<div id="btcPrice"></div>

<?php
function fetchBitcoinPrice() {
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC';
    $apiKey = 'b34490b6-4982-4bb2-8f36-752439271b42';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-CMC_PRO_API_KEY: ' . $apiKey));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if ($response) {
        $data = json_decode($response, true);
        if ($data['status']['error_code'] === 0) {
            $btcPrice = $data['data']['BTC']['quote']['USD']['price'];
            echo '<script>document.getElementById("btcPrice").innerHTML = "Le prix du Bitcoin est de ' . $btcPrice . ' USD.";</script>';
        } else {
            echo '<script>document.getElementById("btcPrice").innerHTML = "Erreur: ' . $data['status']['error_message'] . '";</script>';
        }
    } else {
        echo '<script>document.getElementById("btcPrice").innerHTML = "Erreur lors de la requête API.";</script>';
    }

    curl_close($curl);
}

fetchBitcoinPrice();
?>
</body>
</html>
