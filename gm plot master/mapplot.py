import csv
from gmplot import gmplot

# Place map
gmap = gmplot.GoogleMapPlotter(-24.20694333, 38.186785, 13)
datamovlat=[]

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
                datamov.append([row[0],row[3],float(row[28]),float(row[29]),row[30],row[26]])
            else:
                datast.append([row[0],row[3],row[28],row[29],row[30],row[26]])
    
    for r in datamov:
        datamovlat.append((r[2],r[3]))

golden_gate_park_lats, golden_gate_park_lons =  zip(*datamovlat)
gmap.plot(golden_gate_park_lats, golden_gate_park_lons, 'cornflowerblue', edge_width=1)


# Scatter points
top_attraction_lats, top_attraction_lons = zip(*datamovlat)
gmap.scatter(top_attraction_lats, top_attraction_lons, '#3B0B39', size=40, marker=False)

# Draw
gmap.draw("my_map.html")