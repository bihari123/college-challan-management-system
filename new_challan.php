<?php
  $page_title="Issue a new challan";
  
  $date=date('F j');
  echo '
  <html>
    <body>
      <form action="add.php" method="POST"><!-- send the values to add.php--!>
        <dl>
          <dt>First Name</dt>
            <dd><input type="text" name="fname" required></dd>
          
          <dt>Last Name</dt>
            <dd><input type="text" name="lname" ></dd>

          <dt>Particulars</dt>
            <dd><input type="text" name="part"  required></dd>
   
          <dt>Challan No</dt>
            <dd><input type="text" name="challan" required></dd>
        </dl>
     
       <input type="hidden" name="date" value=" '.$date.' ">
       <input type="submit" value="ADD">
    </form>
  </body>
 </html>';
?>
