function paint(el) {

    let list = el.classList;

    if (list.contains("filled")) {

        list.remove("filled");

    } else {

        list.add("filled");

    }

}

function makePaintable() {

    let els = document.querySelectorAll('[paintable]');

    for (let i = 0; i < els.length; i++) {

        let children = els[i].children;

        for (let j = 0; j < children.length; j++) {

            children[j].setAttribute("onclick","paint(this);");

        }

    }

}