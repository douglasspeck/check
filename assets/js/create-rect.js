function createRect(el, size, sec, square) {

    let f = factors(sec * 1);
    
    let W = f.length % 2 == 0 ? f[f.length / 2] : f[Math.floor(f.length / 2)];
    let H = f.length % 2 == 0 ? f[f.length / 2 - 1] : W;

    let w = size / W;
    let h = H == 1 || square ? size / H : size / W;
    let o = H == 1 || square ? 0 : size * (1 - H / W) / 2;

    for (let i = 0; i < sec; i++) {

        let path = document.createElementNS("http://www.w3.org/2000/svg", "path");

        let x = (i % W) * w;
        let y = Math.floor(i / W) * h;

        let d = `M ${x} ${y + o} L ${x + w} ${y + o} L ${x + w} ${y + o + h} L ${x} ${y + o + h} Z`;
        
        path.setAttributeNS(null, "d", d);
    
        el.appendChild(path);

    }

}