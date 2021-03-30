<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Lägg till produkt</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="images/favicon.svg" type="image/ico" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    
    <script type="text/javascript">
        function CheckType(value){
         var element=document.getElementById('clockspeed');
         var element2=document.getElementById('watt');
         if(value=='Grafikkort'||value=='Processor'||value=='Minne')
           element.style.display='block';
         else  
           element.style.display='none';
         if(value=='Nataggregat')
           element2.style.display='block';
         else  
           element2.style.display='none';
         }
    </script> 
</head>

<body class="bg-image" style="background-image: linear-gradient(12deg, rgba(193, 193, 193,0.05) 0%, rgba(193, 193, 193,0.05) 2%,rgba(129, 129, 129,0.05) 2%, rgba(129, 129, 129,0.05) 27%,rgba(185, 185, 185,0.05) 27%, rgba(185, 185, 185,0.05) 66%,rgba(83, 83, 83,0.05) 66%, rgba(83, 83, 83,0.05) 100%),linear-gradient(321deg, rgba(240, 240, 240,0.05) 0%, rgba(240, 240, 240,0.05) 13%,rgba(231, 231, 231,0.05) 13%, rgba(231, 231, 231,0.05) 34%,rgba(139, 139, 139,0.05) 34%, rgba(139, 139, 139,0.05) 71%,rgba(112, 112, 112,0.05) 71%, rgba(112, 112, 112,0.05) 100%),linear-gradient(236deg, rgba(189, 189, 189,0.05) 0%, rgba(189, 189, 189,0.05) 47%,rgba(138, 138, 138,0.05) 47%, rgba(138, 138, 138,0.05) 58%,rgba(108, 108, 108,0.05) 58%, rgba(108, 108, 108,0.05) 85%,rgba(143, 143, 143,0.05) 85%, rgba(143, 143, 143,0.05) 100%),linear-gradient(96deg, rgba(53, 53, 53,0.05) 0%, rgba(53, 53, 53,0.05) 53%,rgba(44, 44, 44,0.05) 53%, rgba(44, 44, 44,0.05) 82%,rgba(77, 77, 77,0.05) 82%, rgba(77, 77, 77,0.05) 98%,rgba(8, 8, 8,0.05) 98%, rgba(8, 8, 8,0.05) 100%),linear-gradient(334deg, hsl(247,0%,2%),hsl(247,0%,2%)); height: 100vh" onload='CheckType(type.value)'>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3 mb-4" id="menu">  
        <button class="btn btn-primary btn-warning pt-0 pb-0 pl-2 pr-2" onclick="javascript:history.back()"><h2>&larr;</h2></button>
      <div class="m-auto">
          <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
      </div>
    </nav> 
    

    <div class="row w-75 m-auto">
        <form action="insert.php" method="post" class="text-light m-auto bg-dark p-5 col-md-8 col-lg-5">
          <div class="form-group ">
            <label>Titel för produkt</label>
            <input type="text" class="form-control" name="title" placeholder="Titel">
          </div>
          <div class="form-group">
            <label>Pris</label>
            <input type="number" class="form-control" name="pris">
          </div>
          <div class="form-group">
            <label>Typ</label>
            <select class="form-control" name="type" id="type" onchange='CheckType(this.value)'>
              <option value="Grafikkort" selected>Grafikkort</option>
              <option value="Processor">Processor</option>
              <option value="Moderkort">Moderkort</option>
              <option value="Nataggregat">Nätaggregat</option>
              <option value="Minne">Minne</option>
              <option value="Chassi">Chassi</option>
            </select>
          </div>
          <div class="form-group" id="clockspeed">
            <label>Clockspeed</label>
            <input type="number" class="form-control" name="clockspeed">
          </div>
          <div class="form-group" id="watt">
            <label>Watt</label>
            <input type="number" class="form-control" name="watt">
          </div>
          <div class="form-group">
            <label>Produktbild</label>
            <input type="file" class="form-control-file" name="image">
          </div>
          <div class="form-group">
            <label >Beskrivning av produkt</label>
            <textarea class="form-control" name="description" placeholder="Beskrivning av produkten..."></textarea>
          </div>
          <button type="submit" value="Submit" class="btn btn-primary btn-warning">Submit</button>
        </form>
    </div>

</body>
</html>