<?php
session_start(); 
require 'connection.php';
include '../head.php';
//include '../css/style.css';
if(!isset($_SESSION['rid']))
{
	header('location:../login.php');
}
else {
	if(isset($_POST['request'])){
		$rid = $_SESSION['rid'];
		$bg = $_POST['bg'];
		$volume=$_POST['volume'];
		// echo $rid." ".$bg." ".$volume;
		?>
		<div class="container" style="margin:100px; box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.8); margin:auto; margin-top:50px;padding:10px;">
		<form action="handleBloodRequest.php" method="post" enctype="multipart/form-data">
        <label for="blood">Blood Group</label>  <br>
		<input type="text" name="blood"  class="form-control mb-3" value="<?php echo $bg ?>" readonly=""><br><br>
        <label for="avolume">Available Volume</label><br>  
		<input type="number" name="avolume" class="form-control mb-3" value="<?php echo $volume ?>"><br><br>
        <label for="newVol">Required Volume</label><br>  
		<input type="number" name="newVol" placeholder="450 ml" class="form-control mb-3"><br><br>
        <input type="hidden" name="receiver" value="<?php echo $rid;?>">
		<input type="hidden" name="rid" value="<?php echo $bg?>">  
		<input type="submit" name="rregister" value="Request" class="btn btn-primary btn-block mb-4"><br><br>
        </form>
		</div>
		<?php
}
}

?>
