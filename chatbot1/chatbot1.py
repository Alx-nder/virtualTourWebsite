#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )

import sys
import os
import urllib.parse

# user_input= os.environ['QUERY_STRING']

# user_input= urllib.parse.unquote_plus(user_input)

sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer


sys.path.append("C:\\xampp\\htdocs\\virtualTourWebsite\\zoomapi\\")
import makemeeting




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

zoom_meeting_link=makemeeting.main()
# print(zoom_meeting_link)
conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "You're welcome.",
    "Agent",
    " {}".format(makemeeting.main()),
    "enjoy"
]
trainer = ListTrainer(chatbot1, show_training_progress=False)
trainer.train(conversation)
bot_response = chatbot1.get_response("agent")
print(bot_response)