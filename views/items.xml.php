<?php
class Itemsxml{
	public function xmlview(){
     	require_once('Models/Item.php');
    header("Content-Type: application/xml; charset=utf-8");
    $xml_r = Item::getdata();
    	$xmlstr = "<?xml version=\"1.0\" ?><root></root>";
        $xml = new SimpleXMLElement($xmlstr);
        foreach($json_with_key as $arr){
            $xmlitem = $xml -> addChild("item");
            foreach($arr as $key => $value){
                $xmlitem -> addChild($key, $value);
            }
        }
        print $xml -> asXML();
  }
}
