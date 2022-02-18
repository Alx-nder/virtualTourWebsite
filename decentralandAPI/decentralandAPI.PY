import requests

# string substitutions
# declaring te api version 1 or 2
api_version = 'v1'
# base url
api_base_url = f"https://api.decentraland.org/{api_version}"
# using api to get maps with url parameters
endpoint_path= f"/map.png?center=23,-23&selected=23,-23&size=20&width=2048&height=2048"

# the final endpoint to communicate with
final_endpoint=f"{api_base_url}{endpoint_path}"
see_map = requests.get(final_endpoint)


# print (see_map.text)

## to save an image
with open("graphic2.png", "wb") as p:
    p.write(see_map.content)

