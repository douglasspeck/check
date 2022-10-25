function newError(id) {

    const ERROR_LIST = [
        {
            number: 1,
            message: "Número de seções incompatível com o denominador."
        },{
            number: 2,
            message: "Numerador não pode ser maior que denominador no modo Preencher."
        },{
            number: 3,
            message: "Número de seções inválido."
        },{
            number: 4,
            message: "Numerador inválido."
        },{
            number: 5,
            message: "Denominador inválido."
        }
    ]

    let er = ERROR_LIST[id-1];

    id = id < 100 ? "0" + id : id;
    id = id < 10 ? "0" + id : id;

    colorLog(`Erro ${id}: ${er.message}`,"error");
    
    let body = document.getElementsByTagName("body")[0];
    body.classList.add("error");

    setTimeout(() => { body.classList.remove("error"); }, 500)

}

function colorLog(message, color) {

    color = color || "black";

    switch (color) {
        case "success":
             color = "Green";
             break;
        case "info":
                color = "DodgerBlue";
             break;
        case "error":
             color = "Red";
             break;
        case "warning":
             color = "Orange";
             break;
        default:
             color = color;
    }

    console.log("%c" + message, "color:" + color);
}