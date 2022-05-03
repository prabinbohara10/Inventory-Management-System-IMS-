<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
       #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
    </style>
</head>
<body>

<script src="compressed_jquery_3.5.1.js"></script>
    <div class="action_completion" id="action_completion" style="display:none;">book</div>

<?php

$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "ems";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $delete_sn= $_GET['delete_sn'];
    $delete_issued_date= $_GET['delete_issued_date'];
    $delete_quantity= $_GET['delete_quantity'];
    $delete_set_no=$_GET['delete_set_no'];
    

    // prepare sql
    //$sql="DELETE FROM books_table WHERE book_id=$_POST['delete_book_id'] ";

  $sql = "DELETE FROM record_table WHERE sn='$delete_sn' AND issued_date='$delete_issued_date' AND quantity='$delete_quantity' AND set_no='$delete_set_no' LIMIT 1";
    $conn->exec($sql);
        
 echo " <script>
  var action_var=document.getElementById('action_completion')
  action_var.innerHTML='Record successfully deleted.....';
  action_var.style.backgroundColor='red';
  $('#action_completion').fadeIn(1);
  </script>
 ";
    
        
       

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

<script>
var delayInMilliseconds = 900; 
setTimeout(function() {
window.location.href = 'manage_things.php';
}, delayInMilliseconds);
 
 </script>

</body>
</html>



