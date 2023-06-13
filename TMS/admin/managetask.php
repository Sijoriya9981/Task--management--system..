<?php  
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

        <span style="color:white;">Email:  <b></b></span>
        <button class="navbar-toggler" type="button" style="color: #563d7c  ; background-color:white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                <a class="nav-link active" aria-current="page" href=".../logout.php">Logout</a>
              </li>
             
            </ul>
            
          </div>
        </div>
      </div>
    </nav>


    <div class="row">
    <div class="col-md-2">
     </div>

      <div class="col-md-8">
        
        <table class="table"   style="background-color:whitesmoke !important;  width:75vw;">
         <tr>

         <th>S.no</th>
         <th>Task Id</th>
         <th>Description</th>
         <th>Start Date</th>
         <th>End Date</th>
         <th>Status</th>
         <th>Action</th>
         </tr>

         <?php 
         $sno =1;
         
         $query = "SELECT * FROM task";
         $query_run = mysqli_query($con,$query);
         while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
          <td> <?php   echo  $sno; ?></td>
          <td> <?php   echo  $row['tid']; ?></td>
          <td> <?php   echo  $row['description']; ?></td>
          <td> <?php   echo   $row['start_date']; ?></td>
          <td> <?php   echo   $row['end_date'];?></td>
          <td> <?php   echo   $row['status']; ?></td>

          <td>  <button class="btn "><a href="edittask.php? id=<?php  echo  $row['tid']; ?>">Edit</a> </button>
                  <button class="btn "><a href="deletetask.php? id=<?php  echo  $row['tid']; ?>">Delete</a> </button></td>
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