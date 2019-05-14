import time
import hashlib

teamname1 = input("team 1?\n")
teamname2 = input("team 2?\n")

def hash(teamname):
    return(hashlib.md5(teamname.encode('utf-8')).hexdigest())
