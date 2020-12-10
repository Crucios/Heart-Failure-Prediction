#!C:\Users\Asus\AppData\Local\Programs\Python\Python38\python.exe
import os
import numpy as np
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

import pandas_profiling as pdp

#main
input_ = 'uploadstraining/heart_failure_clinical_records_dataset.csv'

df = pd.read_csv(input_)

report = pdp.ProfileReport(df, title='Pandas Profiling Report')

plt.figure(figsize=(15,15))
sns.heatmap(df.corr(),annot=True)
# plt.show()
plt.savefig('pearson_correlation.png')

print("Content-Type: text/html")
print()