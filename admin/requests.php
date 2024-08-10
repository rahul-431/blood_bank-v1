<?php include('db_connect.php');
$id=$_SESSION['login_id'];
$sql1="select name from users where id='".$id."'";
$query1=mysqli_query($conn,$sql1);
$name=mysqli_fetch_array($query1);
?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Requests</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">SN</th>
									<th class="">Requester Name</th>
									<th>Contact No.</th>
									<th>Address</th>
									<th class="">Blood Group</th>
									<th class="">Volume Needed(ml)</th>
									<th>Request Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$sql="select receivers.id,status,remail,rname,blood_group,volume,request_date,request_id,rphone,rcity from receivers,blood_request_new where receivers.id=blood_request_new.rid and status=0";
								$query=mysqli_query($conn,$sql);
								if($query)
								{
									if(mysqli_num_rows($query)>0)
								{								
									while($row=mysqli_fetch_array($query))
									{
										?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo $row['rname'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['rphone'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['rcity'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['blood_group'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['volume'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['request_date'] ?></b></p>
									</td>
									<td><?php 
									if($row['status'] == 1){ ?> <a href="" class="btn btn-success disabled">Approved</a> <?php }
									else{ ?>
										<form action="accept.php" method="get">
											<input type="hidden" name="bg" value="<?php echo $row['blood_group'] ?>">
										</form>
										<a href="accept.php?adminName=<?php echo $name['name'];?>&reqid=<?php echo $row['request_id'];?>&neededVolume=<?php echo $row['volume'];?>&remail=<?php echo $row['remail'];?>&bg=<?php echo ($row['blood_group'])?>" class="btn btn-success">Approve</a>
									<?php } ?>
									</td>
								</tr>
								<?php	
									}
								}
								}
		
								 ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_request').click(function(){
		uni_modal("New request","manage_request.php","mid-large")
		
	})
	$('.edit_request').click(function(){
		uni_modal("Manage request Details","manage_request.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_request').click(function(){
		_conf("Are you sure to delete this request?","delete_request",[$(this).attr('data-id')])
	})
	
	function delete_request($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_request',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>