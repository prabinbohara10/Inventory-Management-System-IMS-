<!DOCTYPE html>
<html>
<head>
	<title>Important codes</title>

<script type="text/javascript" src="compressed_jquery_3.5.1.js"> </script>

<!--these two files are custom jquery and custom css for nepali date picker-->
<script type="text/javascript" src="jquery/nepali_date_picker.js"> </script>
<link rel="stylesheet" href="css/nepali_date_picker.css">

</head>
<body>

	<!--code1_nepali_date_picker-->
	<!--refrence from leapfrog's Github-->
	<div class="code1_nepali_date_picker" id="code1_nepali_date_picker">
	<h1>Code 1: Nepali Date Picker</h1>
	<p>
    <label>DOB: </label>
    <input type="text" value="" name="date" class="bod-picker" placeholder="Select Date of Birth">
    <button id="clear-bth" onclick="">Clear</button>
    </p>
    <script type="text/javascript">
	var currentDate = new Date();
    var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
	var today_date = calendarFunctions.bsDateFormat("%y,%m,%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
  console.log(today_date);
	$(".bod-picker").val(today_date);
	$(".bod-picker").nepaliDatePicker({
    dateFormat: "%y,%m,%d",
    closeOnDateSelect: true
	});

	$("#clear-bth").on("click", function(event) {
    $(".bod-picker").val('');
	});
	</script>
	</div><!--end of "code1_nepali_date_picker"-->

	<div  id="code2_expode_function in php:">
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
	</div>
  <button>here</button>

</body>
</html>
Where issued_date='{$today_date}'