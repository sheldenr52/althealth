<?php

$id=filter_input(INPUT_POST,'idnumber');
$surname=filter_input(INPUT_POST,'surname');
$name=filter_input(INPUT_POST,'name');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Gui- Display Existing Client and Capture new client</title>
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
            <div class="container"><a class="navbar-brand" href="#" style="color:rgb(57,149,0);">AltHealth</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mx-auto"></ul>
            </div>
    </div>
    </nav>
    </div>
     <div class="jumbotron" style="text-align:center;">
        <button class="btn btn-primary" type="button" style="margin:20px;" onclick="location.href='displayexistingclient.php';";>Display Existing Client</button>
        <button class="btn btn-primary" type="button" onclick="location.href='addnewclient.php';";>Capture New Client</button>
        <div style="height:0px;background-color:#b8efbd;"></div>
        <?php
include('DBaccess.php');


 $query="select * from tblclientinfo WHERE C_name like ? AND C_surname like ? AND Client_id like ? ORDER BY 
 Client_id ASC";

         $statement=$db->prepare($query);
  $qname= '%'. $name.'%' ;
       $statement->bindParam(1, $qname);
        $qsurname= '%'. $surname.'%' ;
       $statement->bindParam(2, $qsurname);
        
        $qID= '%'. $id.'%' ;
       $statement->bindParam(3, $qID);
        
                 $statement->execute();
                 $result=$statement->fetchAll();
                 $statement->closeCursor();
         
                 echo $name;

?>
    <div class="aboutclient">
<form action="#" method="POST">
  <label >ID</label>
  <input type="text" name="idnumber" value="<?php echo $id?>"><br>
  <label>Surname</label>
  <input type="text" name="surname" value="<?php echo $surname?>"><br>
  <label >Name</label>
  <input type="text" name="name" value="<?php echo $name?>"><br><br>
  <input type="submit" value="Search For Clients">
</form>
</div>

<table>
<tr>
    <th>Client ID</th>  
    <th>Name</th>
    <th>Surname</th>  
    <th>Address</th>  
    <th>Code</th>  
    <th>Tel Home</th>  
    <th>Tel Work</th>  
    <th>Cel</th>  
    <th>Email</th>  
    <th>Reference</th>  

</tr>
  <?php foreach($result as $client ):?>
  <tr >
      <td><?php echo $client['Client_id'];?></td>
      <td><?php echo $client['C_name'];?></td>
      <td><?php echo $client['C_surname'];?></td> 
      <td><?php echo $client['Address'];?></td> 
      <td><?php echo $client['Code'];?></td> 
      <td><?php echo $client['C_Tel_H'];?></td> 
      <td><?php echo $client['C_Tel_W'];?></td> 
      <td><?php echo $client['C_Tel_C'];?></td> 
      <td><?php echo $client['C_Email'];?></td> 
      <td><?php echo $client['Reference_ID'];?></td> 

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