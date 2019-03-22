import numpy as np
import matplotlib.pyplot as plt
import matplotlib.patches as ptc
import pymysql.cursors
from shapely.geometry import MultiPoint
import statistics
import csv
import math
from gmplot import gmplot
from sklearn.datasets.samples_generator import make_blobs
from sklearn.cluster import DBSCAN
from sklearn.preprocessing import StandardScaler
from sklearn import metrics
from dbscanfa import MyDBSCAN
from numpy import array
from sklearn.cluster import KMeans
datast = []
datamov = []
datamovlatactual = []
datamovlat = []

datamovspd = []


with open('exactEarth_historical_data.csv') as csvfile:
    readCSV = csv.reader(csvfile, delimiter=',')
    i=0
    
    for row in readCSV:
        if(i==0 or row[26]==''):
            i=1
        else:
            data = float(row[26])
            
            if(data > 0.5):
                datamov.append([row[0],row[3],float(row[28]),float(row[29]),float(row[26]),float(row[30])])
            else:
                datast.append([row[0],row[3],row[28],row[29],row[30],row[26]])
                
            
            
    for r in datamov:
        datamovlatactual.append([r[2],r[3]])
        datamovspd.append([r[4],r[5]])
        
    datamovlat= StandardScaler().fit_transform(datamovlatactual)
        
print ("Running my implementation...")
