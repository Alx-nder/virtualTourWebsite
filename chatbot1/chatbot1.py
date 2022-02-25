#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )

import sys
import os
import urllib.parse
import speech_module


# pulling the query part of the url of the call 
# user_input= os.environ['QUERY_STRING']
# removing the unnecessary and special elements from the url string to get the user input alone
# user_input= urllib.parse.unquote_plus(user_input)

sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer


sys.path.append("C:\\xampp\\htdocs\\virtualTourWebsite\\zoomapi\\")
import makemeeting

# insantiating the chatbot
chatbot1 = ChatBot("DButler", read_only=True)

# , logic_adapters=[
#         {
#             'import_path': 'chatterbot.logic.SpecificResponseAdapter',
#             'input_text': 'agent',
#             'output_text': 'Ok, here is a link: http://chatterbot.rtfd.org'
#         },
#         {
#             'import_path': 'cb_logic_adapter.agentlogicadapter'
#         }],
#         read_only=True)

# imported zoom link - a function call
zoom_meeting_link=makemeeting.main()
conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "Agent",
    "You're welcome.",
    f"{str(zoom_meeting_link)}",
    "enjoy"
]
trainer = ListTrainer(chatbot1, show_training_progress=False)
trainer.train(conversation)

# # use to demonstrate speech
user_speech=speech_module.main()
bot_response = chatbot1.get_response(user_speech)

# bot_response = chatbot1.get_response(user_input)
print(str(bot_response))