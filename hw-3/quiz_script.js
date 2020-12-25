
/* LOG IN PAGE */

var loginDiv = document.getElementById("login");
var loginBtn = document.getElementById("submit");
var nameValue;

var questionFormDiv;
var answerOneDiv;
var answerTwoDiv;

var cookies = document.cookie;
var cookiesArray = cookies.split(";");

function setCookie(name, value){
    //if(cookiesArray.length < 10){
        document.cookie = name + "=" + value;
        cookies = document.cookie;
        cookiesArray = cookies.split(";");
    //}
}


loginBtn.onclick = () => {

    var rulesDiv = document.getElementById("rules");
    nameValue = document.getElementById("input").value;
    var text = nameValue.split(" ").join("");

    if(text == ""){
        document.getElementById("warn").innerHTML = "Niste uneli ime!";
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
        setTimeout(pickQuestion, 500);

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

function sortTable(){

    var tmp = [];
    for(var i = 0; i < cookiesArray.length; i++){
        tmp[i] = cookiesArray[i].split("=");
    }
    var op1;
    var op2;
    for(var j = 0; j < tmp.length; j++){
        for(var k = 0; k < tmp.length; k++){
            op1 = parseInt(tmp[k][1]);
            op2 = parseInt(tmp[j][1]);
            if(op1 < op2){
                var h = tmp[k];
                tmp[k] = tmp[j];
                tmp[j] = h;
            }
            if(op1 == op2){
                if(tmp[k][0] > tmp[j][0]){
                    var h = tmp[k];
                    tmp[k] = tmp[j];
                    tmp[j] = h;
                }
            }
        }
    }

    cookiesArray = tmp;
    if(tmp.length > 10){
        var temp = cookiesArray[cookiesArray.length-1];
        var lastCookieName = temp[0];
        document.cookie = lastCookieName + "=;" + " expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        tmp.length = 10;
        cookiesArray.length = 10;
    }
    
    for(var i = 0; i < cookiesArray.length; i++){
        tmp[i] = cookiesArray[i].join("=");
    }

}

function displayTable(){

    var id = 1;
    var temp = [];

    for (var i = 0; i < cookiesArray.length; i++){
        temp[i] = cookiesArray[i].split("=");
    }
    for (var i = 0; i < temp.length; i++){
        var nick = temp[i][0];
        var res = temp[i][1];
        document.getElementById(id).innerHTML = id + "." + " " + nick + "&emsp;" + res;
        id++;
        
    }

}


var exitBtn = document.getElementById("exit");
exitBtn.onclick = () => {
    clickedFlag = true;
    document.getElementById("quiz").style.display = "none";
    document.getElementById("results").style.display = "block";
    document.getElementById("score").innerHTML = score;
    setCookie(nameValue, score);
    sortTable();
    displayTable();
}

/* Fetching json file */

var index;
var questions;

function load(){
    fetch('questions.json').then(function (response) {
        return response.json();
    
    }).then(function (obj) {
        questions = obj;
    });


    questionFormDiv = document.getElementById("question-form");
    answerOneDiv = document.getElementById("answers-one");
    answerTwoDiv = document.getElementById("answers-two");

}


/* Picking random element(question) from json file */
var questionNumber = 0;
function pickQuestion(){

    if(questionNumber < 10){

        index = Math.round(Math.random() * 29);
        while(!questions[index].flag){
            index = Math.round(Math.random() * 29);
        }
        var withAns = questions[index].withAnswers;
        
        if(withAns == "true"){
            setTimeout(displayQuestionWithAnswers(questions[index]), 500);
            questions[index].flag = false;
            questionNumber++;
        }
        else{
            setTimeout(displayQuestionWithNoAnswers(questions[index]), 500);
            questions[index].flag = false;
            questionNumber++;
        }
    }

    else{
        
        clickedFlag = true;
        document.getElementById("quiz").style.display = "none";
        document.getElementById("results").style.display = "block";
        document.getElementById("score").innerHTML = score;
        setCookie(nameValue, score);
        sortTable();
        displayTable();
        
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


var submitAnswerBtn = document.getElementById("answer-submit");
submitAnswerBtn.onclick = () => {
    clickedFlag = true;
    var inpt = document.getElementById("input-question").value + "";
    var crr = correct + "";

    if(inpt.toLowerCase() == crr.toLowerCase()){
        submitAnswerBtn.style.backgroundColor = "green";
        submitAnswerBtn.innerHTML = "Tačno!";
        submitAnswerBtn.style.pointerEvents = "none";
        nextBtn.style.pointerEvents = "none";
        score++;
    }
    else{
        submitAnswerBtn.style.backgroundColor = "red";
        submitAnswerBtn.innerHTML = "Netačno!";
        submitAnswerBtn.style.pointerEvents = "none";
        nextBtn.style.pointerEvents = "none";
    }
    setTimeout(pickQuestion, 2000);
}


/* Display Question function */

function displayQuestionWithAnswers(object){
    
    questionFormDiv.style.display = "none";
    answerOneDiv.style.display = "block";
    answerTwoDiv.style.display = "block";
    
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

function displayQuestionWithNoAnswers(object){

    questionFormDiv.style.display = "block";
    answerOneDiv.style.display = "none";
    answerTwoDiv.style.display = "none";

    clickedFlag = false;
    document.getElementById("next").style.pointerEvents = "all";
    submitAnswerBtn.style.pointerEvents = "all";
    submitAnswerBtn.style.backgroundColor = "blue";
    submitAnswerBtn.innerHTML = "Potvrdi odgovor";

    document.getElementById("input-question").value = "";

    updateTimer();
    var Q = document.getElementById("Q");
    Q.innerHTML = object.question;
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
    }, 1000);
}


/* RESULTS PAGE */

var restartBtn = document.getElementById("restart");
restartBtn.onclick = () => {
    window.location.reload();
} 

