<?php
if($_SERVER['REQUEST_METHOD']!="POST")
{
echo'
<html>
 <head>
  <title>LogIN</title>
 </head>
 <body>  
      <form action="index.php" method="POST">
        <p> User:<input type="text" name = "user" required></p>
        <p>Password:<input type="password" name = "pass" required></p>
        <p><input type="submit" ></p>
      </form>
 </body>
 </html>';
}

else
{
  require('tools.php');
  require('connect_db.php');
  $user=$_POST['user'];
  $pass=$_POST['pass'];
 
  if(!empty($user) && !empty($pass))
    {
        list($check,$data)=validate($dbc,$user,$pass);
       if($check)
       
        {if($data['a_id']==1)
          { load('user1.php');}
         else if($data['a_id']=='2')
           {  load("user2.php");}
          else if($data['a_id']=='3')
           {  load("user3.php");}
         }
        else
          { echo $data;}
 }

}
