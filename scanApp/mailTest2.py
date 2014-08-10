#!/usr/bin/python

import smtplib 

from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

#List of people to send message too. 
to = ['kiran_patel94@hotmail.com', '1202117@my.brunel.ac.uk']
#Subject of Message
subject = "test"

#Main body of message
text = "here is the message"



#Gmail Credentials.  
gmail_sender = "kiranpatel259@gmail.com"
gmail_password=""

#TESTING HTML

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
#END HTML


#Connect to Gmail Sever. 
server = smtplib.SMTP('smtp.gmail.com', 587)

server.ehlo()
server.starttls()
server.ehlo

#Login to gmail. 
server.login(gmail_sender, gmail_password)

#Create the main body of the message. 
body = '\r\n'.join([
		'To: %s' % to,
		'From: %s' % "KIran",
		'Subject: %s' % subject,
		'',
		text
		])

#try: 
server.sendmail(gmail_sender, to, msg.as_string())
print 'email sent'
#except Exception,e: 
#	print str(e)

server.quit()

##NEED TO SET 3rd PARTY APPS IN GMAIL ITSELF. 
