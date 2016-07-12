<?php

//session_destroy();

if (!empty($_GET['session_key'])) {
    session_id($_GET['session_key']);
}
session_start();

if (empty($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
    $_SESSION['wishlist_max_id'] = 0;
}

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/functions.php';


$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
$uri = parse_url($path, PHP_URL_PATH);

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch($action) {
    case 'add' :
        add_action();
        break;
    case 'update' :
        update_action();
        break;
    case 'remove' :
        remove_action();
        break;
    case 'clear' :
        clear_action();
        break;
    case 'get' :
        get_action();
        break;
    default:
        $data = array(
            'error_code' => '404',
            'error_message' => 'Action is not specified!',
        );
        response_json(404, $data);
}