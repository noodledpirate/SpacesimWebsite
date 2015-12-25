<!DOCTYPE html>
<html>
<head>
    <title>OCE SpaceSim</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content=
    "OCESS is a non-profit organization dedicated to informing and involving students from across Ontario about space and science." name=
    "description">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div id="menu-container">
    </div>


    <header class="header">
    </header>


    <div class="container">
        <div class="page-header">
            <h1>EEPS</h1>
        </div>
        <!-- Content goes in this div -->


        <div class="col-md-10 col-md-offset-1 well content-container">
            <span id="main-content-container">

            </span>
            <br>


            <h3>EEPs Demonstrations</h3>
            <!-- Newtonian physics panel -->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Newtonian Physics</h4>
                </div>


                <div class="panel-body">
                    <p>In our Newton’s Laws demonstration, presenters teach the basic properties of motion: inertia, friction, and
                    momentum. Our hovercraft is frequently used to model motion in a frictionless environment, and how this affects
                    astronauts working in space. Audience members are encouraged to take part in the demonstration, and extra time can be
                    given for hovercraft rides at the end of the presentation. (30-45 min.)</p>
                </div>
            </div>
            <!-- Rocketry panel -->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Rocketry</h4>
                </div>


                <div class="panel-body">
                    <p>In our rocketry demonstration, presenters will teach their audience about means of propulsion, and the fundamentals
                    of orbits. A scale model of the Saturn V rocket is used to illustrate how the stages of rockets work. (20-30 min.)</p>
                </div>
            </div>
            <!-- Phases of the moon panel -->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Phases of the Moon</h4>
                </div>


                <div class="panel-body">
                    <p>In this demonstration, presenters will teach their audience about why the moon appears to change its shape over the
                    course of a month and the names of the moon in each of its phases. Presenters also explain why some constellations are
                    only visible at certain times of year, how the rotation of the Earth on its axis causes our cycle of day and night, and
                    how its tilt causes seasonal changes. This is an excellent presentation for younger audiences, who are beginning to
                    develop and interest in astronomy. (20-30 min.)</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>


    <footer class="footer">
    </footer>

    <script>
        <?php

        // Include Parsedown library
        include 'php/Parsedown.php';

        // Create Parsedown object
        $Parsedown = new Parsedown();

        // Add main EEPS content

        // Open file
        $mainFile = fopen("markdownPages/eeps/main.MD", "r") or die("Unable to open file!");

        // Read file
        $mainText = fread($mainFile, filesize("markdownPages/eeps/main.MD"));

        // Parse Markdown into HTML using Parsedown
        $mainText = $Parsedown->text($mainText);

        // Replace newlines with <br>
        $mainText = preg_replace("/\r\n|\r|\n/",'<br/>', $mainText);

        // Add to page
        echo '$("#main-content-container").append("' .  $mainText . '");
        ';

        // Close file
        fclose($mainFile);

        // List all title files
        $titleDir = "markdownPages/eeps/planetariums/titles/*";
        $titles = [];
        foreach(glob($titleDir) as $file) {
          if (!is_dir($file)) {
            array_push($titles, basename($file));
          }
        }

        // List all the description files
        $descriptionDir = "markdownPages/eeps/planetariums/descriptions/*";
        $descriptions = [];
        foreach(glob($descriptionDir) as $file) {
          if (!is_dir($file)) {
            array_push($descriptions, basename($file));
          }
        }

        // Put titles and descriptions into page
        $count = 0;
        foreach($titles as $val) {

          // Add title
          $titleFile = fopen("markdownPages/eeps/planetariums/titles/" . $val, "r") or die("Unable to open file!");
          $titleText = fread($titleFile, filesize("markdownPages/eeps/planetariums/titles/" . $val));
          $titleText = $Parsedown->text($titleText);
          $titleText = preg_replace("/\r\n|\r|\n/",'<br/>', $titleText);
          echo "$('#content-container').append('<div class=\"panel panel-default\">');
          ";
          echo "$('#content-container').append('<div class=\"panel-heading\">";
          echo $titleText . "');";
          echo "$('#content-container').append('</div>');";
          echo "$('#content-container').append('<div class=\"panel-body\">";

          // Add description
          $descriptionFile = fopen("markdownPages/eeps/planetariums/descriptions/" . $descriptions[$count], "r") or die("Unable to open file!");
          $descriptionText = fread($descriptionFile, filesize("markdownPages/eeps/planetariums/descriptions/" . $descriptions[$count]));
          $descriptionText = $Parsedown->text($titleText);
          $descriptionText = preg_replace("/\r\n|\r|\n/",'<br/>', $descriptionText);
          echo $descriptionText . "');";
          echo "$('#content-container').append('</div></div>');
          ";

          // Increment counter
          $count++;
        }
        ?>
    </script>
</body>
</html>
