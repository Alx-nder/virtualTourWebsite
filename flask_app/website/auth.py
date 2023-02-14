from flask import Blueprint, render_template, request
from .models import User
auth=Blueprint("auth",__name__)

@auth.route('/login',methods=['GET','POST'])
def login():
    return render_template('login.html')

@auth.route('/logout')
def logout():
    return User().logout()

@auth.route('/register',methods=['GET','POST'])
def register():
    return render_template('register.html')


@auth.route('/signup',methods=['POST','GET'])
def signup():
    return User().signup()
