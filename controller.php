<?php

function add_action()
{
    $json = $_REQUEST['json'];
    $obj = json_decode($json);

    validate_obj_or_return_error($obj);

    $id = $obj->id;
    foreach ($_SESSION['wishlist'] as $key => $item) {
        if ($item["id"] == $id) {
            $data = array(
                'error_code' => '400',
                'error_message' => 'ID  is exists',
            );
            return response_json(404, $data);
        }
    }

    $_SESSION['wishlist'][] = array(
        'id' => $obj->id,
        'wish_list_item' => $obj,
    );

    $data = $_SESSION['wishlist'];
    response_json(200, $data);
}

function update_action()
{
    if (empty($_GET['id'])) {
        $data = array(
            'error_code' => '400',
            'error_message' => 'ID param is wrong!',
        );
        return response_json(404, $data);
    }

    $json = $_REQUEST['json'];
    $obj = json_decode($json);

    validate_obj_or_return_error($obj);

    $id = $_GET['id'];
    $updated_flag = false;

    foreach ($_SESSION['wishlist'] as $key => $item) {
        if ($item["id"] == $id) {
            $_SESSION['wishlist'][$key]['wish_list_item'] = $obj;
            $updated_flag = true;
            break;
        }
    }

    if (!$updated_flag) {
        $data = array(
            'error_code' => '404',
            'error_message' => 'The item with current ID is missing!',
        );
        return response_json(404, $data);
    }

    $data = $_SESSION['wishlist'];
    response_json(200, $data);
}

function remove_action()
{
    if (empty($_GET['id'])) {
        $data = array(
            'error_code' => '400',
            'error_message' => 'ID param is wrong!',
        );
        return response_json(404, $data);
    }

    $id = $_GET['id'];
    $deleted_flag = false;

    foreach ($_SESSION['wishlist'] as $key => $item) {
        if ($item["id"] == $id) {
             unset($_SESSION['wishlist'][$key]);
             $deleted_flag = true;
             break;
        }
    }

    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);

    if (!$deleted_flag) {
        $data = array(
            'error_code' => '404',
            'error_message' => 'The item with current ID is missing!',
        );
        return response_json(404, $data);
    }

    $data = $_SESSION['wishlist'];
    response_json(200, $data);

}

function clear_action()
{
    unset($_SESSION['wishlist']);
    response_json(200, []);
}

function get_action()
{
    $data = $_SESSION['wishlist'];
    response_json(200, $data);
}