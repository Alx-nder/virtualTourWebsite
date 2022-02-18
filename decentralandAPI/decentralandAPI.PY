import requests
import json

url = "https://api.decentraland.org/v1"
see_map = requests.get(url,"map.png")
# file = json.loads(see_map.text)
print (see_map)