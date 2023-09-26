/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        createCircle
 * @param           {Object}    el      The element to create the circle into
 * @param           {Number}    size    The size of the element in px
 * @param           {Number}    slices  The number of sections to divide the circle
 * @description     Plots a circle within the given path element, divided in slices
 * 
 */

// Source: https://codepen.io/hari_shanx/pen/NRyPBz

function createCircle(el, size, slices, cx = size / 2, cy = size / 2) {

    // Circle radius and number of slices
    r = size / 2 * 0.98;
    slices = slices * 1;

    // If only one slice, then plots a circle
    if (slices == 1) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let fromX = cx - r;

        let toX = cx + r;

        let d = 'M ' + fromX + ' ' + cy +' A ' + r + ' ' + r + ' 0 1 0 ' + toX + ' ' + cy + ' A ' + r + ' ' + r + ' 0 1 0 ' + fromX + ' ' + cy;

        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }

    // Else, plots a circle divided by slices
    else if (slices > 1) for (let i = 0; i < slices; i++) {

        // Creates the path element
        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        // Divides the circle into sections
        let fromAngle = i * 360 / slices;
        let toAngle = (i + 1) * 360 / slices;
        
        // Calculates the initial position
        let fromCoordX = cx + (r * Math.cos(fromAngle * Math.PI / 180));
        let fromCoordY = cy + (r * Math.sin(fromAngle * Math.PI / 180));

        // Calculates the final position
        let toCoordX = cx + (r * Math.cos(toAngle * Math.PI / 180));
        let toCoordY = cy + (r * Math.sin(toAngle * Math.PI / 180));

        // Plots the coordinates
        let d = 'M ' + cx + ' ' + cy + ' L ' + fromCoordX + ' ' + fromCoordY + ' A ' + r + ' ' + r + ' 0 0 1 ' + toCoordX + ' ' + toCoordY + ' Z';

        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }

    // Fallback for invalid amount of slices
    else newError(3);
    
}