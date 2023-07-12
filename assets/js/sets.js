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

    console.log(`Set: ${id}`);
    
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
    let rows = cols * 2;

    for (let i = 0; i < rows; i++) {
        cells.push([]);
    }

    for (let i = 0; i < cols * rows; i++) {

        cells_left.push(i);

        let cellx = (size/2) * ((i % cols) / cols + 1/(cols*2));
        let celly = size * ((Math.ceil((i + 1) / cols) - 1) / rows + 1/(rows*2));

        cells[Math.floor(i/cols)].push({x: cellx, y: celly});

    }

    let subsets = [];

    for (var i = 0; i < figures.length; i++) {

        let fig = figures[i];

        let s = fig.getAttribute('subset');
        
        subsets[s] = [];

    }

    for (var i = 0; i < figures.length; i++) {

        let fig = figures[i];

        let s = fig.getAttribute('subset');

        for (var j = 0; j < fig.getAttribute('amount'); j++) {

            subsets[s].push(fig.getAttribute('shape'));

        }

    }

    createSubsets(subsets, cells, rows);

    console.log(cells);

    for (i = 0; i < cells.length; i++) {
        for (j = 0; j < cells[i].length; j++) {

            let c = cells[i][j];

            if (c.fig == 'circle') { createCircle(svg, size/(cols*2 + 2) - 10, 1, c.x, c.y); }
            if (c.fig == 'square') { createSquare(svg, size/(cols*2 + 2) - 10, 1, c.x, c.y); }
            if (c.fig == 'triangle') { createTriangle(svg, size/(cols*2 + 2) - 10, 1, c.x, c.y); }
            if (c.fig == 'ast') { createCircle(svg, size/(cols*2 + 2) - 10, 1, c.x, c.y); }

        }
    }

    set.after(svg);
    set.remove();
    svg.parentNode.classList.add("set");
    
}

function createSubsets(subsets, cells, rows) {

    let currentRow;
    let currentCol;
    let k1 = 0, k2 = 0;

    for (var i = 0; i < subsets.length; i++) {

        if (i % 2) {

            currentRow = 0 + k1;

            currentCol = null;
            
            while (currentCol === null) {
                currentCol = getEmptyCol(cells, currentRow);
                currentRow++;
                k1++;
            }

        } else {

            currentRow = rows - 1 - k2;

            currentCol = null;
            
            while (currentCol === null) {
                currentCol = getEmptyCol(cells, currentRow);
                currentRow--;
                k2++;
            }

        }

        fillCells(cells, currentRow, currentCol, subsets[i]);

    }

}

function getEmptyCol(cells, currentRow) {

    let firstEmptyCell = null;
    
    for (let i = 0; i < cells[currentRow].length; i++) {

        if (!cells[currentRow][i].fig) {
            firstEmptyCell = i;
            break;
        }

    }

    return firstEmptyCell;

}

function fillCells(cells, startRow, startCol, figures) {

    cells[startRow][startCol].fig = figures[0];

    let i = 1;

    let currentRow = startRow;
    let currentCol = startCol;
    
    while (i < figures.length) {
        
        if (cells[currentRow][currentCol+1] !== undefined && !cells[currentRow][currentCol+1].fig) {
            cells[currentRow][currentCol+1].fig = figures[i];
            currentCol++;
            i++;
        }
        
        if (currentRow > 1 && !cells[currentRow-1][currentCol].fig) {
            cells[currentRow-1][currentCol].fig = figures[i];
            currentRow--;
            i++;
        }
        
        if (currentCol > 1 && !cells[currentRow][currentCol-1].fig) {
            cells[currentRow][currentCol-1].fig = figures[i];
            currentCol--;
            i++;
        }
        
        if (cells[currentRow+1][currentCol] !== undefined && !cells[currentRow+1][currentCol].fig) {
            cells[currentRow+1][currentCol].fig = figures[i];
            currentRow++;
            i++;
        }

    }

}