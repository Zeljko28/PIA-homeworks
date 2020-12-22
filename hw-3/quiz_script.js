
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
    function countToFive(){
        tmp++;
        if(tmp == 7){
            clearInterval(intervalOne);
            clearInterval(intervalTwo);
            clearInterval(intervalThree);
            clearInterval(intervalZero);
        }
    }
    var intervalZero = setInterval(countToFive, 1000);
    var intervalOne = setInterval(betweenCountdown, 1000);
    var intervalTwo = setInterval(changeTimerColorRed, 500);
    var intervalThree = setInterval(changeTimerColorWhite, 1000); 


}

/* Between Page */

var betweenTimer = 5;

function betweenCountdown(){
    console.log("tajmer");
    if(betweenTimer >= 0){
        document.getElementById("timer-between").innerHTML = "0:0" + betweenTimer;
        betweenTimer--;
    }
    if(betweenTimer == -1){
        document.getElementById("between").remove();
        document.getElementById("quiz").style.opacity = 1;
        document.getElementById("quiz").style.filter = "none";
        document.getElementById("A").style.pointerEvents = "all";
        document.getElementById("B").style.pointerEvents = "all";
        document.getElementById("C").style.pointerEvents = "all";
        document.getElementById("D").style.pointerEvents = "all";
        document.getElementById("exit").style.pointerEvents = "all";
        document.getElementById("next").style.pointerEvents = "all";
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

var index;
var questions;

fetch('questions.json').then(function (response) {
    return response.json();
  
  }).then(function (obj) {
      questions = obj;
  });


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

function displayQuestion(object){
    var Q = document.getElementById("Q");
    var A = document.getElementById("A");
    var B = document.getElementById("B");
    var C = document.getElementById("C");
    var D = document.getElementById("D");

    Q.innerHTML = object.question;
    A.innerHTML = object.A;
    B.innerHTML = object.B;  
    C.innerHTML = object.C;  
    D.innerHTML = object.D;    
}

var nextBtn = document.getElementById("next");
nextBtn.onclick = () => {
    pickQuestion();
}








