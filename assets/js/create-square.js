function createSquare(el, size, sec) {

    for (let i = 1; i <= sec; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let d = "";
        let l = size / 2;
        let parity = i % 2 == 0 ? true : false;
        let deg = 0;

        if (sec == 8) {

            d = parity ? `M 0 0 L ${l} 0 L ${l} ${l} Z` : `M 0 0 L 0 ${l} L ${l} ${l} Z`;

            deg = ((Math.floor(i / 2)) % 4) * -90;
            
        } else if (sec == 4) {
            
            d = `M 0 0 L 0 ${l} L ${l} ${l} L ${l} 0 Z`

            deg = ((i - 1) % 4) * -90;
            
        } else if (sec == 2) {

            d = parity ? `M ${l} 0 L ${size} 0 L ${size} ${size} L ${l} ${size} Z` : `M 0 0 L ${l} 0 L ${l} ${size} L 0 ${size} Z`;

        }
        else {
            return createRect(el, size, sec, true);
        }

        path.setAttributeNS(null, "transform", `rotate(${deg},${l},${l})`);
        
        path.setAttributeNS(null, "d", d);

        el.appendChild(path);

    }

}