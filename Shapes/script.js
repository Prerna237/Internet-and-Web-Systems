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
        ctx.clearRect(0,0,200,200);
        ctx.beginPath();
        ctx.arc(100,100,40,0,2*Math.PI);
        ctx.stroke();

        document.getElementById('circle').style.visibility='visible';
        radius_field=document.getElementById('circle_radius');
        radius_field.style.visibility='visible';
    }
    else if(shape==='triangle'){
        init();
        var ctx = c.getContext("2d");
        ctx.clearRect(0,0,200,200);ctx.beginPath();
        ctx.moveTo(95,50);
        ctx.lineTo(160,160);
        ctx.lineTo(40,160);
        ctx.lineTo(95,50);
        ctx.stroke();
        document.getElementById('side').style.visibility='visible';
        side=document.getElementById('side_val');
        side.style.visibility='visible';
        
    }
    else if(shape==='rectangle'){
        init();
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.clearRect(0,0,200,200);ctx.beginPath();
        ctx.moveTo(60,75);
        ctx.lineTo(140,75);
        ctx.lineTo(140,125);
        ctx.lineTo(60,125);
        ctx.lineTo(60,75);
        
        ctx.stroke();
        document.getElementById('base').style.visibility='visible';
        document.getElementById('height').style.visibility='visible';
        base=document.getElementById('base_val');
        base.style.visibility='visible';
        height=document.getElementById('height_val');
        height.style.visibility='visible';
    }
    else if(shape==='square'){
        init();
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.clearRect(0,0,200,200);ctx.beginPath();
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
        init();
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.clearRect(0,0,200,200);ctx.beginPath();
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
    rs=document.getElementById('result');
    if(shape_global==='circle')
        {
            rs.innerHTML="\n Perimeter of "+shape_global+"="+(2*Math.PI*radius_field.value)+'\n'+"Area of"+shape_global+"="+(radius_field.value*radius_field.value*Math.PI);
        }
    else if(shape_global==='square')
        {
            rs.innerHTML="\n Perimeter of "+shape_global+"="+(4*side.value)+'\n'+"Area of"+shape_global+"="+(side.value*side.value);
        }
    else if(shape_global==='triangle'){
        rs.innerHTML="\n Perimeter of Regular "+shape_global+"="+(3*side.value)+'\n'+"Area of"+shape_global+"="+(side.value*side.value*(1.73/4));
        
    }
    else if(shape_global==='rectangle'){
        rs.innerHTML="\n Perimeter of "+shape_global+"="+(2*(parseInt(base.value)+parseInt(height.value)))+'\n'+"Area of"+shape_global+"="+(base.value*height.value);
        
    }
    else {
        rs.innerHTML="\n Perimeter of Regular "+shape_global+"="+(6*side.value)+'\n'+"Area of"+shape_global+"="+(side.value*side.value*(1.5*1.73/2));
        
    }
    
}