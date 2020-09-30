<?php

//two different queries are used to display top 10 clients. The first displays top 10 clients of all time
//and the second displays according to the value in the year selector 
$singleyear=filter_input(INPUT_POST,'year_picker');   
include('DBaccess.php'); 
if($singleyear==""|| $singleyear=="0")
{
  $singleyear="Alltime";
 $query="SELECT
count(I.client_id) AS FREQUENCY,
CONCAT(I.Client_id,' ',C.C_name,' ', C.C_surname) AS CLIENT,
EXTRACT(year from inv_date) AS YEAR

FROM
tblinv_info I, tblclientinfo C
WHERE
I.Client_id = C.Client_id
GROUP BY I.Client_id
ORDER BY count(I.Client_id) desc
LIMIT 10";
 
         $statement=$db->prepare($query);        
                 $statement->execute();
                 $top10=$statement->fetchAll();     
         $statement->closeCursor();
}
else{
 $query="SELECT
count(I.client_id) AS FREQUENCY,
CONCAT(I.Client_id,' ',C.C_name,' ', C.C_surname) AS CLIENT,
EXTRACT(year from inv_date) AS YEAR

FROM
tblinv_info I, tblclientinfo C
WHERE
EXTRACT(year from inv_date) in ($singleyear)
AND
I.Client_id = C.Client_id
GROUP BY I.Client_id
ORDER BY count(I.Client_id) desc
LIMIT 10";
 
         $statement=$db->prepare($query);        
                 $statement->execute();
                 $top10=$statement->fetchAll();     
         $statement->closeCursor();


}








?>

<?php

         
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
      <h1>Top 10 Clients</h1>
        
        <div style="height:0px;background-color:#b8efbd;"></div>
        <?php
include('DBaccess.php'); 

  
//code to populate the select option with years from the invoice information table, so that only years in which sales are made, are displayed, so that the client does not have to guess which years have sales and which don't

 $query="SELECT DISTINCT (EXTRACT(YEAR FROM Inv_Date))AS YEAR FROM tblinv_info ORDER BY YEAR ASC";
 
         $statement=$db->prepare($query);        
                 $statement->execute();
                 $year=$statement->fetchAll();     
         $statement->closeCursor();


?>
    <div class="aboutclient">

<form action="toptenclients.php" method="POST" onsubmit="getDate()">

  <div style="display:inline;">
    <p> Display Top 10 Clients Of Year: </p>
<select name="year_picker" id="year_picker">
<?php foreach($year as $yr ):?>
  
     <option> <?php echo $yr['YEAR'];?>  </option>


  
       <?php endforeach; ?>  


<?php
?>


</select>
  </div>

  <input type="submit" value= "Search With Year Filter" name="submit">
</form>



<form action="" method="POST"  style="margin:20px;">
  <input type="submit" value= "Clear Search Filters" name="Clear Search Filters">
</form>



</div>





<h2 id="currentdisplay"> Currently Displaying Top 10 Clients of <?php echo $singleyear; ?></h2>
<table style="margin:0 auto;">
<tr>
    <th>Client ID & Full Name</th>  
    <th>Frequency of Purchases</th>
    <th>Year</th> 

</tr>
  <?php foreach($top10 as $top10 ):?>
  <tr >
      <td><?php echo $top10['CLIENT'];?></td>   
      <td><?php echo $top10['FREQUENCY'];?></td>   
      <td><?php echo $top10['YEAR'];?></td>   


  </tr>
       <?php endforeach; ?>  
      </table>

    
    </div>
    <script type="text/javascript">
 


</script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>