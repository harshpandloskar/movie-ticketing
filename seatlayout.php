<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seat Layout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/seatlayout.js"></script>
  <link rel="stylesheet" href="assets/seatlayout.css">
  <link rel="manifest" href="manifest.json">
  <script>
    /**
    * Registrering service worker in sw.js
    */
    if('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/sw.js')
        .then(function() {
              console.log('Service Worker Registered');
        });
    }
  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Movies</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="contactus.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- 
<div class="jumbotron">
  <div class="container text-center">
    <h2>DBS - Movies</h2> 
  </div>
</div> -->
  
<div class="jumbotron container-fluid bg-3 text-center">    
    <div class="movies-data">
        <div class="_movie-title"></div>

        <div class="seatlayout-design">
          <div id="messagePanel" class="messagePanel"></div>
          <div id="_screen"><p class="_screen-para" style="font-size: 12px;">All eyes this way please!</p></div>
          <br/>
          <div id="proceedBtn" style="display:none;">
              <button onclick="sendToConfirmation();" type="button" class="btn btn-primary">Confirm Booking</button>
          </div>
        </div>
    </div>
</div><br/><br/>

<footer class="container-fluid text-center">
  <p>Harsh Pandloskar (10384363) | MSc In Information Systems with Computing</p><br>
  <p>Movies PWA | Web Assignment</p>
</footer>

</body>
</html>
