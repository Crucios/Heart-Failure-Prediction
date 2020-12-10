#!C:/Users/Asus/AppData/Local/Programs/Python/Python38/python.exe
from pprint import pprint
import math
import numpy as np
import pandas as pd
import ast

def entropy_func(c, n):
    return -(c*1.0/n)*math.log(c*1.0/n, 2)

def entropy_cal(c1, c2):
    if c1== 0 or c2 == 0:  # when there is only one class in the group, entropy is 0
        return 0
    return entropy_func(c1, c1+c2) + entropy_func(c2, c1+c2)

# get the entropy of one big circle showing above
def entropy_of_one_division(division): 
    s = 0
    n = len(division)
    classes = set(division)
    for c in classes:   # for each class, get entropy
        n_c = sum(division==c)
        e = n_c*1.0/n * entropy_cal(sum(division==c), sum(division!=c)) # weighted avg
        s += e
    return s, n

# The whole entropy of two big circles combined
def get_entropy(y_predict, y_real):
    if len(y_predict) != len(y_real):
        print('They have to be the same length')
        return None
    n = len(y_real)
    s_true, n_true = entropy_of_one_division(y_real[y_predict]) # left hand side entropy
    s_false, n_false = entropy_of_one_division(y_real[~y_predict]) # right hand side entropy
    s = n_true*1.0/n * s_true + n_false*1.0/n * s_false # overall entropy, again weighted average
    return s

class DecisionTreeClassifier(object):
    def __init__(self, max_depth):
        self.depth = 0
        self.max_depth = max_depth
        
    def find_best_split(self, col, y):
        min_entropy = 10    
        n = len(y)
        for value in set(col):  # iterating through each value in the column
            y_predict = col < value  # separate y into 2 groups
            my_entropy = get_entropy(y_predict, y)  # get entropy of this split
            if my_entropy <= min_entropy:  # check if it's the best one so far
                min_entropy = my_entropy
                cutoff = value
        return min_entropy, cutoff
        
        def find_best_split_of_all(self, x, y):
            col = None
            min_entropy = 1
            cutoff = None
            for i, c in enumerate(x.T):  # iterating through each feature
                entropy, cur_cutoff = self.find_best_split(c, y)  # find the best split of that feature
                if entropy == 0:    # find the first perfect cutoff. Stop Iterating
                    return i, cur_cutoff, entropy
                elif entropy <= min_entropy:  # check if it's best so far
                    min_entropy = entropy
                    col = i
                    cutoff = cur_cutoff
            return col, cutoff, min_entropy
    
    def find_best_split_of_all(self, x, y):
        col = None
        min_entropy = 1
        cutoff = None
        for i, c in enumerate(x.T):  # iterating through each feature
            entropy, cur_cutoff = self.find_best_split(c, y)  # find the best split of that feature
            if entropy == 0:    # find the first perfect cutoff. Stop Iterating
                return i, cur_cutoff, entropy
            elif entropy <= min_entropy:  # check if it's best so far
                min_entropy = entropy
                col = i
                cutoff = cur_cutoff
        return col, cutoff, min_entropy

    def fit(self, x, y, par_node={}, depth=0):

        if par_node is None:   # base case 1: tree stops at previous level
            return None
        elif len(y) == 0:   # base case 2: no data in this group
            return None
        elif self.all_same(y):   # base case 3: all y is the same in this group
            return {'val':y[0]}
        elif depth >= self.max_depth:   # base case 4: max depth reached 
            return None
        else:   # Recursively generate trees! 
            # find one split given an information gain 
            col, cutoff, entropy = self.find_best_split_of_all(x, y)   
            y_left = y[x[:, col] < cutoff]  # left hand side data
            y_right = y[x[:, col] >= cutoff]  # right hand side data
            par_node = {'col': header[col], 'index_col':col,
                        'cutoff':cutoff,
                       'val': np.round(np.mean(y))}  # save the information 
            # generate tree for the left hand side data
            par_node['left'] = self.fit(x[x[:, col] < cutoff], y_left, {}, depth+1)   
            # right hand side trees
            par_node['right'] = self.fit(x[x[:, col] >= cutoff], y_right, {}, depth+1)  
            self.depth += 1   # increase the depth since we call fit once
            self.trees = par_node  
            return par_node
    
    def all_same(self, items):
        return all(x == items[0] for x in items)
 
    def write_tree(self, m):
        file = open("tree.txt", "w")
        pprint(m, file)
        file.close()

# main
df = pd.read_csv('uploadstesting/heart_failure_clinical_records_dataset.csv')

header = ['age', 'anaemia', 'creatinine_phosphokinase', 'diabetes',
       'ejection_fraction', 'high_blood_pressure', 'platelets',
       'serum_creatinine', 'serum_sodium', 'sex', 'smoking', 'time',
       'DEATH_EVENT']
header = [0,2,5,7]

print(round(len(df)*0.7))

n_training = round(len(df)*70/100)
n_testing = len(df) - n_training

x = df.iloc[:n_training, [0,2,5,7]].to_numpy()    #age, creatinine_phosphokinase, high_blood_pressure, serum_creatinine
y = df.iloc[:n_training,-1].to_numpy()

clf = DecisionTreeClassifier(max_depth=6)
m = clf.fit(x, y)

clf.write_tree(m)

print("Content-Type: text/html")
print()