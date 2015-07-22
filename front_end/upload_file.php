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
    
    <div class="container">
        <div class="row">
			<p>Sera encamihado para a página principal dentro de momentos...por favor aguarde...</p>
			
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
                    
                    Function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    
                    //FIXME - SQL INJECTION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    //MUITO PERIGOSO!!!!!!!!!!!!!!!!!!!!!!!!!
                    //CORRIGIR ESTA MERDA!!!!!!!!!!!!!!!!!!!!!!!!!11
                    
                    $sql="SELECT * FROM caixas WHERE titulo = '" . test_input($_POST['titulo']) . "' AND autor = '". test_input($_POST['autor']) . "'";
                    $result = $connection->query($sql);
                    
                    if ($result->rowCount() > 0) {
                        ob_start(); 
                        
                        echo "<script type='text/javascript'>alert(já existe um texto com este titulo, por favor tente outro...);</script>";
                        header("Location: index.php"); /* Redirect browser */
                        echo "<script>window.close();</script>";
                        
                        ob_end_flush();
                        exit();
                    }
                    
                    
                    $sql="INSERT INTO caixas VALUES('" . test_input($_POST['titulo']) . "', '". test_input($_POST['autor']) . "', 0.0, 0)";                   
                    $connection->query($sql);
                    
                    $file = fopen("" . $_POST['autor'] ."_" . $_POST['titulo'] . ".txt", "w");
                    if (!$file)
                        die("ERRO! texto não pode ser criado.");
                    fwrite($file, $_POST['texto']);
                    fclose($file);
                    
                    $file = fopen("" . $_POST['autor'] ."_" . $_POST['titulo'] . "_desc.txt", "w");
                    if (!$file)
                        die("ERRO! texto não pode ser criado.");
                    fwrite($file, $_POST['descricao']);
                    fclose($file);
                                        
                    header("Location: index.php"); /* Redirect browser */
                    echo "<script>window.close();</script>";
                    exit();
			?>
			
            <div class="col-md-3"></div>            
            <div class="col-md-9">
                <div class="caption-full">
                </div>
            </div>
        </div>
    </div>
    
</body>