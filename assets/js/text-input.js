/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.4.0
 * 
 * @function        createTextInput
 * @param           {Element}   el      The element to create the text input within
 * @param           {Number}    id      The element's ID
 * 
 * @function        generateFractions
 * @description     Creates a corresponding text input for each <text> pseudo-tag
 * 
 */

function createTextInput(el,id){

    let str = el.getAttribute("value");
    
    let inp = document.createElement("input");
    inp.classList.add("text-input");
    inp.setAttribute("type", "text");

    inp.setAttribute("value", str);

    el.after(inp);
    el.remove();

}

function generateTextInputs() {

    let inputs = document.getElementsByTagName("text");

    let id = 0;

    while (inputs.length > 0) {

        let inp = inputs[0];
        createTextInput(inp, id);
        id++;

    }

}