<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width , initial-scale=1">
	<title>LMS</title>
	<style type="text/css">
   /* The sticky class is added to the header with JS when it reaches its scroll position */
.sticky {
  position: fixed;left: 0vw;top: 5vh;
  height: 15vh;
  display: table-row;

  width: 100%;
  font-weight: bold;font-size: 1.5vw;letter-spacing: 1px;
  
}

.sticky_for_div1{
   position: fixed;left: 0vw;top: 0vh;
  height: 15vh;
  width: 100%;
}
.sticky td{width: 5vw;}
.table_after_scrollup{
  position: absolute;left: 0vw;
  top:200vh;
}

/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */


		
		.button1{background-color:#E7A135;color: white;position: absolute;left: 5vw;top :0.5vh;font-size: 15px;height: 5vh; border-radius: 8px;text-decoration: none;}
    #live_search_box{border-radius: 5px;height: 3vh;position: relative;left: 0vw;top :0vh;font-family: HIMALAYA TT FONT; }
    #select_search_type{font-family: HIMALAYA TT FONT;position: relative;
        left: 0vw;top: 0vh;}
    
   #div1{z-index: 1;background-color: brown;height: 3vh;width: 100%;position: fixed;top: 0vh;left: 0vw;
    padding:2vh;}
    .today_or_all_button{position: relative;left: 50vw;}
		
    .display_record_table{visibility:visible;background-color: gray;text-align: center;border-collapse: collapse;font-family: Arial;font-size: 1.2vw;font-family: HIMALAYA TT FONT;width: 100%; position: absolute;left: 0vw;top: 7vh;table-layout: auto;z-index: 0;}
    
    

    .table_heading{background-color: #6E7066;height: 10vh;color: yellow;font-family: HIMALAYA TT FONT;font-weight: bold;font-size: 1.5vw;letter-spacing: 1px;}
    .table_heading td{width: 5vw;}
td{height: 7vh;width :5vw;border: 2px blue solid;}
    

   



	</style>

	


<script type="text/javascript">
		 




function after_select_search() {
  var current_select_type=document.getElementById('select_search_type').value;
  var live_search_box=document.getElementById('live_search_box');  
  

  window.i1 = current_select_type;
  live_search_box.value="";
  
  $('#table1 tr').css({"visibility":"visible"});



}

</script>

</head>



<body>
    <script type="text/javascript">
      var i1='sn_id';
    </script>         
  
     
	
	

	<div class="div1" id="div1" >

    

    <button class="add_to_db_button" id="add_to_db_button">Add new work order</button>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input  id="live_search_box" type="text" autocomplete="off" placeholder='vf]Hg"xf];\' />

        <select id="select_search_type" onchange="after_select_search()" >
          <option value="sn_id">l;=g+</option>
          <option value="issued_date_id">ldlt</option>
          <option value="unit_id">o'lg^</option>
          <option value="work_order_no_id">j=c=g+</option>
          <option value="things_name_id">pks/)fsf] gfd</option>
          <option value="quantity_id">PsfO{</option>
          <option value="set_no_id">:f]^ g+</option>

        </select>

        <button class="today_or_all_button" id="today_button">Today</button>
        <button class="today_or_all_button" id="all_button">All</button>
      
		<br>
		

	</div><!--end of div1-->
  <script type="text/javascript" src="compressed_jquery_3.5.1.js"> </script>
  <script type="text/javascript" src="jquery/nepali_date_picker.js"> </script>
