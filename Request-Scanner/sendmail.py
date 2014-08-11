
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

class sendMail:
	#Create class variable. 
	server = None
	gmail_sender = None

	def __init__(self):
		#Define where to connect with what port.
		print "[+] Connecting to SMTP Server" 
		self.server = smtplib.SMTP('smtp.gmail.com', 587)
		self.server.ehlo()
		self.server.starttls()
		self.server.ehlo

	def setup(self,gmail_sender, gmail_password):
		print "[+] Logging into SMTP Server"
		#Login to the gmail server. 
		self.server.login(gmail_sender, gmail_password)
		#Set the class variable. 
		self.gmail_sender =  gmail_sender


	def createBody(self, row, gmail_sender, to):
		print "[+] Creating HTML Email"
		msg = MIMEMultipart('alternative')
		msg['Subject'] = "Carey Car Request"
		msg['From'] = gmail_sender
		msg['To'] = to[0]

		text = "Carey Car Request - DO NOT RESPOND DIRECTLY TO THIS EMAIL, EMAIL THE TESTER."
		html = """\
		<html>
		  <head></head>
		  <body>
		    <p>Hi Carey,<br><br>Please find below my request<br><br><br>
		       Date: """ + str(row[1]) + """<br/><br>
		       Pick Up Time: """ + str(row[2]) + """<br/><br>
		       Pick Up Location: """ + str(row[3]) + """<br/><br>
		       Duration: """ + str(row[4]) + """<br/><br>
		       Vehicle Type: """ + str(row[5]) + """<br/><br>
		       Cost Center: """ + str(row[6]) + """<br/><br>
		       GL Code: """ + str(row[7]) + """<br/><br>
		       Additional Information: """ + str(row[8]) + """<br/><br/><br>
 		       Tester Name: """ + str(row[9]) + """<br/><br>
 		       Tester Email: """ + str(row[10]) + """<br/><br/><br/><br>

 		       Please do not respond directly to this email as the inbox is unregulated. Email the tester directly. 

		    </p>
		  </body>
		</html>
		"""

		# Record the MIME types of both parts - text/plain and text/html.
		part1 = MIMEText(text, 'plain')
		part2 = MIMEText(html, 'html')

		#Attach to the message. 
		msg.attach(part1)
		msg.attach(part2)
		#Return message. 
		return msg


	def send(self, gmail_sender, to, msg):
		print "[+] Sending email.."
		try:
			#Send the mail through the server. 
			self.server.sendmail(gmail_sender, to, str(msg))
			#Print to console message has been sent. 
			print "[+] MESSAGE SENT TO " + str(to)
		except:
			print "[+] MESSAGE WAS NOT SENT. RESTART SERVER"

	def close(self):
		#Close connection with server. 
		self.server.quit()

	def getSender(self):
		return self.gmail_sender




