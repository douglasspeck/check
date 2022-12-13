function homeResumeButton() {
    let resumeButton = document.getElementById("home-resume-button");
    let activity = "/sequencias/2.php";
    resumeButton.addEventListener("click",()=>{location.href = activity});
}