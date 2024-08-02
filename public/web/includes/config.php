<?php

$serverName = "127.0.0.1";

$userName = "mfsadmin_dev";

$password = "Mfs.@123";

$con = new mysqli($serverName, $userName, $password, "mfsadmin_datav");
 if ($con->connect_error) die($con->connect_error);
