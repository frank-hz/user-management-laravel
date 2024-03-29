<?php 

if (!function_exists('verifyEditData')) {
    function verifyEditData($base_data, $edit_data) {
        $update_data = [];
        foreach ($edit_data as $key => $value) {
            if (!array_key_exists($key, $base_data)) continue;
            if (!empty($value) && $value != $base_data[$key] && $key != 'id'){
                $update_data[$key] = $value;
            }
        }
        return $update_data;
    }
}
