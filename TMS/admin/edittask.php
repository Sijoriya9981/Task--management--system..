<?php  
                    include('../connect.php');
                    if(isset($_POST['updatetaskbtn']))
                    {


                      $query2 = "UPDATE task   SET uid = $_POST[id],description ='$_POST[description]',start_date ='$_POST[startdate]',end_date ='$_POST[enddate]'  where tid =$_GET[id]";
                      $query2_run = mysqli_query($con,$query2);
                      if(($query2_run))
                      {
                        echo "  <script  type='text/javascript'>  
                        alert('Update successfully..');
                  
                        window.location.href = 'admindashboard.php';
                        
                        </script>";
                      }
                      else{                                                       
                        echo "  <script  type='text/javascript'>  
                         alert('Something went wrong..... try again');
                         window.location.href = 'managetask.php';
                         
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
                <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
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
    <label for="">Select user:</label>
    <select name="id" id=""  required class="form-control">
        <option >-Select-</option>
        <?php 
                          

        $query1 = "SELECT uid ,name FROM user";
        $query_run1= mysqli_query($con,$query1);
        if(mysqli_num_rows($query_run1))
        {
            while($row1 = mysqli_fetch_assoc($query_run1))
            {
                ?>

                     <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name']; ?></option>
              <?php
            }
        }

        
        ?>
    </select>
</div><br>
<div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control"name="description" id="" rows="5" cols="50"   required><?php  echo $row['description'] ?></textarea>
</div><br>
<div class="form-group">
    <label for="">Start-date:</label>
    <input type="date" name="startdate" id="" class="form-control"   value="<?php  echo $row['start_date'] ?>"  required>
</div><br>
<div class="form-group">
    <label for="">End-date:</label>
    <input type="date" name="enddate" id="" class="form-control"  value="<?php  echo $row['end_date'] ?>"  required>
</div> <br>
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