# file for webpages
from flask import Blueprint, render_template

views=Blueprint("views",__name__)


@views.route('/')
def home():
    return render_template("index.html")

@views.route('sell')
def dashboard():
    return render_template("sell.html")