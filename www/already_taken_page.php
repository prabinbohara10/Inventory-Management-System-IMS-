<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width , initial-scale=1">
	<title>LMS</title>
	<style type="text/css">

		
		.heading{display:block;background-color:#86C948;height: 10vh;width:90vw;font-size: 4vw;font-family: Lucida Fax;color: white;
          border-radius: 5px;padding: 0.1vw;padding-left: 2vw;}
          #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
		.button1{background-color:#E7A135;color: white;position: relative;left: 0px;top :-10px;font-size: 15px;height: 5vh; border-radius: 8px;text-decoration: none;}
    #live_search_box{border-radius: 5px;height: 3vh;position: relative;left: 7vw;top :0px; }
    textarea{position: relative;left: 0vw;height: 10vh;width: 25vw;font-family: HIMALAYA TT FONT;}
		
    #table1{visibility:visible;background-color: #F5DEB3;text-align: center;border-collapse: collapse;font-family: Arial;font-size: 1.2vw;resize: both;font-family: HIMALAYA TT FONT;}
    #table_heading{background-color: #6E7066;height: 6vh;color: yellow;font-family: HIMALAYA TT FONT;font-weight: bold;font-size: 1.5vw;letter-spacing: 1px;}
    #div_after_maintenance{display:none;background-color: red;height: 80%;width: 30%;position: relative;top: 25vh;left: 0vw;font-family: HIMALAYA TT FONT;}
    input[type="text"]::placeholder{font-family: HIMALAYA TT FONT;}
       input[type="text"]{font-family: HIMALAYA TT FONT;}
      
      
td{height: 7vh;width: 5vw;border: 2px white solid;}
    tr:hover{background-color: green;}

   



	</style>

	


<script type="text/javascript">
		 




function after_select_search() {
  var current_select_type=document.getElementById('select_search_type').value;
  window.i1 = current_select_type;
  document.getElementById('live_search_box').value="";  
  $('#table1 tr').css({"visibility":"visible"});
}


</script>

</head>



<body id="body">
    <script type="text/javascript">
      var i1='sn_id';
    </script>         
  
    <div class="heading" id="heading" style="font-family: HIMALAYA TT FONT">  pks/)fsf] ljj/)f</div><br>
 <div class="action_completion" id="action_completion" style="display:none;">book</div>
		
     
	
	

	<div class="div1" id="div1" >
        <input  id="live_search_box" type="text" autocomplete="off" placeholder='vf]Hg"xf];\===' />

        <select id="select_search_type" onchange="after_select_search()" style="position: relative;left: 10vw;top: -0.9vh;">
          <option value="sn_id">SN</option>
          <option value="unit_id">Unit</option>
          <option value="work_order_no_id">Work Order No</option>
          <option value="things_name_id">Things Name</option>

        </select>
      
		<br>
		

	</div><!--end of div1-->


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
    $result = $conn->prepare("SELECT * FROM record_table Where status='nluPsf]'");
    $result->execute();
  
   echo "<table class='display_table' id='table1' style='width: 98vw; position: absolute;left: 0vw;top: 25vh;table-layout: fixed;' > ";
           echo "<tr id='table_heading'>";
                echo"<td>l;=g+</td>";
                echo" <td>ldlt</td>";//issued_date
                   echo" <td>o'lg^</td>";
                   echo"<td>j=c=g+</td>";
                   echo" <td>pks/)fsf] gfd</td>";//things_name
                   echo" <td>PsfO{</td>";//quantity i.e ekai
                   echo" <td>:f]^ g+</td>";//set_no
                   echo" <td>lgl/If)f ljj/)f</td>";//observed_desc
                   echo"<td>v/fla ljj/)f</td>";//damage_desc
                   echo" <td>dd{tsf] ljj/)f</td>";
                   echo" <td>ag]sf] ldlt</td>";
                   echo" <td>:fDAflGwt k|fljlws</td>";
                   echo" <td>nu]sf] ldlt</td>";
                   echo" <td>:^F^;</td>";
                   echo" <td>s}lkmot</td>";
                   
                   
               echo" </tr>";

            
               while ($row = $result->fetch() ){  
                   echo "<tr>";
                   echo "<td id='sn_id'>".$row[0]."</td>";
                   echo "<td id='unit_id'>".$row[1]."</td>";
                   echo "<td id='work_order_no_id'>".$row[2]."</td>";
                   echo "<td id='things_name_id'>".$row[3]."</td>";
                   echo "<td>".$row[4]."</td>";
                   echo "<td>".$row[5]."</td>";
                   //using explode function:
                   $set_no_array=explode(',', $row[6]);
                   if(sizeof($set_no_array)>1)
                   {
                   echo "<td><select>";
                   foreach ($set_no_array as $value) {
                     echo "<option>".$value."</option>";
                   }
                   echo "</select></td>";
                 }
                 else
                  {echo "<td>".$row[6]."</td>";}
                   
                   echo "<td>".$row[7]."</td>";

                   echo "<td>".$row[8]."</td>";
                   echo "<td>".$row[9]."</td>";
                   echo "<td>".$row[10]."</td>";
                   echo "<td>".$row[11]."</td>";
                   echo "<td>".$row[12]."</td>";
                   echo "<td>".$row[13]."</td>";
                 
                   


                   
                   

                   echo "</tr>";
               }

           
        echo "</table>";   



     }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
    
    ?>

	  
    <script src="compressed_jquery_3.5.1.js"></script>

	<script type="text/javascript">
   $("td").dblclick(function () {
	
			var x = document.getElementById("t1");
  x.innerHTML = "NEW CELL CONTENT";
		})
	</script>


	<script src="compressed_jquery_3.5.1.js"></script>
