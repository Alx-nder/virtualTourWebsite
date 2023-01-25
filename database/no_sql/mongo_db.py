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


def present_listing(tag):
    pass



listings=database.listings
listings.insert_many([
{"location":"grange","posted":"January 14 ","house_description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet fugiat rerum consequatur. Eaque delectus voluptates aliquid temporibus quibusdam magni quidem, nesciunt hic atque laborum consequatur fugiat aut sunt dolores quam?","price":3125476,"image_src":"https:\/\/images.pexels.com\/photos\/2102587\/pexels-photo-2102587.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940","tour_link":"https:\/\/everpano.s3.eu-central-1.amazonaws.com\/3d\/loft\/index.html","living_space":0.5,"bathrooms":2.5,"bedrooms":3,"building_class":3,"age":2,"land":2.3,"posted_by":"t@y.com","listings_interaction":0},
{"location":"mandeville","posted":"February 19","house_description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae amet obcaecati facere nam ducimus excepturi eum atque neque perspiciatis, delectus reiciendis tempora voluptas laboriosam consequuntur exercitationem quibusdam, in facilis temporibus.","price":2140234,"image_src":"https:\/\/images.pexels.com\/photos\/280222\/pexels-photo-280222.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","tour_link":"https:\/\/everpano.s3.eu-central-1.amazonaws.com\/3d\/riereta\/index.html","living_space":0.6,"bathrooms":3,"bedrooms":4,"building_class":3,"age":10,"land":0.5,"posted_by":"t@y.com","listings_interaction":2},
{"location":"kingston","posted":"January 12","house_description":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet labore hic fugiat vitae id illum numquam quo voluptate, culpa voluptas nulla ipsa impedit expedita laborum ea corporis repellat? Placeat, illum?","price":1052442,"image_src":"https:\/\/images.unsplash.com\/photo-1430285561322-7808604715df?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","tour_link":"http:\/\/localhost\/vtour\/tour.html","living_space":0.25,"bathrooms":1,"bedrooms":2,"building_class":1,"age":6,"land":1.3,"posted_by":"t@y.com","listings_interaction":1},
{"location":"lucea","posted":"December 30","house_description":"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, quidem eaque? Laudantium cupiditate quibusdam molestias nulla, possimus quae nihil exercitationem temporibus ad atque quasi, error harum eos fuga consequuntur pariatur!","price":"3524432","image_src":"https:\/\/images.pexels.com\/photos\/206768\/pexels-photo-206768.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940","tour_link":"http:\/\/localhost\/krpano_three_js_example\/index.html","living_space":0.5,"bathrooms":3.5,"bedrooms":4,"building_class":4,"age":5,"land":2,"posted_by":"hello@hi.hey","listings_interaction":4},
{"location":"manchester","posted":"February 12","house_description":"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus expedita laboriosam molestiae, nam laudantium minus doloremque, nihil voluptatum aliquam dolor voluptas animi distinctio iure consequuntur ab odit necessitatibus, corrupti quod.","price":"900000","image_src":"https:\/\/cdn.jhmrad.com\/wp-content\/uploads\/properties-sale-egypt-primelocation_25987.jpg","tour_link":"https:\/\/everpano.s3.eu-central-1.amazonaws.com\/3d\/iencuentro\/index.html","living_space":0.2,"bathrooms":2,"bedrooms":3,"building_class":1,"age":4,"land":0.25,"posted_by":"hello@hi.hey","listings_interaction":5},
{"location":"kingston","posted":"awdawd","house_description":"rhdrggdrggrgdgd","price":2500000,"image_src":"https:\/\/images.unsplash.com\/photo-1583608205776-bfd35f0d9f83?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","tour_link":"http:\/\/localhost\/krpano-1.20.11\/viewer\/krpano.html?xml=examples\/hotspot-extract\/pool.xml","living_space":1,"bathrooms":2,"bedrooms":2,"building_class":2,"age":2,"land":2,"posted_by":"t@y.com","listings_interaction":0},
{"location":"grange","posted":"","house_description":"","price":3741205,"image_src":"https:\/\/images.unsplash.com\/photo-1598228723793-52759bba239c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80","tour_link":"https:\/\/images.unsplash.com\/photo-1598228723793-52759bba239c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80","living_space":0.5,"bathrooms":3,"bedrooms":4,"building_class":5,"age":2,"land":3,"posted_by":"info.virttour@gmail.com","listings_interaction":1},
{"location":"lucea","posted":"","house_description":"","price":997000,"image_src":"https:\/\/images.unsplash.com\/photo-1599427303058-f04cbcf4756f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80","tour_link":"http:\/\/localhost\/krpano-1.20.11\/viewer\/krpano.html?xml=examples\/interactive-area\/interactive-area.xml","living_space":0.5,"bathrooms":1.5,"bedrooms":2,"building_class":2,"age":8,"land":0.7,"posted_by":"info.virttour@gmail.com","listings_interaction":8},
{"location":"kingston","posted":"","house_description":"","price":2017504,"image_src":"https:\/\/images.unsplash.com\/photo-1602075432748-82d264e2b463?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","tour_link":"https:\/\/images.unsplash.com\/photo-1602075432748-82d264e2b463?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","living_space":0.6,"bathrooms":3,"bedrooms":2,"building_class":8,"age":4,"land":1.9,"posted_by":"info.virttour@gmail.com","listings_interaction":1},
{"_location":"mandeville","posted":"","house_description":"","price":3000000,"image_src":"https:\/\/images.unsplash.com\/photo-1605146768851-eda79da39897?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","tour_link":"https:\/\/images.unsplash.com\/photo-1605146768851-eda79da39897?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","living_space":0.8,"bathrooms":3.5,"bedrooms":4,"building_class":5,"age":2,"land":1.8,"posted_by":"info.virttour@gmail.com","listings_interaction":0},
{"_location":"kingston","posted":"","house_description":"","price":3258716,"image_src":"https:\/\/images.unsplash.com\/photo-1623298317883-6b70254edf31?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80","tour_link":"http:\/\/localhost\/krpano-1.20.11\/viewer\/krpano.html?xml=examples\/demotour-apartment\/tour.xml","living_space":0.8,"bathrooms":3,"bedrooms":4,"building_class":5,"age":5,"land":2,"posted_by":"info.virttour@gmail.com","listings_interaction":0},
{"_location":"mobay","posted":"","house_description":"","price":2000000,"image_src":"http:\/\/localhost\/virtualTourWebsite\/web\/seller\/uploads\/626ee148db20f8.64197965.jpg","tour_link":"http:\/\/localhost\/virtualTourWebsite\/web\/seller\/uploads\/626ee148db20f8.64197965.jpg","living_space":0.31,"bathrooms":2,"bedrooms":3,"building_class":3,"age":8,"land":0.5,"posted_by":"hello@hi.hey","listings_interaction":0},
{"_location":"kingston","posted":"","house_description":"","price":4000000,"image_src":"http:\/\/localhost\/virtualTourWebsite\/web\/seller\/uploads\/6270861951c5d7.71037295.jpg","tour_link":"http:\/\/localhost\/virtualTourWebsite\/web\/seller\/uploads\/6270861951c5d7.71037295.jpg","living_space":1,"bathrooms":3,"bedrooms":4,"building_class":3,"age":8,"land":1.5,"posted_by":"t@y.com","listings_interaction":0}
])