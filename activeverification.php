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
<!-- undo till here is no more -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Gui- Display Existing Client and Capture new client</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<!--     <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css"> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../dist/jquery-input-mask-phone-number.js"></script>

    <style>
           
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
        <div style="height:5000px;background-color:#b8efbd;">
            
<!-- client form method post -->

  <div class="aboutclient">
<form action="displayexistingclient.php" method="POST" onSubmit= "return validate();">        
  <div class="container">
<div class = "row" >
<div class="col-6 blue">
<p> <label for="ID">ID:</label> <input type="text" name="ID" id="ID" maxlength="13"></p>
<p class="errorinput" id="iderror"></p>
<p> <label for="surname">Surname:</label> <input type="text" name="surname" id="surname" maxlength="20"></p>
<p class="errorinput" id="surnameerror"></p>
<p> <label for="name">Name:</label> <input type="text" name="name" id="name" maxlength="20"></p>
<p class="errorinput" id="nameerror"></p>
<p> <label for="address">Address:</label> <input type="text" name="address" id="address" maxlength="50"></p>
<p  class="errorinput" id="addresserror"></p>


</div>

<div class="col-6 blue">

<p> <label for="code">Code:</label> <input type="text" name="code" id="code" maxlength="4"></p>
<p class="errorinput" id="codeerror"></p>
<p> <label for="tel_h">Tel_H:</label> <input type="text" name="tel_h" id="tel_h" 
 onkeypress="isInputNumber(event)"></p>
<p class="errorinput" id="tel_herror" ></p>
<p> <label for="tel_c">Tel_C:</label> <input type="text" name="tel_c" id="tel_c" 
	onkeypress="isInputNumber(event)"></p>
<p class="errorinput" id="tel_cerror"></p>
<p> <label for="email">Email:</label> <input type="text" name="email" id="email" maxlength="40"></p>
<p  class="errorinput" id="emailerror"></p>
<p> <label for="reference_id">Reference ID:</label> <input type="text" name="reference_id" id="reference_id"></p>
<p  class="errorinput" id="reference_iderror"></p>


</div>

</div>  
     </div>


  <input type="submit" value="Submit">
</form>

        </div>

         <?php
include('DBaccess.php');

        ?>



</div>
  </div>
  <script src="cleave-phone.i18n.js" type="text/javascript"></script>
  <script src="cleave.js" type="text/javascript"></script>
   
<script>
	new Cleave('#tel_h', {
    delimiters:['(',   ')' ,'-','(' ,')' ,'-'  ,'('   ,')'],
    blocks: [0,3,0,0,3,0,0,4,0],
    uppercase: true
   
});

	new Cleave('#tel_c', {
    delimiters:['(',   ')' ,'-','(' ,')' ,'-'  ,'('   ,')'],
    blocks: [0,3,0,0,3,0,0,4,0],
    uppercase: true
   
});

function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }


	// make single function return true and then return the value to onSubmit and make that file a php file that writes the values to the database
function validate(){



var idNumber=document.getElementById('ID').value;

var regId = /(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(( |-)(\d{4})( |-)([01]8((( |-)\d{1})|\d{1}))|(\d{4}[01]8\d{1}))/;
 var idval=regId.test(idNumber);
if(idval)
{
document.getElementById('iderror').innerHTML="";	
	
}
else{
document.getElementById('iderror').innerHTML="Invalid ID number";
	
	
	
}



																				// name validation

var name=document.getElementById('name').value;
var regname = /[a-zA-Z]/;
 var nameval=regname.test(name);
if(nameval)
{
document.getElementById('nameerror').innerHTML="";	
	
}
else{
document.getElementById('nameerror').innerHTML="Name may only contain Letters !";
	
	
	
}

																				// Surname validation

var surname=document.getElementById('surname').value;
var regsurname = /[a-zA-Z]/;
 var surnameval=regsurname.test(surname);
if(surnameval)
{
document.getElementById('surnameerror').innerHTML="";	
	
}
else{
document.getElementById('surnameerror').innerHTML="Surname may only contain Letters!";

	
	
}

																			      // address validation

var addressval=document.getElementById('address').value;
if(! addressval =="")
{
document.getElementById('addresserror').innerHTML="";	
addressval=true;
	
}
else{
document.getElementById('addresserror').innerHTML="Enter an address";

	addressval=false;
	
}
																					// address validation


var code=document.getElementById('code').value;
if(isNaN(code) || code.length!==4)
{
	document.getElementById('codeerror').innerHTML="Enter 4 Digits";
	var codeval=false;
	
}
else{


	document.getElementById('codeerror').innerHTML=""; 
	var codeval=true;
	
}

																		//telephone validation

var tel_h=document.getElementById('tel_h').value;
if(tel_h.length !==18)
{
	document.getElementById('tel_herror').innerHTML="Enter a valid Telephone number";
	var telval=false;
}
else{


	document.getElementById('tel_herror').innerHTML=""; 
	var telval=true;
	
}

																					//Cellphone validation
var tel_c=document.getElementById('tel_c').value;
if(tel_c.length !==18)
{
	document.getElementById('tel_cerror').innerHTML="Enter a valid Cellphone number";
	var celval=false;
}
else{


	document.getElementById('tel_cerror').innerHTML=""; 
	var celval=true;
	
}














																						// email validation
var email=document.getElementById('email').value;

var emailre = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
 var valemail=emailre.test(email);



if(valemail)
{
	document.getElementById('emailerror').innerHTML="";
	
}
else{


	document.getElementById('emailerror').innerHTML="email is NOT valid"; 
	
}



if(idval && surnameval && nameval && addressval && codeval && telval && celval && valemail){

return true;

}




return false;


}












</script>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="jquery-input-mask-phone-number.min.js"></script>
 <style>
    
.blue{
      height:auto;
      background-color:lightblue;
    }
label{
  width:6em;
  float:left;
  text-align: right;
  margin-right:1em;
}

.errorinput{
	width:auto;
	text-align:right;
	color:red;

}
  </style>

</body>

</html>