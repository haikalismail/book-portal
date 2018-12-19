import mysql.connector as mysql
import numpy as np            # Data manipulation
import pandas as pd           # Dataframe manipulatio
from sklearn.cluster import KMeans
import sys, json


# Load the data that PHP sent us
data = sys.argv[1]
print(data)
