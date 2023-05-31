<?php

    include 'activities.php';

    function create_activity($activity) {

        $type       = $activity['type'];
        $elements   = $activity['elements'];
        $example    = isset($activity['example']) ? $activity['example'] : false;
        
        $activities = [
            'fill_gap',
            'paint_figures',
            'associate_elements'
        ];

        echo '<article class="activity">';
        
        $activities[$type-1]($elements, $example);

        echo '</article>';

    }

?>