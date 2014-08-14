
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText


import sys
import os
import time
import random, string
import threading
import thread
import sys
import random
import MySQLdb
sys.path.append("C:/aimplatform2/")
from aim.blackberry.blackberry_manager import BlackBerryManager
from aim.blackberry.blackberry import BlackBerry
from aim.blackberry.features._common import features_common, DEFAULT_WAIT_FOR_TIMEOUT
from aim.blackberry.lib._common import libs_common
from apps.gtr.testcases.fts.lib import bbm
from aim.test_executor.constants import PARAM_LOG_DIRECTORY
from aim.util.logger import get_logger, AIM_ROOT_LOG_NAME
from aim.util.logger import setup_aim_logger





class sendMail:
	#Create class variable. 
	server = None
	gmail_sender = None
	bb = None

	def __init__(self):
		pass
		#Define where to connect with what port.
		#print "[+] Connecting to SMTP Server" 
		#self.server = smtplib.SMTP('cas-hq.rim.net', 2)
		#self.server.ehlo()
		#self.server.starttls()
		#self.server.ehlo

	def setup(self):
		print "[+] Connecting to BlackBerry Device.."
		#Login to the gmail server. 
		#self.server.login(gmail_sender, gmail_password)
		#Set the class variable. 
		#self.gmail_sender =  gmail_sender
		#Setup BlackBerry Device Manager
		try:
			bb_manager = BlackBerryManager()
			bb_manager.initialize()
			self.bb = bb_manager.get_blackberry()
			self.bb.initialize()
		except: 
			print "[+] ERROR - ENSURE YOUR BLACKBERRY DEVICE IS CONNECTED"



	def createBody(self, row, gmail_sender, to):
		print "[+] Creating HTML Email"
		msg=""
		# msg = MIMEMultipart('alternative')
		# msg['Subject'] = "Carey Car Request"
		# msg['From'] = gmail_sender
		# msg['To'] = to[0]

		
		html = "Hi Carey,\n\n Please find my request below:\n \n Date: " + str(row[1]) + "\n Pick Up Time: " + str(row[2]) + "\n Pick Up Location: " + str(row[3]) + "\n Duration: " + str(row[4]) + "\n Vehicle Type: " + str(row[5]) + "\n Cost Center: " + str(row[6]) + "\n GL Code: " + str(row[7]) + "\n Additional Information: " + str(row[8]) + "\n Tester Name: " + str(row[9]) + "\n Tester Email: " + str(row[10]) + "\n \n Please do not respond directly to this email as the inbox is unregulated. Email the tester directly. "
		#print html

		msg = html
		# Record the MIME types of both parts - text/plain and text/html.
		# part1 = MIMEText(text, 'plain')
		# part2 = MIMEText(html, 'html')

		#Attach to the message. 
		# msg.attach(part1)
		# msg.attach(part2)
		#Return message. 
		return msg


	def send(self, gmail_sender, to, msg):
		print "[+] Sending email.."
		try:
			#Send the mail through the server. 
			#self.server.sendmail(gmail_sender, to, str(msg))
			self.bb.email.send(to=to, subject="Carey Car Request - DO NOT RESPOND DIRECTLY TO THIS EMAIL, TESTER EMAIL SHOWN BELOW.", body=str(msg), wait_for_sent=True)
			#Print to console message has been sent. 
			print "[+] MESSAGE SENT TO " + str(to)
			return True
		except:
			print "[+] MESSAGE WAS NOT SENT. RESTART SERVER"
			return False

	def close(self):
		#Close connection with server. 
		self.server.quit()

	def getSender(self):
		return self.gmail_sender




