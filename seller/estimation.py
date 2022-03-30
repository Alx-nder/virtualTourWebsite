#!C:\Program Files\Python310\python.exe
print("content-type: text/html;\n\n" )

import sys
sys.path.append(r'C:\Users\tyree\AppData\Roaming\Python\Python310\site-packages')
import mysql.connector as connection
import pandas as pd
import numpy as np
from sklearn.linear_model import LinearRegression
import cgi


## accept ajax body
form=cgi.FieldStorage()
house_details=form.getvalue("message_py")

# connecting to database
db=connection.connect(
    host="localhost",
    user="root",
    database="virttour"
) 

query="select * from listings"

db_data= pd.read_sql(query,db)
# print(db_data['price'])

predictors=["living_space","bathrooms","bedrooms","building_class","land", "age"]
outcome='price'

# x=pd.get_dummies(db_data[predictors], drop_first=True)

# print(predictors)

model = LinearRegression()
model.fit(db_data[predictors],db_data[outcome])

print(f'intercept: {model.intercept_:.3f}')
print("Coefficients: ")
for name, coef in zip(db_data[predictors], model.coef_):
    print(f" {name} : {coef}")