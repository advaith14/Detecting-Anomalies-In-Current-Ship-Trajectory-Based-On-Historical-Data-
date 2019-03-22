import numpy as np
import matplotlib.pyplot as plt
import csv

from sklearn.datasets.samples_generator import make_blobs
from sklearn.cluster import DBSCAN
from sklearn.preprocessing import StandardScaler
from sklearn import metrics
from dbscan import MyDBSCAN
from numpy import array

datast = []
datamov = []
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
        datamovlat.append([r[2],r[3]])
        datamovspd.append([r[4],r[5]])
        
    datamovlat= StandardScaler().fit_transform(datamovlat)
    datamovspd= StandardScaler().fit_transform(datamovspd)
        
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

for j in (range(len(unique_labels))):
    print(j)


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
        
    
    



