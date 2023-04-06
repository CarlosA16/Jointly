import socket
from flask import request 

HEADER = 64

PORT = 5050

SERVER = '172.16.180.45'

FORMAT = 'utf-8'

DISCONNECT_MESSAGE = "!DISCONNECT"

ADDR = (SERVER, PORT)



client = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client.connect(ADDR)

def send(msg):
    message = msg.encode(FORMAT)
    msg_length = len(message)
    send_length = str(msg_length).encode(FORMAT)
    send_length +=b' ' * (HEADER - len(send_length))
    client.send(send_length)
    client.send(message)

send("hi")