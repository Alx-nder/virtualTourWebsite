#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )

import sys
import os
import urllib.parse

user_input= os.environ['QUERY_STRING']

user_input= urllib.parse.unquote_plus(user_input)

sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer

chatbot1 = ChatBot("TheButler",  read_only=True)

conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "You're welcome."
]
trainer = ListTrainer(chatbot1, show_training_progress=False)
trainer.train(conversation)
bot_response = chatbot1.get_response(user_input)
print(bot_response)


