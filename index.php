<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/main.js"></script>
  <link rel="stylesheet" href="assets/main.css">
  <script>
  window.fbAsyncInit = function() {
      // FB JavaScript SDK configuration and setup
      FB.init({
        appId      : '435154443644323', // FB App ID
        cookie     : true,  // enable cookies to allow the server to access the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
      });
      
      // Check whether the user already logged in
      FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
              //display user data
              getFbUserData();
          }
      });
  };

  // Load the JavaScript SDK asynchronously
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Facebook login with JavaScript SDK
  function fbLogin() {
      FB.login(function (response) {
          if (response.authResponse) {
              // Get and display the user profile data
              getFbUserData();
          } else {
              document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
          }
      }, {scope: 'email'});
  }

  // Fetch the user profile data from facebook
  function getFbUserData(){
      FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
      function (response) {
          document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
          document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
          document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
          document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
      });
  }

  // Logout from facebook
  function fbLogout() {
      FB.logout(function() {
          document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
          document.getElementById('fbLink').innerHTML = '<img src="./icons/fblogin-btn.png"/>';
          document.getElementById('userData').innerHTML = '';
          document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
          document.getElementById('userFirstName').style.display = "none"
          document.getElementById('userpic').style.display = "none"
      });
  }
  
  // Save user data to the database
  function saveUserData(userData){
      $.post('userData.php', {oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(data){ return true; });
  }

  function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        document.getElementById('fbLink').innerHTML = 'Logout';
        document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p>';
        document.getElementById('userpic').innerHTML = '<img src="'+response.picture.data.url+'"/>';
        document.getElementById('userFirstName').innerHTML = 'Hi '+response.first_name+'!';
        // Save user data
        saveUserData(response);
    });
}
  </script>
  <script type="text/javascript">
    /*
    * Registering service worker in sw.js file
    */
    if('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/sw.js')
        .then(function() {
              console.log('Service Worker Registered');
        });
    }
  </script>
  <script type="text/javascript">
    /**
    * Here I am storing all caches information related to listing and synopsis.
    */
    self.addEventListener('fetch', function(event) {
    console.log('Service Worker Fetch...');

    event.respondWith(
      caches.match(event.request)
        .then(function(response) {
          if(event.request.url.indexOf('facebook') > -1){
            return fetch(event.request);
          }
          if(response){
            console.log('Serve from cache', response);
            return response;
          }
          return fetch(event.request)
              .then(response =>
                caches.open(CURRENT_CACHES.prefetch)
                  .then((cache) => {
                    // cache response after making a request
                    cache.put(event.request, response.clone());
                    // return original response
                    return response;
                  })
              )}
        ))});
        /*--------------------------------------------------------------*/
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
        <li class="active"><a href="index.php">Home</a></li>
        <li class="active"><a href="contactus.php">Contact Us</a></li>
      </ul>
      <ul class="login-oauth">
        <li>
          <!-- Facebook user profile picture -->
          <div id="userpic"></div>
        </li>
        <li>
          <p id="userFirstName"></p>
        </li>
        <li>
          <!-- Facebook login or logout button -->
          <a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><img src="./icons/fblogin-btn.png"/></a>
        </li>
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
    <div class="loader">
        <img src="./assets/loader/loader.gif" />
    </div>
    <div class="movies-data" style="display:none;">
        <h3>Featured movies</h3><br>
        <div id="movie-listing-main">
        </div> 
    </div>
</div><br/><br/>

<footer class="container-fluid text-center">
<!-- Display login status -->
<div id="status"></div>

<!-- Display user profile data -->
<div id="userData"></div>
  <p>Harsh Pandloskar (10384363) | MSc In Information Systems with Computing</p><br>
  <p>Movies PWA | Web Assignment</p>
</footer>

</body>
</html>
