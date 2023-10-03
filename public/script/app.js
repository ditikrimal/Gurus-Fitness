

//login and signup form scripting
const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const toggle_btn_out = document.querySelectorAll(".outToggle");
inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
    });
});

toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});
toggle_btn_out.forEach((btn) => {
    btn.addEventListener("click", () => {
        window.location = "index.php";
        main.classList.toggle("sign-up-mode");
    });
});
//login and signup form scripting end


// navigation bar scripting
const bgImg = document.getElementById("bgimg");
const navBtn = document.getElementById("navBtn");
const btn1 = document.getElementById("btn1");
const btn2 = document.getElementById("btn2");
const btn3 = document.getElementById("btn3");
const mobileNav = document.getElementById("mobileNav");
const toggleNavbar = () => {
    btn1.classList.toggle("active");
    btn2.classList.toggle("active");
    btn3.classList.toggle("active");
    bgImg.classList.toggle("bgimg-navActive");
    mobileNav.classList.toggle("active");
};
navBtn.addEventListener("click", () => toggleNavbar());
//navigation bar scripting end

//profile page scripting
const infoBtn= document.getElementById("infoBtn");
const securityBtn = document.getElementById("securityBtn");
const userInfoForm = document.getElementById("userInfoForm");
const userSecurityForm = document.getElementById("userSecurityForm");
infoBtn.addEventListener("click", () => {
    userInfoForm.style.display = "block";
    userSecurityForm.style.display = "none";
    infoBtn.style.color = "#007bff";
    securityBtn.style.color = "white";
});
securityBtn.addEventListener("click", () => {
    userSecurityForm.style.display = "block";
    infoBtn.style.color = "white";
    userInfoForm.style.display = "none";
    securityBtn.style.color = "#007bff";
});
//profile page scripting end