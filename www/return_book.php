<!DOCTYPE html>
<html>
<head>
  <title>LMS</title>
  <style type="text/css">

    
    .heading{background-color:#86C5C8;height: 5vh;width:90vw;font-size: 2vw;font-family: Lucida Fax;color: white;
          border-radius: 5px;padding: 1vw;}
    .button1{background-color:#E7A135;color: white;position: relative;left: 0px;top :-10px;font-size: 15px;height: 5vh; border-radius: 8px;}
    #live_search_box{border-radius: 5px;height: 3vh;position: relative;left: 7vw;top :0px; }

    .div2{background-color:  yellow;height: 80%;width: 30%;display: none;}
    #table1{background-color: white;width: 100vw;text-align: center;border-collapse: collapse;font-family: Arial;}
    #table_heading{background-color: #6E70E2;height: 6vh;color: white;font-family: Courier New;font-weight: bold;font-size: 21px;letter-spacing: 1px;}
    td{height: 5vh;width: 20vw;border: 2px red solid;}
    tr:hover{background-color: green;}


  </style>

  


<script type="text/javascript">
     

function showForm() {

   var div2 = document.getElementById("div2");
   var table1=document.getElementById("table1");
   

  if (div2.style.display === "none") {
    div2.style.display = "block";
    table1.style.display="none";
   
    document.getElementById('div1').style.display="none";
} else {
    div2.style.display = "none";
    table1.style.display="block";
    
    
    document.getElementById('div1').style.display="block";
  }
}//end of showform function:


function after_select_search() {
  var current_select_type=document.getElementById('select_search_type').value;
  window.i1 = current_select_type;
  document.getElementById('live_search_box').value="";  
  $('#table1 tr').css({"visibility":"visible"});
console.log(i1);


}

</script>

</head>



<body>
    <script type="text/javascript">
      var i1='book_id_id';
    </script>         
  
    <div class="heading">Manage Books</div><br>

    <button class="button1" onclick="showForm()">Add new book</button><br>
     
  
  

  <div class="div1" id="div1" >
        <input  id="live_search_box" type="text" autocomplete="off" placeholder="Search isbn..." />

        <select id="select_search_type" onchange="after_select_search()" style="position: relative;left: 10vw;top: -0.9vh;">
          <option value="book_id_id">Book Id</option>
          <option value="isbn_id">Isbn</option>
          <option value="book_name_id">Book Name</option>
        </select>
      
    <br>
    

  </div><!--end of div1-->



  <div class="div2" id="div2" style="display: none;">
      <span class="span3">Add new book</span><br>
      <button class="button2" onclick="showForm()">Back</button><br>
    <form method="POST" action="add_to_db.php" autocomplete="off" onsubmit="submit_function()">
  
    

      <label for="book_id">Book Id</label><br>
        <input  type="text" name="book_id" id="book_id" size="25" placeholder="Book Id" required><br>

      <label for="isbn">ISBN</label><br>
        <input  type="text" name="isbn" id="isbn" size="25" placeholder="ISBN" required><br>

      <label for="book_name">Book Name</label><br>
        <input  type="text" name="book_name" id="book_name" size="25" placeholder="Book Name" required><br>

      <label for="category">Category</label><br>
        <input  type="text" name="category" id="category" size="25" placeholder="Category" required><br>

      <label for="author">Author</label><br>
        <input  type="text" name="author" id="author" size="25" placeholder="Author" required><br>

      <label for="publication">Publication</label><br>
        <input  type="text" name="publication" id="publication" size="25" placeholder="Publication" required><br>

      <label for="description">Description</label><br>
        <input  type="text" name="description" id="description" size="25" placeholder="Description" required><br>

        <input  type="submit" name="" id="" size="25" placeholder="" value="Save"><br>

      
    </form>
    
  </div><!--end of div2-->


  
    <?php
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "LMS";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // prepare sql
    $result = $conn->prepare("SELECT * FROM books_table");
    $result->execute();
  
   echo "<table class='display_table' id='table1' style='width: 98vw; position: absolute;left: 0vw;top: 25vh;' > ";
           echo "<tr id='table_heading'>";
                echo"<td>Book Id</td>";
                   echo" <td>ISbn</td>";
                   echo"<td>Book Name</td>";
                   echo" <td>Category</td>";
                   echo" <td>Author</td>";
                   echo" <td>Publication</td>";
                   echo" <td>Description</td>";
                   echo" <td>Date added</td>";
                   echo" <td>Action</td>";
               echo" </tr>";

            
               while ($row = $result->fetch() ){  
                   echo "<tr>";
                   echo "<td id='book_id_id'>".$row[0]."</td>";
                   echo "<td id='isbn_id'>".$row[1]."</td>";
                   echo "<td id='book_name_id'>".$row[2]."</td>";
                   echo "<td id='category_id'>".$row[3]."</td>";
                   echo "<td>".$row[4]."</td>";
                   echo "<td>".$row[5]."</td>";
                   echo "<td>".$row[6]."</td>";
                   echo "<td>".$row[7]."</td>";
                   echo "<td><button id='edit_button'>Edit</button>
                   <button id='delete_button'>Delete</button>
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

    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <script type="text/javascript">
   $("td").dblclick(function () {
  
      var x = document.getElementById("t1");
  x.innerHTML = "NEW CELL CONTENT";
    })
  </script>


  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
// live search using ajax:
/*$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        // Get input value on change 

    

        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
           
           var x1=document.getElementById("table1"); 
           x1.style.display ="none";
             var z1=document.getElementById("hidden_div"); 
            z1.style.display ="block";
            
          $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
          
            resultDropdown.empty();
            var x2=document.getElementById("table1"); 
            var z2=document.getElementById("hidden_div"); 
            x2.style.display ="block";
            z2.style.display="none";
          
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
*/

//live search using jquery:
$(document).ready(function(){

var row_count = $('#table1 tr').length;

//for keyup except back_space:
$('.div1 input[type="text"]').on("keyup input", function(){
  console.log(i1);
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
         window.location.href = "delete.php?delete_book_id=" + col1 + "&delete_isbn="+ col2 + "&delete_book_name="+ col3 + "&delete_author="+ col5;
         }
     }); //end of when delete button is clicked:


    
});//end of document ready:
</script>


</body>
</html>


