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
    # capture values from document
    tag_values=list(user_data.values())

    max = -1
    index=1
    for i in range(2,len(tag_values)):
        if tag_values[i]>max:
            max=tag_values[i]
            index=i

    return list(user_data)[index]

### note find highest and keep tag name

