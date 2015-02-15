<?php
if($_POST){
if (count($result['error']) > 0) {
        foreach ($result['error'] as $v) {
           echo '<p>' . $v . '</p>';
        }}}
?>
