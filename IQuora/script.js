function openNav() {
    document.getElementById("mySidenav").style.height = "90%";
    document.getElementById("mySidenav").style.padding = "50px";
    // document.getElementById("main").style.marginTop = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
    document.getElementById("mySidenav").style.padding = "0px";
    // document.getElementById("main").style.marginTop = "0";
    document.body.style.backgroundColor = "white";
} 


function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    var quescontent = document.getElementsByClassName("question");
    

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        console.log("Setting for tabcontent i=",i);
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        console.log("Setting for tablink i=",i);        
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    // initialize(cityName);
    var ele=document.getElementById(cityName);
    console.log("City name=",cityName);
    console.log("ELement=",ele);
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    
} 

function chipClicked(category,chipName){
    console.log(chipName);
    var str="select * from questions where ques_category=\""+category+"\" and ques_subcategory=\""+chipName+"\"";
    
    var panel=document.getElementById("questions_panel");
    
}