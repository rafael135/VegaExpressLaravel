class Product {

    constructor(author_id ,title, price, description, imgs) {
        this.author_id = author_id;
        this.title = title;
        this.price = price;
        this.description = description;
        this.imgs = imgs;
    }
}


let titleInput = document.getElementById("title");
let priceInput = document.getElementById("price");
let descriptionInput = document.getElementById("description");
let imgsInput = document.getElementById("imgsInput");
let formProduct = document.getElementById("form-create-product");

formProduct.addEventListener("submit", (e) => {
    e.preventDefault();

    let valid = true;

    let inputs = document.querySelectorAll("input");

    inputs.forEach((input) => {
        console.log(checkInput(input));
        if(checkInput(input) == false) {
            valid = false;
        };
    });

    // Codigo para verificar se algum campo esta incorreto ou nao preenchido

    if(valid == true) {
        tryAddProduct();
    }
    
});


function checkInput(input) {
    let reqs = input.getAttribute("data-reqs");
    if(reqs == "" || reqs == null) {
        return true;
    }
    reqs = reqs.split("|");
    let i = 0;

    while(i < reqs.length) {
        if(reqs[i] == "required") {
            if(input.value == "" || input.value == null) {
                addErrorMsg(input, "Campo não preenchido!")
                return false;
            }
        }
        else if(reqs[i].includes("minLength")) {
            let val = reqs[i].split("=");
            val = val[1];

            if(input.value.length < val) {
                addErrorMsg(input, `Mínimo de ${val} caracteres!`);
                return false;
            }
        }
        i++;
    }



    return true;
}

function addErrorMsg(input, msg) {
    input.classList.add("is-invalid");

    let parent = input.parentNode;
    let msgBox = parent.querySelector("small");
    msgBox.innerText = `${msg}`;
    msgBox.classList.remove("d-none");



    input.addEventListener("change", (e) => {
        input.classList.remove("is-invalid");
        msgBox.classList.add("d-none");        
    });
}




async function createProduct(product = false) {
    if(product != false) {
        var form = new FormData();


        let req = await fetch(createRoute, { // URL da requisicao
            method: "POST", // Metodo da requisicao
            body: JSON.stringify({ // Dados a serem enviados em formato json
                title: product.title,
                price: product.price,
                description: product.description,
                author_id: product.author_id
            }),

            headers: {
                "content-type": "application/json" // Tipo de dado sendo enviado
            }
        });

        let res = req.json();

        if(res.success != false) {
            let reqImg = await fetch(updateImgRoute, {
                method: "POST",
                body: {
                    id: res.id,
                    imgs: product.imgs
                },

                headers: {
                    "content-type": "multipart/form-data"
                }
            });

            res = reqImg.json;

            console.log(res);
        }

        if(res.success != false) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}



function tryAddProduct() {
    let title = titleInput.value;
    let price = priceInput.value;
    let description = descriptionInput.value;
    let imgs = imgsInput.files;

    // Codigo para checar as imagens

    let produto = new Product(
        author_id,
        title,
        price,
        description,
        imgs
    );

    let result = createProduct(produto);

    

    if(result == true) {
        // Exibe mensagem de sucesso na tela e depois de um tempo recarrega a pagina
    } else {
        // Exibe mensagem de erro na tela e depois de um tempo recarrega a pagina
    }
}