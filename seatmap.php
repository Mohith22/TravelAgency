
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> WESTROS TRAVEL</title>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 1.11.1 (Compatible with countdown timer - DO NOT change order of scripts) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="stylesheet.css">
   <link rel="icon" type="image/jpg" sizes="16x16" href="images/logo.jpg">
<script src="seat.js"></script>
<link rel="stylesheet" type="text/css" href="style_sheet.css">

  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WESTROS TRAVEL</a>
    </div>
       <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li><a href="login.php">Sign Up</a></li>
      <li class="active"><a href="login_check.php">Login</a></li> 
      <li><a href="search.php">Search</a></li>
    </ul>
  </div>
</nav>
 </div>  
<br>
 <br>
 <br>
 <br>
 <div class="container">
  </div>
 
  <br>
 <br>
 <br>
<?php
$busid = $_GET['busid'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("TravelAgency", $connection); // Selecting Database from Server
$result = mysql_query("SELECT * FROM bus where BusId=$busid") or die('Unable to run query:');
$counter = mysql_num_rows($result);
if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
echo '<div class="col-md-3"> </div>
      <div class="col-md-6">  
 <div class="demo">
      <div id="seat-map">
      <div class="front">Seat Map</div>         
    </div>
    </div></div>
    <div class="col-md-3"> 
    <div class="booking-details">
      <p>Bus Name: <span> '.$row['BusName'].'</span></p>
      <p>Seat: </p>
      <ul id="selected-seats"></ul>
      <p>Tickets: <span id="counter">0</span></p>
      <p>Total: <b>$<span id="total">0</span></b></p>
          
      <button class="checkout-button" onclick="buyfun()">BUY</button>
          
      <div id="legend"></div>
    </div>
    <div style="clear:both"></div>
   </div>' ;
   }

}

?>
   <script >
     var price = 100; //price
     var mp;
     var busid= <?php echo $busid; ?>;
    var $cart;
    var seats=[];

$(document).ready(function() {

  //var mp;
  
  myfun();    
  
    
});
//sum total money
function recalculateTotal(sc) {
  var total = 0;
  sc.find('selected').each(function () {
    total += price;
  });
     
  return total;
}

function replaceAt(string, index, replace) {
  return string.substring(0, index) + replace + string.substring(index + 1);
}

function myfun1(mp){
   $cart = $('#selected-seats'), //Sitting Area
  $counter = $('#counter'), //Votes
  $total = $('#total'); //Total money
  
  var sc = $('#seat-map').seatCharts({

    map: [  //Seating chart
        mp.substring(0,4),
        mp.substring(4,8),
        mp.substring(8,12),
        mp.substring(12,16),
        mp.substring(16,20),
        mp.substring(20,24),
        mp.substring(24,28),
        mp.substring(28,32),
        mp.substring(32,36),
        mp.substring(36,40)
        
    ],
    naming : {
      top : false,
      getLabel : function (character, row, column) {
        return column;
      }
    },
    legend : { //Definition legend
      node : $('#legend'),
      items : [
        [ 'a', 'available',   'Option' ],
        [ 's', 'unavailable', 'Sold']
      ]         
    },
    click: function () { //Click event
      if (this.status() == 'available') { //optional seat
        $('<li>R'+(this.settings.row+1)+' S'+this.settings.label+'</li>')
          .attr('id', 'cart-item-'+this.settings.id)
          .data('seatId', this.settings.id)
          .appendTo($cart);

          seats.push(this.settings.row*4+this.settings.label);
        $counter.text(sc.find('selected').length+1);
        $total.text(recalculateTotal(sc)+price);
              
        return 'selected';
      } else if (this.status() == 'selected') { //Checked
          //Update Number
          $counter.text(sc.find('selected').length-1);
          //update totalnum
          $total.text(recalculateTotal(sc)-price);
            
          //Delete reservation
          $('#cart-item-'+this.settings.id).remove();
          //optional

          var index =seats.indexOf(this.settings.row*4+this.settings.label);
          if (index > -1) {
              seats.splice(index, 1);
          }
          return 'available';
      } else if (this.status() == 'unavailable') { //sold
        return 'unavailable';
      } else {
        return this.style();
      }
    }
  });
  //sold seat
  sc.find('s.available').status('unavailable');

}
function myfun(){
    $.ajax({
    url: "busseatmap.php",
    type: "POST",
    data: {busid: busid},
    success: function(data){
      //mp=JSON.parse(data);
      //map=mp.Map;
      //window.alert(map);
      mp=data;
      myfun1(data);
      //window.alert(mp);

          },

  });  }

    function buyfun(){
      var nodes=$cart[0].childNodes
      var p=seats;
      var seatnumber="";
      for (var i = 0; i < nodes.length ; i++) {
        var q=(nodes[i]).innerHTML;
        seatnumber=seatnumber+","+q;
      }
      for(var i=0;i<p.length;i++){

        mp=replaceAt(mp,p[i]-1,"s");
        //alert(mp);
              }
              modifystr(mp,seatnumber);
      //alert(nodes[0];
        
    }

    function modifystr(s,seatnumber){
        $.ajax({
          url: "modifymap.php",
          type: "POST",
          data: {str: s, busid: busid,seatnumber: seatnumber},
          success: function(data){
      //mp=JSON.parse(data);
      //map=mp.Map;
      //window.alert(map);
          location.reload();
      //window.alert(mp);

          },

  }); 
    }
   </script> 
</body>

</html>
