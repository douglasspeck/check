function createCircle(el, size, slices, cx = size / 2, cy = size / 2) {
// Source: https://codepen.io/hari_shanx/pen/NRyPBz

    r = size / 2 * 0.98;
    slices = slices * 1;

    if (slices == 1) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let fromX = cx - r;

        let toX = cx + r;

        let d = 'M ' + fromX + ' ' + cy +' A ' + r + ' ' + r + ' 0 1 0 ' + toX + ' ' + cy + ' A ' + r + ' ' + r + ' 0 1 0 ' + fromX + ' ' + cy;

        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }

    else if (slices > 1) for (let i = 0; i < slices; i++) {

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

    else newError(3);
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
    
    if (sec % 3 == 0) {
        
        x1 = 0;
        y1 = size - o;
        x2 = size;
        y2 = y1;
        
    }
    
    else if (sec % 2 == 0) {

        cx = size / 2;
        cy = o;
        x1 = size / 4 * (sec / 2 - 1);
        y1 = 2 * h / sec + o;
        x2 = size / 2 + size / 4 * (sec / 2 - 1);
        y2 = y1;

    }

    if (sec == 6) {
        x2 = size / 2;
    }

    for (let i = 0; i < sec; i++) {

        let d, transform = '';

        if (sec % 3 == 0) {

            deg = 720 / sec * i * -1;
    
            d = `M ${cx} ${cy} L ${x1} ${y1} L ${x2} ${y2} Z`;
    
            transform = `rotate(${deg},${cx},${cy})`;
    
            transform = i % 2 == 0 ? transform : transform + " scale(-1,1) translate(-100,0)";
            
        }

        else if (sec == 2) {
    
            d = `M ${cx} ${cy} L ${x1} ${y1} L ${x2} ${y2} Z`;
    
            transform = i % 2 == 0 ? transform : transform + "scale(-1,1) translate(-100,0)";
            
        }

        else if (sec == 4) {
    
            d = `M ${cx} ${cy} L ${x1} ${y1} L ${x2} ${y2} Z`;
    
            transform = i == 0 ? transform : transform + `scale(1,-1) translate(0,-100)`;

            transform = (i+1) % 2 == 1 ? transform : transform + `rotate(${(2 - i) * 60},${cx},${cy})`;
            
        }

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

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

function createFigure(fig, id){
    
    let paint = fig.getAttribute('paint');
    
    let fill = fig.getAttribute('fill');
    
    let shape = fig.getAttribute('shape');

    let size = fig.getAttribute('size');
    size = size ? size : 100; // default

    let sections = fig.getAttribute('sections');
    
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width",`${size}px`);
    svg.setAttribute("height",`${size}px`);
    svg.setAttribute("viewbox",`0 0 ${size} ${size}`);
    svg.setAttribute("version","1.1");
    svg.setAttribute("id",`figure-${id}`);

    if (shape == 'rect') {
        createRect(svg, size, sections);
    }

    if (shape == 'square') {
        createSquare(svg, size, sections);
    }

    if (shape == 'triangle') {
        createTriangle(svg, size, sections);
    }

    if (shape == 'circle') {
        createCircle(svg, size, sections);
    }

    if (paint!==null) {
        svg.classList.add("clickable");
        for (let i = 0; i < svg.children.length; i++) {
            svg.children[i].setAttribute("onclick","paint(this);");
        };
    }

    if (fill) {
        for (let i = 0; i < fill; i++) {
            svg.children[i].classList.add("filled");
        }
    }

    fig.after(svg);
    fig.remove();
    
}

function generateFigures() {

    let figures = document.getElementsByTagName("figure");

    let id = 0;

    while (figures.length > 0) {

        let fig = figures[0];
        createFigure(fig, id);
        id++;

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

/*
let den = fig.getAttribute("den") ? fig.getAttribute("den") : fig.getAttribute('sections');

let show = fig.getAttribute("show") ? fig.getAttribute("show") : "";

createFraction(fig, fig.getAttribute("num"), den, show); */