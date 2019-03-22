import numpy as np
import matplotlib.pyplot as plt
import matplotlib.patches as ptc

import csv
import math
from gmplot import gmplot
from sklearn.datasets.samples_generator import make_blobs
from sklearn.cluster import DBSCAN
from sklearn.preprocessing import StandardScaler
from sklearn import metrics
from dbscanfa import MyDBSCAN
from numpy import array

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

#print(datamovlat)

list_labels = MyDBSCAN(datamovlat,datamovspd, eps=0.3, MinPts=5)
db = array( list_labels )

#core_samples_mask = np.zeros_like(list_labels, dtype=bool)
#core_samples_mask[db.core_sample_indices_] = True

n_clusters_ = len(set(list_labels)) - (1 if -1 in list_labels else 0)
#print(type(db))

unique_labels = set(list_labels)

x = datamovlat[:, 0]
y = datamovlat[:, 1]

#for j in (range(len(unique_labels))):
   # print(j)


colors = [plt.cm.Spectral(each)

          for each in np.linspace(0, 1, len(unique_labels))]

        
for k, col in zip(unique_labels, colors):

    if k == -1:

        # Black used for noise.

        col = [0, 0, 0, 1]

    plt.plot(datamovlat[:, 0], datamovlat[:, 1], 'o', markerfacecolor=tuple(col), 
              markeredgecolor='k', markersize=14)


plt.title('Estimated number of clusters: %d' % n_clusters_)

plt.show()
color_codes = [
   'coral'
   ,'cornflowerblue'
   ,'brown'
   ,'coral'
   ,'crimson'
   ,'darkgreen'
   ,'darkmagenta'
   , 'yellow'
   , 'navy'
   ,'darkorange'
   
   ,'purple'
   , 'orchid'
   ,'darkgray'
   ,'gold'
   ,'pink'

   
   
]

gmap = gmplot.GoogleMapPlotter(-68.779056, 33.529694,3 )
clustermat=[]
for i in range(1,max(list_labels)+1):
    clustermat.insert(i,[i])
for i in range(0,len(list_labels)):
    
    clustermat[list_labels[i]-1].append([datamovlatactual[i][0],datamovlatactual[i][1],datamovspd[i][0],datamovspd[i][1]])

for i in range(len(list_labels)):
    lats, lons = zip(datamovlatactual[i])
    
    gmap.scatter(lats, lons, color_codes[list_labels[i]], size=15600, marker=False)
gmap.draw("hack_dbscan_plot.html")  
gv=[]
for i in range(max(list_labels)):
    clustermat[i].pop(0)
cogw=[]
g=[]
for i in range(1,max(list_labels)+1):
    g.insert(i,[i])
for i in range(max(list_labels)):
    sum=0
    clustermattemp=clustermat[i]
    for j in clustermattemp:
        
        #print(j)
        sum=sum+j[3]
    cogw.append(sum/len(clustermat[i]))
    #print(cogw[i])
    while()
        gx1=clustermattemp[i][0]
        gy1=clustermattemp[i][1]
        
        for k in clustermattemp:
            if cogw[i]>0 and cogw[i]<=90:
                gx2=gx1+5*math.cos(cogw[i])
                gy2=gy1+5*math.sin(cogw[i])
                
                db1x=gx1-50*math.cos(90-cogw[i])
                db1y=gy1+50*math.sin(90-cogw[i])
                db2x=gx1+50*math.cos(90-cogw[i])
                db2y=gy1-50*math.sin(90-cogw[i])
                                
                dt1x=gx2-50*math.cos(90-cogw[i])
                dt1y=gy2+50*math.sin(90-cogw[i])
                dt2x=gx2+50*math.cos(90-cogw[i])
                dt2y=gy2-50*math.sin(90-cogw[i])
                
                rect=ptc.Rectangle((db1x,db1y),100,5)
                
                for i in  
                 if():
                     g[i].append((gx,gy))
                 else:
                     break;
                           
            elif if cogw[i]>90 and cogw[i]<=180:
                gx=k[0]-5*math.cos(cogw[i])
                gy=k[1]+5*math.sin(cogw[i])
                gx1 = k[0]
                gy1 = k[1] 
                 
                 if():
                     g[i].append((gx,gy))
                 else:
                     break;
                
            elif if cogw[i]>180 and cogw[i]<=270:
                gx=k[0]-5*math.cos(cogw[i])
                gy=k[1]-5*math.sin(cogw[i])
                gx1 = k[0]
                gy1 = k[1] 
                 
                 if():
                     g[i].append((gx,gy))
                 else:
                     break;
       
            elif if cogw[i]>270 and cogw[i]<=360:
                gx=k[0]+5*math.cos(cogw[i])
                gy=k[1]-5*math.sin(cogw[i])
                gx1 = k[0]
                gy1 = k[1] 
                 
                 if():
                     g[i].append((gx,gy))
                 else:
                     break;
           
                
    
     
    
    
    
