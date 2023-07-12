/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        paint
 * @description     Checks whether the specified element is filled and toggles its state accordingly
 * @param           {Element}   el      The element to paint
 * 
 * @function        makePaintable
 * @description     Apply the paint() function to every element
 * 
 */

function paint(el) {

    let list = el.classList;
    let painted = false;

    if (list.contains("filled")) {

        list.remove("filled");

    } else {

        list.add("filled");
        painted = true;

    }

    register({
        "input": el.parentElement.id,
        "type": "paint",
        "value": [Array.prototype.slice.call(el.parentElement.children).indexOf(el), painted],
        "timestamp": Date.now()
    });

}

function makePaintable() {

    let els = document.querySelectorAll('[paint]');

    els.classList.add("clickable");

    for (let i = 0; i < els.length; i++) {

        let children = els[i].children;

        children[i].setAttribute("onclick","paint(this);");

    }

}