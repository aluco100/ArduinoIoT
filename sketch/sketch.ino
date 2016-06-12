//pines
int fotoresistance = A1;


void setup() {
  // put your setup code here, to run once:
  pinMode(fotoresistance,INPUT);
  Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
  //int mensaje = analogRead(fotoresistance);
  Serial.println((int)analogRead(fotoresistance));
  Serial.write(analogRead(fotoresistance));
  
  /*if(Serial.available() > 0){
    Serial.print("ok");
    int mensaje = analogRead(fotoresistance);

    Serial.println(mensaje);
    
    if(mensaje != 0){
      Serial.write(mensaje);
      }
    
    }*/

    delay(1000);
}
