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