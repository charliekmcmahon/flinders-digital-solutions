<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Technology Misuse Infringement Adder™</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Technology Misuse Infringement Adder™</a></h1>
		<form id="form_20031" class="appnitro"  method="get" action="form.php">
					<div class="form_description">
			<h2>Technology Misuse Infringement Adder™</h2>
			<p>This is your form description. Click here to edit.</p>
		</div>						
			<ul >
			
					<li id="li_3" >
		<label class="description" for="element_3">Student Name </label>
		<span>
			<input id="element_3_1" name= "element_3_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_3_2" name= "element_3_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Student ID </label>
		<div>
			<input id="element_1" name="element_1" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Class </label>
		<div>
			<input id="element_8" name="element_8" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Teacher ID </label>
		<div>
			<input id="element_2" name="element_2" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Date </label>
		<span>
			<input id="element_6_1" name="element_6_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_6_1">MM</label>
		</span>
		<span>
			<input id="element_6_2" name="element_6_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_6_2">DD</label>
		</span>
		<span>
	 		<input id="element_6_3" name="element_6_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_6_3">YYYY</label>
		</span>
	
		<span id="calendar_6">
			<img id="cal_img_6" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_6_3",
			baseField    : "element_6",
			displayArea  : "calendar_6",
			button		 : "cal_img_6",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Time </label>
		<span>
			<input id="element_7_1" name="element_7_1" class="element text " size="2" type="text" maxlength="2" value=""/> : 
			<label>HH</label>
		</span>
		<span>
			<input id="element_7_2" name="element_7_2" class="element text " size="2" type="text" maxlength="2" value=""/> : 
			<label>MM</label>
		</span>
		<span>
			<input id="element_7_3" name="element_7_3" class="element text " size="2" type="text" maxlength="2" value=""/>
			<label>SS</label>
		</span>
		<span>
			<select class="element select" style="width:4em" id="element_7_4" name="element_7_4">
				<option value="AM" >AM</option>
				<option value="PM" >PM</option>
			</select>
			<label>AM/PM</label>
		</span> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Drop Down </label>
		<div>
		<select class="element select medium" id="element_9" name="element_9"> 
			<option value="" selected="selected"></option>
<option value="1" >Gaming during class</option>
<option value="2" >Off topic</option>
<option value="3" >Not responding to teacher</option>
<option value="4" >Using technology when not asked to</option>

		</select>
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Notify Parents? </label>
		<span>
			<input id="element_4_1" name="element_4_1" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_4_1">Email parents</label>
<input id="element_4_2" name="element_4_2" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_4_2">Text parents</label>

		</span> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Optional Description </label>
		<div>
			<textarea id="element_5" name="element_5" class="element textarea medium"></textarea> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="20031" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Generated by <a href="http:/www.macca.xyz">Charlie McMahon</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">

	<?php 

$first_name = $_GET["element_3_1"];
$last_name = $_GET["element_3_2"];

$student_id = $_GET["element_1"];

$class = $_GET["element_3_2"];

$teacher_id = $_GET["element_3_2"];

$class = $_GET["element_3_2"];

$fault = $_GET["element_3_2"];

$class = $_GET["element_3_2"];

echo "Name: ".$first_name.$last_name;

?>
	</body>
</html>