<link rel="stylesheet" href="css/nepali_date_picker.css">
<script type="text/javascript">
  
  var currentDate = new Date();
    var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
  var today_date = calendarFunctions.bsDateFormat("%y.%m.%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
  console.log(today_date);
 
</script>
	
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
    $result = $conn->prepare("SELECT * FROM record_table");
    $result->execute();
  
   echo "<table class='display_record_table' id='table1' style='' > ";
           echo "<tr class='table_heading' id='table1_heading' >";
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
                   echo" <td></td>";
                   
                   
               echo" </tr>";
               
               while ($row = $result->fetch() ){ 
                 
                  
                    echo "<tr>";
                   
                   echo "<td id='sn_id'>".$row[0]."</td>";
                   
                   echo "<td id='issued_date_id'>".$row[1]."</td>";
                   echo "<td id='unit_id'>".$row[2]."</td>";
                   echo "<td id='work_order_no_id'>".$row[3]."</td>";
                   echo "<td id='things_name_id'>".$row[4]."</td>";
                   echo "<td id='quantity_id'>".$row[5]."</td>";
                   echo "<td id='set_no_id'>".$row[6]."</td>";
                   echo "<td>".$row[7]."</td>";
                   echo "<td>".$row[8]."</td>";
                   echo "<td>".$row[9]."</td>";
                   echo "<td>".$row[10]."</td>";
                   echo "<td>".$row[11]."</td>";
                   echo "<td>".$row[12]."</td>";
                   echo "<td>".$row[13]."</td>";
                   echo"<td></td>";
                   

                   echo "<td><button id='edit_button'>Edit</button>
                   <button id='delete_button'>Delte</button>
                   </td>"  ;               
                   echo "</tr>";
                }//while end:

           echo "</table>";  //end table1:
          }    
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
    
    ?>

	  
 <script src="compressed_jquery_3.5.1.js"></script>


	<script src="compressed_jquery_3.5.1.js"></script>
<script type="text/javascript">


