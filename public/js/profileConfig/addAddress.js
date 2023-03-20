let submitBtn = document.getElementById("btn-add");
let form = document.getElementById("form-address");


form.addEventListener("submit", (e) => {
    e.preventDefault();
});


submitBtn.addEventListener("click", addAddress);



async function addAddress() {
    let reqUrl = form.getAttribute("action");

    let cep = document.getElementById("cep").value;
    let bairro = document.getElementById("bairro").value;
    let rua = document.getElementById("rua").value;
    let numero = document.getElementById("numero").value;

    let req = await fetch(reqUrl, { // URL da requisicao
        method: "POST", // Metodo da requisicao
        body: JSON.stringify({ // Dados a serem enviados em formato json
            cep: cep,
            bairro: bairro,
            rua: rua,
            numero: numero
        }),

        headers: {
            "content-type": "application/json" // Tipo de dado sendo enviado
        }
    });

    let res = req.json();

    console.log(res);

}