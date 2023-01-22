from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

print(client.list_database_names())