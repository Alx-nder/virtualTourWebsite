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
	"iss": "API_KEY",
	"exp": expiringfrmt
}

encodedjwt= jwt.encode(payload,API_SEC,algorithm="HS256")

email= "info.virttour@gmail.com"

url='https://api.zoom.us/v2/users/{}/meetings'.format(email)
obj={"topic":"Live agent","password":"12345",
"type": 2,
                  "start_time": "2019-06-14T10: 21: 57",
                  "duration": "45",
                  "timezone": "Europe/Madrid",
"recurrence": {"type": 1,
"repeat_interval": 1},
"settings": {"host_video": "true",
	"participant_video": "true",
	"join_before_host": "False",
	"mute_upon_entry": "False",
	"watermark": "true",
	"audio": "voip",
	"auto_recording": "cloud"
	}
}
header = {"authorization":"Bearer{}".format(encodedjwt)}
createmeeting = requests.post(url,json=obj, headers= header)
#print (createmeeting.text)
y = json.loads(createmeeting.text)
print(y)
#join_URL = y["join_url"]
#meetingPassword = y["password"]

#print(f'\n here is your zoom meeting link {join_URL} and your \password: "{meetingPassword}"\n')


# def generateToken():
# 	token = jwt.encode(

# 		# Create a payload of the token containing
# 		# API Key & expiration time
# 		{'iss': API_KEY, 'exp': time() + 5000},

# 		# Secret used to generate token signature
# 		API_SEC,

# 		# Specify the hashing alg
# 		algorithm='HS256'
# 	)
# 	return token.decode('utf-8')


# # create json data for post requests
# meetingdetails = {"topic": "The title of your zoom meeting",
# 				"type": 2,
# 				"start_time": "2019-06-14T10: 21: 57",
# 				"duration": "45",
# 				"timezone": "Europe/Madrid",
# 				"agenda": "test",

# 				"recurrence": {"type": 1,
# 								"repeat_interval": 1
# 								},
# 				"settings": {"host_video": "true",
# 							"participant_video": "true",
# 							"join_before_host": "False",
# 							"mute_upon_entry": "False",
# 							"watermark": "true",
# 							"audio": "voip",
# 							"auto_recording": "cloud"
# 							}
# 				}

# # send a request with headers including
# # a token and meeting details


# def createMeeting():
# 	headers = {'authorization': 'Bearer ' + generateToken(),
# 			'content-type': 'application/json'}
# 	r = requests.post(
# 		f'https://api.zoom.us/v2/users/me/meetings',
# 		headers=headers, data=json.dumps(meetingdetails))

# 	print("\n creating zoom meeting ... \n")
# 	# print(r.text)
# 	# converting the output into json and extracting the details
# 	y = json.loads(r.text)
# 	join_URL = y["join_url"]
# 	meetingPassword = y["password"]

# 	print(
# 		f'\n here is your zoom meeting link {join_URL} and your \
# 		password: "{meetingPassword}"\n')


# # run the create meeting function
# createMeeting()
