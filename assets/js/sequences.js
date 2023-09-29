function prevPage(n,s) {
    s--;
    window.location = window.location.href.split("?")[0] + '?n=' + n + '&s=' + s;
}

function nextPage(n,s) {
    s++;
    window.location = window.location.href.split("?")[0] + '?n=' + n + '&s=' + s;
}

function showSolutions() {
    var modal = document.getElementById('solutions');
    var blurBackground = document.getElementById('blur-background');
    modal.style.display = 'block';
    blurBackground.style.display = 'block';
}

function hideSolutions() {
    var modal = document.getElementById('solutions');
    var blurBackground = document.getElementById('blur-background');
    modal.style.display = 'none';
    blurBackground.style.display = 'none';
}

var blurBackground = document.getElementById('blur-background');
blurBackground.addEventListener('click', function(event) {
    if (event.target === blurBackground) {
        hideSolutions();
    }
});

function correctionSequence() {

}