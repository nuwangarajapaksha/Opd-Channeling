<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/slider_style.css"/>
    </head>
    <body>
        <div class="slide-shader"></div>
        <div class="slideshow-container">

            <div class="slides fade">
                <img src="img/Slide_1.jpg"/>
            </div>

            <div class="slides fade">
                <img src="img/Slide_2.jpg"/>
            </div>

            <div class="slides fade">
                <img src="img/Slide_3.jpg"/>
            </div>

        </div>
        
        <div class="hedding-container">
            <p class="content1">OPD Channeling</p>
            <p class="content2">Save your time & money</p>
            <p class="content2">Protect your life</p><br><br>
            <p class="content3"><u>Login As A</u></p><br>
            <button class="slider-button1" onclick="toggledoctorloginpopup();">Doctor</button>
            <button class="slider-button2" onclick="togglepatientloginpopup();">Patient</button>
        </div>

        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
        </div>
        
        <div class="sub-hedding-container">
            <button onclick="togglepatientloginpopup();">Create Appointment</button>
        </div>
        
    </body>
</html>
