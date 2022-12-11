/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        paint
 * @param           {Element}   el      The element to paint
 * 
 * @function        makePaintable
 * @description     Apply the paint(this) function to every element
 * 
 */

function paint(el) {

    let list = el.classList;

    if (list.contains("filled")) {

        list.remove("filled");

    } else {

        list.add("filled");

    }

}

function makePaintable() {

    let els = document.querySelectorAll('[paint]');

    for (let i = 0; i < els.length; i++) {

        let children = els[i].children;

        children[i].setAttribute("onclick","paint(this);");

    }

}