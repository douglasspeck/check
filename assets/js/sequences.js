function prevPage(n,s) {
    s--;
    window.location = window.location.href.split("?")[0] + '?n=' + n + '&s=' + s;
}

function nextPage(n,s) {
    s++;
    window.location = window.location.href.split("?")[0] + '?n=' + n + '&s=' + s;
}