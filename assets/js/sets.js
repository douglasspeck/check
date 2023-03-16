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
            x: Math.random() * size/2 + size/4,
            y: Math.random() * size/2 + size/4
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

    for (i = 1; i < circles.length; i++) {

        let c1 = circles[0];
        let c2 = circles[i];

        let c0 = {
            x: (c1.x + c2.x)/2,
            y: (c1.y + c2.y)/2
        }

        let deg = Math.atan2((c2.y - c1.y),(c2.x - c1.x));

        let rx = dist(c1,c2) * 5 / 4;
        let ry = dist(c1,c2) * 3 / 4;

        let ellipse = document.createElementNS("http://www.w3.org/2000/svg", "ellipse");

        ellipse.setAttributeNS(null, "cx", c0.x);
        ellipse.setAttributeNS(null, "cy", c0.y);
        ellipse.setAttributeNS(null, "rx", rx);
        ellipse.setAttributeNS(null, "ry", ry);
        ellipse.setAttributeNS(null, "ry", ry);
        ellipse.setAttributeNS(null, "transform", `rotate(${deg / Math.PI * 180} ${c0.x} ${c0.y})`);
    
        svg.appendChild(ellipse);

    }

    /*

    let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

    let d = `M ${ (circles[0].x - circles[1].x) / 2 } ${ (circles[0].y - circles[1].y) / 2 }`;

    for (i = 2; i < circles.length; i++) {

        let c1 = circles[0];
        let c2 = circles[i];

        let c0 = {
            x: (c1.x + c2.x)/2,
            y: (c1.y + c2.y)/2
        }

        let deg = Math.atan2((c2.y - c1.y),(c2.x - c1.x)) / Math.PI * 180;

        let rx = dist(c1,c2) * 5 / 4;
        let ry = dist(c1,c2) * 3 / 4;

        d = d + ` A ${rx} ${ry} ${deg} 1 0 `;

        ellipse.setAttributeNS(null, "cx", c0.x);
        ellipse.setAttributeNS(null, "cy", c0.y);
        ellipse.setAttributeNS(null, "rx", rx);
        ellipse.setAttributeNS(null, "ry", ry);
        ellipse.setAttributeNS(null, "ry", ry);
        ellipse.setAttributeNS(null, "transform", `rotate(${deg / Math.PI * 180} ${c0.x} ${c0.y})`);
    
        path.setAttributeNS(null, "d", d);
        
    }

    svg.appendChild(path);

    */

    set.after(svg);
    set.remove();
    
}