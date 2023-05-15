<?php

    function echo_elements($elements) {

        foreach ($elements as $el) {

            echo '<' . $el['type'];
            
            foreach ($el['parameters'] as $par) {

                echo ' ' . $par['name'] . '=' . $par['value'];

                if (isset($par['name']) && $par['value'] == 0) {
                    echo ' paint';
                }

            }

            echo '></' . $el['type'] . '>';

        }

    }

    function fill_gap($elements, $ex) {

        count($elements) != 2 ? err(601) : echo_elements($elements);

    }

    function paint_figures($elements, $ex) {

        count($elements) != 2 ? err(601) : echo_elements($elements);

    }

?>