
var signup = document.getElementById("signup-link");
var login = document.getElementById("login-link");
var forget = document.getElementById("forget-link");
var backLogin = document.getElementById("back-login-link");
let titulocontainer = document.getElementById("titulo");

signup.addEventListener("click", function(){
    var logincontainer = document.querySelector(".login-container");
    logincontainer.classList.toggle("hide");
    var signupcontainer = document.querySelector(".signup-container");
    signupcontainer.classList.toggle("hide");
    // titulo
    titulocontainer.removeChild(document.getElementById("titulo-atual"));
    titulocontainer.innerHTML += 
        `
        <h2 class="titulo-signup" id="titulo-atual" style="margin-top:20px">Cadastre-se</h2>
        `;
})

login.addEventListener("click", function(){
    var logincontainer = document.querySelector(".login-container");
    logincontainer.classList.toggle("hide");
    var signupcontainer = document.querySelector(".signup-container");
    signupcontainer.classList.toggle("hide");
    // titulo
    titulocontainer.removeChild(document.getElementById("titulo-atual"));
    titulocontainer.innerHTML += 
        `
        <h2 class="titulo-login" id="titulo-atual" style="margin-top:20px">Login</h2>
        `;
})

forget.addEventListener("click", function(){
    var logincontainer = document.querySelector(".login-container");
    logincontainer.classList.toggle("hide");
    var forgetcontainer = document.querySelector(".forget-container");
    forgetcontainer.classList.toggle("hide");
    // titulo
    titulocontainer.removeChild(document.getElementById("titulo-atual"));
    titulocontainer.innerHTML += 
        `
        <h2 class="titulo-login" id="titulo-atual" style="margin-top:20px">Recupere sua senha</h2>
        `;
})

backLogin.addEventListener("click", function(){
    var logincontainer = document.querySelector(".login-container");
    logincontainer.classList.toggle("hide");
    var forgetcontainer = document.querySelector(".forget-container");
    forgetcontainer.classList.toggle("hide");
    // titulo
    titulocontainer.removeChild(document.getElementById("titulo-atual"));
    titulocontainer.innerHTML += 
        `
        <h2 class="titulo-login" id="titulo-atual" style="margin-top:20px">Login</h2>
        `;
})

