<?php

 header("Content-Type: application/json; charset=utf-8");
        $link = mysql_connect('localhost', 'root', 'root');
        if (!$link) {
            die('connot connect'.mysql_error());
	}

	$db_selected = mysql_select_db('items', $link);
        if (!$db_selected){
        die('database error'.mysql_error());
	}

	mysql_set_charset('utf8');
	$mysql ="SELECT id,price FROM item_info ORDER BY price";
	$result = mysql_query($mysql);
	
        if (!$result) {
            die('query error'.mysql_error());
	}
	$json_r = array();
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	//	print_r($row);
	    $json_r[] = $row;	
	}
	$json_with_key = array();
        $key_names = array('id','price');

        foreach($json_r as $change_key){
           $response_key = array_combine($key_names,$change_key);
           $json_with_key[]=$response_key;
        }

	echo json_encode($json_with_key,JSON_UNESCAPED_UNICODE);
	$close_db = mysql_close($link);

	

