<?php
$date=filter_input(INPUT_POST,'date');
$enddate=filter_input(INPUT_POST,'enddate');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unpaid Invoices</title>
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
      <h1>Unpaid Invoices</h1>
        
        <div style="height:0px;background-color:#b8efbd;"></div>
        <?php
include('DBaccess.php'); 

  if($date!="") {

 $query="SELECT cli.Client_id AS Client_ID, cli.C_name AS NAME, cli.C_Surname AS SURNAME, inv.Inv_num AS INV_NUM, inv.Client_id, inv.Inv_Paid AS STATUS, Inv_Date FROM tblclientinfo cli
INNER JOIN
tblinv_info inv
ON cli.Client_id = inv.Client_id
AND Inv_Paid='N' AND Inv_Date BETWEEN '$date' AND '$enddate'";
 
         $statement=$db->prepare($query);        
                 $statement->execute();
                 $result=$statement->fetchAll();     
         $statement->closeCursor();
}

else{

 $query="SELECT cli.Client_id AS Client_ID, cli.C_name AS NAME, cli.C_Surname AS SURNAME, inv.Inv_num AS INV_NUM, inv.Client_id, inv.Inv_Paid AS STATUS, Inv_Date FROM tblclientinfo cli
INNER JOIN
tblinv_info inv
ON cli.Client_id = inv.Client_id
AND Inv_Paid='N'";

         $statement=$db->prepare($query);
          $statement->execute();
                 $result=$statement->fetchAll();
$statement->closeCursor();
}

?>
    <div class="aboutclient">

<form action="" method="POST" onsubmit="return getDate()">

  <p> From : <input type="date" id="date" name="date" ></p>

  <p>To: <input type="date" id="enddate" name="enddate" >  </p>


  <input type="submit" value= "Search With Date Filters" name="submit">
</form>

<form action="" method="POST"  style="margin:20px;">
  <input type="submit" value= "Clear Search Filters" name="Clear Search Filters">
</form>

<script type="text/javascript">
  function getDate(){

  var date = document.getElementById('date').value;
  var enddate = document.getElementById('enddate').value;

  if (date =="" || enddate =="")
  {
    window.alert("please select start and end dates from the date pickers");
    return false;
  }

}

</script>

</div>

<table style="margin:0 auto;">
<tr>
    <th>Client ID</th>  
    <th>Name</th>
    <th>Surname</th>  
    <th>invoice number</th>  
    <th>status</th>  
    <th>Invoice Date(YYYY-MM-DD)</th>  

   

</tr>
  <?php foreach($result as $client ):?>
  <tr >
      <td><?php echo $client['Client_ID'];?></td>
      <td><?php echo $client['NAME'];?></td>
      <td><?php echo $client['SURNAME'];?></td> 
      <td><?php echo $client['INV_NUM'];?></td> 
      <td><?php echo $client['STATUS'];?></td> 
      <td><?php echo $client['Inv_Date'];?></td> 
       


  </tr>
       <?php endforeach; ?>  
      </table>


<?php
?>
       <!--  <td><?php echo $client['Client ID'];?></td>
      <td><?php echo $client['NAME'];?></td>
      <td><?php echo $client['SURNAME'];?></td> 
      <td><?php echo $client['INV_NUM'];?></td> 
      <td><?php echo $client['STATUS'];?></td> 
       -->

    
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>