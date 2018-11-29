#importing some libraries
import numpy as np
import pandas as pd 
import pyspark
from pyspark import SparkContext, SparkConf
conf = SparkConf().setAppName("pyspark")
sc = SparkContext(conf=conf) 

#check if spark contect is defined
print(sc.version)

#importing the MF libraries
from pyspark.mllib.recommendation import ALS, MatrixFactorizationModel, Rating
#reading the movielens data
"""RDD - Resilient Distributed Datasets which represents an immutable, partitioned collections of elements that can be operated on in paraller"""

df_rdd = sc.textFile(r'C:\Users\syfqh\Desktop\RUN_Source\Datasets\ml-1m/ratings.dat').map(lambda x: x.split("::"))
print(df_rdd)

#getrid of timestamp column so only certain data can be fed into the model
ratings = df_rdd.map(lambda l: Rating(int(l[0]),int(l[1]),float(l[2])))
print(ratings)

#---Split data into train and test sets
X_train, X_test= ratings.randomSplit([0.8, 0.2])

#Training the model
rank = 10
numIterations = 10
model = ALS.train(X_train, rank, numIterations)

"""  ALS - Alternate Least Squares, which is the name of the optimization algorithm used for Matrix Factorization. You can add more parameters before you train the model — like if you’d like some regularization or youd want the final two matrix to have positive values.""" 

#---Evaluate the model on testdata

#dropping the ratings on the tests data
testdata = X_test.map(lambda p: (p[0], p[1]))
predictions = model.predictAll(testdata).map(lambda r: ((r[0], r[1]), r[2]))

#joining the prediction with the original test dataset
ratesAndPreds = X_test.map(lambda r: ((r[0], r[1]),r[2])).join(predictions)

#calculating error
MSE = ratesAndPreds.map(lambda r: (r[1][0] - r[1][1])**2).mean()
print("Mean Squared Error = " + str (MSE))

#---Evaluate DataFrames

