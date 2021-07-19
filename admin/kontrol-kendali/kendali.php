<?php
$title = 'Kontroling Rumah';
require 'koneksi.php';


$query = 'SELECT tb_kontrol.*, user.nama_user FROM tb_kontrol LEFT JOIN user ON user.token_id = tb_kontrol.id_token';
$data = mysqli_query($conn, $query);

require 'header.php';
?>

<div class="panel-header bg-secondary-gradient">
<form action="" method="get">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold"><?= $title; ?></h1>
                
                <h2 class="text-white ">Token : <input type="text" id="ip" class="ip" placeholder="Masukan Token "></h2></input><br>
            </div>
            
        </div>
        
    </div>
    
</div>

<div class="page-inner mt--5">
    

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                <h4 class="card-title">Relay 1</h4>
                    <div class="row align-items-center">
                        
                        <div class="col col-stats ml-3 ml-sm-0">
                            
                            <div class="numbers">
                                <br>
                            <button type="button" id="D1-on" class="btn btn-success" >ON</button>
                            <button type="button" id="D1-off" class="btn btn-danger" > OFF</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                <h4 class="card-title">Relay 2</h4>
                    <div class="row align-items-center">
                        
                        <div class="col col-stats ml-3 ml-sm-0">
                            
                            <div class="numbers">
                                <br>
                            <button type="button" id="D2-on" class="btn btn-success" >ON</button>
                            <button type="button" id="D2-off" class="btn btn-danger" > OFF</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                <h4 class="card-title">Relay 3</h4>
                    <div class="row align-items-center">
                        
                        <div class="col col-stats ml-3 ml-sm-0">
                            
                            <div class="numbers">
                                <br>
                            <button type="button" id="D3-on" class="btn btn-success" >ON</button>
                            <button type="button" id="D3-off" class="btn btn-danger" > OFF</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                <h4 class="card-title">Relay 4</h4>
                    <div class="row align-items-center">
                        
                        <div class="col col-stats ml-3 ml-sm-0">
                            
                            <div class="numbers">
                                <br>
                            <button type="button" id="D4-on" class="btn btn-success" >ON</button>
                            <button type="button" id="D4-off" class="btn btn-danger" > OFF</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    </form>
</div>
</div>
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

        document.getElementById('D4-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D4-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

        

        
    </script>
<?php
require 'footer.php';
?>


        
     
    