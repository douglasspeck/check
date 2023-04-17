<?php

    include 'activities.php';

    function create_activity($activity) {

        $type       = $activity['type'];
        $elements   = $activity['elements'];
        $example    = $activity['example'];
        
        $activities = [
            'fill_gap'
        ];

        echo '<article class="activity">';
        
        $activities[$type-1]($elements, $example);

        echo '</article>';

    }

?>