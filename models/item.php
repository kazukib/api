<?php
class Item
{
    /**
    * 実行メソッド
    * @param   string  $id urlで指定されたitem_id
    * @return  string  
    * @author  KazukiBaba
    */

    public function getdata($order){
        $link = mysql_connect('localhost', 'root', 'root');
        if (!$link) {
            die('connot connect'.mysql_error());
	}

	$db_selected = mysql_select_db('items', $link);
        if (!$db_selected){
        die('database error'.mysql_error());
	}

	mysql_set_charset('utf8');
        switch ($order){
            case 'price_asc':
                $mysql ="SELECT id,price FROM item_info ORDER BY price";
            case 'price_desc':
		$mysql ="SELECT id,price FROM item_info ORDER BY price DESC";
            case 'id_desc':
		$mysql ="SELECT id,price FROM item_info ORDER BY id DESC";
            default:
	        $mysql ="SELECT id,price FROM item_info ORDER BY id";
        }
	$result = mysql_query($mysql);
	
        if (!$result) {
            die('query error'.mysql_error());
	}
	$item_data = array();
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            $item_data[] = $row;
	}
	$data_with_key = array();
        $key_names = array('id','price');
        foreach($item_data as $change_key){
           $response_key = array_combine($key_names,$change_key);
           $data_with_key[]=$response_key;
        }
	$close_db = mysql_close($link);
	return $data_with_key;
    }
}
       	
