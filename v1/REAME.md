# API

#Class ApiServer

/api/v1/items　商品情報一覧を返す。
/api/v1/item/#{id} : idで指定された商品を返す 
## HOW TO USE
ID が含まれている場合はitem_idを、
なければ itemを呼んでください。

item_idを呼ぶと、該当するidの商品情報をjson形式で返します。
itemを呼ぶと、ID順に商品情報リストを全て返します。







