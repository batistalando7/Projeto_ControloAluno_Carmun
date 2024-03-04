<?php
session_start();

    session_destroy();
    echo "<script language='javascript' type='text/javascript'>
    alert('logout!');
    window.location.href='Page_Login.php'
    </script>";
