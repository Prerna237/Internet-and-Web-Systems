var r1, r2, r3;

r1 = document.getElementById('circle_rb');
r2 = document.getElementById('square_rb');
try {
    if (r2.checked) {
        console.log("square");
        document.write("Selected Square");
    }
} catch(e){
    console.log("Caught");
}