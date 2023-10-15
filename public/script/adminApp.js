
//admin panel sidebar scripting
const adminSidebar = document.getElementById("adminSidebar");
const hamBurgerBtn = document.getElementById("hamBurgerBtn");
const adminAppMain= document.getElementById("adminAppMain");
const sideBarHamBtn = document.getElementById("sideBarHamBtn");
const toggleAdminSidebar = () => {
    adminSidebar.classList.toggle("toggle");
    adminAppMain.classList.toggle("toggle");
}
hamBurgerBtn.addEventListener("click", () => toggleAdminSidebar());
sideBarHamBtn.addEventListener("click", () => toggleAdminSidebar());
//admin panel sidebar scripting end

//sidebar links scripting

//sidebar links scripting end

