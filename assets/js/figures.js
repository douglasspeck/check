/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        createFigure
 * @param           {Object}    fig      The pseudo element to get the figure from
 * @param           {Number}    id      The id of the figure created
 * @description     Creates a blank figure based on a pseudo element and calls the corresponding function
 * 
 * @function        generateFigures
 * @description     Iterates through all the figure pseudo elements to execute the given function
 * 
 */

function createFigure(fig, id){
    
    // Gets the attributes from the pseudo element

    let paint = fig.getAttribute('paint');
    
    let fill = fig.getAttribute('fill');
    
    let shape = fig.getAttribute('shape');

    let size = fig.getAttribute('size');
    size = size ? size : 100; // default

    let sections = fig.getAttribute('sections');

    // Creates an svg element
    
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width",`${size}px`);
    svg.setAttribute("height",`${size}px`);
    svg.setAttribute("viewbox",`0 0 ${size} ${size}`);
    svg.setAttribute("version","1.1");
    svg.setAttribute("id",`figure-${id}`);

    svg.classList.add("figure");

    // Calls the corresponding function for each shape

    switch(shape) {
        case 'rect':
            createRect(svg, size, sections);
            break;
        case 'square':
            createSquare(svg, size, sections);
            break;
        case 'triangle':
            createTriangle(svg, size, sections);
            break;
        case 'circle':
            createCircle(svg, size, sections);
            break;
    }

    // If there is a 'paint' attribute, adds the class "clickable" 

    if (paint!==null) {
        svg.classList.add("clickable");
        for (let i = 0; i < svg.children.length; i++) {
            svg.children[i].setAttribute("onclick","paint(this);");
        };
    }

    // If there is a 'fill' attribute, adds the class "filled" 

    if (fill) {
        for (let i = 0; i < fill; i++) {
            svg.children[i].classList.add("filled");
        }
    }

    fig.after(svg);
    fig.remove();
    
}

function generateFigures() {

    if (window.location.pathname !== '/sequencias.php') {return;}

    let figures = document.getElementsByTagName("figure");

    let id = 0;

    while (figures.length > 0) {

        let fig = figures[0];
        createFigure(fig, id);
        id++;

    }

}