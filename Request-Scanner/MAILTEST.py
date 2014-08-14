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
#from apps.gtr.testcases.fts.fts_test_case import FtsTestCase
from aim.blackberry.blackberry_manager import BlackBerryManager
from aim.blackberry.blackberry import BlackBerry
from aim.blackberry.features._common import features_common, DEFAULT_WAIT_FOR_TIMEOUT
from aim.blackberry.lib._common import libs_common
from apps.gtr.testcases.fts.lib import bbm
from aim.test_executor.constants import PARAM_LOG_DIRECTORY
from aim.util.logger import get_logger, AIM_ROOT_LOG_NAME
from aim.util.logger import setup_aim_logger
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText


class sendMail():

    def __init__(self):
        pass

    def setup(self):
        #setup_aim_logger('output.txt')
        print "[+] Setting up BlackBerry device..."

        #Setup BlackBerry Device Manager
        bb_manager = BlackBerryManager()
        bb_manager.initialize()

        #Setup BlackberriesN
        bb1 = bb_manager.get_blackberry()

        bb1.initialize()
        return bb1



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
        """\



    def sendMail(self,dut_bb10, to, body):
        dut_bb10.email.send(to=to, subject="Test", body=body, wait_for_sent=False)
        print "Sent"

blackberry = sendMail()
body = blackberry.createBody([1,2,3,4,5,6,7,8,9,10,11], "as_dmakindu2@gprs.cbbcps.com", "kipatel@blackberry.com")
bb = blackberry.setup()
blackberry.sendMail(bb, "kipatel@blackberry.com", body)
