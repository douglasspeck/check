/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.2.0
 * 
 * @function        register
 * @param           {Object}    data    The data to be registered
 * @description     Registers user input as an object to the DB
 * 
 */

function register(data) {

    console.log(
        `USER INPUT\n
        type: ${data.type}
        value: ${data.value}
        timestamp: ${data.timestamp}
        `
    );

}