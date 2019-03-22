import numpy as np
import matplotlib.pyplot as plt
import matplotlib.patches as ptc
import pymysql.cursors
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


def RDD(gv,dm):
    rdddist = math.sqrt(((gv[0]-dm[0])**2)+((gv[1]-dm[1])**2))/gv[4]
    return rdddist
def CDD(gv,dm):
    alpha=gv[3]-dm[3]
    cdddist= (min(gv[2],dm[2])/max(gv[2],dm[2]))*math.cos(alpha)
    return cdddist
def ABNormality(gv,datam):    
    m_label=[]
    for i in datam:
        m_label.append(0)
    rdd_thres=4.5
    cdd_thres=0.5
    mm=0
    for m in datam:
        rdd_m=100000000
        for i in gv:
            for j in i:
                #print(RDD(j,m))
                if rdd_m> RDD(j,m):
                    rdd_m=RDD(j,m)
        print(rdd_m)
        if rdd_m>rdd_thres:
            m_label[mm]= -1
            print("rdd")
        else:
            
            cdd_m=0
            for i in gv:
                for j in i:
                    if cdd_m < CDD(j,m):
                        cdd_m=CDD(j,m)
            #print("cdd_m")
            #print(cdd_m)            
            if cdd_m<cdd_thres:
                m_label[mm]= -1
                print("cdd")
        mm+=1
    count_ab=m_label.count(-1)
    #print(count_ab)
    #print(len(m_label))
    abnormality=count_ab/len(m_label)
    return abnormality

def mainfunction(g):
    with open('anomaly1.csv') as csvfile:
        readCSV = csv.reader(csvfile, delimiter=',')
        datavals=[]
        for row in readCSV:
            datavals.append([float(row[2]),float(row[3]),float(row[0]),float(row[4])])

    abr=ABNormality(g,datavals)
    print(abr)   
    if abr>0.4 and abr<=0.7:
        connection = pymysql.connect(host='localhost',
                                 user='root',
                                 password='',
                                 db='shore',
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
    
        try:
            with connection.cursor() as cursor:
                # Create a new record
                sql = "INSERT INTO notification ( user_id, heading, message, status, abnormality_level) VALUES (1,'WARNING','The ship is moving into an abnormal position',0,1);"
                cursor.execute(sql)
        
            # connection is not autocommit by default. So you must commit to save
            # your changes.
            connection.commit()
        finally:
            connection.close()
    elif abr>0.7 and abr<=1:
        connection = pymysql.connect(host='localhost',
                                 user='root',
                                 password='',
                                 db='shore',
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
    
        try:
            with connection.cursor() as cursor:
                # Create a new record
                sql = "INSERT INTO notification ( user_id, heading, message, status, abnormality_level) VALUES (1,'DANGER','High Abnormality Detected',0,2);"
                cursor.execute(sql)
        
            # connection is not autocommit by default. So you must commit to save
            # your changes.
            connection.commit()
        finally:
            connection.close()
        
        
    
            
