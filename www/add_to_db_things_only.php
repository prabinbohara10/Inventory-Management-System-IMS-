<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
       body{font-family: HIMALAYA TT FONT;}
       #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
       .div2{background-color:  yellow;height: 80%;width: 30%;display: none;font-family: HIMALAYA TT FONT;}
       input[type="text"]::placeholder{font-family: HIMALAYA TT FONT;}
       input[type="text"]{font-family: HIMALAYA TT FONT;}
    </style>
</head>

<body>
    <script src="compressed_jquery_3.5.1.js"></script>
    <div class="action_completion" id="action_completion" style="display:none;">book</div>


    <div class="div2" id="div2" style="display: block;">
      <span class="span3" style="font-family: Arial">Add new work order</span><br>
      <button class="button2" onclick="showForm()"><a href="manage_things.php" target="main_iframe">Back</a></button><br>
        <form method="POST" action="add_to_db_things_only.php" autocomplete="off">
    
        

            <label for="new_things_name">l;=g+=</label><br>
                <input  type="text" name="new_things_name" id="new_things_name" size="25" 
                placeholder='g¤of pks/)f n]lVg"xf];\' required><br>




                <input  type="submit" name="submit_name" id="" size="25" placeholder="" value="Save"><br>

            
        </form>
        
    </div><!--end of div2-->

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems";

if(isset($_POST["submit_name"]))
{
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO things_only_table (things_name) 
    VALUES (:v1)");//here v stands for value:

    $stmt->bindParam(':v1', $var1);
    

    // insert a row
    $var1 = $_POST['new_things_name'];

     
    
    $stmt->execute();


    
   
 echo " <script>
 var div22=document.getElementById('div2');
 div22.style.display='none';
  var action_var=document.getElementById('action_completion');
  action_var.innerHTML=' successfully added.....';
  action_var.style.backgroundColor='green';
   $('#action_completion').fadeIn(1);

   var delayInMilliseconds = 900; 
setTimeout(function() {
window.location.href = 'things_only.php';
}, delayInMilliseconds);
  </script>
 ";
    
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

}//end of if check:
?>



</body>
</html>
