#!/usr/bin/python
# -*- coding: utf-8 -*-
import MySQLdb
import datetime

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
		rows = []

		for row in cur.fetchall():
			requestID = row[0]
			#Convert to string 
			requestID = str(requestID)
			#Format correctly. 
			requestID = requestID[:2]

			date_request = row[1]
			date_request = date_request.strftime('%d-%m-%Y')

			PTime = row[2]
			#Convert to string. 
			PTime = str(PTime)
			#Remove uneeded data. 
			PTime = PTime[2:]

			PLoc = row[3]
			Duration = row[4]
			Veh_Type = row[5]
			CCenter = row[6]
			GLCode = row[7]
			comments = row[8]

			testerName = row[9] + " " + row[10]
			testerEmail = row[11]

			one_row = [requestID, date_request, PTime, PLoc, Duration, Veh_Type, CCenter, GLCode, comments, testerName, testerEmail]
			#print one_row
			rows.append(one_row)

		
		#print rows
		return rows





#SELECT r.requestID, t.fName, t.lName, t.email FROM requestLine rl, request r, tester t WHERE rl.requestID = r.requestID AND rl.testerID = t.testerID ORDER BY r.requestID

#SELECT r.requestid, r.date_request, r.PTime, r.PLoc, r.Duration, r.Veh_Type, r.Cost_Center, r.GL_Code, r.add_comments, t.fName, t.lName, t.email FROM request r, tester t, requestLine rl WHERE rl.requestID = r.requestID AND rl.testerID = t.testerID
