from checkRequests import scanDB
from sendmail import sendMail

print "[+] Carer Car System Initialising.."
#Initialise MYSQL database connection. 
db = scanDB()

#Connect to the MYSQL database. 
con = db.connect("127.0.0.1", "root", "", "carey_car", 3306)

##APPLICATION LOOP (RESET VARIABLES OR THEY MAY DO IT THEMSELVES.)

#Execute Query and store 2D array in rows. 
rows = db.getRequests(con, "SELECT r.requestid, r.date_request, r.PTime, r.PLoc, r.Duration, r.Veh_Type, r.Cost_Center, r.GL_Code, r.add_comments, t.fName, t.lName, t.email FROM request r, tester t, requestLine rl WHERE rl.requestID = r.requestID AND rl.testerID = t.testerID GROUP BY r.requestID ORDER BY r.requestID")

#Create Mail Instance. 
mail = sendMail()

#Set up connection to mail server with credential parameters. 
mail.setup('kiranpatel259@gmail.com', '')

#Get the sender details. 
sender = mail.getSender()

#Create list of people to send email too.

#Enter all constant emails here.
to = ['kiran_patel94@hotmail.com']

#For each record.. 
for row in rows:
	#Get all the emails for a request. 
	testerEmails = db.getEmails(con, "SELECT t.email FROM tester t, requestline rl WHERE rl.testerID = t.testerID AND rl.requestID=" + row[0])
	#For each tester related to a request ID, append thier email to the out list. 
	for emails in testerEmails: 
		#to.append(str(emails)) 
		print emails
	
	#Create the body of the email with all the request details.
	msg = mail.createBody(row, sender, to)
	#Send the message to the out list. 
	mail.send(sender, to, str(msg))
	##UPDATE RECORD TO SET AS SENT. 


##END APPLICATION LOOP 
print "[+] Shutting System Down.."
#Close the connection to the SMTP server. 
mail.close()
#Keep window open. 
raw_input() 
