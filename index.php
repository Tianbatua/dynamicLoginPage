<!DOCTYPE html>
<html>
<head>
	<title>A dynamic login page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
     <div class="panel-heading">

       <h3>Ajax Callback</h3>
       <ul>
           <li>
           	  <label>Subscriber:</label>
           	  <select id="subscriber">
           	  	<option value="0" selected>Seledt subscriber</option>           	  	
           	  </select>
           </li>
       	   <li>
       	   	  <label>First Name:</label>
       	   	  <input type="text" id="first_name">
       	   </li>
       	   <li>
       	   	  <label>Surname:</label>
       	   	  <input type="text" id="surname">
       	   </li>
       	   <li>
       	   	  <label>Date of Birth:</label>
       	   	  <input type="text" id="datepicker">
       	   </li>
       </ul>

        <div>
           <textarea id="responseText"></textarea>
        </div>

        <input type="button" value="Save Data" id="call_back_btn" />
</body>
</html>