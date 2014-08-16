from checkRequests import scanDB
from sendmail import sendMail
import time 

time_to_sleep = 60*5 #Every 10 mins

print "[+] Carer Car System Initialising.."
#Initialise MYSQL database connection. 
db = scanDB()

#Connect to the MYSQL database. 
#con = db.connect("localhost", "root", "", "carey_car", 3306)

##APPLICATION LOOP (RESET VARIABLES OR THEY MAY DO IT THEMSELVES.)
while True: 
	con = db.connect("localhost", "root", "", "carey_car", 3306)
	#Execute Query and store 2D array in rows. 
	rows = db.getRequests(con, "SELECT r.requestid, r.date_request, r.PTime, r.PLoc, r.Duration, r.Veh_Type, r.Cost_Center, r.GL_Code, r.add_comments, t.fName, t.lName, t.email, r.numTesters FROM request r, tester t, requestLine rl WHERE rl.requestID = r.requestID AND rl.testerID = t.testerID AND r.status = 'NOT_SENT'  GROUP BY r.requestID ORDER BY r.requestID")

       
	#Create Mail Instance. 
	mail = sendMail()

	#Set up connection to mail server with credential parameters. 
	mail.setup()

	#Get the sender details. 
	sender = mail.getSender()

	#Create list of people to send email too.

	#Enter all constant emails here. (EMAILS MUST BE SEPATED WITH ;)
	to = "res@careyuk.com;kipatel@BlackBerry.com"

	#Add FTS managers. 
	fts_management = 'ehayden@BlackBerry.com;fmastrangioli@BlackBerry.com;gdamaro@BlackBerry.com'
	#print fts_management
	to = to + ";" + fts_management 
	

	#For each record.. 
	for row in rows:

		print row
                
		#Get all the emails for a request. 
		testerEmails = db.getEmails(con, "SELECT t.email FROM tester t, requestline rl WHERE rl.testerID = t.testerID AND rl.requestID=" + str(row[0]))
		#For each tester related to a request ID, append thier email to the out list. 
		for emails in testerEmails: 
			to = to + ";" + emails 
			print to

		
		#Create the body of the email with all the request details.
		msg = mail.createBody(row, sender, to)
		#Send the message to the out list. 
		flag = mail.send(sender, to, str(msg))
		##UPDATE RECORD TO SET AS SENT. 
		if(flag):
			db.updateStatus(con, "UPDATE request SET status='SENT' WHERE requestID=" + str(row[0]) + "")


	#Close connection to DB
	con.close()
	#Close Connection to BB
	mail.closeBBCon()
	print "[+] Sleeping for " + str(time_to_sleep) + " seconds. ("+ str(time_to_sleep/60) +" Mins)"
	time.sleep(time_to_sleep)




##END APPLICATION LOOP 
print "[+] Shutting System Down.."
#Close the connection to the SMTP server. 
con.close()
mail.close()
#Keep window open. 
raw_input() 