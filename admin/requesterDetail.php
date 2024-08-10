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
						<b>Requester's Details</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Full Name</th>
									<th class="">Email</th>
                                    <th>Contact</th>
                                    <th>Blood Group</th>
                                    <th>Address</th>
                                    <th>Approved Blood Request</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $i=1;
								$donations = $conn->query("SELECT rname,remail,rphone,rbg,rcity,count(request_id) as num FROM receivers,blood_request_new where receivers.id=blood_request_new.rid");
								while($row=$donations->fetch_assoc()):								
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo $row['rname'] ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['remail']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['rphone']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['rbg']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['rcity']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['num']; ?></b></p>
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
</script>