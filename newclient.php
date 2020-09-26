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
       
  <style>
    .pink{
      height:300px;
      background-color:pink;
    }
.blue{
      height:300px;
      background-color:lightblue;
    }
label{
  width:6em;
  float:left;
  text-align: right;
  margin-right:1em;
}
  </style>
}
</head>

<body>
  <div class="container">
<div class = "row" >
<div class="col-6 pink">
<p> <label for="ID">ID:</label> <input type="text" name="ID" id="ID"></p>
<p> <label for="surname">Surname:</label> <input type="text" name="surname" id="surname"></p>
<p> <label for="name">Name:</label> <input type="text" name="name" id="name"></p>
<p> <label for="address">Address:</label> <input type="text" name="address" id="address"></p>



</div>

<div class="col-6 blue">

<p> <label for="code">Code:</label> <input type="text" name="code" id="code"></p>
<p> <label for="tel_h">Tel_H:</label> <input type="text" name="tel_h" id="tel_h"></p>
<p> <label for="tel_c">Tel_C:</label> <input type="text" name="tel_c" id="tel_c"></p>
<p> <label for="email">Email:</label> <input type="text" name="email" id="email"></p>
<p> <label for="reference_id">Reference ID:</label> <input type="text" name="reference_id" id="reference_id"></p>



</div>

</div>  
     </div>

</body>

</html>