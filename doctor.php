
<?php
include("doctorconnection.php");
session_start();

// $doc="SELECT appointmentdate FROM appointmenttable";
// $result = $conn->query($doc);


// if ($result->num_rows > 0) {
// //     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<br> date: ". $row["appointmentdate"].  "<br>";
//     }
// } 
// exit;
// echo $_POST['dates'];  
// $_REQUEST["id"];
// $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="doctorstrange.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://code.jquery.com/jquery-git.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body >
<form method="post" id="report"  >
<h1 class=" text-3xl text-center"> Doctor appointment</h1>

<div style="margin-bottom:20px;" class="pb-4">
    <label for="dates" class="hello">Appointment Date</label><br>
  <select id="dates" class="select" name="dates" onchange="document.getElementById('report').submit();">
  <!-- <option disabled selected value> -- select an option -- </option> -->
  <option value='2024-02-29' <?php if(!empty($_SESSION['thisday'])){ if(($_SESSION['thisday'] == '2024-02-29')) echo ' selected="selected"';} ?>>2024-02-29</option>
  <option value='2024-03-01' <?php if(!empty($_SESSION['thisday'])){ if(($_SESSION['thisday'] == '2024-03-01')) echo ' selected="selected"';} ?>>2024-03-01</option>
  <option value='2024-03-02' <?php if(!empty($_SESSION['thisday'])){ if(($_SESSION['thisday'] == '2024-03-02')) echo ' selected="selected"';}?>>2024-03-02</option>
  <option value='2024-03-03' <?php if(!empty($_SESSION['thisday'])){ if(($_SESSION['thisday'] == '2024-02-03')) echo ' selected="selected"';} ?>>2024-03-03</option>

</select>
<div class="text-3xl text-green-500 text-center">
<?php

if(!empty($_SESSION['sucess'])){
  echo $_SESSION['sucess'];
}
else{
}
// session_destroy();
?>
</div>
</div>
</div>
</form>

  <?php
  // session_start();

  if(!empty($_SESSION['thisday'])){
    $date=$_SESSION['thisday'];
    // echo "hi";
    echo $date;
  }
  else{
    // echo "bye";
$date='2024-02-29';
  }
  session_destroy();
if(isset($_POST['dates'])){
  $date= $_POST['dates'];
  // echo $date;
  // exit;
  }

  

// while($data=$result->fetch_assoc()){
//  print_r($data);
// //  exit;

// exit;

//  $last=array_pluck($data,'appointmenttime');
//  print_r($last);
//  exit;
//  if ($result->num_rows > 0) {
    // output data of each row
    // print_r($row);
    // while($row = $result->fetch_assoc()) {
    //   print_r($row);
    // // exit;

    // // while($row = $result->fetch_assoc()) {
    //     // echo "<br> personID: ". $row["appointmentdate"]. " - Name: ". $row["appointmenttime"]. " " . $row["patientname"] . "<br>";
    // }
// } 

    
  // }
  // while($row = $result->fetch_assoc()){
  //   print_r($row);
  // }

  // $space = array_column( $row, 'patientname' );
// print_r($space);

  // exit;
  
?>

    <div class="flex justify-between">
      <p class="text-4xl text-blue-500">Day schedule</p>
      <!-- <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex" onclick="openForm()">Open Form</button> -->
      <!-- <a class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex" href='/doctor/doctorform.php' role="button">New appointment</a> -->
    </div>

    <div class="flex justify-end  ">
    <!-- Trigger Button -->
    <button id="openContactForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
      New Appointment
    </button>

    <!-- Modal -->
    <div id="contactFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center bg-black/50  h-[100vh]">
            <div class="bg-gray-300 w-1/2 p-6 rounded shadow-md">
                <div class="flex justify-end">
                    <!-- Close Button -->
                    <button id="closeContactForm" class="text-gray-700 hover:text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <h2 class="text-2xl font-bold mb-4">Patients details</h2>
                <?php
                include("doctorform.php");
                ?>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>

    // JavaScript to toggle the modal
    const openContactFormButton = document.getElementById('openContactForm');
    const closeContactFormButton = document.getElementById('closeContactForm');
    const contactFormModal = document.getElementById('contactFormModal');

    openContactFormButton.addEventListener('click', () => {
        contactFormModal.classList.remove('hidden');
    });

    closeContactFormButton.addEventListener('click', () => {
        contactFormModal.classList.add('hidden');
    });


    </script>




    <div class="grid grid-cols-4 gap-24  text-center border-solid border-2 border-black p-16" >
        
    <?php
    $times=array("09:00:00","09:15:00","09:30:00","09:45:00","10:00:00","10:15:00","10:30:00","10:45:00","11:00:00","11:15:00","11:30:00","11:45:00","12:00:00","12:15:00","12:30:00","12:45:00");
    

