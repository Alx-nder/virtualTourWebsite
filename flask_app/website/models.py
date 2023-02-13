from flask import Flask,jsonify,request
from passlib.hash import pbkdf2_sha256
import uuid #used for mongodb unique id
from . import database



# create the user object
class User:
    def signup(self):
        user = {
            '_id':uuid.uuid4().hex,
            'email':request.form.get('email'),
            'password':request.form.get('password'),
        }
        # encrypt passord
        user['password']=pbkdf2_sha256.encrypt(user['password'])
        
        database.user_auth.insert_one(user)
        
        return jsonify(user)

# https://www.youtube.com/watch?v=mISFEwojJmE