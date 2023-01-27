from flask import Flask, Response
import pymongo

app = Flask(__name__)

try:
    mongo=pymongo.MongoClient(host="localhost",port=27017,serverSelectionTimeoutMS=1000)
    mongo.server_info() # trigger exception if cannot connect to db 
except:
    print("ERROR - Cannot connect tp db")   

db=mongo.virttour

#######################
@app.route("/users", methods=["POST"])
def create_user():
    try:
        user={"name":"first", "lastName":"last"}
        dbResponse = db.users.insert_one(user)

    except Exception as ex:
        print(ex)

##########

if __name__ == "__main__":
    app.run(port=80,debug=True)
