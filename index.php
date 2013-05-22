<?php require_once('db_connect.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Timesheet</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="header">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="#">Logo</a>
                        <a class="active" href="#">Home</a>
                        <a href="#">Inner</a>
                    </div><!-- /container -->
                </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
        </div><!-- /header -->
        <div class="container">
            <div class="content">
                <table class="update">
                    <form id="save" method="post" action="update.php">
                        <input id="id" type="hidden" name="id" value=""/>
                        <tr rel="" class="edits data">
                            <td rel="name"><input type="text" name="name" value="" placeholder="Name"/></td>
                            <td rel="project"><input type="text" name="project" value="" placeholder="Project"/></td>
                            <td rel="description"><input type="text" name="description" value="" placeholder="Description"/></td>
                            <td rel="start"><input type="text" name="start" value="" placeholder="Start"/></td>
                            <td rel="end"><input type="text" name="end" value="" placeholder="End"/></td>
                            <td rel="date"><input type="text" name="date" value="" placeholder="Date"/></td>
                            <td rel="hours" class="small"><input type="text" name="hours" value="" placeholder="Hours" disabled/></td>
                            <td class="small"><input id="save" type="submit" name="save" value="Save" class="btn" /><input id="add" type="submit" name="add" value="Add" class="btn" /></td>
                        </tr>
                    </form>
                </table> 
                <table id="log">
                    <tr class="header">
                        <td>Name</td><td>Project</td><td rel="description">Description</td><td>Start Time</td><td>End Time</td><td>Date</td><td class="small">Hours</td><td class="small"></td>
                    </tr>
    <?php
    $query = mysql_query("SELECT * FROM timesheets"); 
        while ($row = mysql_fetch_array($query)) {


            $name = $row['name'];
            $id = $row['id'];
            $project = $row['project'];
            $description = $row['description'];
            $start = $row['start'];
            $end = $row['end'];
            $hours = $row['hours'];
            $date = $row['theDate'];
            
            echo '<tr rel="' . $id . '" class="data">';
            echo '<td rel="name">'. $name . '</td>';
            echo '<td rel="project">' . $project . '</td>';
            echo '<td rel="description">' . $description . '</td>';
            echo '<td rel="start">' . $start . '</td>';
            echo '<td rel="end">' . $end . '</td>';
            echo '<td rel="date">' . $date . '</td>';
            echo '<td rel="hours" class="small">' . $hours . '</td>';
            echo '<td class="small"><a class="edit" rel="' . $id . '" href="#edit">Edit</a></td>';
            echo '<tr>';
        }
     
?>
                </table>
            </div> <!-- /content -->
        </div><!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>