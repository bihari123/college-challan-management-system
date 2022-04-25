<?php
   require('connect_db.php');
    require('tools.php');
    include('header.html');
  $q="SELECT * FROM college WHERE status3='pending'";
  $r=mysqli_query($dbc,$q);
  echo' <div>
           <table>
             <th>S.No.</th>
             <th>Challan No.</th>
             <th>Name</th>
             <th>Particulars</th>
             <th>Status1</th>
             <th>Status2</th>
             <th>Status3</th>';
 if(mysqli_num_rows($r)==null)
  {
    echo'<b>all challans have been cleared</b><br><br>';
   }
 
 else
  {
  while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
        {
           echo' <tr>'.
                 '<td>'.$row['c_id'].'</td>'.
                 '<td>'.$row['challan'].'</td>'.
                 '<td>'.$row['f_name']." ".$row['l_name'].'</td>'.
                 '<td>'.$row['particular'].'</td>'.
                  '<td>'.$row['status1'].'</td>'.
                  '<td>'.$row['status2'].'</td>'.
                 '<td>'.$row['status3'].' '.'<form action="user3.php" method="POST"><input type="hidden" name="btn_id" value = '.$row['c_id'].'><input type="submit" name=st1 value= "clear"></form> </td>'.
                 
                 '</tr>';
        }
      
      echo "</table>
            </div>
             " ;

   if(isset($_POST['st1']))
     {
        $id=$_POST['btn_id'];
        $q="UPDATE college SET status3='cleared' WHERE c_id='$id' ";
        $r=mysqli_query($dbc,$q);
        if($r)
           {
             load('user3.php');
            }
     }

  }
   
?>    
