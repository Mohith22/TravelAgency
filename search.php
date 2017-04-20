

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Westros Travel </title>
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
      <li><a href="login_check.php">Login</a></li> 
      <li class="active"><a href="search.php">Search</a></li>
     
    </ul>
  </div>

</nav>


 </div>  
 <br>
 <br>
 <br>
 <br>

  <p class="about" align="center"> </p>
  
  <br>
  <br>
   <div class="row">
      <div class="col-md-4" ></div>
      <div class="col-md-8" >    
             
      <form>

        <label for="source">
        <span>Source</span>
        <input id="source" type="text" class="form-control" name="source" placeholder="Where you want to start?" />      
        </label>


        <label for="dest">
        <span>Destination</span>
        <input id="dest" type="text" class="form-control" name="dest" placeholder="Where you want to end?" />      
        </label>

        <label for="button">
        <span> Find Buses</span>
        <button id="btn" class="btn btn-block" type="submit" name="submit">Search</button>       
        </label>

      </form>


       

      
    </div>
    

  </div>
      
    



  


 
    </body>

</html>