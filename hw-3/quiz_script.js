
/* Login Page */

var loginBtn = document.getElementById("submit");
var nameValue;

loginBtn.onclick = () => {
    var loginDiv = document.getElementById("login");
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

startBtn.onclick = () => {
    var rulesDiv = document.getElementById("rules");
    var quizDiv = document.getElementById("quiz");
    rulesDiv.style.display = "none";
    quizDiv.style.display = "block";
}


/* Quiz Page */





