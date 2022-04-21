<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
 require('tools.php');
 require('connect_db.php');
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $part=$_POST['part'];
 $challan=$_POST['challan'];
 
 
 
 if(!isset($fname))// to check if the fname variable is not empty
  {
    $error="Enter the first name";
  }
  
 else if(!isset($part))
  {
    $error="Enter the particulars ";
  } 
 
 elseif(!isset($challan))
  {
    $error="Enter the challan";
  }
 
 if(empty($error))
  {
    $q="INSERT INTO college (f_name,l_name,challan,particular,status1,status2,status3,date) VALUES  
               ('$fname','$lname','$challan','$part','pending','pending','pending',NOW())";
    
    $r=mysqli_query($dbc,$q);
    
    if($r)
      {
        load('new_challan.php');
       }
    else
      {
        mysqli_error();
      }
  }
  else
  {
    
      
          echo $error;
       
  }
 
  mysqli_close($dbc);
}

 
