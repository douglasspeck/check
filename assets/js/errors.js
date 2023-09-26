/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        newError
 * @param           {Number}    id      The number of the error
 * @description     Outputs the error message according to the id and adds an error class to the page
 * 
 * @function        colorLog
 * @param           {String}    message     The message to be logged
 * @param           {String}    color       The type of message to be logged or the color to be used
 * @description     Logs a message to the console with the specified color
 * 
 */

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

    // Converts id to "000"-type string
    id = idThat(id);

    // Calls the colorLog function as an error message
    colorLog(`Erro ${id}: ${er.message}`,"error");
    
    // Adds an error class to the page
    let body = document.getElementsByTagName("body")[0];
    body.classList.add("error");

    // Removes the class after 0.5 seconds
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