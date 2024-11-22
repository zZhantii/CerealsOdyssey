<?php
include("../../Backend/parametros.php");
session_start();
session_destroy();
header("location:" . url_base . "?controller=categories");
