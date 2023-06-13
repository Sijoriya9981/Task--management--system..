<?php

session_start();
include('../connect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>TMS:userdashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <!-- Example Code -->
    
    <nav class="navbar bg-body-tertiary fixed-top usernav">
      <div class="container-fluid">
        <a class="navbar-brand" style="color:white; font-size:1.5rem;" href="userdashboard.php">Task Management System</a>


        <span style="color:white;">Name:  <b><?php   echo  $_SESSION['name'] ; ?></b></span>
        <span style="color:white;">Email:  <b><?php   echo  $_SESSION['email'] ; ?></b></span>        <button class="navbar-toggler" type="button" style="color: #563d7c  ; background-color:white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="createtask.php">Create Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="managetask.php">Manage Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="leaveapplication.php">Leave application</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
              </li>
             
            </ul>
            
          </div>
        </div>
      </div>
    </nav>

<center><h4>All leave application</h4></center>
    <div class="row">
    <div class="col-md-2">
     </div>

      <div class="col-md-8">
        
        <table class="table"   style="background-color:whitesmoke !important;  width:75vw;">
         <tr>

         <th>S.no</th>
         <th>User</th>
         <th>Subject</th>
         <th>Message</th>
         <th>Status</th>
         <th>Action</th>
         </tr>

         <?php 
         $sno =1;
         
         $query = "SELECT * FROM leaves";
         $query_run = mysqli_query($con,$query);
         while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
          <td> <?php   echo  $sno; ?></td>
          <?php  
          
          $query3= "SELECT name from user  where uid = $row[uid]";
          $query3_run =mysqli_query($con,$query3);
          while($row3= mysqli_fetch_assoc($query3_run))
          {
            ?>

            <td>
                <?php  
                  echo  $row3['name'];
                ?>
            </td>
            <?php


          
          }
          
          ?>
          <td> <?php   echo  $row['subject']; ?></td>
          <td> <?php   echo  $row['message']; ?></td>
          <td> <?php   echo   $row['status']; ?></td>
     

          <td>  <button class="btn "><a href="approveleave.php? id=<?php  echo  $row['lid']; ?>">Approve</a> </button>
                 | <button class="btn "><a href="rejectleave.php? id=<?php  echo  $row['lid']; ?>">Reject</a> </button></td>
          </tr>


         <?php
         $sno = $sno+1;
         }
         
         
         ?>

        </table>
      </div>

    </div>
    
    <!-- End Example Code -->
  </body>
</html>