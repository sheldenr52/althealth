<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low Stock Levels</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

     <style>
            label{
                color:red;
                width:60px;
                text-align: right;
                margin:10px;
                }
        th,td{
           border:solid 1px black;
           padding:10px;
        }
        </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="misreports.html" style="color:rgb(57,149,0);">Back To MisReports</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mx-auto"></ul>
            </div>
    </div>
    </nav>
    </div>
     <div class="jumbotron" style="text-align:center;">
              
        <div style="height:0px;background-color:#b8efbd;"></div>
        <?php
include('DBaccess.php'); 


 $query="SELECT
S.Supplement_id AS SUPPLEMENT,
CONCAT(S.SUPPLIER_ID,'',C.Contact_Person,'',C.Supplier_Tel) AS SUPPLIER_INFO,
S.Min_levels AS MIN_LEVELS,
S.Current_stock_levels AS CURRENT_STOCK
FROM tblsupplements S, tblsupplier_info C
WHERE Current_stock_levels < Min_levels
AND S.Supplier_ID = C.Supplier_ID
ORDER BY S.Supplier_ID";

         $statement=$db->prepare($query);
          $statement->execute();
                 $result=$statement->fetchAll();
$statement->closeCursor();


?>
    <div class="aboutclient">
<h1>Supplements That Are Low in Stock</h1>
</div>

<table style="margin:0 auto;">
<tr>
    <th>Supplement Id</th>  
    <th>Supplier Info</th>
    <th>Minimum Levels</th>
    <th>Current Stock Levels</th>


    
   

</tr>
  <?php foreach($result as $client ):?>
  <tr >
      <td><?php echo $client['SUPPLEMENT'];?></td>
      <td><?php echo $client['SUPPLIER_INFO'];?></td>
      <td><?php echo $client['MIN_LEVELS'];?></td>
      <td><?php echo $client['CURRENT_STOCK'];?></td>



  </tr>
       <?php endforeach; ?>  
      </table>


<?php
?>
    
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>