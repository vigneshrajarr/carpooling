#!"C:\Python27\python"
import urllib2
import cookielib
from getpass import getpass
import sys
import cgi
form=cgi.FieldStorage()
#print "Location : home.php"
number="9791515201"

username ="9698429136"
passwd ="vignesh"
message ="hai thillai"
message = "+".join(message.split(' '))

#Logging into the SMS Site
url = 'http://site24.way2sms.com/Login1.action?'
data = 'username='+username+'&password='+passwd+'&Submit=Sign+in'

#For Cookies:
cj = cookielib.CookieJar()
opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(cj))

# Adding Header detail:
opener.addheaders = [('User-Agent','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36')]

usock = opener.open(url, data)


jession_id = str(cj).split('~')[1].split(' ')[0]
send_sms_url = 'http://site24.way2sms.com/smstoss.action?'
send_sms_data = 'ssaction=ss&Token='+jession_id+'&mobile='+number+'&message='+message+'&msgLen=136'
opener.addheaders = [('Referer', 'http://site25.way2sms.com/sendSMS?Token='+jession_id)]

sms_sent_page = opener.open(send_sms_url,send_sms_data)
#print "MSG SENT"    
sys.exit(1)