from checkRequests import scanDB
from sendmail import sendMail


#Initialise MYSQL database connection. 
db = scanDB()

#Connect to the MYSQL database. 
con = db.connect("127.0.0.1", "root", "", "carey_car", 3306)

#Execute Query and store 2D array in rows. 
rows = db.executeQuery(con, "SELECT r.requestid, r.date_request, r.PTime, r.PLoc, r.Duration, r.Veh_Type, r.Cost_Center, r.GL_Code, r.add_comments, t.fName, t.lName, t.email FROM request r, tester t, requestLine rl WHERE rl.requestID = r.requestID AND rl.testerID = t.testerID GROUP BY r.requestID ORDER BY r.requestID")

#Create Mail Instance. 
mail = sendMail()

#Set up connection to mail server with credential parameters. 
mail.setup('kiranpatel259@gmail.com', '')

#Get the sender details. 
sender = mail.getSender()

#Create list of people to send email too. 
to = ['kiran_patel94@hotmail.com', '1202117@my.brunel.ac.uk']

#For each record.. 
for row in rows:
	msg = mail.createBody(row, sender, to)
	mail.send(sender, to, str(msg))


mail.close()
raw_input() 
