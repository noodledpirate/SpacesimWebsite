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
            <h1>About Us</h1>
        </div>
        <!-- Content goes in this div -->


        <div class="col-md-10 col-md-offset-1 well" id="content-container">
            
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
        
        // Insert planetarium content into page
        
        // Open file
        $myFile = fopen("markdownPages/about.MD", "r") or die("Unable to open file!");
        
        // Read file
        $fileText = fread($myFile, filesize("markdownPages/about.MD"));
        
        // Parse Markdown into HTML using Parsedown
        $fileText = $Parsedown->text($fileText);
        
        // Replace newlines with <br>
        $fileText = preg_replace("/\r\n|\r|\n/",'<br/>',$fileText);
        
        // Add to page
        echo '$("#content-container").append("' .  $fileText . '");';
        
        // Close file
        fclose($myFile);
        ?>
    </script>
</body>
</html>