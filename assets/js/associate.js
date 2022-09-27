function associate(el) {

    // Gets the article which the element is related to
    let id = el.id.slice(6,9);
    let val = el.id.slice(-4);
    
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

    if (val.substring(0,3) == stored.substring(0,3)) {

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
      top: box.top + window.pageYOffset,
      right: box.right + window.pageXOffset,
      bottom: box.bottom + window.pageYOffset,
      left: box.left + window.pageXOffset
    };

}

function connectItems(id,element1,element2) {

    storeResults(id,[element1,element2]);

    // Gets the associated labels' coordinates,
    // according to the values and ID
    el1 = getCoords(document.getElementById(`assoc-${id}-${element1}`).firstElementChild);
    el2 = getCoords(document.getElementById(`assoc-${id}-${element2}`).firstElementChild);

    // Orders elements left-to-right
    let first = el1.left < el2.left ? el1 : el2;
    let second = el1.left > el2.left ? el1 : el2;

    // Sets an horizontal offset for the generated stroke (in px)
    let offset = 5;

    // Converts the coordinates to the final stroke coordinates;
    let x1 = first.right + offset;
    let x2 = second.left - offset;
    let y1 = (first.top + first.bottom) / 2;    // Vertical mid-point 1
    let y2 = (second.top + second.bottom) / 2;  // Vertical mid-point
    let h = Math.abs(y2 - y1);
    let w = x2 - x1;

    // Creates a new <svg> element
    let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");

    // Sets the following attributes to the new element.
    // Note that the position is absolute.
    svg.setAttribute("xmlns","http://www.w3.org/2000/svg");
    svg.setAttribute("width", w);
    svg.setAttribute("height", h);
    svg.setAttribute("height", h);
    svg.setAttribute("viewbox", `0 0 ${w} ${h}`);
    svg.setAttribute("version", "1.1");
    svg.setAttribute("onclick", "deleteElement(this);");
    svg.setAttribute("stored-id", id);
    svg.setAttribute("stored-content", `${element1},${element2}`);
    svg.setAttribute("style",`position:absolute;left:${x1};top:${Math.min(y1, y2)};`);

    // Creates a line path inside the <svg> element
    let line = document.createElementNS(svg.namespaceURI,'path');

    line.setAttribute("stroke-width","5");
    line.setAttribute("class","assoc-line");
    
    if (y2 > y1) { line.setAttribute("d",`M 0 0 L ${w} ${h} Z`); }
    else { line.setAttribute("d",`M 0 ${h} L ${w} 0 Z`); }

    // Appends the corresponding elements to the page
    svg.appendChild(line);

    document.body.appendChild(svg);

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