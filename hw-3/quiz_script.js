
/* Login Page */

var loginDiv = document.getElementById("login");
var loginBtn = document.getElementById("submit");
var nameValue;

loginBtn.onclick = () => {
    var rulesDiv = document.getElementById("rules");
    nameValue = document.getElementById("input").value;
    var text = nameValue.split(" ").join("");

    if(text == ""){
        document.getElementById("warn").innerHTML = "Niste uneli ime!"
    }
    else{
        loginDiv.style.display = "none";
        rulesDiv.style.display = "block";
    }
}

/* Rules Page */

var startBtn = document.getElementById("start");
var quizDiv = document.getElementById("quiz");

startBtn.onclick = () => {
    var rulesDiv = document.getElementById("rules");
    var sectionBetweenDiv = document.getElementById("between");
    sectionBetweenDiv.style.display = "block";
    rulesDiv.style.display = "none";
    quizDiv.style.display = "block";

    var tmp = 0;
    function countToSeven(){
        tmp++;
        if(tmp == 7){
            clearInterval(intervalOne);
            clearInterval(intervalTwo);
            clearInterval(intervalThree);
            clearInterval(intervalZero);
        }
    }
    betweenCountdown();
    var intervalZero = setInterval(countToSeven, 1000);
    var intervalOne = setInterval(betweenCountdown, 1000);
    var intervalTwo = setInterval(changeTimerColorRed, 500);
    var intervalThree = setInterval(changeTimerColorWhite, 1000); 


}

/* Between Page */

var betweenTimer = 5;

function betweenCountdown(){
    if(betweenTimer >= 0){
        document.getElementById("timer-between").innerHTML = "0:0" + betweenTimer;
        betweenTimer--;
    }
    if(betweenTimer == -1){
        document.getElementById("between").remove();
        document.getElementById("quiz").style.opacity = 1;
        document.getElementById("quiz").style.filter = "none";
        document.getElementById("exit").style.pointerEvents = "all";
        document.getElementById("next").style.pointerEvents = "all";
        enableAndResetButtons();
        pickQuestion();

        betweenTimer--;
    }
}

function changeTimerColorRed(){
    if(betweenTimer >= 0){
        document.getElementById("timer-between").style.color = "red";
    }
}

function changeTimerColorWhite(){
    if(betweenTimer >= 0){
        document.getElementById("timer-between").style.color = "white";
    }
}


/* Quiz Page */


var exitBtn = document.getElementById("exit");
exitBtn.onclick = () => {
    location.reload();
}

/* Fetching json file */

var index;
var questions;

fetch('questions.json').then(function (response) {
    return response.json();
  
  }).then(function (obj) {
      questions = obj;
  });


/* Picking random element(question) from json file */
var cnt = 0;
function pickQuestion(){

    if(cnt < 10){
        index = Math.round(Math.random() * 29);
        if(questions[index].flag){
            displayQuestion(questions[index]);
            questions[index].flag = false;
            cnt++;
        }
        else{
            while(!questions[index].flag){
                index = Math.round(Math.random() * 29);
            }
            displayQuestion(questions[index]);
            questions[index].flag = false;
            cnt++;
        }
    }
}

var aBtn = document.getElementById("A");
var bBtn = document.getElementById("B");
var cBtn = document.getElementById("C");
var dBtn = document.getElementById("D");
var correct;

/* Button functionalites */

var clickedFlag = false;

/* A Button Events */

aBtn.onclick = () => {
    clickedFlag = true;
    if(aBtn.innerHTML == correct){
        displayCorrect(aBtn);
        disableButtons();
    }
    else{
        displayIncorrect(aBtn);
        disableButtons();
    }
}

aBtn.onmouseover = () => {
    aBtn.style.opacity = 1;
}
aBtn.onmouseleave = () => {
    if(!clickedFlag){
        aBtn.style.opacity = 0.6;
    }
}

/* B Button Events */

bBtn.onclick = () => {
    clickedFlag = true;
    if(bBtn.innerHTML == correct){
        displayCorrect(bBtn);
        disableButtons();
    }
    else{
        displayIncorrect(bBtn);
        disableButtons();
    }
}

bBtn.onmouseover = () => {
    bBtn.style.opacity = 1;
}
bBtn.onmouseleave = () => {
    if(!clickedFlag){
        bBtn.style.opacity = 0.6;
    }
}

/* C Button Events */

cBtn.onclick = () => {
    clickedFlag = true;
    if(cBtn.innerHTML == correct){
        displayCorrect(cBtn);
        disableButtons();
    }
    else{
        displayIncorrect(cBtn);
        disableButtons();
    }
}

cBtn.onmouseover = () => {
    cBtn.style.opacity = 1;
}
cBtn.onmouseleave = () => {
    if(!clickedFlag){
        cBtn.style.opacity = 0.6;
    }
}

/* D Button Events */

dBtn.onclick = () => {
    clickedFlag = true;
    if(dBtn.innerHTML == correct){
        displayCorrect(dBtn);
        disableButtons();
    }
    else{
        displayIncorrect(dBtn);
        disableButtons();  
    }
}

dBtn.onmouseover = () => {
    dBtn.style.opacity = 1;
}
dBtn.onmouseleave = () => {
    if(!clickedFlag){
        dBtn.style.opacity = 0.6;
    }
}

/* Display Question function */

function displayQuestion(object){
    enableAndResetButtons();
    var Q = document.getElementById("Q");

    Q.innerHTML = object.question;
    aBtn.innerHTML = object.A;
    bBtn.innerHTML = object.B;  
    cBtn.innerHTML = object.C;  
    dBtn.innerHTML = object.D;  
    correct = object.correct;

}

var nextBtn = document.getElementById("next");
nextBtn.onclick = () => {
    pickQuestion();
}


var buttonsArray = [aBtn, bBtn, cBtn, dBtn];

function disableButtons(){
    for(var i = 0; i < buttonsArray.length; i++){
        buttonsArray[i].style.pointerEvents = "none";
    }
}

function enableAndResetButtons(){
    clickedFlag = false;
    for(var i = 0; i < buttonsArray.length; i++){
        buttonsArray[i].style.pointerEvents = "all";
        buttonsArray[i].style.backgroundColor = "blue";
        if(buttonsArray[i].style.opacity == 1){
            buttonsArray[i].style.opacity = 0.6;

        }
    }
}

function displayCorrect(btn){
    btn.style.backgroundColor = "green";
    btn.style.opacity = 1;
}
function displayIncorrect(btn){
    btn.style.backgroundColor = "red";
    btn.style.opacity = 1;
}







