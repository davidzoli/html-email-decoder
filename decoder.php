<?php
    include('fileHandler.php');
    $fh = new fileHandler();
    echo quoted_printable_decode($fh->get());