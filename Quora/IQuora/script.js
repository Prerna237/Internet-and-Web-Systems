function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    var quescontent = document.getElementsByClassName("question");
    for (i = 0; i < quescontent.length; i++) {
      console.log("question =" + i);
      quescontent[i].style.display = "none";
    }

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    // initialize(cityName);
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    
} 

function chipClicked(category,chipName){
    console.log(chipName);
    var str="select * from questions where ques_category=\""+category+"\" and ques_subcategory=\""+chipName+"\"";
    
    var panel=document.getElementById("questions_panel");
    
}