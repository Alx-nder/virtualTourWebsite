import json
import requests

# string substitutions
# declaring te api version 1 or 2
api_version = 'v1'
# base url given by deentraland
api_base_url = f"https://api.decentraland.org/{api_version}"

# base url and id given by decentraland v2 to submit queries
graph_base_url="https://api.thegraph.com/subgraphs/name/decentraland/marketplace"
GRAPH_ID="QmaRXWMMB7qrKCVFYACaJ5iH9QcjT2oYYrBMfv5ECaK8tr"
# query attribute to request items from graph api
graph_query={
    "query":"""{
    nfts(first: 5, orderBy: searchOrderPrice, where:{ category: parcel, searchOrderStatus: open, searchOrderExpiresAt_gt: 1611082372 }) {
    parcel {
      x,
      y
    }
    activeOrder {
      price
    }
    }
    }"""
}  

# using api to get maps with url parameters
map_png_endpoint_path= f"/map.png?center=23,-23&selected=23,-23&size=20&width=2048&height=2048"

# the final endpoint to communicate with
# v1_final_endpoint=f"{api_base_url}{}"

r = requests.post(graph_base_url,json=graph_query)

print("############")
file=json.loads(r.text)

# parsed to only show the results 
parsed_response=file['data']['nfts']
print(parsed_response)

  
## function to save an image using cooridinates
def save_map(x,y,nth):
    #will need to validate type eventually
    pic_url=requests.get(f"{api_base_url}/parcels/{x}/{y}/map.png")
    with open(f"graphic{nth}.png", "wb") as p:
        p.write(pic_url.content)
    return pic_url

# # traversing results to save corresponding images
for nft in range(len(parsed_response)):
  current_parcel = parsed_response[nft]['parcel']
  current_parcel_x=current_parcel['x']
  current_parcel_y=current_parcel['y']
  save_map(current_parcel_x,current_parcel_y,nft)
  