<?php
session_start();
session_destroy();
echo "<script>window.location='../../front-end/login.php';</script>";
