# Import picamera, gpio, sys, time libarys
import os, sys, time
import RPi.GPIO as GPIO
import picamera

SENSOR_PIN = 23

GPIO.setmode(GPIO.BCM)
GPIO.setup(SENSOR_PIN, GPIO.IN)

cam = picamera.PiCamera()

def take_picture(channel):
	time_now = time.time()
	try:
		cam.resolution = (1024, 768)
		cam.start_preview()
		time.sleep(2)
		cam.capture("/var/www/html/picture/image_" + str(time_now)  + ".jpg")
		cam.stop_preview()
	except picamera.PiCameraValueError:
		print "ERROR Value"
	except picamera.PiCameraRuntimeError:
		print "ERROR Runtime"
	except picamera.PiCameraClosed:
		print "ERROR Closed"
	except picamera.PiCameraNotRecording:
		print "ERROR Not Recording"
	except picamera.PiCameraAlreadyRecording:
		print "ERROR Already Recording"
	except picamera.PiCameraMMALError:
		print "ERROR MMAL"

try: 
	GPIO.add_event_detect(SENSOR_PIN, GPIO.RISING, callback=take_picture)
	while True:
		time.sleep(100)
except KeyboardInterrupt:
	print "END of Script"

