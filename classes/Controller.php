<?php

namespace mnstrz\app;

class Controller
{
	public static function view($filename,$data=[])
	{
		extract($data);
		require_once __DIR__."/../views/$filename.php";
	}

	public static function request($param = null,$null_return = null){
        if ($param){
            $value = (!empty($_POST[$param]) ? trim(esc_sql($_POST[$param])) : (!empty($_GET[$param]) ? trim(esc_sql($_GET[$param])) : $null_return ));
            return $value;
        } else {
            $params = array();
            foreach ($_POST as $key => $param) {
                if(is_array($param))
                {
                    $param_array = array();
                    foreach($param??[] as $param_array_key => $param_array_value)
                    {
                        $param_array[trim(esc_sql($param_array_key))] = trim(esc_sql($param_array_value));
                    }
                    $params[trim(esc_sql($key))] = $param_array;
                }else{
                    $params[trim(esc_sql($key))] = (!empty($_POST[$key]) ? trim(esc_sql($_POST[$key])) :  $null_return );
                }
            }
            foreach ($_GET as $key => $param) {
                $key = trim(esc_sql($key));
                if (!isset($params[$key])) { // if there is no key or it's a null value
                    $params[trim(esc_sql($key))] = (!empty($_GET[$key]) ? trim(esc_sql($_GET[$key])) : $null_return );
                }
            }
            return $params;
        }
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}