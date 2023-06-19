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

            echo '></' . $el['type'] . '>
            ';

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

            echo ' paint></' . $el['type'] . '>
            ';

        }

    }

    function associate_elements($elements, $ex) {

        if (count($elements) != 2) {
            err(601);
            return;
        }

        echo '<associate><div>
        ';
        
        foreach ($elements[0] as $el) {

            echo '<' . $el['type'];

            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo '></' . $el['type'] . '>
            ';

        }

        echo '</div><div>';
        
        foreach ($elements[1] as $el) {

            echo '<' . $el['type'];

            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo '></' . $el['type'] . '>
            ';

        }

        echo '</div></associate>
        ';

    }

    function count_figures($elements, $ex) {

        echo '<set>
        ';
        
        foreach ($elements[0] as $el) {

            echo '<' . $el['type'];

            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo '></' . $el['type'] . '>
            ';

        }
        
        foreach ($elements[1] as $el) {

            echo '<' . $el['type'];

            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

            }

            echo '></' . $el['type'] . '>';

        }

        echo '
        </set>';

    }

?>