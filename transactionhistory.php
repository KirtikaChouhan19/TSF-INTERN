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
        <link href="css/styles.css" rel="stylesheet" />
    </head>


    <body style="background-color : #fddaeb;">
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
                        <li class="nav-item"><a class="nav-link me-lg-3" href="createuser.php">Create User</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="transfermoney.php">Transfer Money </a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="transactionhistory.php">Transaction History</a></li>
                    </ul>
                   
                </div>
            </div>
        </nav>
        <br><br><br><br><br>
        
        <div class="container">
        <h1 class="display-5 lh-1 pt-0 pb-3 text-center" style="color:black;">Transaction History</h1> 

        <div class="table-responsive-sm">
         <table class="table table-hover table-sm table-striped table bordered" style="border-color:black;">
         
            <tr>
                <th class="text-center py-2 colorr">S.No.</th>
                <th class="text-center py-2 colorr">Sender</th>
                <th class="text-center py-2 colorr">Receiver</th>
                <th class="text-center py-2 colorr">Amount</th>
                <th class="text-center py-2 colorr">Date & Time</th>
            </tr>
         
        
        <?php

            include 'config.php';

            $q ="select * from transactions";

            $query =mysqli_query($con, $q);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : black;">
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }

        ?>
       
    </table>    

        </div>
        </div>














      
       
                


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>