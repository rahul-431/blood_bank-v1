
<style>
	.collapse a{
		text-indent:10px;
		
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list" sytle="margin:100px;">
				<a href="index.php?page=home" class="nav-item nav-home">Home</a>
				<a href="index.php?page=donors" class="nav-item nav-donors">Donors</a>
				<a href="index.php?page=donations" class="nav-item nav-donations">Blood Donations</a>
				<a href="index.php?page=bloodInventory" class="nav-item nav-bloodInventory">Blood Inventory</a>
				<a href="index.php?page=requests" class="nav-item nav-requests">Requests</a>
				<a href="index.php?page=handedovers" class="nav-item nav-handedovers">Handed Over</a>
				<a href="index.php?page=requesterDetail" class="nav-item nav-requesterDetail">Requester's Details</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users">Users</a>
				<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
