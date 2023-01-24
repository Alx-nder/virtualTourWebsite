from pymongo import MongoClient

cluster_url ="mongodb://localhost:27017/"
client = MongoClient(cluster_url)

# connected database = client.database name  
database= client.virttour

#  a collection is a table
preference_collection= database.pref

# updating user preference document
def register_click(username, tag):
    preference_collection.update_one({"username":username},{"$inc": {tag:1}})
    '''
    TO DO: 
        CREATE TAG IF IT DOES NOT EXIST
    '''


# returning most clicked tag
def highest_click(username):
    user_data=preference_collection.find_one({"username":username})
    
    # convert from cursor
    user_data=list(user_data.values())
    for tag in  user_data:
        print(tag)
### note find highest and keep tag name
highest_click("guest")
# val={"one":1,"two":2}
# for i in val.values():
#     print(i)



