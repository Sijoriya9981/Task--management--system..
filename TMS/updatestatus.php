<?php  
                    include('connect.php');
                    session_start();
                    if(isset($_POST['updatetaskbtn']))
                    {


                      $query2 = "UPDATE task   SET  status = '$_POST[status]'  where tid =$_GET[id]";
                      $query2_run = mysqli_query($con,$query2);
                      if(($query2_run))
                      {
                        echo "  <script  type='text/javascript'>  
                        alert('Update successfully..');
                  
                        window.location.href = 'updatetask.php';
                        
                        </script>";
                      }
                      else{                                                       
                        echo "  <script  type='text/javascript'>  
                         alert('Something went wrong..... try again');
                         window.location.href = 'updatetask.php';
                         
                         </script>";
                       
                       }  
                    }



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>TMS:userdashboard</title>
    <link rel="stylesheet" href="css/style.css">
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
                <a class="nav-link active" aria-current="page" href="updatetask.php">Update Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="applyleave.php">Apply Leave</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="leavestatus.php">Leave Status</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
              </li>
             
            </ul>
            
          </div>
        </div>
      </div>
    </nav>

  <center><h4>Edit Task</h4></center>
  <div class="row">
    <div class="col-md-4">
     </div>
      <div class="col-md-4">
       <?php   
       
       $query = "SELECT * from task where tid = $_GET[id]";
       $query_run = mysqli_query($con,$query);
       while ($row = mysqli_fetch_assoc($query_run)) {
          
     ?> 

<form action="" method="post">

<div class="form-group">
  <input type="hidden" name="id"  class="form-control"  value="" reqiured>
</div>
<div class="form-group">
    <select class="form-control" id="" name="status">
        <option value="">-Select-</option>
        <option value="In_progress">In-Progress</option>
        <option value="Compele">Complete</option>

    </select>
    <br>
</div>
<div class="form-group">
<input type="submit" value="Update" class="btn btn-warning" name= "updatetaskbtn">
</div><br>      

</form>

    <?php 
         


       }
       
       
       ?>

       
      </div>

    </div>
    
    <!-- End Example Code -->
  </body>
</html>