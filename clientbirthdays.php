<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthdays</title>
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
Client_id, CONCAT(C_name,'',C_surname) AS CLIENT
FROM tblclientinfo
WHERE
SUBSTRING(Client_id,3,2) = EXTRACT(MONTH FROM CURRENT_DATE)
AND
SUBSTRING(Client_id,5,2) = EXTRACT(DAY FROM CURRENT_DATE)";

         $statement=$db->prepare($query);
          $statement->execute();
                 $result=$statement->fetchAll();
$statement->closeCursor();


?>
    <div class="aboutclient">
<h1>The Following Clients Have Birthday's Today</h1>
</div>

<table style="margin:0 auto;">
<tr>
    <th>Client Name</th>  
    <th>Client ID</th>
    
   

</tr>
  <?php foreach($result as $client ):?>
  <tr >
      <td><?php echo $client['Client_id'];?></td>
      <td><?php echo $client['CLIENT'];?></td>



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