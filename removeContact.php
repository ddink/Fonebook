<?php
$connection = mysql_connect("localhost", "root", "root");
mysql_select_db("phonebook", $connection);

if(isset($_POST['row'])){
    $row_id = $_POST['row'];
    $sql = "DELETE FROM contacts WHERE id='$row_id'";
    mysql_query($sql);
}
