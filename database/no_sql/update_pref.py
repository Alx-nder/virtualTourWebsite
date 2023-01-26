#!C:\Users\Tyreek ALEXANDER\AppData\Local\Programs\Python\Python310\python.exe
print("content-type: text/html;\n\n" )

import json
import cgi

# ## accept ajax body
form=cgi.FieldStorage()

# loads json the obj sent from js 
js_postdata=json.loads(form.getvalue("message_py"))
location_pref=js_postdata["card_location"]
price_pref=int(js_postdata["card_price"])
current_user=js_postdata["username"]
listings_id=int(js_postdata["listing_id"])