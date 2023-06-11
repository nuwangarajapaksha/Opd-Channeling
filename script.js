
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" dot-active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " dot-active";
    setTimeout(showSlides, 8000); // Change image every 2 seconds
}

window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle('sticky', window.scrollY > 0)
});

function header() {
    var header = document.querySelector("header");
    header.className = "header-next";
}



function toggleadministrators() {

    var display = document.getElementById("admin");
    display.className = "child-container";

    var display = document.getElementById("doctor");
    display.className = "child-container-disable";

    var display = document.getElementById("patient");
    display.className = "child-container-disable";

    var display = document.getElementById("hospital");
    display.className = "child-container-disable";

    var display = document.getElementById("appointment");
    display.className = "child-container-disable";


    var active = document.getElementById("adminchild");
    active.className = "active-child";

    var active = document.getElementById("doctorchild");
    active.classList.remove("active-child");

    var active = document.getElementById("patientchild");
    active.classList.remove("active-child");

    var active = document.getElementById("hospitalchild");
    active.classList.remove("active-child");

    var active = document.getElementById("appointmentchild");
    active.classList.remove("active-child");
}

function toggledoctors() {

    var display = document.getElementById("doctor");
    display.className = "child-container";

    var display = document.getElementById("admin");
    display.className = "child-container-disable";

    var display = document.getElementById("patient");
    display.className = "child-container-disable";

    var display = document.getElementById("hospital");
    display.className = "child-container-disable";

    var display = document.getElementById("appointment");
    display.className = "child-container-disable";


    var active = document.getElementById("doctorchild");
    active.className = "active-child";

    var active = document.getElementById("adminchild");
    active.classList.remove("active-child");

    var active = document.getElementById("patientchild");
    active.classList.remove("active-child");

    var active = document.getElementById("hospitalchild");
    active.classList.remove("active-child");

    var active = document.getElementById("appointmentchild");
    active.classList.remove("active-child");
}

function togglepatients() {

    var display = document.getElementById("patient");
    display.className = "child-container";

    var display = document.getElementById("admin");
    display.className = "child-container-disable";

    var display = document.getElementById("doctor");
    display.className = "child-container-disable";

    var display = document.getElementById("hospital");
    display.className = "child-container-disable";

    var display = document.getElementById("appointment");
    display.className = "child-container-disable";


    var active = document.getElementById("patientchild");
    active.className = "active-child";

    var active = document.getElementById("adminchild");
    active.classList.remove("active-child");

    var active = document.getElementById("doctorchild");
    active.classList.remove("active-child");

    var active = document.getElementById("hospitalchild");
    active.classList.remove("active-child");

    var active = document.getElementById("appointmentchild");
    active.classList.remove("active-child");
}

function togglehospitals() {

    var display = document.getElementById("hospital");
    display.className = "child-container";

    var display = document.getElementById("admin");
    display.className = "child-container-disable";

    var display = document.getElementById("doctor");
    display.className = "child-container-disable";

    var display = document.getElementById("patient");
    display.className = "child-container-disable";

    var display = document.getElementById("appointment");
    display.className = "child-container-disable";


    var active = document.getElementById("hospitalchild");
    active.className = "active-child";

    var active = document.getElementById("adminchild");
    active.classList.remove("active-child");

    var active = document.getElementById("doctorchild");
    active.classList.remove("active-child");

    var active = document.getElementById("patientchild");
    active.classList.remove("active-child");

    var active = document.getElementById("appointmentchild");
    active.classList.remove("active-child");
}

function toggleappointments() {

    var display = document.getElementById("appointment");
    display.className = "child-container";

    var display = document.getElementById("admin");
    display.className = "child-container-disable";

    var display = document.getElementById("doctor");
    display.className = "child-container-disable";

    var display = document.getElementById("patient");
    display.className = "child-container-disable";

    var display = document.getElementById("hospital");
    display.className = "child-container-disable";


    var active = document.getElementById("appointmentchild");
    active.className = "active-child";

    var active = document.getElementById("adminchild");
    active.classList.remove("active-child");

    var active = document.getElementById("doctorchild");
    active.classList.remove("active-child");

    var active = document.getElementById("patientchild");
    active.classList.remove("active-child");

    var active = document.getElementById("hospitalchild");
    active.classList.remove("active-child");
}



function toggleadminregpopup() {
    var popup = document.getElementById("adminreg");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}


function togglehospitalregpopup() {
    var popup = document.getElementById("hospitalreg");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function toggleadminprofilepopup() {
    var popup = document.getElementById("adminprofile");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function toggleadminpasswordchangepopup() {
    var popup = document.getElementById("adminpasswordchange");
    popup.classList.toggle("active-reg-popup");
}



function toggleadminloginpopup() {
    var popup = document.getElementById("adminlogin");
    popup.classList.toggle("active-login-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}


function toggledoctorloginpopup() {
    var popup = document.getElementById("doctorlogin");
    popup.classList.toggle("active-login-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function toggledoctorregpopup() {
    var popup = document.getElementById("doctorreg");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function toggledoctorprofilepopup() {
    var popup = document.getElementById("doctorprofile");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function toggledoctorpasswordchangepopup() {
    var popup = document.getElementById("doctorpasswordchange");
    popup.classList.toggle("active-reg-popup");
}


function togglepatientloginpopup() {
    var popup = document.getElementById("patientlogin");
    popup.classList.toggle("active-login-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function togglepatientregpopup() {
    var popup = document.getElementById("patientreg");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function togglepatientprofilepopup() {
    var popup = document.getElementById("patientprofile");
    popup.classList.toggle("active-reg-popup");

    var popup = document.getElementById("shader");
    popup.classList.toggle("active-shader");
}

function togglepatientpasswordchangepopup() {
    var popup = document.getElementById("patientpasswordchange");
    popup.classList.toggle("active-reg-popup");
}


