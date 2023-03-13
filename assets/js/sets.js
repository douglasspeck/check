function generateSets() {

    let sets = document.getElementsByTagName("set");

    let id = 0;

    while (sets.length > 0) {

        let set = sets[0];
        createSet(set, id);
        id++;

    }

}

function dist(a,b) {

    return Math.sqrt(Math.pow(a.x - b.x, 2) + Math.pow(a.y - b.y, 2));

}

function createSet(set, id){
    
    let figures = JSON.parse(set.getAttribute('figures'));

    console.log(figures);
    
    let size = set.getAttribute('size');
    size = size ? size : 100; // default
    
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width",`${size}px`);
    svg.setAttribute("height",`${size}px`);
    svg.setAttribute("viewbox",`0 0 ${size} ${size}`);
    svg.setAttribute("version","1.1");
    svg.setAttribute("id",`set-${id}`);

    let center = {x: size/2, y: size/2};
    
    let circles = [];

    while (circles.length < figures.circles) {

        let c = {
            x: Math.random() * 50 + 25,
            y: Math.random() * 50 + 25
        }

        let overlapping = false;

        for (i = 0; i < circles.length; i++) {

            let c0 = circles[i];

            overlapping = dist(c,c0) < size/5 ? true : overlapping;

        }

        if (!overlapping) {
            
            c.deg = Math.atan2(c.y - center.y, c.x - center.x);
            circles.push(c)
        
        }

    }

    circles.sort((a,b) => a.deg - b.deg);

    for (i = 0; i < circles.length; i++) {

        let c = circles[i];
        createCircle(svg, size/10, 1, c.x, c.y);

    }

    let contour = [];

    for (i = 0; i < circles.length; i++) {

        let c = circles[i];

        let n = {
            x: c.x > center.x ? (size + c.x) * 0.5 : c.x * 0.5,
            y: c.y > center.y ? (size + c.y) * 0.5 : c.y * 0.5
        }

        n.deg = Math.atan2(n.y - center.y, n.x - center.x);

        contour.push(n);

    }

    contour.sort((a,b) => a.deg - b.deg);

    for (i = 0; i < contour.length; i++) {

        let c = contour[i];
        createCircle(svg, size/20, 1, c.x, c.y);

    }

    let path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    
    contour[contour.length] = contour[0];
    
    let d = `M ${contour[0].x} ${contour[0].y}`;
    
    for (i = 0; i < contour.length-1; i++) {
        
        let c1 = contour[i];
        let c2 = contour[i+1];
        
        let c = {
            x: (c1.x + c2.x)/2 > center.x ? (size * 0.9 + (c1.x + c2.x)/2) * 0.5 : (size * 0.1 + (c1.x + c2.x)/2) * 0.5,
            y: (c1.y + c2.y)/2 > center.y ? (size * 0.9 + (c1.y + c2.y)/2) * 0.5 : (size * 0.1 + (c1.y + c2.y)/2) * 0.5
        };
        
        d = `${d} Q ${c.x} ${c.y} ${c2.x} ${c2.y}`;
        
    }

    d = d + ' Z';

    path.setAttributeNS(null, "d", d);

    svg.appendChild(path);

    set.after(svg);
    set.remove();
    
}