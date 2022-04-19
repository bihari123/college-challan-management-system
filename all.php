<?php
  require('connect_db.php');
  $q="SELECT * FROM college";
  $r=mysqli_query($dbc,$q);//this is how we run a mysqli query mysqli_query(name_of_database,query)

  if($r)
    {
      echo'<table>
             <caption>RECORD</caption>
             <th>S.No.</th>
             <th>Challan No.</th>
             <th>Name</th>
             <th>Particulars</th>
             <th>Status1</th>
             <th>Status2</th>
             <th>Status3</th>';
      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))//function to return selected table as array['name of the column']
        {
           echo' <tr>'.
                 '<td>'.$row['c_id'].'</td>'.
                 '<td>'.$row['challan'].'</td>'.
                 '<td>'.$row['f_name']." ".$row['l_name'].'</td>'.
                 '<td>'.$row['particular'].'</td>'.
                 '<td>'.$row['status1'].'</td>'.
                 '<td>'.$row['status2'].'</td>'.
                 '<td>'.$row['status3'].'</td>'.
                 '</tr>';
        }
      
      echo "</table>" ;
   }
 else
    {
      
      echo '<p>'.mysqli_error($dbc).'</p>';
     }
 mysqli_close($dbc);// always close the database at the end

                                          
            
