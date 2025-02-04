<html>
<head>
    <title>Export Data to Excel in Codeigniter using PHPExcel</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
 <div class="container box">
  <h3 align="center">Export Data to Excel in Codeigniter using PHPExcel</h3>
  <br />
  <div class="table-responsive">
   <table class="table table-bordered">
    <tr>
     <th>ID</th>
     <th>FULLNAME</th>
     <th>GENDER</th>
     <th>BIRTHDATE</th>
     <th>ADDRESS</th>
    </tr>
    <?php
    foreach($employee_data as $row)
    {
     echo '
     <tr>
      <td>'.$row->e_id.'</td>
      <td>'.$row->e_fullname.'</td>
      <td>'.$row->e_gender.'</td>
      <td>'.$row->e_birthdate.'</td>
      <td>'.$row->e_address.'</td>
     </tr>
     ';
    }
    ?>
   </table>
   <div align="center">
    <form method="post" action="<?php echo base_url(); ?>export/action">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>
   <br />
   <br />
  </div>
 </div>
</body>
</html>