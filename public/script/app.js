const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const toggle_btn_out = document.querySelectorAll(".outToggle");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");
const bgImg = document.getElementById("bgimg");

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

const navBtn = document.getElementById("navBtn");
const btn1 = document.getElementById("btn1");
const btn2 = document.getElementById("btn2");
const btn3 = document.getElementById("btn3");

const toggleNavbar = () => {
    btn1.classList.toggle("active");
    btn2.classList.toggle("active");
    btn3.classList.toggle("active");
    bgImg.classList.toggle("bgimg-navActive");
};

navBtn.addEventListener("click", () => toggleNavbar());

const buttons = document.querySelectorAll("[data-carousel-button]");
const radio1 = document.getElementById("radio1");
const radio2 = document.getElementById("radio2");
const radio3 = document.getElementById("radio3");

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        const offset = button.dataset.carouselButton === "next" ? 1 : -1;
        const slides = button
            .closest("[data-carousel]")
            .querySelector("[data-slides]");

        const activeSlide = slides.querySelector("[data-active]");
        let newIndex = [...slides.children].indexOf(activeSlide) + offset;
        if (newIndex < 0) newIndex = slides.children.length - 1;

        if (newIndex >= slides.children.length) newIndex = 0;

        slides.children[newIndex].dataset.active = true;
        delete activeSlide.dataset.active;

        // Add this switch case to set the radio button
        switch (newIndex) {
            case 0:
                radio1.checked = true;
                radio2.checked = false;
                radio3.checked = false;

                break;
            case 1:
                radio2.checked = true;
                radio1.checked = false;
                radio3.checked = false;
                break;
            case 2:
                radio3.checked = true;
                radio2.checked = false;
                radio1.checked = false;
                break;
            default:
                console.log("Invalid index");
                break;
        }
    });
});

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