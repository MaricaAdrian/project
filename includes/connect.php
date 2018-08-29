<?php

$db = mysqli_connect("localhost", "root", "", "licenta");

if(!$db)
{
    echo "Error connecting to db!" . mysqli_connect_error();
}
