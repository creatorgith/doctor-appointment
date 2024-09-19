<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="doctorstrange.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .error {color: #FF0000;}
    </style>
    <?php
if(isset($_GET['time'])){
$time = $_GET['time'];
$date = $_GET['date'];
} 
// echo $time;
// echo $date;
// exit;
    ?>
    
<!-- <script src="https://code.jquery.com/jquery-git.js"></script>ss -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <p class="text-3xl text-center text-red-500">
    Enter you details
    </p>

    <?php

    session_start();
    ?>
    <form action="doctoraction.php" method="POST" class="mac">
        <div class="flex  container justify-center ">
            <div>

       <div style="margin-bottom:20px;">
        <label for="name " class="hello">Patient Name<span style="color:red;">*</span></label>
        <input style="margin-top:10px;" type="text" name="name" id="name" class="padding" value="<?php if(!empty($_SESSION['name'])){
    // echo "hi";
    echo $_SESSION['name'];
    session_destroy();}?>">
        <span class="error " >* 
        <?php if (!empty($_SESSION['nameErr'])){
            echo $_SESSION['nameErr'];
            session_destroy();
        }?></span><br></div>

        <div style="margin-bottom:20px;">
        <label for="gender" class="hello">Gender<span style="color:red;" >*</span></label><br>
        <input style="margin-top:10px;"type="radio" id="male" name="gender"  class="box" value= "male"<?php if(!empty($_SESSION['gender']) == 'male') echo 'checked'; ?>>
        <label for ="male">Male</label>
        <input style="margin-top:10px;"type="radio" id="female" name="gender"  class="box" value=" female" <?php if(!empty($_SESSION['gender']) == 'female') echo 'checked'; ?>>
        <label  for="female">Female</label>
        <span class="error">* <?php if(!empty($_SESSION['genderErr'])) {
        echo $_SESSION['genderErr'];
        }?></span><br>
        </div>
        <div style="margin-bottom:20px;">
        <label for="reason" class="hello">Visiting Reason<span style="color:red;">*</span></label>
        <input style="margin-top:10px;" type="text" name="reason" id="reason" class="padding"  value="<?php if(!empty($_SESSION['real'])){
    // echo "hi";
    echo $_SESSION['real'];
  }?>">
        <span class="error">* <?php if(!empty($_SESSION['reasonErr'])) {
        echo $_SESSION['reasonErr'];
        }?></span><br>
        </div>
        <div style="margin-bottom:20px;">
        <label for ="age" class="hello">Age<span style="color:red;">*</span></label><br>
        <select name="age" id="age" class="select" value="<?php if(!empty($_SESSION['years'])){
    // echo "hi";
    echo $_SESSION['years'];
  }?>">
        <option disabled selected value> -- select an option -- </option>
        <?php
for($i = 1; $i <=70; $i += 1){
     echo("<option value='{$i}'>{$i}</option>");
}			
?>

</select>
<span class="error">* <?php if(!empty($_SESSION['ageErr'])) {
  echo $_SESSION['ageErr'];
}?></span><br>
</div>

</div>
<div  class="pl-10" >
<div style="margin-bottom:10px;">
<label for ="addrs" class="text-2xl font-bold ">Address<span style="color:red;">*</span></label><br>
<textarea style="margin-top:10;"id="addrs" name="addrs" rows="5" cols="40"  value=""><?php if(!empty($_SESSION['house'])){
    // echo "hi";
    echo $_SESSION['house'];
  }?></textarea>
<span class="error">* <?php if(!empty($_SESSION['addrsErr'])) {
  echo $_SESSION['addrsErr'];
}?></span><br>
</div>
<div style="margin-bottom:20px;" class="pb-4">
    <label for="dates" class="hello">Appointment Date</label><br>
  <select id="appointmentdate" class="select" name="dates" >
  <option disabled selected value> -- select an option -- </option>
      <option value="2024-02-29" <?php if(isset($date)){echo ($date == "2024-02-29")  ? ' selected':'';}?>>29-02-2024</option>
     <option value="2024-03-01"   <?php if(isset($date)){ echo ($date == '2024-03-01') ? 'selected' : '';} ?>>01-03-2024</option>
     <option value="2024-03-02" <?php if(isset($date)){echo ($date == '2024-03-02') ? 'selected' : '';} ?>>02-03-2024</option>
     
     <?php

// // Define options for the select tag
// $options = array("29-02-2024", "01-03-2024", "02-03-2024");

// // Output the HTML select tag
// echo '<select name="select">';
// // Option 1
// $selected = ($date == '29-02-2024') ? 'selected' : '';
// echo '<option value="29-02-2024" ' . $selected . '>29-02-2024</option>';
// // Option 2
// $selected = ($date == '02-03-2024') ? 'selected' : '';
// echo '<option value="02-03-2024" ' . $selected . '>02-03-2024</option>';
// // Option 3
// $selected = ($date == '03-03-2024') ? 'selected' : '';
// echo '<option value="03-03-2024" ' . $selected . '>03-03-2024</option>';
// echo '</select>';
// ?>
  </select>
  <span class="error">* <?php if(!empty($_SESSION['datesErr'])) {
        echo $_SESSION['datesErr'];
        }?></span><br>
  </div>
<?php
  if(!empty($time)){?>
    <label for="appointmenttime" class="hello">Appointment Time</label>
    <select name="apptime" id="apptime" class="select" value="">
      <option value="<?php  echo $time;?>"><?php echo $time ?></option>
      <?php
  }
  else{
    ?>
  <div style="margin-bottom:20px;">
    <label for="appointmenttime" class="hello">Appointment Time</label>
    
     <select name="apptime" id="apptime" class="select" value="<?php if(!empty($_SESSION['app'])){
    // echo "hi";
    echo $_SESSION['app'];
  }?>">
     <option disabled selected value> -- select an option -- </option>
     </select>
     <span class="error">* <?php if(!empty($_SESSION['apptimeErr'])) {
        echo $_SESSION['apptimeErr'];
        }
        
        
        ?>
        
      </span>
    </div>

    <?php }
    ?>


    </div>
</div>
<div class="flex justify-center">
  <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </div>
</form>
</body>
</html>
<!-- <script>
      var newDate = new Date();
  console.log(newDate.getDate());
  for(var i=0;i<3;i++)
  {
    var d1 = new Date(newDate);
    d1.setDate(d1.getDate() + i);
    $("#dates").append('<option>'+d1.getFullYear()+'-'+(d1.getMonth()+1)+'-'+d1.getDate()+'</option>');
  }
  </script>
  <script> 

  // let $select = jQuery("#apptime");
    
    // for (let hr = 9; hr <    13; hr++) {

    // let hrStr = hr.toString().padStart(2, "0") + ":";

    // let val = hrStr + "00";
    // $select.append('<option val="' + val + '">' + val + '</option>');

    // val = hrStr + "15";
    // $select.append('<option val="' + val + '">' + val + '</option>')

    // val = hrStr + "30";
    // $select.append('<option val="' + val + '">' + val + '</option>')

    // val = hrStr + "45";
    // $select.append('<option val="' + val + '">' + val + '</option>')

    // }
  -->
<script>
$(document).ready(function() {
  // alert("hi");
    $('#appointmentdate').on('change', function() {
            var dates_id = this.value;
            // alert(dates_id);
              $.ajax({
                url: "appointmenttime.php",
                type: "POST",
                data: {
                    dates_id: dates_id,
                },
                
                success: function(result){
                    $("#apptime").html(result);

                }
            });
        
        
    });    

});
</script>

