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
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../css/shop-homepage.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="upload.php">Upload Texto</a> <!--TODO: METER LINK VÁLIDO -->
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

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <?php                  
                            $file = fopen($_GET['a'] . '_' .$_GET['t'] . '.txt', "r");
                            if (!$file)
                                die("author and/or text not found!");
                            echo '<h4>' . $_GET['t'] .' by '. $_GET['a'] .'</h4>';
                            echo fread($file,filesize($_GET['a'] . '_' .$_GET['t'] . '.txt'));
                            fclose($file);
                        ?>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
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
                                    //FIXME - SQL INJECTION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                                    //MUITO PERIGOSO!!!!!!!!!!!!!!!!!!!!!!!!!
                                    //CORRIGIR ESTA MERDA!!!!!!!!!!!!!!!!!!!!!!!!!11
                              
                              
                              		Function test_input($data) {
                        				$data = trim($data);
                        				$data = stripslashes($data);
                        				$data = htmlspecialchars($data);
                        				return $data;
                        			}
                        		   $sql="SELECT ranking FROM caixas WHERE titulo = \"" . test_input($_GET['t']) . "\" and autor = \"" . test_input($_GET['a']) . "\"";
                        	       $result = $connection->query($sql);
                                
                                  foreach($result as $row) {
                                      $star_num = intval($row['ranking']);
                                      if($star_num > 5)
                                            $star_num = 5;
                                      elseif ($star_num < 0)
                                            $star_num = 0;
                                            
                                      $star_max = 5; //numero maximo de estrelas possiveis
                                      $num_empty_stars = $star_max - $star_num;
                                      
                                      for($i = $star_num; $i > 0; $i -= 1) {
                                          echo '<span class="glyphicon glyphicon-star"></span>';
                                      }
                                      for($i = $num_empty_stars; $i > 0; $i -= 1) {
                                          echo '<span class="glyphicon glyphicon-star-empty"></span>';
                                      }
                                      echo floatval($row['ranking']) . ' stars';
                                      break;
                                  }
                             ?>
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

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
