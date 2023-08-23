#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n")

import sys
import cgi

sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer

# insantiating the chatbot
chatbot2 = ChatBot("CB2", read_only=True)

conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "Where are the popular houses",
    "Kingston",
    "Agent",
    "There are currently no <br>agents available",
    "You're welcome.",
    "How can I buy a house",
    "contact the seller via \nthe email at the bottom of \nthe listing's card",
]
trainer = ListTrainer(chatbot2, show_training_progress=False)
trainer.train(conversation)

# use either the voice recognition or the chatbot text field
"""
if not cgi.FieldStorage() :
    bot_response = chatbot2.get_response(speech_module.main())
else:
    form=cgi.FieldStorage()
    user_speech=form.getvalue("message_py") 
    bot_response = chatbot2.get_response(user_speech)
"""

form = cgi.FieldStorage()
user_speech = form.getvalue("message_py")
bot_response = chatbot2.get_response(user_speech)

print(str(bot_response))
