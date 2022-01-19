#!C:\Program Files\Python310\python.exe
from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer

chatbot1 = ChatBot("The Butler", storage_adapter='chatterbot.storage.SQLStorageAdapter',  read_only=True, 
logic_adapters=[{'import_path': 'chatterbot.logic.BestMatch', 'default_response': 'I am sorry, but I do not understand.', 'maximum_similarity_threshold': 0.50}]
)


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

#response = chatbot.get_response("Good morning!")
#print(response)
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
print("content-type: text/html\n\n" )

print("hello")

while True:
    try:
        user_input = input()
        bot_response = chatbot1.get_response(user_input)
        print(bot_response)
# Press ctrl-c or ctrl-d on the keyboard to exit
    except (KeyboardInterrupt, EOFError, SystemExit):
        break