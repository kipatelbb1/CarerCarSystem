#!/usr/bin/python

import MySQLdb

class scanDB:
	def __init__(self):
		pass

	def connect(self, hostVal, userVal, passwdVal, dbVal, portVal="3306"):
		con = MySQLdb.connect(host=hostVal,
							user=userVal,
							passwd = passwdVal, 
							db= dbVal, 
							port=portVal)

		return con 

	def executeQuery(self, con, query): 
		cur = con.cursor()
		cur.execute(query)

		for row in cur.fetchall():
			requestID = row[0]
			date_request = row[1]
			PTime = row[2]
			PLoc = row[3]
			Duration = row[4]
			Veh_Type = row[5]
			CCenter = row[6]
			GLCode = row[7]
			comments = row[8]

			print CCenter


db = scanDB()
con = db.connect("127.0.0.1", "root", "", "carey_car", 3306)
db.executeQuery(con, "SELECT * FROM request")
