<?php
include('DBaccess.php');
$id=filter_input(INPUT_POST,'idnumber');
$surname=filter_input(INPUT_POST,'surname');
$name=filter_input(INPUT_POST,'name');
$address=filter_input(INPUT_POST,'address');
$code=filter_input(INPUT_POST,'code');
$C_Tel_H=filter_input(INPUT_POST,'C_Tel_H');
$C_Tel_W=filter_input(INPUT_POST,'C_Tel_W');
$C_Tel_C=filter_input(INPUT_POST,'C_Tel_C');
$Email=filter_input(INPUT_POST,'Email');
$Reference_id=filter_input(INPUT_POST,'Reference_id');

 ///messed this up
     
        if(strlen($id)==13){
     
         
         
         $query='INSERT INTO tblclientinfo(Client_id, C_name, C_Surname, Address, Code, C_Tel_H, C_Tel_W, C_Tel_C, Email, Reference_id) VALUES(:Client_id, :C_name, :C_Surname, :Address, :Code, :C_Tel_H, :C_Tel_W, :C_Tel_C, :Email, :Reference_id)';
                   
 // $query='INSERT INTO tblclientinfo(Client_id, C_name, C_Surname) VALUES(:Client_id, :C_name, :C_Surname)';
                   


         $add=$db->prepare($query);
         $add->bindValue(':Client_id',$id);
                 $add->bindValue(':C_name',$name);
                 $add->bindValue(':C_Surname',$surname);
                 $add->bindValue(':Address',$address);
                 $add->bindValue(':Code',$code);
                 $add->bindValue(':C_Tel_H',$C_Tel_H);
                 $add->bindValue(':C_Tel_W',$C_Tel_W);
                 $add->bindValue(':C_Tel_C',$C_Tel_C);
                 $add->bindValue(':Email',$Email);
                 $add->bindValue(':Reference_id',$Reference_id);

                 $add->execute();
                 $add->closeCursor();
       

         
        }
    



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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../dist/jquery-input-mask-phone-number.js"></script>

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
        <div style="height:auto;background-color:#b8efbd;">
            
  <div class="aboutclient">
<form action="#" method="POST">
  <label >ID</label>
  <input type="text" name="idnumber" value="<?php echo $id?>"><br>
  <label>Surname</label>
  <input type="text" name="surname" value="<?php echo $surname?>"><br>
  <label >Name</label>
  <input type="text" name="name" value="<?php echo $name?>"><br><br>
   <label >Address</label>
  <input type="text" name="address" value="<?php echo $address?>"><br><br>
   <label >Code</label>
  <input type="text" name="code" value="<?php echo $code?>"><br><br>
   <label >Tel_H</label>
  <input type="text" name="C_Tel_H" value="<?php echo $C_Tel_H?>"><br><br>
  
   <label >Tel_W</label>
  <input type="text" name="C_Tel_W" value="<?php echo $C_Tel_W?>"><br><br>
  
 <label >Tel_C</label>
  <input type="text" name="C_Tel_C" value="<?php echo $C_Tel_C?>"><br><br>
  
 <label >Email</label>
  <input type="text" name="Email" value="<?php echo $Email?>"><br><br>
   <label >Reference ID</label>
  <input type="text" name="Reference_id" value="<?php echo $Reference_id?>"><br><br>




  <input type="submit" value="Submit">
</form>

        </div>

         <?php
include('DBaccess.php');

        ?>



</div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="jquery-input-mask-phone-number.min.js"></script>
</body>

</html>