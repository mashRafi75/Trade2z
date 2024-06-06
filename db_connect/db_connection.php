<?php


$conn = mysqli_connect('localhost', 'root', '', 'dbms');


if(!$conn){
	echo 'Connection erron: '.mysqli_connect_error();
}


?>