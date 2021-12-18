/*
 *  Simple HTTP get webclient test
 */
#include <DHT.h>
#include <ESP8266WiFi.h>
#include <Servo.h>
Servo servo_1;
#define POTPIN A0
#define DHTPIN 13
#define SERVOMOTORPIN 12
#define LUZESTEMPPIN 14 /*luzes para aumentar a temperatra*/
const char* ssid     = "TVRS_AP";
const char* password = "*Tavares123?*";
/*const char* ssid     = "labmicro";
const char* password = "microwifi";*/
DHT dht(DHTPIN,DHT11);
void setup() {
  servo_1.attach(SERVOMOTORPIN);
  delay(100);
  Serial.begin(115200);
  dht.begin();
  Serial.println("Comecei");
  pinMode(SERVOMOTORPIN, OUTPUT);
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
const char* host = "192.168.3.134";
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
  const int httpPort = 3000;
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
      Serial.print("ligar o motor");
    }
    if(line.indexOf("abrir janelas") != -1){
      Serial.print("ligar servomotor para abrir janela");
      ligarServoMotor();
    }else if(line.indexOf("ligar luzes de aquecimento") != -1){
      Serial.print("acender luzes de temperatura");
    }
    //Serial.print(line);
  }
  
  Serial.println();
  Serial.println("closing connection");
}

int estaAberto = LOW;
void ligarServoMotor(){
  if(estaAberto == LOW)
    estaAberto = HIGH;
  else estaAberto = LOW;  
  for (int i = 0; i <= 120; i += 1) {
    servo_1.write(i);
    delay(10); // Wait for 50 millisecond(s)
  }
  for (int k = 120; k >= 0; k -= 1) {
    servo_1.write(k);
    delay(10); // Wait for 50 millisecond(s)
  }
}
