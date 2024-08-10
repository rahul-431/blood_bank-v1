<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['rid']))
  {
  header('location:login.php');
  }
  else {
    $rid = $_SESSION['rid'];
    $sql = "select * from blood_request_new where rid='".$rid."'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Sent Requests"; ?>
<?php require 'head.php'; ?>
<body>
	<?php require 'header.php'; ?>
	<div class="container cont">

		<?php require 'message.php'; ?>

	<table class="table table-responsive table-striped rounded mb-5">
		<tr><th colspan="8" class="title">Sent requests</th></tr>
		<tr>
			<th>#</th>
			<th>Blood Group</th>
			<th>Volume</th>
			<th>Requested Date</th>
			<th>Approved Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">You have not requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr>
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['blood_group'];?></td>
			<td><?php echo $row['volume'];?></td>
			<td class="">
					<p> <b><?php echo $row['request_date'] ?></b></p>
			</td>
			<td class="">
					<p> <b><?php echo $row['approved_date'] ?></b></p>
			</td>
			<td><?php if($row['status']==1){echo "Approved";}else{echo "Not Approved";}?></td>
			<td><?php if($row['status'] == 1){ 
				?>
				<a href="file/cancel.php?reqid=<?php echo $row['request_id'];?>" class="btn btn-danger disabled">Cancel</a>
			<?php }
			else{ ?>
				<a href="file/cancel.php?reqid=<?php echo $row['request_id'];?>" class="btn btn-danger">Cancel</a>
			<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>