/**
 * Toggle the visibility of the menu and animates its icon.
 * 
 * @access      public
 * @author      Douglas Speck
 * @since       0.1.0
 * 
 */

function toggleMenu() {

    // Get the elements within the DOM
    const menu = document.getElementById('menu');
    const svg = document.getElementById('menu-tag').children[0].children[0].children;
    
    const tps = 30;             // 30 ticks per second
    const tick = 1000 / tps;    // 1 tick = 1000/tps (ms)
    const ticks = 18;           // Number of ticks in this animation
    const deg = 45;             // Angle of rotation

    // Check if the menu is opened
    var isOpened = menu.getAttribute('class') == 'open' ? true : false;

    // If the menu is opened, close it
    if (isOpened) {
        menu.removeAttribute('class');
        for (let i = 1; i <= ticks; i++) {
            setTimeout(function () {
                svg[0].setAttribute('transform', `rotate(${deg - deg * i / ticks},0,30)`);
                svg[1].setAttribute('transform', `translate(${50 - 50 * i / ticks}, 0) scale(${1 * i / ticks},1)`);
                svg[2].setAttribute('transform', `rotate(${-deg + deg * i / ticks},0,70))`);
            }, tick * i);
        }
        isOpened = false;
    }
    
    // If the menu is closed, open it
    else {
        menu.setAttribute('class', 'open');
        for (let i = 1; i <= ticks; i++) {
            setTimeout(function () {
                svg[0].setAttribute('transform', `rotate(${deg * i / ticks},0,30)`);
                svg[1].setAttribute('transform', `translate(${50 * i / ticks}, 0) scale(${1 - 1 * i / ticks},1)`);
                svg[2].setAttribute('transform', `rotate(${-deg * i / ticks},0,70)`);
            }, tick * i);
        }
        isOpened = true;
    }

    // Log the status of the menu
    var menuStatus = isOpened ? 'opened' : 'closed'
    console.log(`The menu is ${menuStatus}.`);

}