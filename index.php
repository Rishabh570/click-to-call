<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

	$firstName = $_SESSION['givenName'];
	$lastName = $_SESSION['familyName'];
	// $fullName = $firstName + $lastName;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
	<div class="row">
		<button class="btn btn-danger mx-auto d-block" onclick="window.location = '/logout.php';">Log Out</button>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h1 class="display-4 text-center">Welcome <?php echo $firstName." ".$lastName ?></h1>
			<p class="lead text-center">Click on any message to make a call to its coressponding number...</p>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-lg-8 col-md-9 col-sm-12 mx-auto d-block">
			
			<div class="row messages mb-3 px-2">
				<h4 class="display-4 col-md-8 primary-content" >Message 1</h4>
				<div class="col-md-4 primary-content">
					<p>Recepient 1</p>
					<p class="lead number">+919159876164</p>
				</div>
				<div class='hvr-icon-buzz number-div p-1 m-auto' style='display: none;'>
					<img class='hvr-icon d-inline-block mr-2' src='./images/phone.png' width='45' height='45'/>
					<p class='lead text-center d-inline-block number-para'></p>
				</div>
			</div>

			<div class="row messages mb-3 px-2">
				<h4 class="display-4 col-md-8 primary-content">Message 2</h4>
				<div class="col-md-4 primary-content">
					<p>Me</p>
					<p class="lead number">+918750644313</p>
				</div>
				<div class='hvr-icon-buzz number-div p-1 m-auto' style='display: none;'>
					<img class='hvr-icon d-inline-block mr-2' src='./images/phone.png' width='45' height='45'/>
					<p class='lead text-center d-inline-block number-para'></p>
				</div>
			</div>

		</div>
	</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<style>
.messages {
	background-color: #e3e3e377;
	height: 5em;
	border-radius: 0.5em;
	transition: transform 0.3s ease-out;
}

.messages:hover {
	cursor: pointer;
	transform: scale(1.1);
}

/* Icon Buzz */
@-webkit-keyframes hvr-icon-buzz {
  50% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg);
  }
  100% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg);
  }
}
@keyframes hvr-icon-buzz {
  50% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg);
  }
  100% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg);
  }
}
.hvr-icon-buzz {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.hvr-icon-buzz .hvr-icon {
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
}
.hvr-icon-buzz:hover .hvr-icon, .hvr-icon-buzz:focus .hvr-icon, .hvr-icon-buzz:active .hvr-icon {
  -webkit-animation-name: hvr-icon-buzz;
  animation-name: hvr-icon-buzz;
  -webkit-animation-duration: 0.15s;
  animation-duration: 0.15s;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}
</style>

<script>
	$(document).ready(() => {
		console.log("loaded");

		//Mouse Enter event
		$('.messages').on("mouseenter", function (e) {
			let tar = $(this).find('.number')[0].innerHTML;
			$(this).find('.number-para').html(tar);
			$(this).find('.primary-content').fadeOut(0);
			$(this).find('.number-div').fadeIn(100);
			
		});

		// Mouse leave event
		$('.messages').on("mouseleave", function (e) {
			$(this).find('.number-div').fadeOut(0);
			$(this).find('.primary-content').fadeIn(100);
		});

		// Do a POST when message is clicked
		$('.messages').on("click", function (e) {
			let tar = $(this).find('.number')[0].innerHTML;
			console.log("message tile is clicked, number is: ", tar);
			// Fire AJAX req when a message is clicked
			$.ajax({
				url: '/call.php',
				method: 'POST',
				dataType: 'json',
				data: {
					targetNumber: tar,
				}
			}).done(function(data) {
				console.log(data.message);
			}).fail(function(error) {
				// This part is executed after successful request because request
				// is not by now, so it comes under fail callback
				const res = JSON.stringify(error);
				console.log(res);
				// // console.log(res);
				// if(res.status === 200) {
				// 	alert("calling");
				// }
			});


		});


	});
	
</script>
</body>
</html>