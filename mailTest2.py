#!/usr/bin/python

import smtplib 

to = ['kiran_patel94@hotmail.com', '1202117@my.brunel.ac.uk']
subject = "test"
text = "here is the message"

#Gmail 
gmail_sender = "kiranpatel259@gmail.com"
gmail_password=""

server = smtplib.SMTP('smtp.gmail.com', 587)

server.ehlo()
server.starttls()
server.ehlo
server.login(gmail_sender, gmail_password)

body = '\r\n'.join([
		'To: %s' % to,
		'From: %s' % "KIran",
		'Subject: %s' % subject,
		'',
		text
		])

#try: 
server.sendmail(gmail_sender, to, body)
print 'email sent'
#except Exception,e: 
#	print str(e)

server.quit()

##NEED TO SET 3rd PARTY APPS IN GMAIL ITSELF. 
