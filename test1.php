<?php
$password=123;
$hash = password_hash($password, PASSWORD_DEFAULT);
//$hash = '$2y$10$MJ/G0TmP7zYLw9VifunK6uL29d96EQ8DoDNFk8YhoY4';
           $2y$10$XbWntp0dqSaFzxw01EScJ.jJtymG1AUYHJmgZkg0D.gqQ0RUY4V4i
if (password_verify($password, $hash)) {
    echo 'Password is valid!'.$password;
    echo "$hash";
} else {
    echo 'Invalid password.';
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);