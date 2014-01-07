<?php

class Request{
    public function getUri(){
	$uri_r = $_SERVER['REQUEST_URI'];
        return $uri_r;
    }

    public function getBaseUrl(){
	$script_name = $_SERVER['SCRIPT_NAME'];
	$request_uri = $this->getUri();
	if(0 === strpos($request_uri, $script_name)){
	    return $script_name;
	} else if(0 === strpos($request_uri, dirname($script_name))){
            return rtrim(dirname($script_name),'/');
	}
	return '';
    }

    public function getPathInfo(){
	$base_url = $this->getBaseUrl();
	$request_uri = $this->getUri();
	if(false !== ($pos = strpos($request_uri, '?'))){
	    $request_uri = substr($request_uri,0,$pos);
	}
	$path_info = (string)substr($request_uri, strlen($base_url));
	return $path_info;
	print_r($path_info);
    }
}
