<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Agenda Display</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/reset.min.css">

  <link rel='stylesheet' href='css/slick.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <header>
  <img src="imgs/logoupn.png" style="left:80px;position:fixed;width:60px;height:auto;padding-top: 18px;" /><h1>UPN "Veteran" Jawa Timur</h1>
 
</header>

<section class="marquee">
<p class="text"><marquee direction="left" scrollamount="5"><?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";

// Create connection
$connd = new mysqli($servername, $username, $password, $dbname);
if ($connd->connect_error) {
    die("Connection failed: " . $connd->connect_error);
}
$sqld = "SELECT * FROM tb_daftar_marquee ORDER BY timestamp DESC";
$resultd = $connd->query($sqld);

if ($resultd->num_rows > 0) {
    // output data of each row
    while($rowd = $resultd->fetch_array()) {
		
        echo '<img src="http://192.168.4.17/agenda/imgs/logoupn.png" width="30px" height="auto"/> <font class="font">'.$rowd["isi"].'</font> '; 
} } else {
    echo "0 results";
} ?><img src="http://192.168.4.17/agenda/imgs/logoupn.png" width="30px" height="auto"/></marquee></p>
</section>


<section class="main-slider">
<?php 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conns = new mysqli($servername, $username, $password, $dbname);
$conna = new mysqli($servername, $username, $password, $dbname);
$connas = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tb_daftar_agenda WHERE jenis_id=2 AND status='Aktif'  ORDER BY agenda_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
		
        ?>
        <div class="item image">
    <span class="loading">Loading...</span>
    
    <figure>
      <div class="slide-image slide-media" style="background-image:url('<?php  echo $row["url"]; ?>');">
        <img data-lazy="<?php echo $row["url"]; ?>" class="image-entity" />
      </div>
      <?php if($rows["isi"]==""){ echo "";}else{ ?>
    <figcaption class="caption"><?php echo $row["isi"]; ?></figcaption> 
    <?php } ?>
      
    </figure>
    
  </div>
  <?php
} } else {
    echo "";
} 


$sqls = "SELECT * FROM tb_daftar_agenda WHERE jenis_id=1 AND status='Aktif' ORDER BY agenda_id ASC";
$results = $conns->query($sqls);

if ($results->num_rows > 0) {
    // output data of each row
    while($rows = $results->fetch_array()) {

 ?>
  <div class="item youtube">
    <iframe class="embed-player slide-media" src="https://www.youtube.com/embed/<?php echo $rows["url"]; ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allowfullscreen></iframe> 
    <?php if($rows["isi"]==""){ echo "";}else{ ?>
    <p class="caption"><?php echo $rows["isi"]; ?></p> <?php } ?>
    
  </div>
  
 <?php  

} }  else {
    echo "";
} 
 ?>

        </section>

<?php
$sqla = "SELECT * FROM tb_daftar_agenda WHERE jenis_id=2 AND status='Aktif'";
$resulta = $conna->query($sqla);
$num_rows = mysqli_num_rows($resulta); 
   
?> 
<input type="hidden" style="position:fixed;z-index:10000;top:50px" id="count" name="count" value="<?php echo $num_rows-1;?>">

<?php
$sqlas = "SELECT * FROM tb_config";
$resultas = $connas->query($sqlas);
if ($resultas->num_rows > 0) {
    // output data of each row
    while($rowas = $resultas->fetch_array()) {
		?>  
		<input type="hidden" style="position:fixed;z-index:10000;top:0" id="dg" name="dg" value="<?php echo $rowas["durasi_gambar"]*60000;?>">	
		<input type="hidden" style="position:fixed;z-index:10000;top:100px" id="dy" name="dy" value="<?php echo $rowas["durasi_youtube"]*60000;?>">		
		<?php 
		} } else {
    echo "";
} 
   
?> 


  <script src='js/jquery-2.2.4.min.js'></script>
<script src='js/slick.min.js'></script>
    <script  src="js/index.js"></script>
    
<div style="right:80px;position:fixed;bottom: 15%;" class="pojok">
 <img style="width:200px;height:auto;" src="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/instagram.png"  />
 </div>
</body>

</html>
