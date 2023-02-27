from flask import Flask,jsonify,request, session, redirect,render_template
from functools import wraps
import pymongo

 #database
connection=pymongo.MongoClient("mongodb://localhost:27017/")

database=connection.virttour

#Decorators
def login_required(f):   
   @wraps(f)
   def wrap(*args, **kwargs):
    if 'logged_in' in session:
        return f(*args, **kwargs)
    else:
        return redirect('/')
    return wrap




def create_app():
    app=Flask(__name__)

    # secret key for session data
    app.secret_key = "oiawnaniomawo8998jj"

    

    # importing routes
    @app.route('/')
    def home():
       return render_template("index.html")

    @app.route('sell')
    @login_required
    def dashboard():
        return render_template("sell.html") 



    from .auth import auth

    app.register_blueprint(auth,url_prefix='/')

    return app



# file name __init__.py turns a folder into a pyhton package
