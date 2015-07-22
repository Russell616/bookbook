<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Book</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet" type="text/css">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <script>
        function post(path, params, method) {
            method = method || "post"; // Set method to post by default if not specified.
        
            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);
        
            alert(params['t'].'_'.params['a']); //DEBUG
            for(var key in params) {
                if(params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);
        
                    form.appendChild(hiddenField);
                 }
            }
        
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Book Book</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a> <!--TODO: METER LINK VÁLIDO -->
                    </li>
                    <li>
                        <a href="#">Contact</a> <!--TODO: METER LINK VÁLIDO -->
                    </li>
                    <li>
                        <a href="upload.php">Upload Texto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <?php
        			$host="localhost"; // o MySQL esta disponivel nesta maquina
        			$user="root"; // -> substituir pelo nome de utilizador
        			$password="root"; // -> substituir pela password dada pelo mysql_reset
        			$dbname = "website"; // a BD tem nome identico ao utilizador
        			
        
        			$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false,
                             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        			if (!$connection) {
        			    die('Could not connect: ' . mysqli_error($con));
        			}
        
        			$sql="SELECT nome FROM tags";
        			$result = $connection->query($sql);
                    foreach($result as $row) {
                        echo '<a href="#" class="list-group-item">' . $row['nome'] . ' </a>'; //TODO: METER LINK VÁLIDO
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
		<?php

			$host="localhost"; // o MySQL esta disponivel nesta maquina
			$user="root"; // -> substituir pelo nome de utilizador
			$password="root"; // -> substituir pela password dada pelo mysql_reset
			$dbname = "website"; // a BD tem nome identico ao utilizador
			

			$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false,
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			if (!$connection) {
			    die('Could not connect: ' . mysqli_error($con));
			}

			$sql="SELECT * FROM caixas";
			$result = $connection->query($sql);
			
            foreach($result as $row) {
                  echo '<div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail">
                  <img src="http://placehold.it/320x150" alt="">
                  <div class="caption">';
                  
                  echo '"post("index.php", {t: '. $row['titulo'] .', a: ' . $row['autor'] . '})"'; //DEBUG
                  echo '<h4><a onclick="post("index.php", {t: '. $row['titulo'] .', a: ' . $row['autor'] . '})" href=item.php >'. $row['titulo'] .'</a></h4>';
		    $fp = fopen($row['autor'] . '_' . $row['titulo'] . '_desc.txt', 'r');
			if (!$fp) {
   			 echo '<p>DEBUG: vazio...</p>'; //FIXME: APENAS TEMPORARIO!!
			}
			$countchar = 0;
			$MAX_CHAR = 140;
			echo '<p>';
			while (false !== ($char = fgetc($fp)) and $countchar<$MAX_CHAR ) {
			    echo "$char";
			    $countchar++;
			}
			if($MAX_CHAR == $countchar)
				echo '...';
            echo '</p>';
            echo '</div>';
                  
                  $star_num = intval($row['ranking']);
                  if($star_num > 5)
                        $star_num = 5;
                  elseif ($star_num < 0)
                        $star_num = 0;
                        
                  $star_max = 5; //numero maximo de estrelas possiveis
                  $num_empty_stars = $star_max - $star_num;
                  
                  echo   '<div class="ratings">
                            <p class="pull-right">' . $row['reviews'] . ' reviews</p>';
                  echo '<p>';
                  for($i = $star_num; $i > 0; $i -= 1) {
                      echo '<span class="glyphicon glyphicon-star"></span>';
                  }
                  for($i = $num_empty_stars; $i > 0; $i -= 1) {
                      echo '<span class="glyphicon glyphicon-star-empty"></span>';
                  }
                  echo '  </p>
                            </div>
                        </div>
                    </div>';

            }

		?>


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
