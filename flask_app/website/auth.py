from flask import Blueprint, render_template, request
from .models import User
auth=Blueprint("auth",__name__)

@auth.route('/login',methods=['GET','POST'])
def login():
    # return render_template('login.html')
    return User.signup()
@auth.route('/logout')
def logout():
    return 'Logout'

@auth.route('/register',methods=['GET','POST'])
def register():
    if request.method=='POST':
        name=request.form['name']
        email=request.form['email']
        password=request.form['password']
        cpassword=request.form['cpassword']

    return render_template('register.html')