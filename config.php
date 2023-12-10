<?php

$conn = mysqli_connect("localhost", "root", "", "vignan feedback");

if (!$conn) {
    echo "Connection Failed";
}