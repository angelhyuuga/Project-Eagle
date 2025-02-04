#include <Ethernet.h>
#include <SPI.h>
 
// Configuracion del Ethernet Shield
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; // Direccion MAC
byte ip[] = { 192,168,0,100 }; // Direccion IP del Arduino
byte server[] = { 192,168,0,33 }; // Direccion IP del servidor
EthernetClient client; 
float pulsaciones;
int analog_pin = 0;
long NumRan;
 
void setup(void) {
  Ethernet.begin(mac, ip); // Inicializamos el Ethernet Shield
  delay(1000); // Esperamos 1 segundo 
}
 
void loop(void) {

  NumRan = random(10,180);
  pulsaciones = analogRead(NumRan);
  delay(20);
  //Display in Serial Monitor
  Serial.print(pulsaciones);
  Serial.println(" Pulsaciones del herido");
  // Proceso de envio de muestras al servidor
  Serial.println("Conectando...");
  if (client.connect(server, 80)>0) {  // Conexion con el servidor
    client.print("GET /Arduino/iot.php?valor="); // Enviamos los datos por GET
    client.print(pulsaciones);
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");
    client.println();
    Serial.println("Conectado");
  } else {
    Serial.println("Fallo en la conexion con el Drone");
  }
  if (!client.connected()) {
    Serial.println("El Drone se ha desconectado!");
  }
  client.stop();
  client.flush();
  delay(20000); // Espero 20 segundos antes de tomar otra muestra
}

