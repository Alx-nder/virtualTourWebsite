#!C:\Program Files\Python310\python.exe

import sys
sys.path.append(r'''C:\Users\tyree\AppData\Roaming\Python\Python310\site-packages''')

import email
import jwt
import requests
import json
import datetime

# Enter your API key and your API secret
API_KEY = 'P2VgBjzBSGmWExeDMPgHiQ'
API_SEC = 'LwbEhSMV8rvITHDhBOoGc6E0Yu5Ut2F42Luw'

# create a function to generate a token
# using the pyjwt library

currenttime= datetime.datetime.now()
expiring = currenttime + datetime.timedelta(seconds=17) 
expiringfrmt = round(expiring.timestamp())
headers={ 
	"alg": "HS256",
	"typ": "JWT"
	}
payload ={
	"iss": API_KEY,
	"exp": expiringfrmt
}

encodedjwt= jwt.encode(payload,API_SEC,algorithm="HS256")

email= "info.virttour@gmail.com"

url='https://api.zoom.us/v2/users/{}/meetings'.format(email)
header = {"authorization":"Bearer {}".format(encodedjwt)}
date = datetime.datetime(2022,1,26,23,30).strftime("%Y-%M-%dT%H:%M:%SZ")

obj={"topic":"Live agent","starttime":date, "duration":30, "password":"12345"}

createmeeting = requests.post(url,json=obj, headers= header)

file = json.loads(createmeeting.text)
join_URL = file["join_url"]
meetingPassword = file["password"]

print(f'\n here is your zoom meeting link {join_URL} and your password: "{meetingPassword}"\n')