from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

# connected database = client.database name  
database= client.virttour

#  a collection is a table
preference_collection= database.pref

users=[
    {   "username":"guest",
        "price_0":"10",
        "price_1":"9",
        "price_2":"9",
        "lucea":"19",
        "manchester":"6",
        "kingston":"4",
        "grange":"5",
        "mandeville":"5",
        "mobay":"0"
    },

    {"username":"hello@hi.hey","price_0":"11","price_1":"7","price_2":"7","lucea":"6","manchester":"1","kingston":"10","grange":"5","mandeville":"1","mobay":"0"},
    {"username":"t@y.com","price_0":"10","price_1":"1","price_2":"1","lucea":"1","manchester":"9","kingston":"1","grange":"1","mandeville":"0","mobay":"0"}
]

# preference_collection.insert_many(users)