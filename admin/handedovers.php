<?php include('db_connect.php');?>

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
						<b>List of Handed Over Requests</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
								<th class="text-center">SN</th>
									<th class="">Requester Name</th>
									<th>Contact</th>
									<th>Address</th>
									<th class="">Requested Blood Group</th>
									<th class="">Volume(ml)</th>
									<th>Request Date</th>
									<th>Approved By</th>
									<th>Approved Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$handovers = $conn->query("select receivers.id,rname,rphone,rcity,blood_group,volume,request_date,approved_date,approved_by,status from receivers,blood_request_new where receivers.id=blood_request_new.rid and status=1");
								while($row=$handovers->fetch_assoc()):
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
									<td><p><b><?php echo $row['approved_by']?></b></p></td>
									<td class="">
										 <p> <b><?php echo $row['approved_date'] ?></b></p>
									</td>
								</tr>
								<?php endwhile; ?>
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
	
	$('#new_handover').click(function(){
		uni_modal("New handover","manage_handover.php","mid-large")
		
	})
	$('.edit_handover').click(function(){
		uni_modal("Manage handover Details","manage_handover.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_handover').click(function(){
		_conf("Are you sure to delete this handover?","delete_handover",[$(this).attr('data-id')])
	})
	
	function delete_handover($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_handover',
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