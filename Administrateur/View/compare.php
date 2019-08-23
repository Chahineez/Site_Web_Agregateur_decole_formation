<?php 
include_once 'View.php' ;
        echo "<body>";
        $view = new View(1,1);
        $view->head();
        echo '
        <body>
        <div id="containerZone" class="row"> ';
        $view->menu();
        echo '<div id="containerZoneCompare">';
        $view->compare();
        $view->zoneCompare1();
        $view->zoneCompare2();
        echo '</div>';
        echo '</div>';
        echo "</body>";
        $view->footer();
  ?>
