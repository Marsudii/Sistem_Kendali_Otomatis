<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="Vikkey" content="Vivek Gupta & IoTMonk">
      <meta http-equiv="Access-Control-Allow-Origin" content="*">
     
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      <title>ESP 8266 Node MCU Web APP LED Control IoT Monk</title></head>
      <body>
   <center>
        <h1>ESP 12E NODEMCU CONTROLLER AND TESTER(Global)</h1>
    </center>
   
   <div class="center">
    <div align="center" class="form">
       <form action="" method="get">
              <input type="text" id="ip" class="ip" placeholder="Thingspeak Write API Key"></input><br>
              <button type="button" id="D1-on" class="button button1" >D1 ON</button>
              <button type="button" id="D1-off" class="button button3" >D1 OFF</button>
              <br>
              <button type="button" id="D2-on" class="button button1" >D2 ON</button>
              <button type="button" id="D2-off" class="button button3" >D2 OFF</button>
              <br>
              <button type="button" id="D3-on" class="button button1" >D3 ON</button>
              <button type="button" id="D3-off" class="button button3" >D3 OFF</button>
              <br>
              <textarea id="logger" class="ip" placeholder="LOGS" readonly></textarea>
        </form>
        <br><br>
     </div>
    </div>
    
    <footer class="footer">
        <center>
            <h4 style="font-family: Helvetica;color: white;">&copy; 2017 | <a href="http://vsgupta.in/">Vivek Gupta</a> | <a href="http://www.iotmonk.com/">IoTMonk.com</a> </h4>
        </center>
    </footer>

    </body>
    <script>
        document.getElementById('D1-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D1-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('D2-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D2-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('D3-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D3-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

        
    </script>
</html>
