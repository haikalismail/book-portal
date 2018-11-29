from pyspark.ml.evaluation import RegressionEvaluator #<-measure performance ALS model
from pyspark.ml.recommendation import ALS  #<-ALS algorithm
from pyspark.ml.tuning import TrainValidationSplit, ParamGridBuilder #<- to cross validate and fine-tune per parameter

#Create test and train set
(training, test) = movie_ratings.randomSplit([0.8,0.2])

#Create ALS model
als = ALS(userCol="userId", itemCol="movieId", ratingCol="rating", coldStartStrategy="drop", nonnegative = True) #<- "drop & True" to avoid negative prediction

#Tune model using ParamGridBuilder (rank, maximum iteration, regularization to prevent ALS overfitting to the data)
param_grid = ParamGridBuilder()\
.addGrid(als.rank, [12,13,14])\
.addGrid(als.maxIter, [18,19,20])\
.addGrid(als.regParam, [.17, .18, .19])\
.build()

#Define evaluator as RMSE
evaluator = RegressionEvaluator(metricName="rmse", labelCol="rating", predictionCol="prediction")

#Build cross validation using TrainValidationsplit
cv = CrossValidator(estimator=als, estimatorParamMaps=param_grid, evaluator=evaluator, numFolds=3)

#Fit ALS model to training data
model =cv.fit(training)

#Extract best model from the tuning exercise using ParamGridBuilder
best_model=model.bestModel #<-best combination of parameter, Spark will name it as best_model

#Generate predicitions and evaluate using RMSE
predictions = best_model.transform(test) #<-fit the best_model into test data
rmse = evaluator.evaluate(predictions)

#Print evaluation metrics and model parameters
print("RMSE = " +str(rmse))
print("**Best Model**")
print(" Rank = "), best_model.rank
print(" Max Iter: "), best_model._java_obj.parent().getMaxIter()
print(" RegParam:"), best_model._java_obj.parent().getRegParam()


"""***********************************************************RETURN RECOMMENDATION**************************************************
user_recs = best_model.recommendForAllUsers(10) #<-return top10 recommendation for each users (this is called vector format)

#use function to get more readable format
def get_recs_for_user(recs):
    #Recs should be for a specific user.
    recs = recs.select("recommendations.movieId","recommendations.rating")
    movies =recs.select("movieId").toPandas().iloc[0,0]
    ratings = recs.select("rating").toPandas().iloc[0,0]
    rating_matrix = pd.DataFrame(movies, columns = ["movieId])
    ratings_matrix["ratings"] = ratings
    rating_matrix_ps = sqlContext.createDataFrame(ratings_matrix)
    return ratings_matrix_ps

"""

