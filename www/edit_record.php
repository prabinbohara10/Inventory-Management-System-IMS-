<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
       #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
       .div2{background-color:  yellow;height: 80%;width: 30%;display: block;font-family: HIMALAYA TT FONT;}
       input[type="text"]::placeholder{font-family: HIMALAYA TT FONT;}
       input[type="text"]{font-family: HIMALAYA TT FONT;}
       #select_search_type{font-family: HIMALAYA TT FONT;}
    </style>

    <script type="text/javascript">
    

    
    </script>
</head>
<body>
    <div class="action_completion" id="action_completion" style="display:none;">book</div>



   <div class="div2" id="div2">

      <span class="span3" style="font-family: Arial">Add new work order</span><br>
      <button class="button2"><a href="manage_things.php" target="main_iframe">Back</a></button><br>
        <form method="POST"  autocomplete="off" >
    
        

            <label for="sn">l;=g+=</label><br>
                <input  type="text" name="sn" id="sn" size="25" placeholder="l;=g+="><br>

            <label for="issued_date">ldlt</label><br>
                <input  type="text" name="issued_date" id="issued_date" size="25" placeholder="ldlt"><br>

            <label for="unit">o'lg^ </label><br>
                <input  type="text" name="unit" id="unit" size="25" placeholder="o'lg^" ><br>

            <label for="work_order_no">j=c=g </label><br>
                <input  type="text" name="work_order_no" id="work_order_no" size="25" placeholder="j=c=g" ><br>

            <label for="things_name">pks/)fsf] gfd</label><br>
                <input  type="text" name="things_name" id="things_name" size="25" placeholder="pks/)fsf] gfd">

     <div class="div1" id="div1" >
        

        <select id="select_search_type" onchange="after_select_search()" style="position: relative;left: 20vw;top:-4vh;">
    <?php
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "ems";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql
    $result = $conn->prepare("SELECT * FROM things_only_table");
    $result->execute();
               while ($row = $result->fetch() ){  
                echo "<option value='".$row[0]."'>".$row[0]."</option>";
             }


           }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
    
    ?>
 </select>
        
      
        <br>
        </div><!--end of div1-->

            <label for="quantity">PsfO{</label><br>
                <input  type="text" name="quantity" id="quantity" size="25" placeholder="PsfO{" ><br>

            <label for="set_no">:f]^ g+</label><br>
                <input  type="text" name="set_no" id="set_no" size="25" placeholder=":f]^ g+" ><br>

            <label for="observed_desc">lgl/If)f ljj/)f</label><br>
                <input  type="text" name="observed_desc" id="observed_desc" size="25" placeholder="lgl/If)f ljj/)f" ><br>

            <label for="damage_desc">v/fla ljj/)f</label><br>
                <input  type="text" name="damage_desc" id="damage_desc" size="25" placeholder="v/fla ljj/)f" ><br>

            <label for="maintenance_desc">dd{tsf] ljj/)f</label><br>
                <input  type="text" name="maintenance_desc" id="maintenance_desc" size="25" placeholder="dd{tsf] ljj/)f" ><br>

        <label for="maintenance_date">ag]sf] ldlt</label><br>
        <input  type="text" name="maintenance_date" id="maintenance_date" size="25" placeholder="ag]sf] ldlt" ><br>

        <label for="technician">:fDAflGwt k|fljlws</label><br>
        <input  type="text" name="technician" id="technician" size="25" placeholder=":fDAflGwt k|fljlws" ><br>

        <label for="returned_date">nu]sf] ldlt</label><br>
        <input  type="text" name="returned_date" id="returned_date" size="25" placeholder="nu]sf] ldlt" ><br>

        <label for="status">:^F^;</label><br>
        <input  type="text" name="status" id="status" size="25" placeholder=":^F^;" ><br>


                <input  type="submit" name="submit_name" id="" size="25" placeholder="" value="Save"><br>

            
        </form>
        
    </div><!--end of div2-->
    
   
    <div class="action_completion" id="action_completion" style="display:none;">book</div>
   
   <script src="compressed_jquery_3.5.1.js"></script>
    <script type="text/javascript">

      $(document).ready(function(){
  //for setting values to the text fields:
 document.getElementById('sn').value='<?php echo $_GET['edit_sn'] ;?>';
  document.getElementById('issued_date').value='<?php echo $_GET['edit_issued_date'] ;?>';
  document.getElementById('unit').value="<?php echo $_GET['edit_unit'] ;?>";
  document.getElementById('work_order_no').value='<?php echo $_GET['edit_work_order_no'] ;?>';
  document.getElementById('things_name').value='<?php echo $_GET['edit_things_name'] ;?>';
  document.getElementById('quantity').value='<?php echo $_GET['edit_quantity'] ;?>';
  document.getElementById('set_no').value='<?php echo $_GET['edit_set_no'] ;?>';
  document.getElementById('observed_desc').value='<?php echo $_GET['edit_observed_desc'] ;?>';
  document.getElementById('damage_desc').value='<?php echo $_GET['edit_damage_desc'] ;?>';
  document.getElementById('maintenance_desc').value='<?php echo $_GET['edit_maintenance_desc'] ;?>';
  document.getElementById('maintenance_date').value='<?php echo $_GET['edit_maintenance_date'] ;?>';
  document.getElementById('technician').value='<?php echo $_GET['edit_technician'] ;?>';
  document.getElementById('returned_date').value='<?php echo $_GET['edit_returned_date'] ;?>';
  document.getElementById('status').value='<?php echo $_GET['edit_status'] ;?>';
 
    
  });
