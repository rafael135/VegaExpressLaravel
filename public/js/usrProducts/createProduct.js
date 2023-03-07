class Product {

    constructor(title, price, description, imgs) {
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



async function createProduct(product = false) {

    if(product != false) {
        let req = await fetch("127.0.0.1:8000/api/products/create", { // URL da requisicao
            method: "POST", // Metodo da requisicao
            body: JSON.stringify({ // Dados a serem enviados em formato json
                title: product.title,
                price: product.price,
                description: product.description,
                imgs: product.imgs
            }),

            headers: {
                "content-type": "application/json" // Tipo de dado sendo enviado
            }
        });

        let res = req.json();

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
    let imgs = "";

    // Codigo para checar as imagens

    let produto = new Product(
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


function checkData() {
    // Codigo para verificar se algum campo esta incorreto ou nao preenchido

    tryAddProduct();
}