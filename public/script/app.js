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

//subscription page scripting
document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to all radio buttons
    document
        .querySelectorAll('input[name="payment"]')
        .forEach(function (radio) {
            radio.addEventListener("change", function () {
                updateSelectedImage(radio.dataset.paymentMethod);
            });
        });
});

function updateSelectedImage(paymentMethod) {
    // Reset all images to remove the 'selected' class
    document.querySelectorAll(".payment-option-img").forEach(function (img) {
        img.classList.remove("selected");
    });

    // Add the 'selected' class to the corresponding image
    document
        .querySelector('label[for="' + paymentMethod + '"] img')
        .classList.add("selected");

    // You can add additional logic here to handle the selected payment method
    document.getElementById("selected-payment-method").textContent =
        paymentMethod.toUpperCase();
    document.getElementById("selected-payment-method").style.color =
        "limegreen";
}
function validatePaymentMethod() {
    // Get the selected payment method
    var selectedPaymentMethod = document.getElementById(
        "selected-payment-method"
    );

    // Check if the payment method is 'Please Select'
    if (
        selectedPaymentMethod.textContent.trim().toLowerCase() ===
        "please select"
    ) {
        // Apply shake animation and change color to red
        selectedPaymentMethod.style.animation = "shake 0.5s";
        selectedPaymentMethod.style.color = "red";

        // Remove the animation after it completes
        setTimeout(function () {
            selectedPaymentMethod.style.animation = "";
        }, 500);

        // Prevent the form from submitting
        return false;
    }

    // If the payment method is selected, proceed with the form submission
    document.getElementById("proceed-payment-form").submit();
    return false;
}

const addMonthsBtn = document.getElementById("add-subscription-month-btn");
const removeMonthsBtn = document.getElementById(
    "remove-subscription-month-btn"
);
const subscriptionMonthsElement = document.getElementById("subscription-month");

const startDate = document.getElementById("start-date");
const endDate = document.getElementById("end-date");

const subscriptionMonthInput = document.getElementById(
    "subscription-plan-month-input"
);

const planPrice = document.getElementById("plan-price");
const totalPayingAmount = document.getElementById("total-paying-amount");

// Function to calculate and update the end date
function updateEndDate() {
    const start = new Date(startDate.innerHTML);
    const subscriptionMonths = parseInt(subscriptionMonthsElement.textContent);
    const newEndDate = new Date(start);
    newEndDate.setDate(start.getDate() + subscriptionMonths * 30);
    endDate.innerHTML = newEndDate.toISOString().split("T")[0]; // Format as 'YYYY-MM-DD'
}

addMonthsBtn.addEventListener("click", function () {
    const currentMonths = parseInt(subscriptionMonthsElement.textContent);
    subscriptionMonthsElement.textContent = currentMonths + 1;
    subscriptionMonthInput.value = currentMonths + 1;
    totalPayingAmount.textContent =
        planPrice.value * subscriptionMonthInput.value;
    updateEndDate();
});

removeMonthsBtn.addEventListener("click", function () {
    const currentMonths = parseInt(subscriptionMonthsElement.textContent);
    if (currentMonths > 1) {
        subscriptionMonthsElement.textContent = currentMonths - 1;
        subscriptionMonthInput.value = currentMonths - 1;
        totalPayingAmount.textContent =
            planPrice.value * subscriptionMonthInput.value;
        updateEndDate();
    }
});

// Initialize the end date
updateEndDate();

//subscription page scripting end
