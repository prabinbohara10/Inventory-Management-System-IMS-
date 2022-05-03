<!DOCTYPE html>
<html lang="hi">
<head>
	<title></title>
	<style type="text/css">
	
	#box{font-family: HIMALAYA TT FONT;}
</style>




<script type="text/javascript" src="compressed_jquery_3.5.1.js"> </script>
<script type="text/javascript" src="jquery/nepali_date_picker.js"> </script>

<script type="text/javascript">

</script>


</head>



<body >


 	<p>
    <label>DOB: </label>
    <input type="text" value="" name="date" class="bod-picker" id="nepali_date_picker" placeholder="Select Date of Birth">
    <button id="clear-bth" onclick="">Clear</button>
    </p>

<!-- this should go after your </body> -->

                
<script type="text/javascript">
	var currentDate = new Date();
    var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
	var today_date = calendarFunctions.bsDateFormat("%y,%m,%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
	$(".bod-picker").val(today_date);
	$(".bod-picker").nepaliDatePicker({
    dateFormat: "%y,%m,%d",
    closeOnDateSelect: true
	});

	$("#clear-bth").on("click", function(event) {
    var nepali_date_picker22=document.getElementById('nepali_date_picker');
    console.log('here');
    $('#nepali_date_picker').css({"font-family": "Arial"});
    //nepali_date_picker22.css({"font-family": "Arial"});
    console.log(nepali_date_picker22.value);
	});


//$('input[type="text"]').css({"font-family": "Arial"});
</script>

<textarea></textarea>

<input type="text" name="" id="box">
<button onclick="here()"></button>
</body>




</html>