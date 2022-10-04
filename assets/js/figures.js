// Source: https://codepen.io/hari_shanx/pen/NRyPBz

function createCircle(el, cx, cy, r, slices) {

    cx = cx * 1;
    cy = cy * 1;
    r = r * 1;
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

        console.log(d);

        el.appendChild(path);

    }
}

function generateCircles() {

    let els = document.getElementsByClassName("newCircle");

    for(let i = 0; i < els.length; i++){

        let el = els[i];
        
        createCircle(el, el.getAttribute('cx'), el.getAttribute('cy'), el.getAttribute('r'), el.getAttribute('slices'));

    }

}