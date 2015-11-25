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
            <h1>Join Us</h1>
        </div>
        <!-- Content goes in this div -->


        <div class="col-md-10 col-md-offset-1 well">
            <!-- Map, address and other quick info -->
            <div class="col-md-6">
                <div id="map"></div>
            </div>
            <div class="col-md-6" id="content-container">
                
            </div>
            <br>
            
        </div>
    </div>


    <footer class="footer">
    </footer>
    <!-- Google Maps -->
    <!-- Load API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvOBtdKCSeVozN_mpUUCj9-1YMeJvd0ts&signed_in=true&callback=initMap"></script>
    <!-- Make the map -->
    <script>
    function initMap() {
        
    // Object with Space Sim location
    var spaceSim = {
        lat: 45.41691219999999,
        lng: -75.70647889999998
    };
    
    // Object with Lisgar location
    var lisgar = {
        lat: 45.420248,
        lng: -75.68910110000002
    };

    // Create the map
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: spaceSim
    });
    
    // Space Sim info window
    var spaceSimInfoWindow = new google.maps.InfoWindow({
        content: '<p style="color: black">440 Albert Street, where work sessions take place every Friday.</p>'
    });
    
    // Lisgar info window
    var lisgarInfoWindow = new google.maps.InfoWindow({
        content: '<p style="color: black">Lisgar Collegiate Institute, where a large portion of Space Sim members come from.</p>'
    });
    
    // Create Space Sim location marker
    var spaceSimMarker = new google.maps.Marker({
        position: spaceSim,
        map: map,
        title: '440 Albert Street',
        label: 'S'
    });
    
    // Spacesim event listener to open info window on click
    spaceSimMarker.addListener('click', function() {
        spaceSimInfoWindow.open(map, spaceSimMarker);
    });
    
    // Lisgar event listener for info window
    lisgarMarker.addListener('click', function() {
        lisgarInfoWindow.open(map, lisgarMarker);
    });
    
    // Create Lisgar location marker
    var lisgarMarker = new google.maps.Marker({
        position: lisgar,
        map: map,
        title: 'Lisgar Collegiate Institute',
        label: 'L'
    });
    }
    
    // Put in Markdown
    <?php
        
        // Include Parsedown library
        include 'php/Parsedown.php';
        
        // Create Parsedown object
        $Parsedown = new Parsedown();
        
        // Insert planetarium content into page
        
        // Open file
        $myFile = fopen("markdownPages/joinUs.MD", "r") or die("Unable to open file!");
        
        // Read file
        $fileText = fread($myFile, filesize("markdownPages/joinUs.MD"));
        
        // Parse Markdown into HTML using Parsedown
        $fileText = $Parsedown->text($fileText);
        
        // Replace newlines with <br>
        $fileText = preg_replace("/\r\n|\r|\n/",'<br/>',$fileText);
        
        // Add to page
        echo '$("#content-container").append("' .  $fileText . '");';
        
        // Close file
        fclose($myFile);
        ?>
        
        // Apply text styling
        $("#content-container p").attr('id', 'joinUsText');
    </script>
</html>