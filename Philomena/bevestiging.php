<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philomena</title>
    <link rel="stylesheet" href="style.css">
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/core/locales/nl.js'></script>
    <script src="calendar.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php
    require "config.php";
    // require "catcher.php";
    
  ?>

  <div id="signout">
    <a href="logout.php">Sign Out</a>
  </div>
  <div id="container">
    <div id="afspraak_form">
      <div id="afspraak_title">
        <h2>Wat kan Philomena voor u betekenen</h2>
          
      </div>
      <div id="afspraak_content">

       
        <div id="bevestiging">
          <div>
            <h3>
            Bedankt voor u gemaakte afspraak.<br>
            U krijgt later een bevestigings email.
            </h3>
          </div>


        </div>

    </div>

    </div>
  </div>
    
      <script src="https://unpkg.com/vue@3.0.11"></script>
      <script src="app.js"></script>
</body>
</html>