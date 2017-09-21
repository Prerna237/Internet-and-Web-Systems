var user1 = [
    ["School", "Hospital Visit", "Brunch", "Party", "Study"],
    ["TaskMon", "TaskTues", "TaskWed", "TaskThurs", "TaskFri"]
];

function populate() {
    var t=document.getElementById("outerTable");

    user1.forEach(function (array,index) {
        console.log(array+index);
        outputString=getTD(array,index);
        console.log(outputString);
        t.innerHTML+="<tr>"+outputString+"</tr>";
    })
}

function getTD(userID) {
    outputString="";
    var elem=document.getElementById("myData");
    elem.innerHTML="";
    var dataArr=user1[userID-1];
    console.log("Initial data=", dataArr);
    dataArr.map(function anon(theTask) {
        outputString += "<td>" + theTask + "</td>";
    });
    elem.innerHTML+=outputString;
}