/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.height = "250px";
    document.getElementById("main").style.marginTop = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
    document.getElementById("main").style.marginTop = "0";
}

function myMap() {
    console.log("Called myMap")
    var myCenter = new google.maps.LatLng(51.508742,-0.120850);
    var mapCanvas = document.getElementById("map");
    var mapOptions = {center: myCenter, zoom: 5};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({position:myCenter,animation:google.maps.Animation.BOUNCE});
    marker.setMap(map);
    
}


document.getElementById("mySidenav").style.width = "0";
document.getElementById("main").style.marginLeft = "0";