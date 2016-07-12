<?php

function response_json($code, $data)
{
    http_response_code($code);
    header('Content-Type: application/json');
    header('Session-Key: ' . session_id());
    echo json_encode($data);
    exit;
}

function validate_obj_or_return_error($obj)
{
    if (!is_object($obj)) {
        $data = array(
            'error_code' => '400',
            'error_message' => 'JSON param is wrong!',
        );
        return response_json(404, $data);
    }
}