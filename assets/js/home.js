/**
 * 
 * @access          public
 * @author          Douglas Speck
 * @since           0.3.0
 * 
 * @function        homeResumeButton
 * @description     Redirects the user to the last opened activity (currently defaults to "sequencias.php")
 * 
 */

function homeResumeButton() {
    let resumeButton = document.getElementById("home-resume-button");
    let activity = "./sequencias.php";
    resumeButton.addEventListener("click",()=>{location.href = activity});
}