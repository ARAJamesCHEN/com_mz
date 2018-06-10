<?php
session_save_path( './' );
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login:: Theseus and the Minotaur Gaming Community</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<link rel="Stylesheet" href="./static/css/Style.css">
</head>
<body id="<?php ?>">
    <header id="header" class="row">
	    <div id="logo" class="col display-flex justify-content-space-between">
		    <div class="logo-img">
                <a href="post.php"  rel="nofollow"><img id="logo" src="./static/images/logo2.png" alt="logo"></a>
			</div>
			<span class="logo-title"><p>Game Community<p/><span>
	    </div>
		<nav class="col">
		    <ul>
			    <li id="navHome"><a href="temp.html" rel="nofollow">Home</a></li>
			    <li id="navPost"><a href="post.php" rel="nofollow">Forms</a></li>
			    <li id="navSign">
				    <?php
					   $theUsrName = null;

					   //echo $_SESSION[ 'theUsrName' ];

					   if(isset($_SESSION[ 'theUsrName' ]) && !empty($_SESSION[ 'theUsrName' ]) ){
						   $theUsrName = $_SESSION['theUsrName'];
						   echo "<a href='#'  rel='nofollow'>User:$theUsrName /</a>
                                 <a href='logout.php'  rel='nofollow'>LogOut</a>
                                </li>";
					   }else{
						   echo '<a href="login.php"  rel="nofollow">Sign in/Join</a></li>';
					   }
				    ?>
			    <li id="navAboutUs"><a href="temp.html" rel="nofollow">About us</a></li>
		    </ul>
		    <input id="searchbox" type="text" name="search" placeholder="Search..">
	    </nav>
	</header>
