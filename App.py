from flask import Flask, request

app = Flask(__name__)
from database import engine

db = engine.connect()

@app.route("/")
def cfk_application_status():
    return "Server Running"