</script>

  <?php
if(array_key_exists('submit_name', $_POST)) { 
            function_after_save_button(); 
        }

function function_after_save_button(){
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "ems";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    // prepare sql
    $sql="UPDATE record_table 
    SET sn = '{$_POST['sn']}', issued_date = '{$_POST['issued_date']}', unit = '{$_POST['unit']}', work_order_no = '{$_POST['work_order_no']}', things_name = '{$_POST['things_name']}', quantity = '{$_POST['quantity']}', set_no = '{$_POST['set_no']}',
    observed_desc = '{$_POST['observed_desc']}',damage_desc= '{$_POST['damage_desc']}',
    maintenance_desc= '{$_POST['maintenance_desc']}', maintenance_date= '{$_POST['maintenance_date']}', technician= '{$_POST['technician']}', returned_date= '{$_POST['returned_date']}',
    status= '{$_POST['status']}'

     WHERE sn = '{$_GET['edit_sn']}' AND issued_date = '{$_GET['edit_issued_date']}' AND unit = '{$_GET['edit_unit']}' AND work_order_no = '{$_GET['edit_work_order_no']}' AND things_name = '{$_GET['edit_things_name']}' AND quantity = '{$_GET['edit_quantity']}' AND set_no = '{$_GET['edit_set_no']}' AND
    observed_desc = '{$_GET['edit_observed_desc']}' AND damage_desc= '{$_GET['edit_damage_desc']}' AND
    maintenance_desc= '{$_GET['edit_maintenance_desc']}' AND maintenance_date= '{$_GET['edit_maintenance_date']}' AND technician= '{$_GET['edit_technician']}' AND returned_date= '{$_GET['edit_returned_date']}' AND
    status= '{$_GET['edit_status']}'  ";
 
    



    $conn->exec($sql);
        


 echo " <script>
  var action_var=document.getElementById('action_completion')
  action_var.innerHTML='Record successfully edited.....';
  action_var.style.backgroundColor='orange';
  action_var.style.display='block';
 document.getElementById('div2').style.display='none';

var delayInMilliseconds = 900; 

setTimeout(function() {
window.location.href = 'manage_things.php';
}, delayInMilliseconds);

</script>
    ";

   }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}//end of function_after_save_button:

?>

  
  
  

    </script>



</body>
</html>



