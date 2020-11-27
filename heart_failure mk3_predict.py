import numpy as np
import pandas as pd
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
        
def print_predict(predicted):
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
    
# main    
df = pd.read_csv('heart_failure_clinical_records_dataset.csv')

test_features = df.iloc[90:, [0,4,6,7,8]].to_numpy()
test_targets = df.iloc[90:,-1].to_numpy()
test_data = df.iloc[90:].to_numpy()

clf = DecisionTreeClassifier(max_depth=6)

clf.read_tree()

predicted = clf.predict(test_features)

print_predict(predicted)