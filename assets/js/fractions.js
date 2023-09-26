/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        createFraction
 * @description     Copies the given pseudo-element attributes to three input elements
 * @param           {Element}   el      The element to create the fraction within
 * @param           {Number}    id      The element's ID
 * 
 * @function        generateFractions
 * @description     Creates a corresponding fraction for each <fraction> pseudo-tag
 * 
 */

function createFraction(el,id){

    let int = el.getAttribute("int");
    let n = el.getAttribute("num");
    let d = el.getAttribute("den");

    let frac = document.createElement("div");
    frac.classList.add("fraction");
    
    let num = document.createElement("input");
    num.setAttribute("type", "number");
    
    if (n!==null && n!=='') {
        num.setAttribute("readonly","");
        num.setAttribute("value", n);
    } else {
        den.setAttribute("id", "num-fraction-"+id);
        den.setAttribute("name", "num-fraction-"+id);
    }
    
    let den = document.createElement("input");
    den.setAttribute("type", "number");
    
    if (d!==null && d!=='') {
        den.setAttribute("readonly","");
        den.setAttribute("value", d);
    } else {
        den.setAttribute("id", "den-fraction-"+id);
        den.setAttribute("name", "den-fraction-"+id);
    }

    if (int!==null && int!=='') {
        let integer = document.createElement("input");
        integer.setAttribute("type", "number");
        integer.setAttribute("value", int);
        frac.append(integer);
        frac.classList.add("mixed");
    }

    frac.appendChild(num);
    frac.appendChild(den);

    el.after(frac);
    el.remove();

}

function createGap(el,id){

    let val = el.getAttribute("value");

    let gap = document.createElement("input");

    console.log(val);

    gap.classList.add("gap");
    gap.setAttribute("type", "number");
    gap.setAttribute("value", val);
    el.after(gap);
    el.remove();

}

function generateFractions() {

    let fractions = document.getElementsByTagName("fraction");

    let id = 0;

    while (fractions.length > 0) {

        let fra = fractions[0];
        createFraction(fra, id);
        id++;

    }

}

function generateGaps() {

    let gaps = document.getElementsByTagName("gap");

    let id = 0;

    while (gaps.length > 0) {

        let gap = gaps[0];
        createGap(gap, id);
        id++;

    }

}