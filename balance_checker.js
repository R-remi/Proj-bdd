document.getElementById('balanceForm').addEventListener('submit', function(event) {
    event.preventDefault();
   // const walletAddress = document.getElementById('walletAddress').value;
    const walletAddress = "bc1qnmmjj8atyevp0nqqhxwzfqftay5803tt79kxm7";



    fetch(`https://blockchain.info/rawaddr/${walletAddress}`)
        .then(response => response.json())
        .then(data => {
            var balance = data.final_balance / 10**8; // Convertir le solde en BTC
            document.getElementById('balanceResult').innerText = `Solde du portefeuille : ${balance} BTC`;
        })
        .catch(error => {
            console.error('Erreur lors de la récupération du solde du portefeuille :', error);
            document.getElementById('balanceResult').innerText = "Erreur lors de la récupération du solde du portefeuille.";
        });
});






