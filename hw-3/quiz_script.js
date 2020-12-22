var submitBtn = document.getElementById("submit");
var loginDiv = document.getElementById("login");

var startBtn = document.getElementById("start");
var rulesDiv = document.getElementById("rules");

var quizDiv = document.getElementById("quiz");

submitBtn.onclick = () => {
    loginDiv.style.display = "none";
    rulesDiv.style.display = "block";
}

startBtn.onclick = () => {
    rulesDiv.style.display = "none";
    quizDiv.style.display = "block";
}