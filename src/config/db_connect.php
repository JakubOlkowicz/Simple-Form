<?php 

$conn = mysqli_connect('localhost', 'root', '', 'simple-form');

if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

?>