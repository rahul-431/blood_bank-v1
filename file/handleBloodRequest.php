<?php 
    require 'connection.php';
    
    if(isset($_POST['rregister']))
    {
        $rid=$_POST['receiver'];
        $bg=$_POST['blood'];
        $avolume=$_POST['avolume'];
        $requiredVolume=$_POST['newVol'];
        date_default_timezone_set("Asia/Kathmandu");
        $newdate=date("g:i A l jS F Y");
        
        // echo $rid;
        if($requiredVolume<=$avolume){    
             $sql="INSERT INTO blood_request_new(blood_group,volume,status,rid,request_date) VALUES ('$bg','$requiredVolume',0,'$rid','$newdate')";
            echo $sql;//////
            if ($conn->query($sql) === TRUE) {
                $msg = 'You have requested for blood group '.$bg.'.After Approval your request go and take your blood within 2 hours.';
                header( "location:../sentrequest.php?msg=".$msg);
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
                header( "location:../abs.php?error=".$error );
            }
            $conn->close();
        }
        else{
            $error = "Available volume is less than required volume";
            header( "location:../abs.php?error=".$error );
        }
    }