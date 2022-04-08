<?php

function listAll($table, $dbconnect)
{
    $query = "select * from $table;";
    $result = mysqli_query($dbconnect, $query);
    $donnees = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $donnees[] = $data;
    }
    mysqli_free_result($result);
    return $donnees;
}