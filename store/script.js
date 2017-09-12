var selected_items;
var cost_items;

function loadPage() {
    var sum=0;
    for (var index = 0; index < cost_items.length; index++) {
        sum=sum+cost_items[index]
    }

    var content = `<!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
          crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
          crossorigin="anonymous"></script>
      <link rel="stylesheet" href="style.css">
      <script src="script.js"></script>
      <script>
          $(function () {
              $('[data-toggle="popover"]').popover()
              $('.carousel').carousel()
          })
  
          var totalAmt = 10;
      </script>
  
      <title>Document</title>
  </head>
  
  <body>
      <!-- Top Banner with the cart icon -->
      <nav class="navbar-brand container-fluid mt-0 mb-0">
  
          <img src="res/icon.png" width="60" height="60" class="align-top" alt="">
          <br\>
              <span class="align-text-middle text-left" style="height:70;font-size:3rem;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">BagDown</span>
  
              <button class="navbar-toggler" type="button" onclick="javascript:putAmount(totalAmt)" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                  aria-controls="navbarToggleExternalContent" aria-label="Toggle navigation" style="float:right;">
              
            </button>
      </nav>
  
      <div class="bg-dark p-4 mt-2" >
      <h4 class="text-white">Items in Cart are:</h4>
      <div class="card" style="padding:1.5rem">
          <ul class="list-group list-group-flush" id="list">
          </ul>
      </div>
        </div>
        <div class="bg-dark p-4" >
        <h4 class="text-white" id="amt_div"> </h4>
        <script>
        document.getElementById("amt_div").innerHTML='Total Amount= Rs.'+${sum}
    </script>
      </div>
  
      <script>
      generateBillItems()
      </script>
      
  </body>
  
  </html>`

    document.write(content);
}

function putAmount(array) {
    cost_items = array;
    console.log("cost_funct length", array.length)
    var count;
    var sum = 0;
    for (count = 0; count < array.length; count++) {
        console.log("Current Count : " + array[count]);
        sum = sum + array[count];
    }
    document.getElementById("total").innerHTML = 'Rs. ' + sum + '<br\>'
}

function function1() {
    var ul = document.getElementById("list");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode("Four"));
    ul.appendChild(li);
}

function addItem(array_name, array_cost, selected_item_name, cost_of_item) {
    alert("Added " + selected_item_name + ' to cart')
    array_name[array_name.length] = selected_item_name
    array_cost[array_cost.length] = cost_of_item
    console.log("The items are:", array_name)
    console.log("The costs are:", array_cost)
    selected_items = array_name
    cost_items = array_cost
}


function generateBillItems() {
    console.log("In generate Bill Items    ", selected_items)
    var ul = document.getElementById("list");
    var i;
    for (i = 0; i < selected_items.length; i++) {
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(selected_items[i] + "   " + "Rs." + cost_items[i]));
        ul.appendChild(li);
    }


}