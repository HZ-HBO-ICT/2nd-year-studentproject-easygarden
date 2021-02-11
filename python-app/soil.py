#!/usr/bin/python
from api import *
import RPi.GPIO as GPIO
import time

# GPIO setup
channel = 21
GPIO.setmode(GPIO.BCM)
GPIO.setup(channel, GPIO.IN)

# Set-up output
output = 0

# Api setup
apiPlant = Api('abcdefghijklmnopqrstuvwxyz', 'http://easygarden.herokuapp.com/api/plant')

# infinte loop this mofo
while True:
    print(GPIO.input(channel))

    if GPIO.input(channel) == 0:
        output = 1
    elif GPIO.input(channel) == 1:
        output = 0

    res = apiPlant.edit('cucumber', output, None, None)

    time.sleep(10)