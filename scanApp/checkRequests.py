#!/usr/bin/python
# -*- coding: utf-8 -*-
import MySQLdb
import datetime

class scanDB:
	def __init__(self):
		pass

	#Method connects to the database. 
	def connect(self, hostVal, userVal, passwdVal, dbVal, portVal="3306"):
		print "[+] Connecting to database.."
		con = MySQLdb.connect(host=hostVal,
							user=userVal,
							passwd = passwdVal, 
							db= dbVal, 
							port=portVal)

		print "[+] Connected!"
		return con 

	def executeQuery(self, con, query): 
		print "[+] Retrieving data.."
		#Get Cursor. 
		cur = con.cursor()
		#Execute the passed query. 
		cur.execute(query)
		#Create empty list which will be the 2D array. 
		rows = []

		for row in cur.fetchall():
			requestID = row[0]
			#Convert to string 
			requestID = str(requestID)
			#Format correctly. 
			requestID = requestID[:2]

			#Get the date
			date_request = row[1]
			#Convert the date to the following format. 
			date_request = date_request.strftime('%d-%m-%Y')

			PTime = row[2]
			#Convert to string. 
			PTime = str(PTime)
			#Remove uneeded data. 
			PTime = PTime[2:]

			#Get all other data. 
			PLoc = row[3]
			Duration = row[4]
			Veh_Type = row[5]
			CCenter = row[6]
			GLCode = row[7]
			comments = row[8]

			#Get the testers name and concat. 
			testerName = row[9] + " " + row[10]
			testerEmail = row[11]

			#Add all the values to a list. 
			one_row = [requestID, date_request, PTime, PLoc, Duration, Veh_Type, CCenter, GLCode, comments, testerName, testerEmail]
			#Append the record to the table. 
			rows.append(one_row)

		print "[+] Data retrieved!"
		#Return the 2D array. 
		return rows

