<?php

  include('../connect.php');
  $query2 = "Update leaves SET  status = 'Reject'  where lid =$_GET[id]";
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
     window.location.href = 'leaveapplication.php';
     
     </script>";
   
   }  
?>