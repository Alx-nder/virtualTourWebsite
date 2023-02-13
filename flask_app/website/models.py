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
        
        #query if user exists
        if database.user_auth.find_one({'email':user['email']}):
            return jsonify({'error':'User already exists'}), 400
        elif database.user_auth.insert_one(user):
            return jsonify(user),200
        
        return jsonify({'error':'Something went wrong'}), 400


# https://www.youtube.com/watch?v=mISFEwojJmE