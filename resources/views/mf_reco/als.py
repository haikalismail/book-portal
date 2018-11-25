import pyspark
from pyspark import SparkContext, SparkConf
conf = SparkConf().setAppName("pyspark")
sc = SparkContext(conf=conf) 

#importing some libraries
movielens = sc.textFile("../in/ml-100k/u.data")

movielens.first()
movielens.count()

#Clean up the data by splitting it
#Movielens readme says the data is split by tabs
clean_data = movielens.map(lambda x:x.split('\t'))

#extract just the ratings to its own RDD
rate = clean_data.map(lambda y: int(y[2]))
rate.mean()

#Extract just the users
users = clean_data.map(lambda y: int(y[0]))
users.distinct().count()

clean_data.map(lambda y: int(y[1])).distinct().count()

#Need to import three functions/ object from MLlib
from pyspark.mllib.recommendation\
    import ALS, MatrixFactorizationModel, Rating

#We'll need to map the movielens data to a Rating object
#A Rating object is made up of (user, item, rating)
mls = movielens.map(lambda l: l.split('\t'))
ratings = mls.map(lambda x: Rating(int(x[0]),\
    int(x[1]), float(x[2])))

#Need a training and test set
train, test = ratings.randomSplit([0.7,0.3],7856)

train.count() #70,005
test.count() #29,995

#Cache the data to speed up training
train.cache()
test.cache()

#Setting up the parameters for ALS
rank = 5 #latent factors to be made
numIterations =10 #number the process should be repeated

#Create model on the training data
model = ALS.train(train, rank, numIterations)

#Examine the latent features for one PRODUCT
model.productFeatures().first()

#Examine the latent features for one USER
model.userFeatures().first()

#for Product X, Find N users to sell to
model.recommendUsers(242,100)

#for User Y, Find N products to promote
model.recommendProducts(196,10)

#Predict single product for single user
model.predict(196,242)

#Predict Multi users and Multi Products
#Pre-Processing
pred_input = train.map(lambda x:(x[0],x[1]))

#Lots of predictions
#Returns Ratings(user, item, prediction)
pred = model.predictAll(pred_input)

#Get performance Estimate
#organize the data to make (user, product) the key
true_reorg = train.map(lambda x:((x[0],x[1]),x[2]))
pred_reorg = pred.map(lambda x:((x[0],x[1]),x[2]))

#Do the actual join
true_pred = true_reorg.join(pred_reorg)

#Square root the Mean Squared Error
from math import sqrt

MSE = true_pred.map(lambda r: (r[1][0] - r [1][1])**2).mean()
RMSE = sqrt(MSE)

#Test Set Evaluation
test_input = test.map(lambda x:(x[0],x[1]))
pred_test = model.predictAll(test_input)
test_reorg = test.map(lambda x:((x[0],x[1]),x[2]))
pred_reorg = pred_test.map(lambda x:((x[0],x[1]), x[2]))
test_pred = test_reorg.join(pred_reorg)
test_MSE = test_pred.map(lambda r: (r[1][0] - r[1][1])**2).mean()
test_RMSE = sqrt(test_MSE)#1.0145549956596238

#Save the model
model.save(sc,"../out/ml-model")







