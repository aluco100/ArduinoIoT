import http.requests.*;
import processing.serial.*;
import processing.net.*;


Client myClient;
Serial port;

void setup(){
  size(200,200);
  
  myClient = new Client(this,"127.0.0.1",8080);
  
  printArray(Serial.list());
  
  port = new Serial(this,Serial.list()[0],9600);
  
}

void draw(){

  if(port.available() > 0){
    int mensaje = port.read();
    println(mensaje);
    GetRequest get = new GetRequest("http://127.0.0.1/arduilio/insert.php?input="+mensaje);
    get.send();
    
    delay(1000);
  }
  
  delay(500);
  
}