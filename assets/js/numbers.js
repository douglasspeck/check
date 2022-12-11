function createFraction(el,id){

    let int = el.getAttribute("int");
    let n = el.getAttribute("num");
    let d = el.getAttribute("den");

    let frac = document.createElement("div");
    frac.classList.add("fraction");
    
    let num = document.createElement("input");
    num.setAttribute("type", "number");
    
    if (n!==null) {
        num.setAttribute("readonly","");
        num.setAttribute("value", n);
    }
    
    let den = document.createElement("input");
    den.setAttribute("type", "number");
    
    if (d!==null) {
        den.setAttribute("readonly","");
        den.setAttribute("value", d);
    }

    if (int!==null) {
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

function generateFractions() {

    let fractions = document.getElementsByTagName("fraction");

    let id = 0;

    while (fractions.length > 0) {

        let fra = fractions[0];
        createFraction(fra, id);
        id++;

    }

}