<?php
class ApiServer
{
     /**
     * 実行メソッド
     * @param   string  $id urlで指定されたitem_id
     * @return  string  
     * @author  KazukiBaba
     */
	
    public function itembase(){
        header("Content-Type: application/json; charset=utf-8");
        $response = array();
        //csvを読み込む
        $file = 'item.csv';
        $data = file_get_contents($file);
        $temp = tmpfile();
        $response  = array();
        fwrite($temp, $data);
        rewind($temp);
        //responseに読み込んだデータを格納
        while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
            $response[] = $data;
        }
        fclose($temp);

        //読み込んだデータにパラメータ名を付与する。
        $response_with_key = array();
        $key_names = array('item_id','category_id','item_name','price');

        foreach($response as $change_key){
           $response_key = array_combine($key_names,$change_key);
           $response_with_key[]=$response_key;
        }
        return $response_with_key;
    } 

     /**
     * 実行メソッド
     * @return  string  
     * @author  KazukiBaba
     */

    public function item(){	
	$items = ApiServer::itembase(); 
	//Jsonで吐き出す。
        echo json_encode($items,JSON_UNESCAPED_UNICODE);
    }

    /**
     * 実行メソッド
     * @param   string  $id urlで指定されたitem_id
     * @return  string  
     * @author  KazukiBaba
     */
     
    public function item_id($id){
       
        //アクセスしているURLを取得
        $arr = array(
            'path' => $_SERVER['REQUEST_URI'],
        );
	$each_id = array();
	$id_number = ApiServer::itembase();
        //目的のIDかどうかをチェック   
	foreach($id_number as $get_id){
	    if($get_id['item_id'] == $id){
	        $each_id[] = $get_id;
            } 
        }    
        //Jsonで吐き出す。
        echo json_encode($each_id,JSON_UNESCAPED_UNICODE);
    }     
}	
