<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$connection = mysql_connect("localhost", "root", "root");
$db = mysql_select_db("phonebook", $connection);
if (isset($_POST['first_name'])) {
$query = mysql_query("insert into contacts(first_name, last_name, phone_number) values ('$first_name', '$last_name', '$phone_number')");
}
mysql_close($connection);
