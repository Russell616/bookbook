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

<style>
    textarea.wideInput{
    text-align: left;
    padding-left:0;
    padding-top:0;
    padding-bottom:0.4em;
    padding-right: 0.4em;
    width: 500px  !important;
    height: 150px  !important;
}
    textarea.lessWideInput{
    text-align: left;
    padding-left:0;
    padding-top:0;
    padding-bottom:0.4em;
    padding-right: 0.4em;
    width: 500px  !important;
    height: 350px  !important;
}
    .direita{
    	right: 5px;
    }        
        
</style>

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
                <a class="navbar-brand" href="index.php">Book Book</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="upload.php">Upload Text</a> <!--TODO: METER LINK VÁLIDO -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>            
            <div class="col-md-9">
                <div class="caption-full">
                    <form action= "upload_file.php" method="post" >
                        <p>Title:</p> <input type="text" name="titulo" style="width: 500px;" required/>
                        <p>Description:</p> <textarea type="text" name="descricao" class="wideInput" required></textarea>
                        <p>Text:</p> <textarea type="text" name="texto" class="lessWideInput" required></textarea>
                        <p>Name of the writer: </p><input type="text" name="autor" style="width: 500px;" required/></p>
                        <p class="text-right" ><input type="submit" value="Publish!" class="btn btn-success"/></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>