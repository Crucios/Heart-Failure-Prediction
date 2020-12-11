#!C:/Users/Asus/AppData/Local/Programs/Python/Python38/python.exe
import cgi
import numpy as np
import ast

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
        
def print_predict(predicted, test_data):
    num = 0
    predict_true = 0
    predict_false = 0
    
    for row in test_data:
       print ("Actual: %s. Predicted: %s" %(row[-1], predicted[num]))
       
       if(row[-1] == predicted[num]):
           predict_true += 1
       else:
           predict_false += 1
           
       num += 1
    
    print("The prediction accuracy is: ", predict_true/num * 100 ,"%")

def print_header():
    print ("""Content-type: text/html\n
    <!DOCTYPE html>
    <html>
    <body>""")

def print_close():
    print ("""</body>
    </html>""")
    
# main    
def main():
    session = cgi.FieldStorage()
    age = session["age"].value
    anaemia = session["anemia"].value
    creatinine = session["creatine"].value
    diabetes = session["diabetes"].value
    ejection = session["ejection"].value
    high_blood = session["high_pressure"].value
    platelets = session["platelets"].value
    serum_creatinine = session["serumc"].value
    serum_sodium = session["serums"].value
    sex = session["gender"].value
    smoking = session["smoking"].value
    time = session["time"].value
    
    lists = [age, anaemia, creatinine, diabetes, ejection, high_blood, platelets, serum_creatinine, serum_sodium, sex, smoking, time]
    test_data = [float(i) for i in lists]
    test_data = [test_data]
    test_data = np.array(test_data)
    test_features = test_data[:, [0,4,7,8]]
    
    clf = DecisionTreeClassifier(max_depth=6)
    
    clf.read_tree()
    
    predicted = clf.predict(test_features)
    
    if predicted[0]:
        predicted = "High Risk"
    else:
        predicted = "Low Risk"

    # predicted = cgi.FieldStorage() predicted["x"].value
    print_header()
    print("<p>" + predicted + "</p>")
    print_close()

main()