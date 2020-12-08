#!C:/Users/Asus/AppData/Local/Programs/Python/Python38/python.exe
import numpy as np
import pandas as pd

pip install https://github.com/pandas-profiling/pandas-profiling/archive/master.zip

import pandas_profiling as pdp

#main
input_ = "uploadstesting/heart_failure_clinical_records_dataset.csv"

df = pd.read_csv(input_)

report = pdp.ProfileReport(df, title='Pandas Profiling Report')

report.to_widgets()

plt.figure(figsize=(15,15))
sns.heatmap(df.corr(),annot=True)
plt.show()