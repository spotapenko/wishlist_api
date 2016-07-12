# wishlist_api
Wishlist API

SESSION ID
We use bad but speed way.
for Rest clients you can use 'Session-Key' - in each response in headers
And put it to session_key params

Example: URL?action=add&json={"id":323222,"descr":"I wdsdant to receive a","flag":1}&session_key=05of86cl7dcvv494njrinohdv3


CLEAR METHOD

GET URL?action=clear
Params: action, [session_key]
Descritpion: Clear all wishlists

ADD METHOD
GET URL?action=add&json=JSON_OBJ
Params: action, json, [session_key]
Description: Add new object of wishlist
Example: URL?action=add&json={"id":323222,"descr":"I wdsdant to receive a","flag":1}

UPDATE METHOD
GET URL?action=update&id=ID&json=JSON_OBJ
Params: action, id, json, [session_key]
Description: Update obj by ID
EXAMPLE = URL?action=update&id=2&json={"id":323222,"descr":"I wdsdant to receive a","flag":1}

REMOVE METHOD
GET URL?action=remove&id=ID
Params: action, id, [session_key]
Description: Removed from least

GET METHOD
GET URL?action=get
Params: action, [session_key]
Description: Get the list
Response example:
[{"id":4,"wish_list_item":{"title":323222,"descr":"New I wdsdant to receive a","flag":0}},{"id":5,"wish_list_item":{"title":323222,"descr":"New I wdsdant to receive a","flag":0}}]
