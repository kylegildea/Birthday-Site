/*
  Kyle Gildea
  CIS3003
  Assignment 3
  Site also viewable at: http://eustis.eecs.ucf.edu/ky073335/index.php
*/

<!DOCTYPE HTML>  
<html>
	<head>
    <meta charset="UTF-8"/>
		<title> "Kyle Gildea - Assignment 3"</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type = "text/css" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href = "https://code.jquery.com/ui/1.10.4/themes/black-tie/jquery-ui.css" rel = "stylesheet"/>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() 
         {
            $( "#datepicker" ).datepicker(
            {
              changeMonth: true,
              changeYear: true,
              yearRange: '1900:2017', 
              maxDate: "0"
            });
         });
      </script>

	</head>
	<body>  
	<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="page-content">
					<div id="header-wrapper">
						<div id="header">
							<div id="logo">
								<h1>It's Birthday Time!</h1>
								<p>Or is it? Let's find out!</p>
							</div>
						</div>
					</div>
					<div id="menu-wrapper">
					</div>
					<div id="content">
						<div class="post">
							<h2 class="title">When is your birthday?</h2>
							<div class="entry">
                <p>
									<form action="index.php" method = "get">
									  Birthday:
			 					    <input type = "text" id = "datepicker" name = "dob" readonly><br/>
							      <input type = "submit" value = "Submit" name = "submit">
									</form>
                  <?php
                    if(isset($_GET['submit']))
                    {
                      getAge();
                    } 
                  ?>
								</p>
							</div>
						</div>
						<div style="clear: both;">&nbsp;</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
</div>

	</body>
</html>  

<?php

function getAge()
{
  if($_GET["dob"]!="")
  {
    $date = date_create_from_format("m/d/Y",$_GET["dob"]);
    $today = new DateTime('now');
    $diff=date_diff($date,$today);
    
    if($date->format('m-d') == $today->format('m-d'))
    {
      echo '<h2 style = "text-align:center">Happy Birthday!</h2>';
    }
    echo "<ul><li>You were born: " . $date->format('m-d-Y') . "</li>";
    echo "<li>You are "  . $diff->format("%r%y") . " years old</li>";
  }
}
?>