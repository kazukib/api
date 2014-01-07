<?php

require '../app/models/item.php';
class ItemsController{

     /**
     * 実行メソッド
     * @param   string  $id urlで指定されたitem_id
     * @return  string  
     * @author  KazukiBaba
     */
	
    public function index($params) {
        $action_name = 'index';
    /* echo "ItemsController#show is called<br/>"; */

        $item = new Item();
        $word = $item->hello();

        require '../app/views/items/index.json.php';
    }  

    /**
     * 実行メソッド
     * @param   string  $id urlで指定されたitem_id
     * @return  string  
     * @author  KazukiBaba
     */

     public function show($params) {
         $action_name = 'show';
        /* echo "ItemsController#show is called<br/>"; */

         $item = new Item();
         $word = $item->hello();

         require '../app/views/items/show.json.php';
    }     
}	
