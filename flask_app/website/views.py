# file for webpages
from flask import Blueprint

views=Blueprint("views",__name__)


@views.route('/')
def home():
    return "HEllo"