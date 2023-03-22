let submitBtn = document.getElementById("btn-add");
let form = document.getElementById("form-address");

let modal = document.getElementById("addressAddModal");


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

    res.then((response) => {
        if(response.success != false) {
            modal.removeAttribute("role");
            modal.classList.remove("show");
            modal.style.display = "none";
    
            //window.location.reload();
        } else {
            showErrors(response.errors);
        }
    });
}



function showErrors(errors) {
    if(Array.isArray(errors)) {
        errors.forEach(e => {
            let input = document.getElementById(e.input);
            let error = e.error;

            let feedback = input.parentElement.querySelector("div");
            feedback.innerHTML = error;
            feedback.style.display = "block";

            input.addEventListener("change", removeFeedback);


        });
    } else {
        let modalInputs = modal.querySelectorAll(".form-floating");

        modalInputs.forEach((e) => {
            let feedback = e.querySelector(".invalid-feedback");
            feedback.innerHTML = errors;
            let input = e.querySelector("input");
            feedback.style.display = "block";
            

            input.addEventListener("change", removeFeedback);
        });
    }

    
}

function removeFeedback(input) {
    input.target.parentElement.querySelector("div").style.display = "none";
    input.target.removeEventListener("change", removeFeedback);
}