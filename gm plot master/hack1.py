import csv

import numpy as np

from sklearn.cluster import DBSCAN
from sklearn import metrics
from sklearn.datasets.samples_generator import make_blobs
from sklearn.preprocessing import StandardScaler


with open('exactEarth_historical_data.csv') as csvfile:
    readCSV = csv.reader(csvfile, delimiter=',')
    datast=[]
    datamov=[]
    i=0
    
    for row in readCSV:
        if (i==0) or row[26]=='' :
            i=1
        else:
            data=float(row[26])
            if data>0.5:
                datamov.append([row[0],row[3],row[28],row[29],row[30],row[26]])
            else:
                datast.append([row[0],row[3],row[28],row[29],row[30],row[26]])
    datamovlat=[]
    for r in datamov:
        datamovlat.append([r[2],r[3]])
    datamovlat=  StandardScaler().fit_transform(datamovlat)    
    # Compute DBSCAN
    db = DBSCAN(eps=0.3, min_samples=10).fit(datamovlat)
    core_samples_mask = np.zeros_like(db.labels_, dtype=bool)
    core_samples_mask[db.core_sample_indices_] = True
    labels = db.labels_
    # Number of clusters in labels, ignoring noise if present.
    n_clusters_ = len(set(labels)) - (1 if -1 in labels else 0)
    
    # Plot result
import matplotlib.pyplot as plt

# Black removed and is used for noise instead.
unique_labels = set(labels)
colors = [plt.cm.Spectral(each)
          for each in np.linspace(0, 1, len(unique_labels))]
for k, col in zip(unique_labels, colors):
    if k == -1:
        # Black used for noise.
        col = [0, 0, 0, 1]

    class_member_mask = (labels == k)

    xy = datamovlat[class_member_mask & core_samples_mask]
    plt.plot(xy[:, 0], xy[:, 1], 'o', markerfacecolor=tuple(col),
             markeredgecolor='k', markersize=14)

    xy = datamovlat[class_member_mask & ~core_samples_mask]
    plt.plot(xy[:, 0], xy[:, 1], 'o', markerfacecolor=tuple(col),
             markeredgecolor='k', markersize=6)

plt.title('Estimated number of clusters: %d' % n_clusters_)
plt.show()
    
