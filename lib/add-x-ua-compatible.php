<?php

// Add X-UA-Compatible tag
add_action( 'genesis_meta', 'bsg_x_ua_compatible' );

function bsg_x_ua_compatible() {
    ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
}
