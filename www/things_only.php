<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width , initial-scale=1">
	<title>LMS</title>
	<style type="text/css">

		body{font-family: HIMALAYA TT FONT;}
		.heading{background-color:#86C948;height: 10vh;width:90vw;font-size: 4vw;font-family: Lucida Fax;color: white;
          border-radius: 5px;padding: 0.1vw;padding-left: 2vw;}
		.button1{background-color:#E7A135;color: white;position: relative;left: 0px;top :-10px;font-size: 15px;height: 5vh; border-radius: 8px;text-decoration: none;}
    #live_search_box{border-radius: 5px;height: 3vh;position: relative;left: 7vw;top :0px; font-family: HIMALAYA TT FONT;}
     #select_search_type{font-family: HIMALAYA TT FONT;}
  
		
    #table1{visibility:collapse; background-color: #F5DEB3;text-align: center;border-collapse: collapse;font-family: HIMALAYA TT FONT;font-size: 1.2vw;resize: both;}
    #table_heading{background-color: #6E7066;height: 6vh;color: white;font-weight: bold;font-size: 1.5vw;letter-spacing: 1px;}
td{height: 7vh;width: 5vw;border: 2px white solid;}
    tr:hover{background-color: green;}
    
     ul{ list-style-type: none ;background-color: blue;width: 100vw;
        font-size: 2vw;margin: 0px;margin-left: -3vw;position: absolute;left: 0vw;
        top: 25vh;}
        ul li a{border: 0.1vw red solid;}
    ul li a{float: left;text-decoration: none;color: red;font-style: bold;padding:20px 50px;background-color: yellow;}
    ul li :hover{background-color: green;}
   

   



	</style>

	


<script type="text/javascript">
		
function after_select_search() {
  var current_select_type=document.getElementById('select_search_type').value;
  //window.i1 = current_select_type;
  var row_count = $('#table1 tr').length;
   var input_value = current_select_type;
      
     var table1=document.getElementById('table1');
      table1.style.visibility='visible';
      $('#table1 tr:nth-child(1)').css({"visibility": "visible"});
   
      var ul_id=document.getElementById('ul_id');
     ul_id.style.visibility="collapse";
      
      var i1="things_name_id";//i1 means column id to be searched: 

      
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



}//after_select_search:



</script>

</head>



<body>

    <script type="text/javascript">
      var i1='sn_id';
    </script>         
  
    <div class="heading" style="font-family: HIMALAYA TT FONT">  pks/)fsf] ljj/)f</div><br>

		<button class="button1"><a href="add_to_db_things_only.php" target="main_iframe">Add new equipement</a></button><br>
     
	
	

	<div class="div1" id="div1" >
        

        <select id="select_search_type" onchange="after_select_search()" style="position: relative;left: 10vw;top: -0.9vh;">
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
        <button style="position: relative;left: 12vw;top: -1vh;">Search</button>
        <button style="position: relative;left: 20vw;top: -1vh;" id="equipement_list">Equipement List</button>
      
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
    $result = $conn->prepare("SELECT * FROM things_only_table");
    $result->execute();
  
   

    $counter=0;
    
            echo "<ul id='ul_id'>";
               while ($row = $result->fetch() ){  
                
                   echo "<li id='".$row[0]."'><a href='#'>".$row[0]."</a></li>";
                  

                  
               }
               echo "</ul>";
   
    //for table1:           
// prepare sql
    $result = $conn->prepare("SELECT * FROM record_table");
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


                   
                   echo "<td><button id='edit_button'>Edit</button>
                   <button id='delete_button'>Delte</button>
                   </td>"  ;               

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
 //for creating action button : delete and update:


 $(document).ready(function(){
  //when change in select search type:
    $('#select_search_type').on('change',function(){

    });//when change in select search type:


  //when equipement list button is clicked:
  $('#equipement_list').on('click',function(){
    
    $('#table1 tr').css({"visibility":"collapse"});
    
    
document.getElementById('ul_id').style.visibility="visible";
  });//equipement_list:

var row_count = $('#table1 tr').length;

    // when li is clicked:
    $("ul li").on('click',function(){
      var input_value = $(this).text();
      //console.log(input_value);
      var table1=document.getElementById('table1');
      table1.style.visibility='visible';
   
      var ul_id=document.getElementById('ul_id');
     ul_id.style.visibility="collapse";
      
      var i1="things_name_id";

      $('#table1 tr:nth-child(1)').css({"visibility": "visible"});
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

    });// when li is clicked:

});//end of document ready function.




//live search using jquery:


 //for creating action button : delete and update:
 $(document).ready(function(){

    // code to read selected table row cell data (when edit button is clicked)
    $("#table1").on('click','#edit_button',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var col4=currentRow.find("td:eq(3)").text(); // get current row 4th TD
         var col5=currentRow.find("td:eq(4)").text(); // get current row 5th TD
         var col6=currentRow.find("td:eq(5)").text(); // get current row 5th TD
         var col7=currentRow.find("td:eq(6)").text(); // get current row 5th TD
         var col8=currentRow.find("td:eq(7)").text(); // get current row 5th TD
         var data=col1+"\n"+col2+"\n"+col3;
        
         var confirm_value=confirm("Are you sure to edit the book"); 
         if(confirm_value==true)
         {
         window.location.href = "edit_book.php?edit_book_id=" + col1 + "&edit_isbn="+ col2 + "&edit_book_name="+ col3 + "&edit_category="+ col4 + "&edit_author="+ col5 + "&edit_publication="+ col6 + "&edit_description="+ col7 + "&edit_date_added="+ col8;
         }
     }); //end of when edit button is clicked:



    // code to read selected table row cell data (when deleted button is clicked)
    $("#table1").on('click','#delete_button',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var col5=currentRow.find("td:eq(4)").text(); // get current row 4th TD
         var data=col1+"\n"+col2+"\n"+col3;
        
         var confirm_value=confirm("Are you sure to delete the book"); 
         if(confirm_value==true)
         {
         window.location.href = "delete.php?delete_sn=" + col1 + "&delete_unit="+ col2 + "&delete_work_order_no="+ col3;
         }
     }); //end of when delete button is clicked:


    
});//end of document ready:
</script>


</body>
</html>


