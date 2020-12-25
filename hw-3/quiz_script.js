
/* LOG IN PAGE */

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

/* RULES PAGE */

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

/* BETWEEN PAGE */

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


/* QUIZ PAGE */


var exitBtn = document.getElementById("exit");
exitBtn.onclick = () => {
    clickedFlag = true;
    document.getElementById("quiz").style.display = "none";
    document.getElementById("results").style.display = "block";
    document.getElementById("score").innerHTML = score;
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
var questionNumber = 0;
function pickQuestion(){

    if(questionNumber < 10){
        index = Math.round(Math.random() * 29);
        if(questions[index].flag){
            displayQuestion(questions[index]);
            questions[index].flag = false;
            questionNumber++;
        }
        else{
            while(!questions[index].flag){
                index = Math.round(Math.random() * 29);
            }
            displayQuestion(questions[index]);
            questions[index].flag = false;
            questionNumber++;
        }
    }
}

var aBtn = document.getElementById("A");
var bBtn = document.getElementById("B");
var cBtn = document.getElementById("C");
var dBtn = document.getElementById("D");
var buttonsArray = [aBtn, bBtn, cBtn, dBtn];
var correct;

/* Button functionalites */

var clickedFlag = false;
var displayedFlag = true;

var score = 0;
/* A Button Events */

aBtn.onclick = () => {
    clickedFlag = true;
    if(aBtn.innerHTML == correct){
        displayCorrect(aBtn);
        disableButtons();
        score++;
    }
    else{
        displayIncorrect(aBtn);
        disableButtons();
    }
    setTimeout(pickQuestion, 2000);
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
        score++;
    }
    else{
        displayIncorrect(bBtn);
        disableButtons();
    }
    setTimeout(pickQuestion, 2000);
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
        score++;
    }
    else{
        displayIncorrect(cBtn);
        disableButtons();
    }
    setTimeout(pickQuestion, 2000);
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
        score++;
    }
    else{
        displayIncorrect(dBtn);
        disableButtons();  
    }
    setTimeout(pickQuestion, 2000);
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
    updateTimer();
    var Q = document.getElementById("Q");

    Q.innerHTML = object.question;
    aBtn.innerHTML = object.A;
    bBtn.innerHTML = object.B;  
    cBtn.innerHTML = object.C;  
    dBtn.innerHTML = object.D;  
    correct = object.correct;
    document.getElementById("q-count").innerHTML = "Pitanje " + (questionNumber + 1) + "/10";
}

var nextBtn = document.getElementById("next");
nextBtn.onclick = () => {
    clickedFlag = true;
    for(var i = 0; i < buttonsArray.length; i++){
        if(buttonsArray[i].innerHTML == correct){
            buttonsArray[i].style.backgroundColor = "green";
            buttonsArray[i].style.opacity = 0.6;
            disableButtons();
            break;
        }
    }
    document.getElementById("timer").innerHTML = timer;
    setTimeout(pickQuestion, 2000);
}

function disableButtons(){
    for(var i = 0; i < buttonsArray.length; i++){
        buttonsArray[i].style.pointerEvents = "none";
    }
    nextBtn.style.pointerEvents = "none";
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
    nextBtn.style.pointerEvents = "all";
}



function displayCorrect(btn){
    btn.style.backgroundColor = "green";
    btn.style.opacity = 1;
    
}
function displayIncorrect(btn){
    btn.style.backgroundColor = "red";
    btn.style.opacity = 1;
}

/* Countdown Timer */
var timer = 20;

function updateTimer(){
    timer = 20;
    document.getElementById("timer").innerHTML = timer;
    var intervalTimer = setInterval( function(){
        if(clickedFlag){
            clearInterval(intervalTimer);
            document.getElementById("timer").innerHTML = timer;
        }

        if(timer <= 0){
            clearInterval(intervalTimer);
            for(var i = 0; i < buttonsArray.length; i++){
                if(buttonsArray[i].innerHTML == correct){
                    buttonsArray[i].style.backgroundColor = "green";
                    buttonsArray[i].style.opacity = 0.6;
                    disableButtons();
                    break;
                }
            }
            document.getElementById("timer").innerHTML = 0;
            setTimeout(pickQuestion, 2000);
        }

        if(timer > 0){
            document.getElementById("timer").innerHTML = (timer-1);
        }
        timer--;
        console.log("radi i dalje");
    }, 1000);
}


/* RESULTS PAGE */

var restartBtn = document.getElementById("restart");
restartBtn.onclick = () => {
    window.location.reload();
} 

