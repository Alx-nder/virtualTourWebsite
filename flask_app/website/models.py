from flask import Flask, jsonify, request, session, redirect
from passlib.hash import pbkdf2_sha256
import uuid  # used for mongodb unique id
from . import database


# create the user object
class User:
    def start_session(self, user):
        # make the password unavailable in the session
        del user["password"]
        session["logged_in"] = True
        session["user"] = user
        return jsonify(user), 200

    def signup(self):
        user = {
            "_id": uuid.uuid4().hex,
            "email": request.form.get("email"),
            "password": request.form.get("password"),
        }
        # encrypt passord
        user["password"] = pbkdf2_sha256.encrypt(user["password"])

        # query if user exists
        if database.user_auth.find_one({"email": user["email"]}):
            return jsonify({"error": "User already exists"}), 400

        elif database.user_auth.insert_one(user):
            return self.start_session(user)

        return jsonify({"error": "Something went wrong"}), 400

    def logout(self):
        session.clear()
        return redirect("/")


# https://www.youtube.com/watch?v=mISFEwojJmE
