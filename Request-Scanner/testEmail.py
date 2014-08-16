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
from aim.BlackBerry.BlackBerry_manager import BlackBerryManager
from aim.BlackBerry.BlackBerry import BlackBerry
from aim.BlackBerry.features._common import features_common, DEFAULT_WAIT_FOR_TIMEOUT
from aim.BlackBerry.lib._common import libs_common
from apps.gtr.testcases.fts.lib import bbm
from aim.test_executor.constants import PARAM_LOG_DIRECTORY
from aim.util.logger import get_logger, AIM_ROOT_LOG_NAME
from aim.util.logger import setup_aim_logger



class sendMail():

    def __init__(self):
        pass

    def setBB(self):
        print "[+] Setting up BlackBerry device..."
        bb_manager = BlackBerryManager()
        bb_manager.initialize()

        bb1 = bb_manager.get_BlackBerry()
        bb1.initialize()
        return bb1

    def sendMail(self, bb1,to, subject, body, wait_for_sent):
        try:
            bb1.send(to, subject, body, wait_for_sent)
            return True
        except: 
            return False 




bbmail = sendMail()

bb1 = bbmail.setBB()
bbmail.sendMail(bb1, "kipatel@BlackBerry.com", "test", "abdsiusahdusf \n dsifodsfdsh \n ", True)
raw_input("sent!")

#bb1.email.send(to="kipatel@BlackBerry.com", subject="test", body="sjakhdisaih \n usdhfdshfs" ,wait_for_sent=False)


