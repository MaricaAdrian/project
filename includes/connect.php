<?php

$db = mysqli_connect("localhost", "root", "", "licenta");

if(!$db)
{
    echo "Error connecting to db!" . mysqli_connect_error();
}

session_start();

/* 
Cum se foloseste:

$masini = getAllFrom("masini");

foreach($masini as $masina)
{
    echo $masina['id']; 
    //SAU
    echo $masina->id;
}


*/
function getAllFrom($table)
{
    $table = mysqli_escape_string($db, $table);
    $result = mysqli_query($db, "SELECT * FROM " . $table);

    if(mysqli_affected_rows($db))
    {
        return mysqli_fetch_all($result, MYSQLI_BOTH);
    }
    else
    {
        return "Table is empty";
    }
}



/* 
Cum se foloseste:

$masini = getAllFrom("masini", 5);

foreach($masini as $masina)
{
    echo $masina['id']; 
    //SAU
    echo $masina->id;
}


*/

function getAllFromWhereId($table, $id)
{
    $table = mysqli_escape_string($db, $table);
    $id = mysqli_escape_string($db, $id);
    $result = mysqli_query($db, "SELECT * FROM " . $table . " WHERE id = '". $id ."'");
    if(mysqli_affected_rows($db))
    {
        return mysqli_fetch_all($result, MYSQLI_BOTH);
    }
    else
    {
        return "Table is empty";
    }
}


/*
Cum se foloseste:
$sters = deleteFromWhereId("curse", 2);
if($sters)
{
    echo "Cursa a fost stearsa";
}
else
{
    echo "Nu s-a gasit cursa dorita";
}

*/
function deleteFromWhereId($table, $id)
{
    $result = mysqli_query($db, "DELETE FROM " . $table . " WHERE id = '". $id ."'");
    if(mysqli_affected_rows($db))
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

function redirect($location)
{
    header("Location: " . $location);

    return null;
}