/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.1
 * 
 * @function        window.onload
 * @description     Executes functions on page load.
 * 
 */

window.onload = function(){

    try {generateFigures();} catch(e){console.log(e);}
    try {generateFractions();} catch(e){console.log(e);}
    try {sendChange();} catch(e){console.log(e);}
    try {generateSets();} catch(e){console.log(e);}
    try {generateAssoc();} catch(e){console.log(e);}
    try {homeResumeButton();} catch(e){console.log(e);}
    try {headerLinks();} catch(e){console.log(e);}

}