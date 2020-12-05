#!C:/Users/Asus/AppData/Local/Programs/Python/Python38/python.exe
import numpy as np
import pandas as pd
import ast
import mysql.connector

class DecisionTreeClassifier(object):
    def __init__(self, max_depth):
        self.depth = 0
        self.max_depth = max_depth

    def predict(self, x):
        results = np.array([0]*len(x))
        for i, c in enumerate(x):  # for each row in test data 
            results[i] = self._get_prediction(c)  
        return results

    def _get_prediction(self, row):
        cur_layer = self.trees  # get the tree we build in training
        while cur_layer.get('cutoff'):   # if not leaf node
            if row[cur_layer['index_col']] < cur_layer['cutoff']:   # get the direction 
                if cur_layer['left'] is None:
                    return cur_layer.get('val')
                else:
                    cur_layer = cur_layer['left']
            else:
                if cur_layer['right'] is None:
                    return cur_layer.get('val')
                else:
                    cur_layer = cur_layer['right']
        else:   # if leaf node, return value
            return cur_layer.get('val')
        
    def read_tree(self):
        file = open("tree.txt", "r")
        contents = file.read()
        self.trees = ast.literal_eval(contents)
        file.close()

def formatNumber(num):
  if num % 1 == 0:
    return int(num)
  else:
    return num

# main    
df = pd.read_csv('uploadstesting/heart_failure_clinical_records_dataset.csv')

test_features = df.iloc[:, [0,4,6,7,8]].to_numpy()
test_data = df.iloc[:].to_numpy()
clf = DecisionTreeClassifier(max_depth=6)

clf.read_tree()

predicted = clf.predict(test_features)


# upload to database
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="data_mining"
)

# empty table
mycursor = mydb.cursor()
sql = "TRUNCATE TABLE datas;"
mycursor.execute(sql)
mydb.commit()

# insert data
sql = "INSERT INTO datas (age, anaemia, creatinine_phosphokinase, diabetes, ejection_fraction, high_blood_pressure, platelets, serum_creatinine, serum_sodium, sex, smoking, time, DEATH_EVENT) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
val = []
num = 0

val = test_data[:, [0,1,2,3,4,5,6,7,8,9,10,11]]
predicted = np.reshape(predicted, (-1, 1))
val = np.concatenate((val, predicted), 1)
val = val.tolist()
for i in range (len(val)):
    for j in range(len(val[i])):
        val[i][j] = formatNumber(val[i][j])
mycursor.executemany(sql, val)
mydb.commit()

print("Content-Type: text/html")
print()