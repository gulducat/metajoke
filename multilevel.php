<?php // <3 db

  $title = 'A Jokey Joke for Jokey Jokers';
  $firstbit = 'A guy walks into a bar and asks the bartender for a free drink. '
    . 'The bartender says "I\'ll give you a free drink if you can tell me a ';
  $typeofjoke = array('multi-level meta joke." ', 'meta joke." ', 'good joke." ');
  $middlebit = 'So the guy says "';
  $joke = 'What do you do when you go to a bar and see a spaceman?  You park, man."';
  $lastbit = ' And the bartender gives him a free beer.';
  $lvl = 3;

?><html>
  <head>
    <title><?php echo $title; ?></title>
    <style>
      body{ font-family: sans-serif; padding-bottom: 15px }
      #wrapper{ max-width: 850px;  margin: 0 auto }
      pre{ display: none; overflow: scroll; border: solid 1px #ccc; padding: 10px }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#joke-code-btn").click(function(){
          if ( $(this).text() == "Show code" ) $(this).text("Hide code");
          else $(this).text("Show code");
          $("#joke-code").slideToggle();
        });
      });
    </script>
  </head>
  <body>
  <div id="wrapper">
  <h1><?php echo $title; ?></h1>

  <?php

    for ( $i=0; $i<$lvl; $i++ ){
      echo $firstbit . $typeofjoke[$i] . $middlebit;
    }

    echo $joke;

    for ( $i=0; $i<$lvl; $i++ ){
      echo $lastbit;
      if ( $i != $lvl-1 ){ echo '"'; }
    }

  ?><br/><br/><hr/>

  <a href="javascript:void(0)" id="joke-code-btn">Show code</a>
  <?php
    $thisfile = fopen("multilevel.php", "r") or die("No file man?");
    echo "<pre id='joke-code'>"
      . htmlspecialchars(fread($thisfile, filesize("multilevel.php")))
      . "</pre>";
    fclose($thisfile);
  ?><hr/>

  I couldn't help myself...
  <a href="http://www.reddit.com/r/Jokes/comments/2q7fb1/multilevel_meta_joke/" target="_blank">Source</a> of inspiration.
  </div>
  </body>
</html>
