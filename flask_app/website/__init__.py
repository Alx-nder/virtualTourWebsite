from flask import Flask
import pymongo

 #database
connection=pymongo.MongoClient("mongodb://localhost:27017/")

database=connection.virttour

def create_app():
    app=Flask(__name__)

    # importing routes
    from .views import views
    from .auth import auth

    app.register_blueprint(views,url_prefix='/')
    app.register_blueprint(auth,url_prefix='/')

    return app



# file name __init__.py turns a folder into a pyhton package
