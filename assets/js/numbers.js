function createFraction(fig,n,d,show){

    let frac = document.createElement("div");
    frac.classList.add("fraction");
    
    let num = document.createElement("input");
    num.setAttribute("type", "number");
    
    let den = document.createElement("input");
    den.setAttribute("type", "number");
    
    if (n && show.includes("n")) {
        num.setAttribute("readonly","");
        num.setAttribute("value", n);
    }
    
    if (d && show.includes("d")) {
        den.setAttribute("readonly","");
        den.setAttribute("value", d);
    }

    if (fig.classList.contains("paint")) {
        num.setAttribute("readonly","");
        num.setAttribute("value", n);
        den.setAttribute("readonly","");
        den.setAttribute("value", d);
    }

    frac.appendChild(num);
    frac.appendChild(den);

    fig.appendChild(frac);

}