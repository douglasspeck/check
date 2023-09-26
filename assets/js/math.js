/**
 * Math operations for general applications
 * 
 * @access      public
 * @author      Douglas Speck
 * @since       0.2.0
 * 
 * @function    factors
 * @param       {Number}    number      The number to be factorized
 * @return      {Array}     The factors of the given number
 * 
 * @function    idThat
 * @param       {Number}    n           The number to be converted
 * @return      {String}    The same number, but converted to a "000"-type string
 * 
 * @function    dist
 * @param       {Object}    a           First point
 * @param       {Object}    b           Second point
 * @return      {Number}    The numerical distance between the points
 * 
 */

// 
const factors = number => [...Array(number + 1).keys()].filter(i=>number % i === 0);

function idThat(n) {

    let id = n < 100 ? n < 10 ? "00" + n : "0" + n : n;

    return id;

}

function dist(a,b) {

    return Math.sqrt(Math.pow(a.x - b.x, 2) + Math.pow(a.y - b.y, 2));

}