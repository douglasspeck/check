/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.3.0
 * 
 * @function        homeResumeButton
 * @description     Redirects the user to the last opened activity (currently defaults to "2.php")
 * 
 */

function homeResumeButton() {
    let resumeButton = document.getElementById("home-resume-button");
    let activity = "/~fracoes/sequencias/2.php";
    resumeButton.addEventListener("click",()=>{location.href = activity});
}