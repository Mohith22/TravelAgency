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

  <p class="about" align="center"> </p>
  
  <br>
  <br>
   <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-8" >    <div class="wrapper">
    <form class="form-signin"  method="post">       
      <h2 class="form-signin-heading">Login</h2>
      <br>
       
      <input type="text" class="form-control" name="username" id="username" placeholder="UserName" />
       <br>
        
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" />      
      <br>
       
      <button id="btn" class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>   
    </form>
    
  </div></div>


  </div></div>
      <div class="col-md-2" ></div>
    </div>


<script type="text/javascript" >
   $(document).ready(function() {


    $("#btn").click(function(e){

            e.preventDefault();
            var username=$('#username').val();
            var password=$('#password').val();

            if(username == ""){
              alert("Enter Username!");
            }else{

                $.ajax({
                  url : "login_verify.php",
                  type: "POST",
                  cache: false,
                  data : {username:username, password:password},
                  success: function(data)
                  {
                      //data - response from server
                      var result=trim(data);
                      alert(result);

                  },

              });
          }
          });

      function trim(str){
          var str=str.replace(/^\s+|\s+$/,'');
          return str;
      }
  
 });

  </script>  
  


 
    </body>

</html>