//  $sql = "SELECT appointmentdate,appointmenttime FROM appointmenttable";
//  $result = $conn->query($sql);
// $clg="border-2 border-black p-20 text-3xl text-green-500";
$datas=[];
$patname=[];
$sql = "SELECT * FROM appointmenttable WHERE appointmentdate='".$date."'";
$result = $conn->query($sql);
while($row =$result->fetch_assoc()){
  $datas[]=$row["appointmenttime"];
  // $patname[]=$row["patientname"];
  // $patientname[$row["appointmenttime"]] = $row["name"];
  // print_r($patname);
  
  
}
// $patsname=implode($patname);
// exit;
// echo $data;
// exit;
// print_r($datas);
// exit;/

    foreach($times as $time){

      if(in_array($time,$datas)){
        $clg="border-2 border-black p-20 text-2xl text-red-500  bg-red-100 bg-gray-200 p-4 transition duration-300 ease-in-out transform hover:scale-105";
      //  echo $date;
      //  exit;
        // $mercury=[];

         $bpl="SELECT patientname FROM appointmenttable where appointmenttime='".$time."'  AND  appointmentdate='".$date."' ";
        $patnames=$conn->query($bpl);
        $map=$patnames->fetch_assoc();

        // exit;

          // echo "hi";
          $mercury=$map["patientname"];
          $bomb="Name:";
          // echo $map["patientname"];
          // echo "hi";
          // exit;
        
        // print_r($mercury);
        // exit;
      
      }
      else{
        $clg=" bg-gray-200 p-4 transition duration-300 ease-in-out transform hover:scale-105  font-bold text-green-500 ";
        $mercury="The slot is available";
        $bomb="";
      }
    
      // exit;
      // while($row =$result->fetch_assoc()){
      //   // print_r($row);
      //   // echo $row["appointmenttime"];
      //   echo "<br>"; 
      //   // exit; 
      //   // echo $times;
      //   // echo "<br> personID: ". $row["appointmentdate"]. " - Name: ". $row["appointmenttime"]. " " . $row["patientname"] . "<br>"
      //   if($times==$row["appointmenttime"]){ 
      //      echo"hi";
      //     $clg="border-2 border-black p-20 text-3xl text-red-500";
      //     break;
      //   }
      //   echo 'hi';
      //   $clg="border-2 border-black p-20 text-3xl text-green-500";
        
      // // }
      // $url='/doctorform.php?time'=".$time."."$date";
      // <a href="page.php?value1=<?php echo urlencode($value1); 
      ?>

      <a href="doctorform.php?time=<?php echo urlencode($time); ?>& date=<?php echo urlencode($date);?> " target="_blank"><div class="<?=htmlspecialchars($clg);?>
      "> <?php echo $time ;
       echo "<br>";
       echo $bomb;
      echo $mercury;
        ?></div>
        </a>
      <?php
    }
    ?>
        <!-- <div class=" border-2 border-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis vel assumenda, accusantium neque officia nulla cum incidunt deleniti placeat ducimus! Omnis maiores adipisci quibusdam expedita quod nostrum dicta magnam! Ullam.</div>
        <div class=" border-2 border-black p-20"><p>9.45-10.00</p></div>
        <div class=" border-2 border-black">03</div>
        <div class=" border-2 border-black">04</div>
        <div class=" border-2 border-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam corrupti necessitatibus tempora praesentium! Fugiat ut, est obcaecati error aliquam eveniet tempore molestiae vitae sapiente, mollitia aut eligendi deserunt iusto alias.</div>
        <div class=" border-2 border-black">06</div>
        <div class=" border-2 border-black" >07</div>
        <div class=" border-2 border-black">08</div>
        <div class=" border-2 border-black">09</div>
        <div class=" border-2 border-black">10</div>
        <div class=" border-2 border-black">11</div>
        <div class=" border-2 border-black">12</div>
        <div class="grid grid-cols-subgrid gap-4 col-span-3 ">
          <div class="col-start-2 border-2 border-black">13</div>
          <div  class="border-2 border-black">14</div> -->
        </div>
      </div> 
      <!-- <p> hi</p> -->
      


    </body>
</html>

<script>
//       var newDate = new Date();
//   console.log(newDate.getDate());
//   for(var i=0;i<4;i++)
//   {
//     var d1 = new Date(newDate);
//     d1.setDate(d1.getDate() + i);
//     $("#dates").append('<option value="s" >'+d1.getFullYear()+'-'+(d1.getMonth()+1)+'-'+d1.getDate()+'</option>');
//   }

//   $('input[type=""]').click(function(){
//     if ($(this).is(':checked'))
//     {
//       $('dates').submit(function(){
//         alert('form submitted');
//       });
//     }
// });
// (function () {
//     var previous;

//     $("select").on('focus', function () {
//         // Store the current value on focus and on change
//         previous = this.value;
//     }).change(function() {
//         // Do something with the previous value after the change
//         alert(previous);

//         // Make sure the previous value is updated
//         previous = this.value;
//     });
// })();

// // script.js
// function openForm() {
  
//   document.getElementById("myForm").style.display = "block";
// }

// function closeForm() {
//   document.getElementById("myForm").style.display = "none";
// }


  </script>

  
  <?php
// Assuming you have already established a database connection

// Check if the form has been submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the value from the form
//     $value = $_POST['appointmenttime']; // Assuming 'value' is the name of your form field

//     // Query to check if the value already exists
//     $check_query = "SELECT * FROM your_table WHERE your_column = '$value'";
//     $result = mysqli_query($conn, $check_query);

//     // If the query returns any rows, the value already exists
//     if (mysqli_num_rows($result) > 0) {
//         echo "The value already exists in the database.";
//     } else {
//         // Value doesn't exist, proceed with insertion
//         $insert_query = "INSERT INTO your_table (your_column) VALUES ('$value')";
//         if (mysqli_query($conn, $insert_query)) {
//             echo "Value inserted successfully.";
//         } else {
//             echo "Error inserting value: " . mysqli_error($conn);
//         }
//     }
// }
?>

  