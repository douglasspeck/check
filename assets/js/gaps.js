/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.4.0
 * 
 * @function        createNumber
 * @param           {Element}   el      The element to create the number input within
 * @param           {Number}    id      The element's ID
 * 
 * @function        generateNumbers
 * @description     Creates a corresponding number input for each <fraction> pseudo-tag
 * 
 */

function createNumber(el,id){

    let num = el.getAttribute("value");
    
    let inp = document.createElement("input");
    inp.classList.add("number-input");
    inp.setAttribute("type", "number");

    inp.setAttribute("value", num);

    el.after(inp);
    el.remove();

}

function generateNumbers() {

    let inputs = document.getElementsByTagName("number");

    let id = 0;

    while (inputs.length > 0) {

        let inp = inputs[0];
        createTextInput(inp, id);
        id++;

    }

}