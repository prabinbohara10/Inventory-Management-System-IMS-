<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="compressed_jquery_3.5.1.js"> </script>

<!--these two files are custom jquery and custom css for nepali date picker-->
<script type="text/javascript" src="jquery/nepali_date_picker.js"> </script>
<link rel="stylesheet" href="css/nepali_date_picker.css">
    <style type="text/css">
       #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
    .div2{background-color:  yellow;height: 80%;width: 30%;display: none;font-family: HIMALAYA TT FONT;
       }
       .side_bar_div{background-color:  blue;height: 20%;width: 30%;position: absolute;left: 50vw;top: 10vh;}
       input[type="text"]::placeholder{font-family: HIMALAYA TT FONT;}
       input[type="text"]{font-family: HIMALAYA TT FONT;}
       #set_desc_div input[type="text"]{position: relative;left:0vw;top: -5vh;}
       #set_desc_div textarea{position: relative;left: -1vw;height: 10vh;width: 25vw;font-family: HIMALAYA TT FONT;}
       #set_desc_div textarea:nth-child(3){position: relative;left: -2vw;height: 10vh;width: 25vw;}
       
       #select_search_type{font-family: HIMALAYA TT FONT;}
       #set_desc_div{background-color: green;width: 100vw;font-family: HIMALAYA TT FONT;}
       td{width: 25vw;text-align: center;border: 0.1vw white solid;}
       tr td:nth-child(1){width: 15vw;}
    </style>

    <script type="text/javascript">
        function after_select_search() {
          var current_select_type=document.getElementById('select_search_type').value;
          document.getElementById('things_name').value=current_select_type;
        }//after_select_search() function:
    </script>
</head>

<body>
    <script src="compressed_jquery_3.5.1.js"></script>
    <script type="nepali_date_picker.js"></script>
    <div class="action_completion" id="action_completion" style="display:none;">book</div>


    <div class="div2" id="div2" style="display: block;">
      <span class="span3" style="font-family: Arial">Add new work order</span><br>
      <button class="button2"><a href="manage_things.php" target="main_iframe">Back</a></button><br>
        <form method="POST" action="add_to_db.php" autocomplete="off" >
    
        

            <label for="sn">l;=g+=</label><br>
                <input  type="text" name="sn" id="sn" size="25" placeholder="l;=g+="><br>

            <label for="issued_date">ldlt</label><br>
                <input  type="text" name="issued_date" id="issued_date" size="25" 
                placeholder="ldlt"><br>
                

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

        <div id="set_desc_div">
            
                <table>
                    <tr>
                        <td >:f]^ g+</td>
                        <td>lgl/If)f ljj/)f</td>
                        <td>v/fla ljj/)f</td>
                    </tr>
                </table>
        </div><!--end of set_desc_div-->
            <input  type="submit" name="submit_name" id="" size="25" placeholder="" value="Save"><br>

    </form>
        
    </div><!--end of div2-->

    <div class="side_bar_div" id="side_bar_div">
        <button class="side_bar_buttons">Add new Unit</button>
        <button class="side_bar_buttons">Add new Equipement</button>

    </div>
    <script type="text/javascript" src="jquery/nepali_date_picker.js"> </script>
    <link rel="stylesheet" href="css/nepali_date_picker.css">
  <script type="text/javascript">

  var currentDate = new Date();
    var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
  var today_date = calendarFunctions.bsDateFormat("%y.%m.%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
  $("#issued_date").val(today_date);
  $("#issued_date").nepaliDatePicker({
    dateFormat: "%y.%m.%d",
    closeOnDateSelect: true
  });
  
  
  </script>


<script type="text/javascript">
//live search using jquery:
$(document).ready(function(){
    document.getElementById('sn').value="<?php echo $_GET['previous_sn']+1;?>"    

//for keyup except back_space:
$('#quantity').on("keyup input", function(){
  console.log('ok');
  var set_desc_div=$('#set_desc_div');
  var input_value = $(this).val();
  $('.div_to_remove').remove();
  if(input_value.length){
      for (var i = 1; i <= input_value; i++) {
         
     $('<div class="div_to_remove"> <input type="text"  name="set_no' + i +'"  id="set_no' + i +'"  size="23" placeholder=":f]^ g+"> </input>                                                                               <textarea  name="observed_desc' + i +'"  id="observed_desc' + i +'"  size="40" placeholder="lgl/If)f ljj/)f"></textarea>                                                    <textarea  name="damage_desc' + i +'"  id="damage_desc' + i +'"  size="40" placeholder="v/fla ljj/)f" ></textarea> </div>').appendTo(set_desc_div);            
                }//end of for loop:
                }else{}//end of else part:

  });//end of key-up function.
});//end of document ready function.
</script>




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
    $total_quantity=$_POST['quantity'];
    if($total_quantity=='')
      {$total_quantity=1;
        $handle_zero_quantity=1;
      }
      else
        {$handle_zero_quantity=0;}
    $sn=$_POST['sn'];
    for ($i=1; $i <=$total_quantity ; $i++) { 
       
    
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO record_table (sn, issued_date, unit, work_order_no, things_name, quantity, set_no, observed_desc, damage_desc,status) 
    VALUES (:v1, :v2, :v3, :v4, :v5, :v6,:v7,:v8,:v9,:v10)");//here v stands for value:
     

    $stmt->bindParam(':v1', $var1);
    $stmt->bindParam(':v2', $var2);
    $stmt->bindParam(':v3', $var3);
    $stmt->bindParam(':v4', $var4);
    $stmt->bindParam(':v5', $var5);
    $stmt->bindParam(':v6', $var6);
    $stmt->bindParam(':v7', $var7);
    $stmt->bindParam(':v8', $var8);
    $stmt->bindParam(':v9', $var9);
    $stmt->bindParam(':v10', $var10);
    

$set_no='set_no'.$i ; 
$observed_desc='observed_desc'.$i;
$damage_desc='damage_desc'.$i;  

    // insert a row
    $var1 = $sn;
    $var2 = $_POST['issued_date'];
    $var3 = $_POST['unit'];
    $var4 = $_POST['work_order_no'];
    $var5 = $_POST['things_name'];
    $var6 = $_POST['quantity'];
    if($handle_zero_quantity==1)
    {
      $var7='';
      $var8='';
      $var9='';
    }
    else
    {
    $var7 = $_POST[$set_no];
    $var8 = $_POST[$observed_desc];
    $var9 = $_POST[$damage_desc];
  }
    $var10 ="dd{t gePsf]";//it's corresponding value is "marmat na vayako":
    
    $stmt->execute();
    
    

}//end of for loop:
    
   
 echo " <script>
 var div22=document.getElementById('div2');
 div22.style.display='none';
  var action_var=document.getElementById('action_completion');
  action_var.innerHTML=' successfully added.....';
  action_var.style.backgroundColor='green';
   $('#action_completion').fadeIn(1);

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

}//end of if check:
?>



</body>
</html>
