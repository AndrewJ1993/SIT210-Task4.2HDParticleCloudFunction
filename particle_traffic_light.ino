void setup()
{
	Particle.function("trafficLight", trafficLight);
}


void loop()
{
}

int trafficLight(String command)
{
    int offLed;
    int onLed;

	if(command == "red") {
        onLed = D6;
        offLed = D5;
    }
	else if(command == "orange") {
        onLed = D5;
        offLed = D4;
    }
    else if (command == "green") {
        onLed = D4;
        offLed = D6;
    }
	else return -2;

    pinMode(onLed, OUTPUT);
    pinMode(offLed, OUTPUT);
	digitalWrite(onLed, HIGH);
	digitalWrite(offLed, LOW);
	return 1;
}
