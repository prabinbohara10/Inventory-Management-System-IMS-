<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
   <script type="text/javascript">
    function submit_button_clicked() {
     
  document.getElementById('submit_check').value="clicked";

  var iFrameDOM11 = $('#iframe1_id').contents();
  var book_id_for_db=iFrameDOM11.find('#book_id').val();
  var isbn_for_db=iFrameDOM11.find('#isbn').val();
  var book_name_for_db=iFrameDOM11.find('#book_name').val();

  var iFrameDOM22 = $('#iframe2_id').contents();
  var member_id_for_db=iFrameDOM22.find('#book_id').val();
  var member_name_for_db=iFrameDOM22.find('#book_id').val();
  
  document.getElementById('book_id_name').value=book_id_for_db;
  document.getElementById('isbn_name').value=isbn_for_db;
  document.getElementById('book_name_name').value=book_name_for_db;
  document.getElementById('member_id_name').value=member_id_for_db;
  document.getElementById('member_name_name').value=member_name_for_db;
      }
  </script>

	<style type="text/css">
   .heading{background-color:#86C5C8;height: 5vh;width:90vw;font-size: 2vw;font-family: Lucida Fax;color: white; border-radius: 5px;padding: 1vw;}

   #action_completion{position: absolute;left: 34.5vw;top: 39vh;z-index: 1;background-color: #524DB5;width: 30vw;padding: 10vh 1vw;font-size: 25px;color: white;text-align: center;} 
	</style>
</head>



<body id="body" style="margin: 0;overflow-x: hidden;" scrolling="no">
  <div id="body_except_php">
     
    <div class="heading">Manage Books</div><br>

  <div class="div_iframe1" style="position: absolute;top: 9vh;left: 0vw;width: 50vw;height:93vh;background-color: blue;">
    <iframe id="iframe1_id" style="position: absolute;outline: none;border:none;" src="issue_book_part1.php" name="main_iframe" width="100%" height="100%" scrolling="no">not supported</iframe>
  </div>

  <div class="div_iframe2" style="position: absolute;top: 9vh;left: 50vw;width: 50vw;height: 93vh;background-color: gray;">
    <iframe id="iframe2_id" style="position: absolute;outline: none;border:none;" src="issue_book_part2.php" name="main_iframe" width="100%" height="100%" scrolling="no">not supported</iframe>
  </div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
 $('#iframe1_id').load( function(){
 $('#iframe2_id').load( function(){

  var iFrameDOM1 = $("#iframe1_id").contents();
  var iFrameDOM2 = $("#iframe2_id").contents();
  
  //start of double click on tr(frame1) 
  iFrameDOM1.find("tr").on("dblclick", function(){

    if( iFrameDOM2.find("#table1").css('visibility') == 'collapse'){
      console.log(1);
      document.getElementById('issue_final').style.display="block"; 
     }else{
           document.getElementById('issue_final').style.display="none"; 
           console.log(2);
         }
  });//for double click on tr(frame1)


  //start of double click on tr(frame2) 
  iFrameDOM2.find("tr").on("dblclick", function(){
    if( iFrameDOM1.find("#table1").css('visibility') == 'collapse'){
      console.log(1);
      document.getElementById('issue_final').style.display="block"; 
     }else{
           document.getElementById('issue_final').style.display="none"; 
           console.log(2);
         }
  });//for double click on tr(frame2)


  iFrameDOM1.find("#reset_button_id").on("click", function(){
    document.getElementById('issue_final').style.display="none"; 
  });//end of after clicking reset button


  iFrameDOM2.find("#reset_button_id").on("click", function(){
    document.getElementById('issue_final').style.display="none"; 
  });//end of after clicking reset button

}); //for loading iframe2
}); //for loading iframe1    
});//for document ready
</script>


<div id="issue_final" style="width: 40vw;height: 30vh;background-color: pink;position: absolute;left: 0px;top: 71vh;display: none;">
  

<!--form for submittiing data-->
<form method="POST">