<script type="text/javascript">


//live search using jquery:
$(document).ready(function(){

var row_count = $('#table1 tr').length;

//for keyup except back_space:
$('.div1 input[type="text"]').on("keyup input", function(){
  
var input_value = $(this).val();

  if(input_value.length){
      for (var i = 2; i <= row_count; i++) {
          $('#table1 tr:nth-child('+i+')').each(function() {
          var recent_search = $(this).find("#" + i1).html();

          var matcher = new RegExp("^"+input_value);
          var result_status = matcher.test(recent_search); 
          if (result_status == false) {
              $('#table1 tr:nth-child('+i+')').css({"visibility": "collapse"});
             }
             else{
              $('#table1 tr:nth-child('+i+')').css({"visibility": "visible"});
             }
            
          });
      }//end of for loop:

   }else{
         $('#table1 tr').css({"visibility":"visible"});

        }//end of else part:

  });//end of key-up function.

});//end of document ready function.



 //for creating action button : delete and update:
 $(document).ready(function(){

    // code to read selected table row cell data (when edit button is clicked)
    $("#table1").on('click','#edit_button',function(){
      var row_count = $('#table1 tr').length;
      var table1=document.getElementById('table1');
            for (var i = 2; i <= row_count; i++) {
              $('#table1 tr:nth-child('+i+')').css({"visibility": "collapse"});
            }//for loop:
      //table1.style.visibility='visible';
      //table1.style.display='none';
      //$('#table1 tr:nth-child(1)').css({"display": "block"});
         // get the current row
        
          $('#table1 tr').css({"background-color":"orange"});
         var currentRow=$(this).closest("tr"); 
         currentRow.css({"visibility":"visible"});
         var sn_value=currentRow.find("td:eq(0)").text(); // get current row 1st TD value i.e "SN"
         var work_order_no_value=currentRow.find("td:eq(3)").text();//row 4th TD i.e "work_order_no"
         document.getElementById('refrence_sn').value=sn_value;
         document.getElementById('refrence_work_order_no').value=work_order_no_value;

         document.getElementById('div_after_maintenance').style.display='block';
         document.getElementById('live_search_box').style.display='none';
         document.getElementById('select_search_type').style.display='none';
  
     }); //end of when edit button is clicked:



   

    
});//end of document ready:
</script>

<div class="div_after_maintenance" id="div_after_maintenance">
  <button class="button2" ><a href="things_made_page.php" target="main_iframe">Back</a></button><br>
        <form method="POST" action="things_made_page.php" autocomplete="off" >
          <input type="text" name="refrence_sn" id="refrence_sn" style="display: none;">
          <input type="text" name="refrence_work_order_no" id="refrence_work_order_no" style="display: none;">

          <label for="maintenance_desc">nu]sf] ldlt</label><br>
                <textarea name="taken_date" id="taken_date" size="25"
                 placeholder="nu]sf] ldlt" ></textarea><br>


      <input  type="submit" name="submit_name" id="" size="25" placeholder="" value="Save"><br>
   
        </form>
      
        
</div>




<?php
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "ems";
    
    if(isset($_POST["submit_name"]))
{
  $taken_date=$_POST['taken_date'];
 

  $refrence_sn=$_POST['refrence_sn'];
  $refrence_work_order_no=$_POST['refrence_work_order_no'];
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql
    $result1 = $conn->prepare("UPDATE record_table SET returned_date='$taken_date',
     status='nluPsf'  
      WHERE sn='$refrence_sn' AND 
     work_order_no='$refrence_work_order_no'");

    $result1->execute();

    echo " <script>
 var heading=document.getElementById('heading');
 heading.style.display='none';
 var div1=document.getElementById('div1');
 div1.style.display='none';
 document.getElementById('table1').style.display='none';
  var action_var=document.getElementById('action_completion');
  action_var.innerHTML=' successfully added.....';
  action_var.style.backgroundColor='green';
   $('#action_completion').fadeIn(1);

   var delayInMilliseconds = 900; 
setTimeout(function() {
  window.location.href = 'things_made_page.php';
}, delayInMilliseconds);  

 
  </script>
 ";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}//end of if isset check:
    ?>



</body>
</html>


