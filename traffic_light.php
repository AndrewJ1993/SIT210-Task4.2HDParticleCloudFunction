<?php
if ($_GET["light"]) 
{
    // Getting the correct variable to later turn off and on the lights.
    $reply = $_GET["light"];
    if ($reply == "red") { $on_light = "red"; }
    if ($reply == "orange") { $on_light = "orange"; }
    if ($reply == "green") { $on_light = "green"; }

    // Turn on the light.
    $handle = curl_init();
    $url = "https://api.particle.io/v1/devices/e00fce68aced883ade867d05/trafficLight";

        curl_setopt_array($handle,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array("Authorization: Bearer a7e0eb216b518e792584372577439dd0821c8213"),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => "arg=$on_light",
                CURLOPT_RETURNTRANSFER => true
            )
        );
    $on_output = curl_exec($handle);
    curl_close($handle);


    // Letting the user know if the lights successfully turned off and on.
    $off_json = json_decode($on_output, true);
    if ($off_json['return_value'] == 1) {echo "light successfully turned on.";}
    else {echo "light did not turn on."; }
} 
?> 
<form action='/traffic_light.php' method="get">
    <input type="radio" id="red" name="light" value="red">
    <label for="red">Red</label><br>
    <input type="radio" id="orange" name="light" value="orange">
    <label for="orange">Orange</label><br>
    <input type="radio" id="green" name="light" value="green">
    <label for="green">Green</label>
    <p><input type="submit" value="Submit"></p>
</form>
