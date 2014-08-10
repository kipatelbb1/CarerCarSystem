# from smtplib import SMTP
# import datetime

# debuglevel = 0

# smtp = SMTP()
# smtp.set_debuglevel(debuglevel)
# smtp.connect('kiransprojects.co.uk', 26)
# smtp.login('kiran@kiransprojects', 'Kunal200')

# from_addr = "Kiran Patel <john@doe.net>"
# to_addr = "kiran_patel94@hotmail.com"

# subj = "hello"
# date = datetime.datetime.now().strftime( "%d/%m/%Y %H:%M" )

# message_text = "Hello\nThis is a mail from your server\n\nBye\n"

# msg = "From: %s\nTo: %s\nSubject: %s\nDate: %s\n\n%s" % ( from_addr, to_addr, subj, date, message_text )

# smtp.sendmail(from_addr, to_addr, msg)
# smtp.quit()
# raw_input()

#!/usr/bin/python

import smtplib 

to = ['kiran_patel94@hotmail.com', '1202117@my.brunel.ac.uk']
subject = "test"
text = "here is the message"

#Gmail 
gmail_sender = "kiranpatel259@gmail.com"
gmail_password="Kunal200"

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
