<?php
    include_once 'dbh.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Hem</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="images/favicon.svg" type="image/ico" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    
    <script>
        $(document).ready(function() {
            var type='Grafikkort';
            $("#grafikkort").addClass("active");
            $("#content").load("loadproducts.php", {
                producttype: type
            });
            $("a").click(function() {
                var type=this.name;
                $("a").removeClass("active");
                this.classList.add("active");
                $("#keyword").val("");
                $("#producttype").val(type);
                $("#content").load("loadproducts.php", {
                producttype: type
            });
                
        });

        $("button.varukorg").click(function() {
                $("#content").load("varukorg.php", {
            });
        });
        
        $("#keyword").keyup(function() {
            var type = $('#producttype').val();
            var keyword = $("#keyword").val();
            $.ajax({
             url: 'loadproducts.php',
             type: 'POST',
             data: { keyword: keyword, producttype: type },
             success: function(data){
                 if(data != ''){							 
                     $('#content').empty().append(data);
                 }
             }
         }); 
        });
     });
        
    </script>
</head>

<body class="bg-image" style="background-image: linear-gradient(12deg, rgba(193, 193, 193,0.05) 0%, rgba(193, 193, 193,0.05) 2%,rgba(129, 129, 129,0.05) 2%, rgba(129, 129, 129,0.05) 27%,rgba(185, 185, 185,0.05) 27%, rgba(185, 185, 185,0.05) 66%,rgba(83, 83, 83,0.05) 66%, rgba(83, 83, 83,0.05) 100%),linear-gradient(321deg, rgba(240, 240, 240,0.05) 0%, rgba(240, 240, 240,0.05) 13%,rgba(231, 231, 231,0.05) 13%, rgba(231, 231, 231,0.05) 34%,rgba(139, 139, 139,0.05) 34%, rgba(139, 139, 139,0.05) 71%,rgba(112, 112, 112,0.05) 71%, rgba(112, 112, 112,0.05) 100%),linear-gradient(236deg, rgba(189, 189, 189,0.05) 0%, rgba(189, 189, 189,0.05) 47%,rgba(138, 138, 138,0.05) 47%, rgba(138, 138, 138,0.05) 58%,rgba(108, 108, 108,0.05) 58%, rgba(108, 108, 108,0.05) 85%,rgba(143, 143, 143,0.05) 85%, rgba(143, 143, 143,0.05) 100%),linear-gradient(96deg, rgba(53, 53, 53,0.05) 0%, rgba(53, 53, 53,0.05) 53%,rgba(44, 44, 44,0.05) 53%, rgba(44, 44, 44,0.05) 82%,rgba(77, 77, 77,0.05) 82%, rgba(77, 77, 77,0.05) 98%,rgba(8, 8, 8,0.05) 98%, rgba(8, 8, 8,0.05) 100%),linear-gradient(334deg, hsl(247,0%,2%),hsl(247,0%,2%)); height: 100vh">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3" id="menu">   
      <form class="form-inline my-2 my-lg-0 w-100 d-flex justify-content-center">
          <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
          <div class="input-group w-50" style="min-width: 18rem;">
             <form>
                  <input type="text" class="form-control rounded" placeholder="Sök" aria-label="Search" aria-describedby="search-addon" id="keyword"/>
              </form>
          </div>
      </form>
        <button class="btn btn-primary btn-warning varukorg">Varukorg</button>
    </nav> 
    <nav class="navbar nav-fill navbar-expand-lg navbar-dark bg-dark" id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav nav-tabs w-100 nav-fill bg-dark">
            <li class="nav-item"><a class="nav-link" name="Grafikkort" id="grafikkort">Grafikkort</a></li>
            <li class="nav-item"><a class="nav-link" name="Processor">Processorer</a></li>
            <li class="nav-item"><a class="nav-link" name="Moderkort">Moderkort</a></li>
            <li class="nav-item"><a class="nav-link" name="Nataggregat">Nätaggregat</a></li>
            <li class="nav-item"><a class="nav-link" name="Minne">Minne</a></li>
            <li class="nav-item"><a class="nav-link" name="Chassi">Chassi</a></li>
        </ul>
        </div>
    </nav>
    
    <div class="text-light pt-4 ml-5 mr-5" id="content">
    </div>
   
    
</body>
</html>