var c;
var radius_field;
var base;
var height;
var shape_global=''
function drawShape(shape){
    init();
    // width 200 height 200
    res=document.getElementById('result');
    shape_global=shape
    c=document.getElementById('myCanvas');
    if(shape==='circle'){
        var ctx = c.getContext("2d");
        ctx.beginPath();
        ctx.arc(100,100,40,0,2*Math.PI);
        ctx.stroke();

        document.getElementById('circle').style.visibility='visible';
        radius_field=document.getElementById('circle_radius');
        radius_field.style.visibility='visible';
    }
    else if(shape==='triangle'){
        var ctx = c.getContext("2d");
        ctx.beginPath();
        ctx.moveTo(95,50);
        ctx.lineTo(160,160);
        ctx.lineTo(40,160);
        ctx.lineTo(95,50);
        ctx.stroke();
        document.getElementById('side').style.visibility='visible';
        document.getElementById('base').style.visibility='visible';
        document.getElementById('height').style.visibility='visible';
        base=document.getElementById('base_val');
        base.style.visibility='visible';
        side=document.getElementById('side_val');
        side.style.visibility='visible';
        height=document.getElementById('height_val');
        height.style.visibility='visible';
    }
    else if(shape==='rectangle'){
        
        document.getElementById('base').style.visibility='visible';
        document.getElementById('height').style.visibility='visible';
        base=document.getElementById('base_val');
        base.style.visibility='visible';
        height=document.getElementById('height_val');
        height.style.visibility='visible';
    }
    else if(shape==='square'){
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.moveTo(50,50);
        ctx.lineTo(150,50);
        ctx.lineTo(150,150);
        ctx.lineTo(50,150);
        ctx.lineTo(50,50);
        ctx.stroke();
        document.getElementById('side').style.visibility='visible';
        side=document.getElementById('side_val');
        side.style.visibility='visible';
    }
    else{
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.moveTo(90,50);
        ctx.lineTo(150,80);
        ctx.lineTo(150,140);
        ctx.lineTo(90,170);
        ctx.lineTo(40,140);
        ctx.lineTo(40,80);
        ctx.lineTo(90,50);
        ctx.stroke();
        
        document.getElementById('side').style.visibility='visible';
        side=document.getElementById('side_val');
        side.style.visibility='visible';
    }
    
}

function hell(){
    alert("Hello")
}

function init()
{
    c=document.getElementById('myCanvas');    
    var ctx = c.getContext("2d");
    ctx.clearRect(0,0,200,200);
    arrayFields = document.getElementsByClassName('fields')
    arrayLabel = document.getElementsByClassName('fields_label');
    for (i = 0; i < arrayFields.length; i++) {
        arrayLabel[i].style.visibility = 'hidden';
        arrayFields[i].style.visibility = 'hidden';
    }
}

function submitted(){
    alert(shape_global);
    if(shape_global==='circle')
        {
            alert(radius_field.value*radius_field.value*Math.PI);
        }
}