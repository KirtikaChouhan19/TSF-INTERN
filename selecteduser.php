<?php
include 'config.php';

if(isset($_POST['submit']))
{
      $send = $_GET['id'];    //sender
      $receive = $_POST['receive'];    //receiver through <select name"receive">
    $amount = $_POST['amount'];

    $q = "SELECT * from user where id=$send";
    $query = mysqli_query($con,$q);
    $q1 = mysqli_fetch_array($query); 

    $q = "SELECT * from user where id=$receive";
    $query = mysqli_query($con,$q);
    $q2 = mysqli_fetch_array($query);



   
    if ($amount < 0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Wrong input! Negative number cannot be transferred")';  
        echo '</script>';
    }


  
   
    else if($amount > $q1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Transaction Failed ! Insufficient Balance")';  
        echo '</script>';
    }
    


    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero Rupees cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $q1['balance'] - $amount;
                $Tquery = "UPDATE user set balance=$newbalance where id=$send";
                mysqli_query($con,$Tquery);
             

                // adding amount to reciever's account
                $newbalance = $q2['balance'] + $amount;
                $Tquery = "UPDATE user set balance=$newbalance where id=$receive";
                mysqli_query($con,$Tquery);
                
                $sender = $q1['name'];
                $receiver = $q2['name'];
                $q = "INSERT INTO transactions (sender, receiver, amount) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($con,$q);
                

                if($query){
                     echo "<script> alert('Transaction Successfull...');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
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
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
         <!-- Bootstrap -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <div class="container">
            <h1 class="display-5 lh-1 text-center" style="color:blue;">Transaction</h1> 
            </div>
        </header>

        <div class="container">
        <?php
                include 'config.php';
                $userid = $_GET['id'];
                $q = "SELECT * FROM  user where id=$userid";
                $result=mysqli_query($con,$q);
                if(!$result)
                {
                    echo "Something went wrong: ".$q."<br>".mysqli_error($con);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>   
        
        <form method="post" name="transaction" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-bordered">
                
                <tr style="color : black;">
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
               
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br>

        <label style="color : black; font-size : 25px;"><b>Transfer Money To:</b></label>
        <select name="receive" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $userid=$_GET['id'];
                $q = "SELECT * FROM user where id!=$userid";
                $result=mysqli_query($con,$q);
                if(!$result)
                {
                    echo "Something went wrong.".$q."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
            <option class="table" value="<?php echo $rows['id'];?>" >
                
                <?php echo $rows['name'] ;?> &nbsp;(Balance: 
                <?php echo $rows['balance'] ;?>) 
           
            </option>
        <?php 
            } 
        ?>
       </select>
       <br><br>
       <label style="color : black; font-size : 25px;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn" style="background-color : #ff9946;" name="submit" type="submit">Transfer</button>
            </div>
        </form>
        </div>
        <br>


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

