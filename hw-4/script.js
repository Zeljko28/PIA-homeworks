var regBtn = document.getElementById("reg");
regBtn.onclick = () => {
    document.getElementById("sign-in").style.display = "none";
    document.getElementById("sign-up").style.display = "block";
}

var signInLink = document.getElementById("back");
signInLink.onclick = () => {
    document.getElementById("sign-in").style.display = "block";
    document.getElementById("sign-up").style.display = "none";
}