<input type="text" name="book_id_name" id="book_id_name" style="display: none;">
<input type="text" name="isbn_name" id="isbn_name" style="display: none;">
<input type="text" name="book_name_name" id="book_name_name" style="display: none;">
<input type="text" name="member_id_name" id="member_id_name" style="display: none;">
<input type="text" name="member_name_name" id="member_name_name" style="display: none;">

<input type="text" name="submit_check" id="submit_check" value="" style="display: none;">
<button id="finish_button" onclick="submit_button_clicked()" style="display: block;">Finish</button><br>
</form>
</div> <!--issue final division-->
</div><!-- body_except_php-->

<div class="action_completion" id="action_completion" style="display:none;">book</div>

<?php


        if(isset($_POST['submit_check'])){

          echo "go";
          
           //adding to database:
echo "<script>

  
  
  document.getElementById('body_except_php').style.display ='none';
  document.getElementById('finish_button').style.display ='none';
  console.log('good');
 
  </script>
";
echo "ttt";
echo $_POST['book_id_name'];
echo $_POST['isbn_name'];
echo $_POST['book_name_name'];
echo $_POST['member_id_name'];
echo $_POST['member_name_name'];
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LMS";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO issue_book_table (book_id, isbn, book_name, member_id,member_name,issue_date,returned, returned_date) 
    VALUES (:book_id, :isbn, :book_name, :member_id, :member_name, :issue_date, :returned ,:returned_date)");

    $stmt->bindParam(':book_id', $book_id);
    $stmt->bindParam(':isbn', $isbn);
    $stmt->bindParam(':book_name', $book_name);
    $stmt->bindParam(':member_id', $member_id);
    $stmt->bindParam(':member_name', $member_name);
    $stmt->bindParam(':issue_date', $issue_date);
    $stmt->bindParam(':returned', $returned);
    $stmt->bindParam(':returned_date', $returned_date);
 
    // insert a row
    $book_id= $_POST["book_id_name"]  ;
    $isbn= $_POST["isbn_name"]  ;
    $book_name= $_POST["book_name_name"] ;
    $member_id= $_POST["member_id_name"] ;
    $member_name= $_POST["member_name_name"] ;
    $issue_date= $_POST["isbn_name"]  ;
    $returned="no";
    $returned_date= $_POST["isbn_name"]  ;
    

    $stmt->execute();

     //for adding in report_table:
     // prepare sql and bind parameters
    $stmt2 = $conn->prepare("INSERT INTO report_table (activity_date, activity, details1, details11,     details2, details22, details3, details33, details4, details44) 
    VALUES (:activity_date, :activity, :details1, :details11, :details2, :details22, :details3, :details33, :details4, :details44)");

    $stmt2->bindParam(':activity_date',$activity_date );
    $stmt2->bindParam(':activity', $activity);
    $stmt2->bindParam(':details1', $details1);
    $stmt2->bindParam(':details11', $book_id);
    $stmt2->bindParam(':details2', $details2);
    $stmt2->bindParam(':details22', $book_name);
    $stmt2->bindParam(':details3', $details3);
    $stmt2->bindParam(':details33', $member_id);
    $stmt2->bindParam(':details4', $details4);
    $stmt2->bindParam(':details44', $member_name);
 
    // insert a row
    date_default_timezone_set("Asia/Kathmandu");

    $activity_date=date("Y-m-d H:i:sa");
    $activity="Book Issued";
    $details1="Book Id";
    $details2="Book Name";
    $details3="Member Id";
    $details4="Member Name"; 

    $book_id= $_POST["book_id_name"] ;
    $book_name= $_POST["book_name_name"] ;
    $member_id= $_POST["member_id_name"] ;
    $member_name= $_POST["member_name_name"] ;
    

    $stmt2->execute();
     echo " <script>
    var action_var=document.getElementById('action_completion')
    action_var.innerHTML='Book successfully Issued.....';
    action_var.style.backgroundColor='orange';
    $('#action_completion').fadeIn(1);
 
     window.location.href = 'issue_book_index.php';
    </script>
    ";
    }

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
    
    }

?>



</body>
</html>


