<?php
    include 'config.php';
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $q="insert into user(name,email,balance) values('{$name}','{$email}','{$balance}')";
    $result=mysqli_query($con,$q);
    if($result){
               echo "<script> alert('New User Created');
                               window.location='transfermoney.php';
                     </script>";
                    
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Banking System</title>
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
    </head>


    <body id="page-top" style="background-color: #f8f9fa;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="index.php">Nano Bank</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="createuser.php  ">Create User</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="transfermoney.php">Transfer Money </a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="transactionhistory.php">Transaction History</a></li>
                    </ul>
                   
                </div>
            </div>
        </nav>
        

        
        <header class="masthead">
            <div class="container px-4">
            <h1 class="display-3 lh-1 pt-0 pb-3 text-center" style="color:black;">Create a User</h1> 
            </div>
        </header>
    
        <div class="background">
  <div class="container1">
    <div class="screen">
      
      <div class="screen-body">
        <div class="screen-body-item left">
          <img class="img-fluid" src="img/user.jpg" style="border: none; border-radius: 50%;">
        </div>
        <div class="screen-body-item">
          <form class="app-form" method="post">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="Name" type="text" name="name" required>
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="Email" type="email" name="email" required>
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="Balance" type="number" name="balance" required>
            </div>
            <br>
            <div class="app-form-group button">
              <input class="app-form-button" type="submit" value="CREATE" name="submit"></input>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>   
<br> <br><br>


       <!-- Footer-->
        <footer class="bg-black text-center py-3">
            <div class="container px-4">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; 2021. MadeBy <b>Kirtika Chouhan</b></div>
                         <div>All Rights Reserved.</div>
                </div>
            </div>
        </footer>
       
              
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>