#!C:\Program Files\Python310\python.exe
print("content-type: text/html\n\n" )

import sys
sys.path.append("C:\\Users\\tyree\\AppData\\Roaming\\Python\\Python310\\site-packages")

# import pyaudio
import speech_recognition as sr


# def main():
    # obtain audio from the microphone
r = sr.Recognizer()
with sr.Microphone() as source:
    print("Say something!")
    audio = r.listen(source)
# recognize speech using Google Speech Recognition
try:
    # the default google API (no keys needed)
    speech=r.recognize_google(audio)
    print(speech)
    # return speech
except sr.UnknownValueError:
    print("Google Speech Recognition could not understand audio")
except sr.RequestError as e:
    print("Could not request results from Google Speech Recognition service; {0}".format(e))

# script to prevent the program from running when importing 
# if __name__ == "__main__":
	# main()	