<?php
?>
<!doctype html>
<html lang="fr">


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StageFinder</title>
  <link rel="stylesheet" href="stylelogin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="serviceworker" href="ServiceWorker.js">
  <link rel="manifest" href="manifest.json">


  <script>
    if('serviceWorker' in navigator){
      navigator.serviceWorker.register('ServiceWorker.js')
      .then((sw)=>console.log('ServiceWorker registration successful with scope', sw))
      .catch((err)=>console.log('ServiceWorker registration failed', err));
    }
  </script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125%;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 200%) {
      .bd-placeholder-img-lg {
        font-size: 3.5%;
      }
    }
  </style>


  <link href="signin.css" rel="stylesheet">
</head>


<body class="text-center">

  <main class="form-signin">
    <form>
      <div class="form-title">
        <h1>StageFinder</h1>
        <img class="mb-4" src="logo1.png" alt="" width="92" height="117">
        
      </div>

      <h1 class="h3 mb-3 fw-normal">Please log in</h1>

      <div class="form-floating">
        <label for="floatingInput">Email address:</label>
        <input type="email" class="form-control" id="floatingInput" placeholder="Enter your email">
      </div>

      <div class="form-floating">
        <label for="floatingPassword">Password:</label>
        <input type="password" class="form-control" id="floatingPassword" placeholder="Enter your password">
      </div>

      <div class="button">
      <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
    </div>
  </form>
  </main>


  <footer id="footer">
    <div class="footer-basic">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">About</a></li>
          <li class="list-inline-item"><a href="#">Privacy policy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
        </ul>
        <p class="copyright">StageFinder © 2022</p>
    </div>
  </footer>
    </div>
  </footer>
</body>

</html>

