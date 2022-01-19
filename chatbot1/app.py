from chatbot import chatbot
from flask import Flask, render_template, request
import subprocess as sp

app = Flask(__name__)
#app.static_folder = 'static'

"""@app.route("/")
def home():
    return render_template("index.php")
   """ 

@app.route('/index.php')
def phpexample():
    out = sp.run(["php", "index.php"], stdout=sp.PIPE)
    return out.stdout

@app.route("/get")
def get_bot_response():
    userText = request.args.get('msg')
    return str(chatbot.get_response(userText))

if __name__ == "__main__":
    app.run() 