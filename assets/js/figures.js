function createCircle(el, size, slices) {
// Source: https://codepen.io/hari_shanx/pen/NRyPBz

    cx = size / 2;
    cy = size / 2;
    r = size / 2 * 0.98;
    slices = slices * 1;

    for (let i = 0; i < slices; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let fromAngle = i * 360 / slices;
        let toAngle = (i + 1) * 360 / slices;
        
        let fromCoordX = cx + (r * Math.cos(fromAngle * Math.PI / 180));
        let fromCoordY = cy + (r * Math.sin(fromAngle * Math.PI / 180));

        let toCoordX = cx + (r * Math.cos(toAngle * Math.PI / 180));
        let toCoordY = cy + (r * Math.sin(toAngle * Math.PI / 180));

        let d = 'M ' + cx + ' ' + cy + ' L ' + fromCoordX + ' ' + fromCoordY + ' A ' + r + ' ' + r + ' 0 0 1 ' + toCoordX + ' ' + toCoordY + ' Z';

        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }
}

function createRect(el, size, sec, square) {

    let f = factors(sec * 1);
    
    let W = f.length % 2 == 0 ? f[f.length / 2] : f[Math.floor(f.length / 2)];
    let H = f.length % 2 == 0 ? f[f.length / 2 - 1] : W;

    let w = size / W;
    let h = H == 1 || square ? size / H : size / W;
    let o = H == 1 || square ? 0 : size * (1 - H / W) / 2;

    for (let i = 0; i < sec; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let x = (i % W) * w;
        let y = Math.floor(i / W) * h;

        let d = `M ${x} ${y + o} L ${x + w} ${y + o} L ${x + w} ${y + o + h} L ${x} ${y + o + h} Z`;
        
        path.setAttributeNS(null, "d", d);
    
        el.appendChild(path);

    }

}

function createTriangle(el, size, sec) {

    let cx = size / 2;
    let h = cx * Math.sqrt(3);
    let o = (size - h) / 2;
    let cy = h * 2 / 3 + o;

    let x1, y1, x2, y2;

    if (sec == 3) {

        x1 = 0;
        y1 = size - o;
        x2 = size;
        y2 = y1;

    }

    if (sec == 6) {

        x1 = 0;
        y1 = size - o;
        x2 = size / 2;
        y2 = y1;

    }

    for (let i = 0; i < sec; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        deg = sec == 2 ? 0 : 360 / sec * i * -1;
        
        if (sec % 2 == 0 && i % 2 == 1) {
            deg = deg + 360 / sec;
        }

        let d = `M ${cx} ${cy} L ${x1} ${y1} L ${x2} ${y2} Z`;

        let transform = `rotate(${deg},${cx},${cy})`;

        transform = i % 2 == 0 ? transform : transform + " scale(-1,1) translate(-100,0)";

        path.setAttributeNS(null, "transform", transform);
        
        path.setAttributeNS(null, "d", d);
    
        el.appendChild(path);

    }

}

function createSquare(el, size, sec) {

    for (let i = 1; i <= sec; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let d = "";
        let l = size / 2;
        let parity = i % 2 == 0 ? true : false;
        let deg = 0;

        if (sec == 8) {

            d = parity ? `M 0 0 L ${l} 0 L ${l} ${l} Z` : `M 0 0 L 0 ${l} L ${l} ${l} Z`;

            deg = ((Math.floor(i / 2)) % 4) * -90;
            
        } else if (sec == 4) {
            
            d = `M 0 0 L 0 ${l} L ${l} ${l} L ${l} 0 Z`

            deg = ((i - 1) % 4) * -90;
            
        } else if (sec == 2) {

            d = parity ? `M ${l} 0 L ${size} 0 L ${size} ${size} L ${l} ${size} Z` : `M 0 0 L ${l} 0 L ${l} ${size} L 0 ${size} Z`;

        }
        else {
            return createRect(el, size, sec, true);
        }

        path.setAttributeNS(null, "transform", `rotate(${deg},${l},${l})`);
        
        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }

}

function createFigure(fig,id,size){
    
    size = size ? size : 100;
        
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width",`${size}px`);
    svg.setAttribute("height",`${size}px`);
    svg.setAttribute("viewbox",`0 0 ${size} ${size}`);
    svg.setAttribute("version","1.1");
    svg.setAttribute("id",`figure-${id}`);

    let defs = document.createElementNS("http://www.w3.org/2000/svg","defs");
    let g = document.createElementNS("http://www.w3.org/2000/svg","g");

    if (fig.getAttribute('shape') == 'rect') {
        createRect(g, fig.getAttribute('size'), fig.getAttribute('sections'));
    }

    if (fig.getAttribute('shape') == 'square') {
        createSquare(g, fig.getAttribute('size'), fig.getAttribute('sections'));
    }

    if (fig.getAttribute('shape') == 'triangle') {
        createTriangle(g, fig.getAttribute('size'), fig.getAttribute('sections'));
    }

    if (fig.getAttribute('shape') == 'circle') {
        createCircle(g, fig.getAttribute('size'), fig.getAttribute('sections'));
    }

    if (fig.classList.contains("paint")) {
        g.setAttribute('paintable',"");
        for (let i = 0; i < g.children.length; i++) {
            g.children[i].setAttribute("onclick","paint(this);");
        };
    }

    if (fig.classList.contains("fill")) {
        let den = fig.getAttribute('den') ? fig.getAttribute('den') : fig.getAttribute('sections');
        let num = fig.getAttribute('sections') / den * fig.getAttribute('num');
        for (let i = 0; i < num; i++) {
            g.children[i].classList.add("filled");
        }
    }

    svg.appendChild(defs);
    svg.appendChild(g);
    fig.appendChild(svg);
    
}

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

function generateFigures() {

    let figures = document.getElementsByClassName("figure");

    for (let i = 0; i < figures.length; i++) {

        let fig = figures[i];

        let den = fig.getAttribute("den") ? fig.getAttribute("den") : fig.getAttribute('sections');

        let show = fig.getAttribute("show") ? fig.getAttribute("show") : "";

        createFigure(fig, i + 1);
        createFraction(fig, fig.getAttribute("num"), den, show);

        while (fig.getAttributeNames().length > 1) {
            let att = fig.getAttributeNames()[1];
            fig.removeAttribute(att);
        }

    }

}

function inputFigure() {

    let type = document.getElementById("type").value;
    let shape = document.getElementById("shape").value;
    let size = document.getElementById("size").value;
    size = size ? size : 100;
    let sections = document.getElementById("sections").value;
    let num = document.getElementById("num").value;
    let den = document.getElementById("den").value;
    let vis_num = document.getElementById("vis-num").value ? "n" : "";
    let vis_den = document.getElementById("vis-den").value ? "d" : "";

    if (sections < 1) { return newError(3); }
    if (num < 1) { return newError(4); }
    if (den < 1) { return newError(5); }
    if (sections % den > 0) { return newError(1); }
    if (num > den) { return newError(2); }

    let canvas = document.getElementById("white-canvas");

    let art = document.createElement("article");
    art.classList.add("figure");
    art.classList.add(type);
    art.setAttribute("shape", shape);
    art.setAttribute("size", size);
    art.setAttribute("sections", sections);
    art.setAttribute("num", num);
    art.setAttribute("den", den);

    canvas.appendChild(art);

    createFigure(art, 0, size);
    createFraction(art, num, den, vis_num + vis_den);

}