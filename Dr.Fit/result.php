<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../registration/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../registration/login.php");
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

	<title>Sole-Fit | Dr.Fit</title>
     
      <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
       <link rel="stylesheet" href="css/animate.css">
       <link rel="stylesheet" href="css/theatre.css">

      <link rel="stylesheet" href="css/drfit.css">
</head>

<body>

     
   <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll animated infinite bounce" id="solefit" href="#page-top">Sole-Fit</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li id="home">
                        <a class="page-scroll" href="../Home/index.php"><i class="fa fa-home" aria-hidden="true"></i>
 Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../Blog/blog.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 Blog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../FoodSwaps/foodswaps.php"><i class="fa fa-coffee " aria-hidden="true"></i>
 FoodSwaps</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../Dietplan/dietplans.php"><i class="fa fa-spoon" aria-hidden="true"></i>
 DietPlans</a>
                    </li>
                    
                     <li id="drf">
                        <a class="page-scroll" href="#"><i class="fa fa-user-md " aria-hidden="true"></i>
 Dr.Fit</a>
                    </li>
                    
                     <li>
                        <a class="page-scroll" href="../Fitspots/fitspots.php"><i class="fa fa-hospital-o " aria-hidden="true"></i>
FitSpots</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll"  href="../Contact/contact.php"><i class="fa fa-phone" aria-hidden="true"></i>
 Contact</a>
                    </li>
                    
                    <li>     
                       <a class="page-scroll"  href="../Registration/index.php"><i class="fa fa-smile-o" aria-hidden="true"></i>
                                     <?php  if (isset($_SESSION['username'])) : 
                                               echo $_SESSION['username'];
                                            else :    
                                                echo "Login";
                                            endif ?>
                        </a>
                  </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>




<img src="img/dr.jpeg" id="resimg">

<?php 
    
     $servername = "localhost";
                $username = "root";
                $password = "adminpassword";
                $dbname = "solefit";
                $conn = mysqli_connect($servername, $username, $password, $dbname); 
    
    ?>


<div class="tips text-center" style="margin-top:12px;">
    
          
<?php 
     
            if(isset($_GET['dr'])) {
          $apple= $_GET['dr'];
        $sql = "SELECT id, disease,cause,prevent from diseases where disease='$apple'";
	        $result = mysqli_query($conn, $sql);
        
                           
                           
    if(mysqli_num_rows($result) > 0){
		while($rows = mysqli_fetch_assoc($result)){
			echo "<h3 style='font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;
    color: #f63;'>"."Food items that cause " . $rows["disease"] .'</h3>';echo"<br>";
			echo "<h4 style='font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;
    color: #000;'>".$rows["cause"].'</h4>';
            echo"<br>";echo"<br>";
            echo "<h3 style='font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;
    color: #f63;'>"."Food items that prevent " . $rows["disease"] .'</h3>';echo"<br>";
            echo "<h4 style='font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;
    color: #000;'>".$rows["prevent"].'</h4>' ;
		}
	}  
    
    
            else
                echo "No results found.";

              }
           
    
	       ?>
     
    
</div>

<style>
    
    img{
        height:200px;
        margin-top:70px;
        padding: 0 500px;
    }
    
    @media(max-width:400px){
        img{
            max-width: 280px;
            padding: 0 0px;
        }
        .tips{
           
            width: 280px;
            
    }
        .tips h4{
            margin-left: 0px;
            padding-left: -200px;
        }
    }
      
    
</style>



<br>
<br>


 <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">&copy; 2018 Sole-Fit</span>
                </div>
                <div class="col-md-4">
                   
                </div>
            </div>
        </div>
    </footer>









	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

     <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
	<script src="js/typeAhead.js"></script>
	<script src="js/typeAheadScript.js"></script>
	<script src="js/theater.min.js"></script>
	<script src="js/theatreScript.js"></script>

</body>

</html>
