<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $title = 'Trilha XXXXXX de Frações';
        $keywords = 'CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include '../assets/php/head.php';
    ?>
    <body>
        <main>

            <section id="white-canvas" class="gallery">
                <article class="activity">
                    <set>
                        <minifigure shape="square" amount=4 subset=0></minifigure>
                        <minifigure shape="circle" amount=3 subset=0></minifigure>
                        <minifigure shape="circle" amount=5 subset=1></minifigure>
                        <minifigure shape="triangle" amount=2 subset=1></minifigure>
                        <gap subset=0 value=1></gap>
                        <gap subset=1 value=3></gap>
                    </set>
                </article>
            </section>
            
        </main>

        <script src="../assets/js/math.js"></script>
        <script src="../assets/js/create-rect.js"></script>
        <script src="../assets/js/create-circle.js"></script>
        <script src="../assets/js/create-square.js"></script>
        <script src="../assets/js/create-triangle.js"></script>
        <script>
                let cols = 4;
                let rows = cols;
                const MIDDLENESS = 100;

                function generateSets() {

                    let sets = document.getElementsByTagName("set");

                    let id = 0;

                    while (sets.length > 0) {

                        let set = sets[0];
                        createSet(set, id);
                        id++;

                        console.log("Set created");

                    }

                }

                generateSets();

                function createSet(set, id){
                    
                    let size = set.getAttribute('size');
                    size = size ? size : 400; // default
                    
                    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
                    svg.setAttribute("width",`${size}px`);
                    svg.setAttribute("height",`${size}px`);
                    svg.setAttribute("viewbox",`0 0 100 100`);
                    svg.setAttribute("version","1.1");
                    svg.setAttribute("id",`set-${id}`);

                    let contour = document.createElementNS("http://www.w3.org/2000/svg", "path");

                    contour.setAttribute("d", `M 0 0 L 0 ${size} L ${size} ${size} L ${size} 0 Z`);
                    contour.setAttribute("fill", "none");
                    contour.setAttribute("stroke", "black");
                    svg.appendChild(contour);
    
                    let figures = set.getElementsByTagName("minifigure");
                    let subsets = [];

                    for (var i = 0; i < figures.length; i++) {

                        let fig = figures[i];

                        let s = fig.getAttribute('subset');
                        
                        subsets[s] ??= [];

                        subsets[s].push(fig);

                    }

                    let cells = [...Array(rows)].map(e => Array(cols));

                    for (let i = 0; i < cells.length; i++) {
                        for (let j = 0; j < cells[i].length; j++) {
                            cellx = ((j % cols) + 0.5) * (size/2) / cols;
                            celly = ((i % rows) + 0.5) * size / rows;
                            cells[i][j] = {}
                        }
                    }

                    cells = createSubsets(subsets, cells);

                    rows = cells.length;
                    cols = cells[0].length;

                    for (i = 0; i < rows; i++) {
                        for (j = 0; j < cols; j++) {

                            cells[i][j].x = ((j % cols) + 0.5) * (size) / cols;
                            cells[i][j].y = ((i % rows) + 0.5) * size / rows;

                            let c = cells[i][j];

                            if (c.fig == "circle") {
                                createCircle(svg, size/(cols*2 + 2), 1, c.x, c.y);
                            }

                            if (c.fig == "square") {
                                createSquare(svg, size/(cols*2 + 2), 1, (c.x - size/(cols*2 + 2)/2), (c.y - size/(cols*2 + 2)/2));
                            }

                            if (c.fig == "triangle") {
                                createTriangle(svg, size/(cols*2 + 2), 1, (c.x - size/(cols*2 + 2)/2), (c.y - size/(cols*2 + 2)/2));
                            }

                        }
                    }

                    cells = cropMatrix(cells);

                    set.after(svg);
                    set.remove();
                    svg.parentNode.classList.add("set");
                    
                }

                function createSubsets(subsets, cells) {

                    let figures = [];

                    for (let i = 0; i < subsets.length; i++) {

                        figures[i] = [];

                        for (let j = 0; j < subsets[i].length; j++) {

                            let amount = subsets[i][j].getAttribute('amount');

                            for (let k = 0; k < amount; k++) {

                                figures[i].push(subsets[i][j].getAttribute('shape'));

                            }

                        }

                    }

                    cells = populate(cells, figures);

                    return cells;

                }

                function populate(cells, figures) {

                    let start_row = 0;
                    let start_col = 0;
                    let current_row = 0;
                    let current_col = 0;

                    for (i = 0; i < figures.length; i++) {

                        start_row = i % 2 ? firstRow(cells) : firstRow(cells, true);
                        start_col = i % 2 ? firstCol(cells, start_row, true) : firstCol(cells, start_row);

                        if (start_row == -1) {
                            start_row = cells.length;
                            cells = newRow(cells);
                        }

                        if (start_col == -1) {
                            start_col = cells[0].length;
                            cells = newCol(cells);
                        }

                        current_row = start_row;
                        current_col = start_col;

                        for (j = 0; j < figures[i].length; j++) {

                            if (cells[current_row][current_col].fig === undefined) {
                                cells[current_row][current_col].fig = figures[i][j];
                            } else {
                                j--;
                            }

                            if (current_col < cells[current_row].length - 1 && cells[current_row][current_col + 1].fig === undefined) {
                                console.log("Right!");
                                current_col++;
                            } else if (current_col > 0 && cells[current_row][current_col - 1].fig === undefined) {
                                current_col--;
                                console.log("Left!");
                            } else if (current_row > 0 && cells[current_row - 1][current_col].fig === undefined) {
                                current_row--;
                                console.log("Up!");
                            } else if (current_row < cells.length - 1 && cells[current_row + 1][current_col].fig === undefined) {
                                current_row++;
                                console.log("Down!");
                            } else if (j % 2) {
                                cells = newCol(cells, current_col);
                            } else {
                                cells = newRow(cells, current_row);
                            }

                            console.log(`A new cell has been filled in [${current_row}][${current_col}].`)

                        }

                    }

                    return cells;

                }

                function cropMatrix(cells) {

                    let cols = [];

                    for (let i = 0; i < cells.length; i++) {

                        if (cells[i].every(e => e.fig === undefined)) {
                            cells = cells.slice(0,i).concat(cells.slice(-i));
                        }

                        for (let j = 0; j < cells[i].length; j++) {

                            cols[j] += cells[i][j];

                        }

                    }

                    for (let i = 0; i < cols.length; i++) {

                        if (!cols[i]) {

                            for (let j = 0; j < cells.length; j++) {
                                
                                cells[j] = cells[j].slice(0, i).concat(cells[j].slice(-i));

                            }

                        }

                    }

                    return cells;

                }

                function newRow(matrix, after = matrix.length) {

                    let row = [...Array(matrix[0].length)].map(e => e = {});

                    matrix = matrix.slice(0,after).concat([row]).concat(matrix.slice(after));

                    console.log("A new row was added.");

                    return matrix;

                }

                function newCol(matrix, after = matrix[0].length) {

                    for (let i = 0; i < matrix.length; i++) {

                        matrix[i] = matrix[i].slice(0,after).concat({}).concat(matrix[i].slice(after));

                    }

                    console.log("A new column was added.");

                    return matrix;

                }

                function firstRow(cells, backwards = false) {

                    let row = -1;

                    if (backwards) {
                        for (let i = cells.length - 1; i >= 0; i--) {
                            if (!cells[i].every(e => e.fig != null)) {
                                row = i;
                                break;
                            }
                        }
                    } else {
                        for (let i = 0; i < cells.length; i++) {
                            if (!cells[i].every(e => e.fig != null)) {
                                row = i;
                                break;
                            }
                        }
                    }

                    return row;

                }

                function firstCol(cells, row, backwards = false) {

                    let col = -1;

                    if (backwards) {
                        for (let i = cells[row].length - 1; i >= 0; i--) {
                            if (!cells[row][i].fig != null) {
                                col = i;
                                break;
                            }
                        }
                    } else {
                        for (let i = 0; i < cells[row].length; i++) {
                            if (!cells[row][i].fig != null) {
                                col = i;
                                break;
                            }
                        }
                    }

                    return col;

                }

            </script>

    </body>
</html>