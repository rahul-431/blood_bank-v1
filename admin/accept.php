<?php
include "db_connect.php";
    $reqid=$_GET['reqid'];
	$status = 1;
    $admin=$_GET['adminName'];
    $neededVolume=$_GET['neededVolume'];
    $bg=urlencode($_GET['bg']);
    date_default_timezone_set('asia/kathmandu');
    $date=date("g:i A l jS F Y");
    $remail=$_GET['remail'];

	$sql = "update blood_request_new SET status = '$status',approved_date='$date',approved_by='$admin' WHERE request_id = '$reqid'";
    $query="update blood_inventory_new set volume=(select volume from blood_inventory_new where blood_group='$bg')-$neededVolume where blood_group='$bg'";
    $rs1= mysqli_query($conn,$query);
    $rs2=mysqli_query($conn, $sql); 
    //echo $query;
    if($rs1 && $rs2)
    {
	//$msg="Request approved successfully.";
	//echo $msg;
   // $message="Your blood Request has been approved <br> Please get your Blood from blood bank within 2 hours <br> Thank you <br> Hetauda Blood Bank";
    //$subject="Approved blood request!";
    //mail($remail,$subject,$message);   
    header("Location:index.php?page=requests") ;
    }
    else {
    $error= "Error changing status: " . mysqli_error($conn);
        echo $error;
}
mysqli_close($conn);
?>