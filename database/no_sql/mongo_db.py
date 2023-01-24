from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

# connected database = client.database name  
database= client.virttour

#  a collection is a table
preference_collection= database.pref

#  command to add data
# preference_collection.insert_many(users)

# pref=preference_collection.find({"username":"guest"})
# print(list(pref))

# preference_collection.update_one({"username":"guest"},{'$inc':{"lucea":1}})

pref=preference_collection.find({"username":"guest"})
print(list(pref))

def insert_doc():
    new_user={
        "username":"{}"
    }
    preference_collection.insert_one(new_user)


def register_click(username, tag):

    updates={
        ### set new field
        # "$set": {"new_field": True},
        # increment
        "$inc": {tag:1}
        #$rename rename fields and not values
    }
    preference_collection.update_one({"username":username},updates)
register_click("guest",'price_0')

pref=preference_collection.find({"username":"guest"})
print(list(pref))
