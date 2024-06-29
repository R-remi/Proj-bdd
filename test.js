

function fetchBitcoinPrice() {
    fetch('https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC', {
        headers: {'X-CMC_PRO_API_KEY': 'b34490b6-4982-4bb2-8f36-752439271b42'}
    })
        .then(response => response.json())
        .then(data => {
            console.log(JSON.stringify(data, null, 2)); // Affiche le JSON formaté
            if (data.status.error_code === 0) {
                console.log('Ça marche');
                const btcPrice = data.data.BTC.quote.USD.price;
                console.log(`Le prix du Bitcoin est de ${btcPrice} USD.`);
                return btcPrice;
            } else {
                console.log('Erreur:', data.status.error_message);
                return null;
            }
        })
        .catch(error => console.error('Erreur:', error));
}


fetchBitcoinPrice();
