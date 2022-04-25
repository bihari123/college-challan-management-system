<?php

 function load($page="login.php")
{
   $url='http://'.$_SERVER[HTTP_HOST].dirname($_SERVER['PHP_SELF']);
   $url=rtrim($url,'/\\');
   $url.='\''.$page;
   
   header("location:$url");
   exit();
}
function validate($dbc,$u_name="",$pass="")
 {
  $errors=array();
  if(empty($u_name))
  {
    $errors[]="Enter your user name";
   }
  else
  {
    $u=mysqli_real_escape_string($dbc,trim($u_name));
   }
  if(empty($pass))
  {
    $errors[]="Enter your password";
   }
  else
  {
    $p=mysqli_real_escape_string($dbc,trim($pass));
    
   }
  if(empty($errors))
  {
    $q="SELECT a_id FROM admin WHERE user = '$u' AND pass=SHA('$p')";

     $r=mysqli_query($dbc,$q);
    if(mysqli_num_rows($r)==1)
     {
       $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
       return array(true,$row);
     }
    else
     {
       $errors[]="users and password not found";
      }
   }
  else
   {
     return array(false,$errors);
    }
}


