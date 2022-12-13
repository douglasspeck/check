function homeResumeButton() {
    let resumeButton = document.getElementById("home-resume-button");
    let activity = "/~fracoes/sequencias/2.php";
    resumeButton.addEventListener("click",()=>{location.href = activity});
}