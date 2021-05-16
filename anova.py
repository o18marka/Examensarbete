import scipy.stats as stats
import numpy as np
import statsmodels.stats.multicomp as multi
import pandas as pd


def anova(*data): # * indicates, 0, 1 , 2 .. arguments

    if len(data) == 2:
        statistic, pvalue = stats.f_oneway(data[0], data[1])
    elif len(data) == 3:
        statistic, pvalue = stats.f_oneway(data[0], data[1], data[2])
    elif len(data) == 4:
        statistic, pvalue = stats.f_oneway(data[0], data[1], data[2], data[3])


    print("ANOVA Statistic " + str(statistic) + " and p-value " + str(pvalue))

    if pvalue < statistic:
        return True
    else:
        return False



def exampleAnova():

    #Determine the group labels
    groups = ['','']

    #Read your data from file
    file = ""
    df = pd.read_csv(file, sep=",", header=None, names=['Baseline','Sökresultat'])


    #Run Anova on data groups
    if (anova (df[''], df[''])):
        print ("The means are different")
    else:
        print ("No differences in means")

exampleAnova()
