import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

class sendMail:
	#Create class variable. 
	server = None
	gmail_sender = None

	def __init__(self):
		#Define where to connect with what port. 
		self.server = smtplib.SMTP('smtp.gmail.com', 587)
		self.server.ehlo()
		self.server.starttls()
		self.server.ehlo

	def setup(self,gmail_sender, gmail_password):
		#Login to the gmail server. 
		self.server.login(gmail_sender, gmail_password)
		#Return the 
		self.gmail_sender =  gmail_sender


	def createBody(self, row, gmail_sender, to):
		msg = MIMEMultipart('alternative')
		msg['Subject'] = "Test"
		msg['From'] = gmail_sender
		msg['To'] = to[0]

		text = "Hi!\nHow are you?\nHere is the link you wanted:\nhttp://www.python.org"
		html = """\
		<html>
		  <head></head>
		  <body>
		    <p>Hi!<br>
		       How are you?<br>
		       Here is the <a href="http://www.python.org">link</a> you wanted.
		    </p>
		  </body>
		</html>
		"""

		# Record the MIME types of both parts - text/plain and text/html.
		part1 = MIMEText(text, 'plain')
		part2 = MIMEText(html, 'html')

		msg.attach(part1)
		msg.attach(part2)
		return msg


	def send(self, gmail_sender, to, msg):
		self.server.sendmail(gmail_sender, to, str(msg))
		print "[+] MESSAGE SENT TO " + str(to)

	def close(self):
		self.server.quit()

	def getSender(self):
		return self.gmail_sender


#Create Mail Instance. 
mail = sendMail()

#Set up connection to mail server with credential parameters. 
mail.setup('kiranpatel259@gmail.com', '')

#Get the sender details. 
sender = mail.getSender()

#Create list of people to send email too. 
to = ['kiran_patel94@hotmail.com', '1202117@my.brunel.ac.uk']

#Create the body of the mail message and pass the row data. 
msg = mail.createBody(1, sender, to)

#Send the message 
mail.send(sender,to, msg)


#Close the SMTP server object. 
mail.close()
raw_input()