//profile page scripting
const infoBtn = document.getElementById("infoBtn");
const securityBtn = document.getElementById("securityBtn");
const subscriptionBtn = document.getElementById("subscriptionBtn");
const userInfoForm = document.getElementById("userInfoForm");

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
