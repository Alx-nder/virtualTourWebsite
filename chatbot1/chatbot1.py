#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )

import sys

import cgi

sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer


# sys.path.append("C:\\xampp\\htdocs\\virtualTourWebsite\\zoomapi\\")
import makemeeting

# insantiating the chatbot
chatbot2 = ChatBot("DButler2", read_only=True)

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
# zoom_meeting_link=makemeeting.main()
conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "Agent",
    "You're welcome.",
    # f"{str(zoom_meeting_link)}",
    "enjoy"
]
trainer = ListTrainer(chatbot2, show_training_progress=False)
trainer.train(conversation)

form=cgi.FieldStorage()
user_speech=form.getvalue("message_py")

bot_response = chatbot2.get_response(user_speech)

print(str(bot_response))
