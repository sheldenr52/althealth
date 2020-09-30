<?php
$filename=filter_input(INPUT_POST,'file');
$connection = mysqli_connect('localhost','root','root','althdb');
$filename = "data\\$filename";
$handle = fopen($filename,"r+") or die("file not found");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  // if($result){
  //     echo '<tr><td><br></td></tr>';
  //     echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
  //     echo '<tr><td><br></td></tr>';
  // }
}
fclose($handle);
echo 'Successfully imported';
echo "<br>";
echo '<a href="index.html">OK</a>';
?>