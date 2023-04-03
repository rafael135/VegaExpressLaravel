async function sendEmail(btn) {
    let req = await fetch(sendRoute, {
        method: "POST",
        body: JSON.stringify({
            _token: csrfToken
        }),
        headers: {
            "Content-type": "application/json",
            "Accept": "application/json"
        }
    });

    let response = req.json();

    if(response.success == true) {
        // Exibo uma mensagem que a confirmação foi enviada com sucesso
    } else {
        // Exibo uma mensagem que a confirmação falhou ao ser enviada
    }
}