//live search using jquery:
$(document).ready(function(){

 var previous_color;
  $("tr").hover(function(){
    previous_color=$(this).css("background-color");
   
   
  $(this).css("background-color", "green");
  }, function(){
  $(this).css({"background-color": previous_color});
});


var previous_sn=0;
var colorA="wheat";
var colorB="pink";
var recent_color=colorA;
var row_count = $('#table1 tr').length;
for (var i = 2; i <= row_count; i++) {
 $('#table1 tr:nth-child('+i+')').each(function() {
          var recent_sn = $(this).find("#" + i1).html();
          //console.log(recent_search);
           
          if(recent_sn==previous_sn)
          {
            $('#table1 tr:nth-child('+i+') td:nth-child(1)').css({"visibility":"hidden"});
            $('#table1 tr:nth-child('+i+') td:nth-child(2)').css({"visibility":"hidden"});
            $('#table1 tr:nth-child('+i+') td:nth-child(3)').css({"visibility":"hidden"});
            $('#table1 tr:nth-child('+i+') td:nth-child(4)').css({"visibility":"hidden"});
            $('#table1 tr:nth-child('+i+') td:nth-child(5)').css({"visibility":"hidden"});
            $('#table1 tr:nth-child('+i+') td:nth-child(6)').css({"visibility":"hidden"});

          }
          else
          {
            if(recent_color==colorA)
              {recent_color=colorB;}
            else
              {recent_color=colorA;}
          }
            $('#table1 tr:nth-child('+i+')').css({"background-color": recent_color});
            previous_sn=recent_sn;
          
            
          });
 }//end of for loop:

 

//for keyup except back_space:
$('.div1 input[type="text"]').on("keyup input", function(){
  
var input_value = $(this).val();
console.log(input_value);

  if(input_value.length){
      for (var i = 2; i <= row_count; i++) {
          $('#table1 tr:nth-child('+i+')').each(function() {
          var recent_search = $(this).find("#" + i1).html();
          console.log(recent_search);

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

    $("#add_to_db_button").on('click',function(){
      var row_count = $('#table1 tr').length;
      var currentRow=$('#table1 tr:last');
      //var currentRow=$(this).last("tr"); 
      var sn_col=currentRow.find("td:eq(0)").text(); // get current row 1st TD value i.e"SN"
    console.log(sn_col);
    if(row_count==1)
      {sn_col=0}
    window.location.href = "add_to_db.php?previous_sn="+ sn_col;
    
    });

       $("#today_button").on('click',function(){
      var row_count = $('#table1 tr').length;
      for (var i = 2; i <= row_count; i++) {
          $('#table1 tr:nth-child('+i+')').each(function() {
          var recent_issued_date = $(this).find("#" +'issued_date_id').html();
          //console.log(recent_search);
           
          if(recent_issued_date!=today_date)
          {
            $('#table1 tr:nth-child('+i+')').css({"visibility":"collapse"});
          }
        });
      }//end of for:
    });//end of today_button clicked:

       $("#all_button").on('click',function(){
       $('#table1 tr').css({"visibility":"visible"})
    });//end of today_button clicked:

    // code to read selected table row cell data (when edit button is clicked)
    $("#table1").on('click','#edit_button',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value i.e"SN"
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD i.e"date"
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD i.e"unit"
         var col4=currentRow.find("td:eq(3)").text(); // get current row 4th TD i.e"work_order_no"
         var col5=currentRow.find("td:eq(4)").text(); // get current row 5th TD i.e"things_name"
         var col6=currentRow.find("td:eq(5)").text(); // get current row 6th TD i.e"quantity"
         var col7=currentRow.find("td:eq(6)").text(); // get current row 7th TD i.e "set_no"
         var col8=currentRow.find("td:eq(7)").text(); // get current row 8th TD
         var col9=currentRow.find("td:eq(8)").text(); // get current row 9th TD
         var col10=currentRow.find("td:eq(9)").text(); // get current row 5th TD
         var col11=currentRow.find("td:eq(10)").text(); // get current row 5th TD
         var col12=currentRow.find("td:eq(11)").text(); // get current row 5th TD
         var col13=currentRow.find("td:eq(12)").text(); // get current row 5th TD
         var col14=currentRow.find("td:eq(13)").text(); // get current row 5th TD
         
         //encoding each value:

         col1=encodeURIComponent(col1);col8=encodeURIComponent(col8);
         col2=encodeURIComponent(col2);col9=encodeURIComponent(col9);
         col3=encodeURIComponent(col3);col10=encodeURIComponent(col10);
         col4=encodeURIComponent(col4);col11=encodeURIComponent(col11);
         col5=encodeURIComponent(col5);col12=encodeURIComponent(col12);
         col6=encodeURIComponent(col6);col13=encodeURIComponent(col13);
         col7=encodeURIComponent(col7);col14=encodeURIComponent(col14);
         

         var confirm_value=confirm("Are you sure to edit the record"); 
         if(confirm_value==true)
         {
           
           var url_string="edit_record.php?edit_sn=" + col1 + "&edit_issued_date="+ col2 +
          "&edit_unit="+ col3 + "&edit_work_order_no="+ col4 + "&edit_things_name="+ col5 + 
         "&edit_quantity="+ col6 + "&edit_set_no="+ col7 + "&edit_observed_desc="+ col8 + 
         "&edit_damage_desc="+ col9 + "&edit_maintenance_desc="+ col10 + "&edit_maintenance_date="+ col11 + "&edit_technician="+ col12 + "&edit_returned_date="+ col13 + "&edit_status="+ col14;
         window.location.href = url_string;
         }
     }); //end of when edit button is clicked:



    // code to read selected table row cell data (when deleted button is clicked)
    $("#table1").on('click','#delete_button',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value i.e"SN"
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD i.e"date"
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD i.e"unit"
         var col4=currentRow.find("td:eq(3)").text(); // get current row 3rd TD i.e"work_order_no"
         var col5=currentRow.find("td:eq(4)").text(); // get current row 4th TD i.e"things_name"
         var col6=currentRow.find("td:eq(5)").text(); // get current row 6th TD i.e"quantity"
         var col7=currentRow.find("td:eq(6)").text(); // get current row 7th TD i.e "set_no"
         
        
         var confirm_value=confirm("Are you sure to delete the book"); 
         if(confirm_value==true)
         {
         window.location.href = "delete.php?delete_sn=" + col1 +"&delete_issued_date="+ col2 + 
         "&delete_quantity="+ col6 + "&delete_set_no="+ col7 ;
         }
     }); //end of when delete button is clicked:


    
});//end of document ready:
</script>



</body>
</html>


