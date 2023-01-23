from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

# connected database = client.database name  
database= client.virttour

#  a collection is a table
preference_collection= database.pref

#  command to add data
# preference_collection.insert_many(users)

def insert_doc():
    new_user={
        "username":"{}"
    }
    preference_collection.insert_one(new_user)


def find_pref():
    pref=preference_collection.find([{"username":"{}",}])
