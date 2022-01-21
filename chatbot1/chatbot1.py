#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )
import sys
sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer

chatbot1 = ChatBot("The Butler",  read_only=True)


conversation = [
    "Hello",
    "Hi there!",
    "How are you doing?",
    "I'm doing great.",
    "That is good to hear",
    "Thank you.",
    "You're welcome."
]
trainer = ListTrainer(chatbot1)
trainer.train(conversation)

def smalltalk(user_input):
    while True:
        try:
            #user_input = input()
            bot_response = chatbot1.get_response(user_input)
            print(bot_response)
    # Press ctrl-c or ctrl-d on the keyboard to exit
        except (KeyboardInterrupt, EOFError, SystemExit):
            break
"""
while True:
    try:
        chatbot_input = chatbot.get_response(input())
        print(chatbot_input)
    except(KeyboardInterrupt, EOFError, SystemExit):
        break
"""
#print('Type something to begin...')
# The following loop will execute each time the user enters input

#print("hello")
user_input=""
smalltalk(user_input)
