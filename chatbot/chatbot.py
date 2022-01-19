from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer

chatbot = ChatBot("The Butler", storage_adapter='chatterbot.storage.SQLStorageAdapter', database_uri='sqlite:///database.sqlite3', read_only=True)


conversation = [
"Hi, can I help you?",
"Sure, I'd like to book a flight to Iceland.",
"Your flight has been booked."
]
trainer = ListTrainer(chatbot)
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
print('Type something to begin...')
# The following loop will execute each time the user enters input
while True:
    try:
        user_input = input()
        bot_response = chatbot.get_response(user_input)
        print(bot_response)
# Press ctrl-c or ctrl-d on the keyboard to exit
    except (KeyboardInterrupt, EOFError, SystemExit):
        break