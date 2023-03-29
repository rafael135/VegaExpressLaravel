async function updateAddressStatus(element) {
    let id = element.getAttribute("data-id");
    let status = element.getAttribute("data-status");

    let circleELement = element.querySelector(".circle");

    if(status == "0") {
        status = "1";
    } else {
        status = "0";
    }

    element.setAttribute("data-status", status);

    switchStatus(circleELement, status);

    console.log(id, status, circleELement);

    let req = await fetch(updateRoute, {
        method: "POST",
        body: JSON.stringify({
            id: id,
            status: status,
            _token: csrfToken
        }),

        headers: {
            "content-type": "application/json" // Tipo de dado sendo enviado
        }
    });

    let res = req.json();

    if(res.success == true) {

    } else {
        status = (status == "0") ? "1" : "0";
        element.setAttribute("data-status", status);
        switchStatus(circleELement, status);
    }
}


function resetSwitch() {
    let active = document.querySelector(".circle.active");
    if(active != null) {
        active.classList.remove("active");
        active.classList.add("disabled");
    }
}


function switchStatus(circle, status) {
    
    resetSwitch();

    if(status = "1") {
        circle.classList.remove("disabled");
        circle.classList.add("active");
    } else {
        circle.classList.remove("active");
        circle.classList.add("disabled");
    }
}