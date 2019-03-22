print("Heklo")
print("world")
a=5
b=3
c=a+b
print(c)
print("1")
import numpy as np
print("2")
import matplotlib.pyplot as plt
print("3")
import matplotlib.patches as ptc
print("3.5")
import pymysql.cursors
print("4")
import statistics
print("5")
import csv
print("6")
import math
print("7")
from gmplot import gmplot
print("8")
from sklearn.datasets.samples_generator import make_blobs
from sklearn.cluster import DBSCAN
print("9")
from sklearn.preprocessing import StandardScaler
print("10")
from sklearn import metrics
from dbscanfa import MyDBSCAN
from numpy import array
from sklearn.cluster import KMeans
print("11")
datast = []
datamov = []
datamovlatactual = []
datamovlat = []

datamovspd = []
print("12")
with open('exactEarth_historical_data.csv') as csvfile:
	print("12.1")
    readCSV = csv.reader(csvfile, delimiter=',')
    i=0
	print("12.2")    
    for row in readCSV:
        if(i==0 or row[26]==''):
            i=1
			print("12.3")
        else:
			print("12.4")	
            data = float(row[26])
            
            if(data > 0.5):
                datamov.append([row[0],row[3],float(row[28]),float(row[29]),float(row[26]),float(row[30])])
				print("12.5")
			else:
                datast.append([row[0],row[3],row[28],row[29],row[30],row[26]])
            	print("12.6")    
            
        	print("12.7")
		print("12.8")
	print("12.9")
    for r in datamov:
        datamovlatactual.append([r[2],r[3]])
    	print("12.10")    
		datamovspd.append([r[4],r[5]])
    	print("12.11")    
    datamovlat= StandardScaler().fit_transform(datamovlatactual)
	print("12.12")
print("13")
 