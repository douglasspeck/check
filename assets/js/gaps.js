/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.4.0
 * 
 * @function        createNumber
 * @description     Copies the given pseudo-element attributes to a new number input element
 * @param           {Element}   el      The element to create the number input within
 * @param           {Number}    id      The element's ID
 * 
 * @function        generateNumbers
 * @description     Creates a corresponding number input for each <gap> pseudo-tag
 * 
 */

function createNumber(el,id){

    let num = el.getAttribute("value");
    
    let inp = document.createElement("input");
    inp.classList.add("gap");
    inp.setAttribute("type", "number");

    inp.setAttribute("value", num);

    el.after(inp);
    el.remove();

}

function generateNumbers() {

    let inputs = document.getElementsByTagName("gap");

    let id = 0;

    while (inputs.length > 0) {

        let inp = inputs[0];
        createNumber(inp, id);
        id++;

    }

}