function associate(el) {

    // Gets the article which the element is related to
    let id = el.id.slice(6,9);
    let val = el.id.slice(-5);
    
    // Breaks if no ID
    if (!id) {return false}

    let query = `temp-assoc-${id}`;

    // Gives the corresponding ID to the function, which
    // returns the stored corresponding value (and false if none)
    let stored = storedData(query);

    if (!stored) {

        // If no value is registered, registers the given one and breaks
        localStorage.setItem(query,val);
        console.log("The item " + val + " was registered in cell " + id + ".");
        return;

    }

    if (val.substring(0,1) == stored.substring(0,1)) {

        // If the registered value is from the same column/type as the
        // given one, overrides it with the new and breaks
        localStorage.setItem(query,val);
        console.log("The item " + val + " was registered in cell " + id + ".");
        return;

    }
    
    // Gives the corresponding ID and values to the funcion, which connects
    // the elements and clears the stored corresponding value
    connectItems(id,stored,val);
    localStorage.removeItem(query);
}

// Gets coordinates from element and returns them as attributes
function getCoords(elem) {

    let box = elem.getBoundingClientRect();
  
    return {
      top: box.top,
      right: box.right,
      bottom: box.bottom,
      left: box.left
    };

}

function connectItems(id,element1,element2) {
    
    storeResults(id,[element1,element2]);
    
    element1 = document.getElementById("assoc-" + id + "-" + element1);
    element2 = document.getElementById("assoc-" + id + "-" + element2);

    let container = element1.parentNode.parentNode;
    let cont = getCoords(container);

    // Gets the associated labels' coordinates,
    // according to the values and ID
    el1 = getCoords(element1);
    el2 = getCoords(element2);

    // Orders elements left-to-right
    let first = el1.left < el2.left ? el1 : el2;
    let second = el1.left > el2.left ? el1 : el2;

    // Sets an horizontal offset for the generated stroke (in px)
    let offset = 5;

    // Converts the coordinates to the final stroke coordinates
    let x1 = first.right + offset - cont.left;
    let x2 = second.left - offset - cont.left;
    let y1 = (first.top + first.bottom) / 2 - cont.top;    // Vertical mid-point 1
    let y2 = (second.top + second.bottom) / 2 - cont.top;  // Vertical mid-point
    let H = cont.bottom - cont.top;
    let W = cont.right - cont.left;
    // Percentual offset for the line
    let o = 0.05;

    // Creates a new <svg> element
    let svg = container.getElementsByClassName("line-container")[0];

    if (!svg) {

        svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    
        // Sets the following attributes to the new element.
        // Note that the position is absolute.
        svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
        svg.setAttribute("width", W);
        svg.setAttribute("height", H);
        svg.setAttribute("class", "line-container");
        svg.setAttribute("viewbox", `0 0 ${W} ${H}`);
        svg.setAttribute("version", "1.1");
        svg.setAttribute("style","pointer-events: none; position:absolute; left:0px; top:0px;");
        
        container.appendChild(svg);

    }

    // Creates a line path inside the <svg> element
    let line = document.createElementNS(svg.namespaceURI,'path');

    line.setAttribute("stroke-width","5");
    line.setAttribute("class","assoc-line");
    line.setAttribute("stored-id", id);
    line.setAttribute("stored-content", `${element1},${element2}`);
    line.setAttribute("onclick", "deleteElement(this);");
    line.setAttribute("pointer-events", "stroke");
    
    line.setAttribute("d",`M ${x1 * (1+o)} ${y1 * (1+o)} L ${x2 * (1-o)} ${y2 * (1-o)} Z`);

    // Appends the corresponding elements to the page
    svg.appendChild(line);

}

// Returns the stored corresponding value (and false if none)
function storedData(query) {

    let stored = localStorage.getItem(query);

    if (!stored) {return false} else {

        return stored;

    }
    
}

// Deletes the register of content associated with this element
// and the element itself
function deleteElement(el) {

    let id = el.getAttribute("stored-id");
    let content = el.getAttribute("stored-content");
    removeResults(id, content);
    
    el.remove();

}

function storeResults(id,values) {

    console.log(`The activity ${id} had the following values registered: ${values.join(", ")}`);

}

function removeResults(id,str) {

    let arr = str.split(",");
    console.log(`The activity ${id} had the following values removed: ${arr.join(", ")}`);

}

function createAssoc(el,id) {

    let first = document.createElement("section");

    console.log(el);

    first.innerHTML = el.children[0].innerHTML;
    first.classList.add("first-container");
    
    for (let i = 0; i < first.children.length; i++) {
        first.children[i].setAttribute("onclick", "associate(this);");
        first.children[i].setAttribute("id", "assoc-" + id + "-1-" + idThat(i+1));
    }
    
    let second = document.createElement("section");
    second.innerHTML = el.children[1].innerHTML;
    second.classList.add("second-container");
    
    for (let i = 0; i < second.children.length; i++) {
        second.children[i].setAttribute("onclick", "associate(this);");
        second.children[i].setAttribute("id", "assoc-" + id + "-2-" + idThat(i+1));
    }

    let art = document.createElement("article");
    art.appendChild(first);
    art.appendChild(second);
    art.classList.add("activity");
    art.classList.add("associate");

    el.parentNode.parentNode.insertBefore(art,el.parentNode);
    el.parentNode.remove();

}

function generateAssoc() {

    let associate = document.getElementsByTagName("associate");

    let id = 1;

    while (associate.length > 0) {

        id = idThat(id);

        let assoc = associate[0];
        createAssoc(assoc, id);
        
        id = parseInt(id) + 1;

    }

}