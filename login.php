<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="display-4 text-center">Please Log In with Google to explore further...</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 mx-auto d-block">
                <img class="mx-auto d-block" src="./images/login.png" alt="Login picture" width="256" height="256">
            </div>
            <div class="col-md-6 mx-auto p-5">
                <input id="login-button" type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-outline-secondary btn-lg ml-0 mt-5 d-block">
            </div>
        </div>
    </div>

    <style>
        #login-button {
            cursor: pointer;
        }
    </style>
</body>
</html>