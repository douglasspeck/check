<?php

    function fill_gap($elements, $ex) {

        if (count($elements) != 2) {
            err(601);
            return;
        }
        
        foreach ($elements as $el) {

            echo '<' . $el['type'];
            
            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo '></' . $el['type'] . '>';

        }

    }

    function paint_figures($elements, $ex) {

        if (count($elements) != 2) {
            err(601);
            return;
        }
        
        foreach ($elements as $el) {

            echo '<' . $el['type'];

            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo ' paint></' . $el['type'] . '>';

        }

    }

?>