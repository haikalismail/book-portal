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
from pyspark.ml.recommmendation import ALS, MatrixFactorizationModel, Rating

#reading the movielens data
"""RDD - Resilient Distributed Datasets which represents an immutable, partitioned collections of elements that can be operated on in paraller"""

df_rdd = sc.textFile(r'C:\Users\syfqh\Desktop\RUN_Source\Datasets\ml-1m/ratings.dat')\
.map(lambda x: x.split("::"))

#getrid of timestamp column so only certain data can be fed into the model
ratings = df.rdd.map(lambda l: \
Rating(int(l[0]),int(l[1]),float(l[2])))

#---Split data into train and test sets

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

#importing ALS from pyspark.ml which works on DataFrames
from pyspark.ml.recommendation import ALS

#Things we'll be use for evaluation
from pyspark.sql.types import FloatType
from pyspark.ml.evaluation import RegressionEvaluator #<-measure ALS model performance
from pyspark.sql.functions import col

#read data as RDD and converting into a dataframe
df = sc.textFile('deep-learning/ml-1m/ratings.dat.filepart')\
.map(lambda x: x.split("::")).toDF(["users", "items",\
"ratings","timestamp"]) 

#splitting into train and test sets
X_train, X_test = df.randomSplit([0.8, 0.2]) #<-80% train, 20% test

#training the model
als = mlALS(rank=5, maxIter=10, seed=0)
model = als.fit(X_train.select(["user","item", "rating"]))

"""get prediction by just using user and item columns from test dataset and we'll get the predicted data joined with the original data"""
predictions= model.transfrom(X_test.select(["user", "item"]))

#Calculate the error
""" Before they're passed onto RegressionEvaluator() the y_true and y_pred needs to be label and raw """

#join the prediction with the original table
ratesAndPreds = X_test.join(predictions, (X_test.user == \
predictions.user)& (X_test.item == predictions.items) ,\
how='inner').select(X_test.user,X_test.item, \
X_test.rating, predictions.prediction)

#renaming the columns as raw and label
ratesAndPreds = ratesAndPreds.select([col("rating").alias("label"),\
col('prediction').alias("raw")]), \
ratesAndPreds = ratesAndPreds.withColumn("label", \
ratesAndPreds["label"].cast(FloatType()))

#calculate the error
evaluator = RegressionEvaluator(predictionCol="raw")
evaluator.evaluate(ratesAndPreds2, {evaluator.metricName: "mae"})

""" Can also use recommenForAllUsers() and recommendForAllItems() which gives top items and user per user or item"""



