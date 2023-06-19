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
    
    let figures = set.getElementsByTagName("minifigure");
    
    let size = set.getAttribute('size');
    size = size ? size : 400; // default
    
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width",`${size/2}px`);
    svg.setAttribute("height",`${size}px`);
    svg.setAttribute("viewbox",`0 0 100 100`);
    svg.setAttribute("version","1.1");
    svg.setAttribute("id",`set-${id}`);

    let contour = document.createElementNS("http://www.w3.org/2000/svg", "path");

    contour.setAttribute("d", `M 0 0 L 0 ${size} L ${size/2} ${size} L ${size/2} 0 Z`);
    contour.setAttribute("fill", "none");
    contour.setAttribute("stroke", "black");
    svg.appendChild(contour);

    let cells = [];
    let cells_left = [];

    let cols = 4;

    for (let i = 0; i < cols * cols * 2; i++) {

        cells_left.push(i);

        let cellx = (size/2) * ((i % cols) / cols + 1/(cols*2));
        let celly = size * ((Math.ceil((i + 1) / cols) - 1) / (cols*2) + 1/(cols*4));

        cells.push({x: cellx, y: celly});

    }

    let subsets = [];

    for (var i = 0; i < figures.length; i++) {

        let fig = figures[i];

        let s = fig.getAttribute('subset');
        
        subsets[s] = [];

        subsets[s].push(fig);

    }

    for (var i = 0; i < subsets.length; i++) {

        let middleness = 100;

        let r = 0;

        for (var j = 0; j < middleness; j++) { r += Math.random(); }

        r /= middleness;

        let n = Math.ceil(r * cells_left.length) - 1;

        for (var j = 0; j < subsets[i].length; j++) {

            if (cells_left[n]) {
                
                cells[cells_left[n]].fig = subsets[i][j];
                cells_left.splice(n, 1);

            } else {

                k = 1;

                while (!cells_left[n-k]) { k++; }

                cells[cells_left[n]].fig = subsets[i][j-k];

            }

        }

    };

    for (j = 0; j < cells.length; j++) {

        let c = cells[j];

        if (c.fig) {

            createCircle(svg, size/(cols*2 + 2), 1, c.x, c.y);

        }

    }

    set.after(svg);
    set.remove();
    svg.parentNode.classList.add("set");
    
}