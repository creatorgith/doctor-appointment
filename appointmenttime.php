<?php
include("doctorconnection.php");
echo "hi";
	$dates_id = $_POST["dates_id"];
	echo $dates_id;
    echo "hi";
	// exit;
    $shift=[];
    $lava=[];
    $sql="SELECT * FROM appointmenttable where appointmentdate = '".$dates_id."'";
	$result = mysqli_query($conn,$sql);
    while($row =$result->fetch_assoc()){
    $shift[]= $row["appointmenttime"];
    $lava[]=$row["patientname"];
    }
    // print_r($lava);
    // exit;

?>

<option value="">Select Time</option>
<?php
$times=array("09:00:00","09:15:00","09:30:00","09:45:00","10:00:00","10:15:00","10:30:00","10:45:00","11:00:00","11:15:00","11:30:00","11:45:00","12:00:00","12:15:00","12:30:00","12:45:00");
foreach($times as $time){


    if((in_array($time,$shift))){
        $clg="text-red-500 font-bold";
        $ppl="SELECT patientname FROM appointmenttable where appointmenttime='".$time."'  AND  appointmentdate='".$dates_id."' ";
        $pat=$conn->query($ppl);
        $map=$pat->fetch_assoc();
        
          $mars=$map["patientname"];
          $box="Name:";
    }
    
    else{
        $clg="text-green-500  font-bold";
        $mars="The slot is available";
        $box="";
    }
    
      ?>
      <div >
  
      <option value="<?php  echo $time?>" class="<?=htmlspecialchars($clg);?>"> <?php echo $time.' '.$box ;  
    
      echo $mars;
        ?>
        </option></div>
      <?php
    }
    ?>
<!--  -->
// <?php
// }
?>
?>