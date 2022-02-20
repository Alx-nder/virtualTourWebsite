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
# query element to request items from api
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

parcel_list_endpoint_path="/parcels?status=open&sort_by=price&sort_order=asc&limit=20&offset=0"

  


# the final endpoint to communicate with
v1_final_endpoint=f"{api_base_url}{parcel_list_endpoint_path}"

r = requests.post(graph_base_url,json=graph_query)

print (r.text)
print("############")
file=json.loads(r.text)
print(file)

## function to save an image
def save_map(api_response):
    #will need validation of type eventually
    with open("graphic2.png", "wb") as p:
        p.write(api_response.content)


