<?php

// echo $_POST["dates"];
// echo "hi";
// exit;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $rvm="location:/doctor/doctor.php";
    if (empty($_POST["name"])) {
        $_SESSION  ['nameErr'] = "Name is required";
        header($rvm);
      } 
      elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
            $_SESSION['nameErr'] = "Only letters and white space allowed";
    
            // session_destroy();
        }
      else{
        $name = ($_POST["name"]);
      }  
      if(empty($_POST["reason"])){
        $_SESSION['reasonErr']="Reason is required";
        header($rvm);
      }
      else{
        $reason=($_POST["reason"]);
      }

      if (empty($_POST["gender"])) {
        $_SESSION['genderErr'] = "Gender is required";
        header($rvm);
      } else {
        $gender = $_POST["gender"];
      }


      if (empty($_POST["age"])){
        $_SESSION['ageErr']="Age is Required ";
        header($rvm);
      } else {
        $age=$_POST["age"];
      }

      if (empty($_POST["addrs"])){
        $_SESSION['addrsErr']="Address is Required";
        header($rvm);
      } else {
        $addrs=$_POST["addrs"];
      }

      if(empty($_POST["dates"])){
        $_SESSION['datesErr']="Date is Required";
        header($rvm);
      }
      else{
        echo "hi";
        $dates=$_POST["dates"];
        // echo $dates;
        // exit;
      }

      if(empty($_POST["apptime"])){
        $_SESSION['apptimeErr']="appointment time required";
        // header($rvm);
      }
      else{
        $apptime=$_POST['apptime'];
      }
}


include("doctorconnection.php");


if(!empty($name) && !empty($gender) && !empty($age) && !empty($reason)  && !empty($addrs)  &&  !empty($dates)  && !empty($apptime)){  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $value = $_POST['apptime']; 

    $check_query = "SELECT * FROM appointmenttable WHERE  appointmentdate ='$dates' AND appointmenttime = '$value'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['already']= "The slot already filled";
      $_SESSION['name']=$name;
      $_SESSION['gender']=$gender;
      // echo "hi";
      // exit;
      $_SESSION['real']=$reason;
      $_SESSION['years']=$age;
      $_SESSION['house']=$addrs;
      $_SESSION['amd']=$dates;
      $_SESSION['app']=$apptime;
    
      header($rvm);
      //  ?> <script>
      //   alert('hi');
      //  </script>
  <?php  
  } else {
      $sql="INSERT INTO appointmenttable (patientname,gender,visitingreason,age,address,appointmentdate,appointmenttime)
  VALUES ('$name','$gender','$reason','$age','$addrs','$dates','$apptime')";
  if ($conn->query($sql) === TRUE) {
    echo " Submitted New record  successfully";
    header("location:/doctor/doctor.php");
    $_SESSION['sucess']="Submitted sucessfully";
    $_SESSION['thisday']=$dates;
  exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }       
    }
}}
else{
  $_SESSION['name']=$name;
  $_SESSION['gender']=$gender;
  $_SESSION['real']=$reason;
  $_SESSION['years']=$age;
  $_SESSION['house']=$addrs;
  $_SESSION['amd']=$dates;
  echo $_SESSION['amd'];
  // echo "bye";
  // exit;
  $_SESSION['app']=$apptime;

  header($rvm);
}

?>