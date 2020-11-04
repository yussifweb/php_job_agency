<?php
    $connect = mysqli_connect( 'localhost', 'root', '', 'job' );

    if ( !$connect ) {
        die( 'Unable to connect' ) ;
    } 

?>