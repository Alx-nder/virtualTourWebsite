from flask import Flask,jsonify,request

class User:
    def signup(self):
        user = {
            '_id':'',
            'email':request.form.get('email'),
            'password':request.form.get('password'),
        }
        return jsonify(user)

# https://www.youtube.com/watch?v=mISFEwojJmE