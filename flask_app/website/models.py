from flask import Flask,jsonify

class User:
    def signup():
        user = {
            '_id':'',
            'email':'',
            'password':''
        }
        return jsonify(user)

# https://www.youtube.com/watch?v=mISFEwojJmE