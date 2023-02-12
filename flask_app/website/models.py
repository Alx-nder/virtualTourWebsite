from flask import Flask,jsonify,request
from passlib.hash import pbkdf2_sha256

# create the user object
class User:
    def signup(self):
        user = {
            '_id':'',
            'email':request.form.get('email'),
            'password':request.form.get('password'),
        }
        # encrypt passord
        user['password']=pbkdf2_sha256.encrypt(user['password'])
        return jsonify(user)

# https://www.youtube.com/watch?v=mISFEwojJmE