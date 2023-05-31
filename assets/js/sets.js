function generateSets() {

    let sets = document.getElementsByTagName("set");

    let id = 0;

    while (sets.length > 0) {

        let set = sets[0];
        createSet(set, id);
        id++;

    }

}

function createSet(set, id){
    
    let figures = set.getElementsByTagName("figures");
    
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

            overlapping = dist(c,c0) < size/9 ? true : overlapping;

        }

        if (!overlapping) {
            
            c.deg = Math.atan2(c.y - center.y, c.x - center.x);
            circles.push(c)
        
        }

    }

    // Calculate the convex hull of the circles using Graham's scan algorithm
    let hull = [];
    let top = 0;

    // Find the point with the lowest y-coordinate (ties broken by lowest x-coordinate)
    for (let i = 0; i < circles.length; i++) {
        if (circles[i].y < circles[top].y || (circles[i].y === circles[top].y && circles[i].x < circles[top].x)) {
            top = i;
        }
    }

    hull.push({x: circles[top].x, y: circles[top].y});

    // Sort the points by polar angle around the lowest point
    circles.sort((a, b) => Math.atan2(a.y - circles[top].y, a.x - circles[top].x) - Math.atan2(b.y - circles[top].y, b.x - circles[top].x));

    function cross(a, b, c) {
        return (b.x - a.x) * (c.y - a.y) - (b.y - a.y) * (c.x - a.x);
    }

    for (let i = 0; i < circles.length; i++) {
        // Remove any points that would make the hull concave
        while (hull.length > 1 && cross(hull[hull.length - 2], hull[hull.length - 1], circles[i]) <= 0) {
            hull.pop();
        }
        hull.push({x: circles[i].x, y: circles[i].y});
    }

    // Calculate the centroid of the hull
    let centroid = { x: 0, y: 0 };
    for (let i = 0; i < hull.length; i++) {
        centroid.x += hull[i].x;
        centroid.y += hull[i].y;
    }
    centroid.x /= hull.length;
    centroid.y /= hull.length;

    // Pad each point in the hull
    for (let i = 0; i < hull.length; i++) {
        let point = hull[i];
        let dx = point.x - centroid.x;
        let dy = point.y - centroid.y;
        let length = Math.sqrt(dx * dx + dy * dy);
        let nx = dx / length;
        let ny = dy / length;
        let padding = size / 5;
        point.x += nx * padding;
        point.y += ny * padding;
    }

    // Draw the convex hull
    let path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    d = `M ${hull[0].x} ${hull[0].y} Q ${(hull[0].x + hull[1].x) / 2} ${(hull[0].y + hull[1].y) / 2} ${hull[1].x} ${hull[1].y} `;
    
    for (let i = 2; i <= hull.length; i++) {
        let segmentLength = Math.sqrt((hull[i-1].x - hull[i % hull.length].x) ** 2 + (hull[i-1].y - hull[i % hull.length].y) ** 2);
        let numControlPoints = 10;
    
        for (let j = 1; j <= numControlPoints; j++) {
            let controlPoint = {x: hull[i-1].x + j * (hull[i % hull.length].x - hull[i-1].x) / (numControlPoints + 1), 
                                y: hull[i-1].y + j * (hull[i % hull.length].y - hull[i-1].y) / (numControlPoints + 1)};
            let dx = controlPoint.x - centroid.x;
            let dy = controlPoint.y - centroid.y;
            let rand = Math.random() - 0.3;
            let length = Math.sqrt(dx * dx + dy * dy);
            let nx = dx / length * rand;
            let ny = dy / length * rand;
            let padding = segmentLength / numControlPoints;
            controlPoint.x += nx * padding;
            controlPoint.y += ny * padding;
            d += `L ${controlPoint.x} ${controlPoint.y} `;
        }
    
        d += `L ${hull[i % hull.length].x} ${hull[i % hull.length].y} `;
    }    
    d += "Z";
    path.setAttribute("d", d);
    path.setAttribute("fill", "none");
    path.setAttribute("stroke", "black");
    svg.appendChild(path);


    circles.sort((a,b) => a.deg - b.deg);

    for (i = 0; i < circles.length; i++) {

        let c = circles[i];
        createCircle(svg, size/10, 1, c.x, c.y);

    }

    set.after(svg);
    set.remove();
    
}