from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

# connected database = client.database name  
database= client.virttour

#  a collection is a table
