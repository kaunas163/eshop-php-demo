<?php

function user_data($conn, $user_id)
{
    $data = [];
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1)
    {
        unset($func_get_args[0]);
        unset($func_get_args[1]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT $fields FROM `users` WHERE `id` = $user_id"));
        return $data;
    }
}

function logged_in()
{
    return (isset($_SESSION['user_id'])) ? true : false;
}

function mysqli_result($res, $row, $field=0)
{
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

function user_exists($conn, $username)
{
    $query = mysqli_query($conn, "SELECT COUNT(id) FROM users WHERE username = '$username'");
    $check = mysqli_num_rows($query);
    return (mysqli_result($query, 0) == 1) ? true : false;
}

function get_user_id($conn, $username)
{
    return mysqli_result(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"), 0, 'id');
}

function login($conn, $username, $password)
{
    $user_id = get_user_id($conn, $username);

    $password = md5($password);

    $query = mysqli_query($conn, "SELECT COUNT(id) FROM users WHERE username = '$username' AND password = '$password'");
    return (mysqli_result($query, 0) == 1) ? $user_id : false;
}

function get_all_users($conn)
{
    $data = mysqli_fetch_all(mysqli_query($conn, "SELECT `id`, `username`, `role` FROM `users`"));
    return $data;
}

function redirect_if_not_logged_in()
{
    if(!logged_in())
    {
        header('Location: http://localhost/eshop-demo/views/users/login.php');
        exit();
    }
}

function redirect_if_not_admin() {
    // $user = user_data($conn, $_SESSION['user_id']);
    // echo $user['role'];
    // if ($user['role'] != 'admin') {
        // session_destroy();
        // header('Location: http://localhost/eshop-demo/views/users/login.php');
        // exit();
    // }
}