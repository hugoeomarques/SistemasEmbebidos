/*
 *  Simple HTTP get webclient test
 */
#include <DHT.h>
#include <ESP8266WiFi.h>
#include <Servo.h>
Servo servo_janela, servo_rega;
#define POTPIN A0
#define DHTPIN 13
#define SERVOJANELAPIN 12
#define SERVOREGAPIN 14 
#define LUZESTEMPPIN 16/*luzes para aumentar a temperatra*/
/*const char* ssid     = "TVRS_AP";
const char* password = "*Tavares123?*";*/
/*const char* ssid     = "labmicro";
const char* password = "microwifi";*/
const char* ssid     = "Vodafone-ADBCF7";
const char* password = "97G7FEAJ9MXCGFF3";
const char* host = "192.168.1.141";
const int httpPort = 3000;
DHT dht(DHTPIN,DHT11);
void setup() {
  servo_janela.attach(SERVOJANELAPIN);
  servo_rega.attach(SERVOREGAPIN);
  
  delay(100);
  Serial.begin(115200);
  dht.begin();
  Serial.println("Comecei");
  pinMode(LUZESTEMPPIN, OUTPUT);

  // We start by connecting to a WiFi network

  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
}

int potval = 0;
float temp = .0;
float hum = .0;

void loop() {  
  lerDados();
  delay(2000);
  getRequest();
  /*ligarServoMotor();*/
}

void lerDados(){
  potval = analogRead(POTPIN);
  temp = dht.readTemperature();
  hum = dht.readHumidity();
  Serial.print("Temp: ");
  Serial.print(temp);
  Serial.println();
  Serial.print("Hum: ");
  Serial.print(hum);
  Serial.println();
  Serial.print("Pot: ");
  Serial.print(potval);
  Serial.println();
}
void getRequest(){  
  Serial.print("connecting to ");
  Serial.println(host);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  // We now create a URI for the request
  String url = "/teste/";
  url+=(hum);
  url+="/";
  url+=(temp);
  url+="/";
  url+=(potval);
  
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  delay(500);
  
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){
    String line = client.readStringUntil('\r');
    if(line.indexOf("regar") != -1){
      Serial.print("motor - regar");
      ligarServoRega();
    }
    if(line.indexOf("abrir janelas") != -1){
      Serial.print("motor - abrir janela");
      ligarServoJanela(1);
      ligarLuzes(1);
    }else if(line.indexOf("ligar luzes de aquecimento") != -1){
      Serial.print("acender luzes de temperatura");
      ligarServoJanela(0);
      ligarLuzes(0);
      //todo acender luzes
    }
  }
  
  Serial.println();
  Serial.println("closing connection");
}

int luzesLigadas=LOW;
void ligarLuzes(int estaoLigadas){
  if(luzesLigadas && estaoLigadas == 1){
    digitalWrite(LUZESTEMPPIN,LOW);
    luzesLigadas = LOW;
  }else if(estaoLigadas == 0 && !luzesLigadas){
    digitalWrite(LUZESTEMPPIN,HIGH);
    luzesLigadas = HIGH;
  }
}


int estaAberto = LOW;
void ligarServoJanela(int abrirJanela){
  if(estaAberto == LOW && abrirJanela){
    for (int i = 0; i <= 180; i += 1) {
      servo_janela.write(i);
      delay(10); // Wait for 50 millisecond(s)
    }
    estaAberto = HIGH;  
  }
  else if(!abrirJanela && estaAberto == HIGH){
    for (int k = 180; k >= 0; k -= 1) {
      servo_janela.write(k);
      delay(10); // Wait for 50 millisecond(s)
    }
    estaAberto = LOW;  
  }
}

void ligarServoRega(){
  for (int i = 0; i <= 120; i += 1) {
    servo_rega.write(i);
    delay(1); 
  }
  delay(5000);//abrir "valvula" durante 5 segundos
  for (int k = 120; k >= 0; k -= 1) {
    servo_rega.write(k);
    delay(1);  
  }
}
