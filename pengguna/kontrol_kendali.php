<?php
$title = 'Kontrol Rumah';
require 'koneksi.php';


require 'header.php';
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Kontrol Rumah</h2>
            </div>
        </div>
        <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
            <div class="alert alert-success" role="alert" id="msg">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php }
        $_SESSION['msg'] = ''; ?>
    </div>
</div>
<div class="page-inner mt--5">
<form action="" method="get">
    <diva class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
               
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="index.php" class="btn btn-primary btn-round ml-auto">
                            
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $query2 = "SELECT id_token, nama_rumah, token_rumah, relay1, relay2, relay3, relay4 FROM tb_kontrol  WHERE id_token = '$_SESSION[token_id]'";
                    $data = mysqli_query($conn, $query2);
                    while ($result = mysqli_fetch_array($data)) {
                        ?>
                        <h4> Nama Pengguna : <?= $result['nama_rumah']; ?> </h4>
                        <br>
                        <input type="text" class="ip" id="ip" name="ip" value="<?php echo ( $result['token_rumah']) ?>" readonly>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Default Card Example -->
                                <div class="card shadow mb-4">
                                            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relay 1</h6>
        </div>
        <div class="card-body">
            <iframe  class="custom-iframe" width="450" height="260" style="border: 1px solid #cccccc;" src="<?php echo ( $result['relay1']) ?>"></iframe>
            <br>
            <h6 class="m-0 font-weight-bold text-danger">   Note:</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan naik (1) berati kondisi ON</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan turun (0) berati kondisi OFF</h6>
        </div>
        <div class="card-body">
        <button class="btn btn-success" id="relay1-on" type="button">ON</button>
         <button class="btn btn-danger" id="relay1-off" type="button">OFF</button>
        </div>
    </div>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relay 3</h6>
        </div>
        <div class="card-body">
            <iframe class="custom-iframe" width="450" height="260" style="border: 1px solid #cccccc;" src="<?php echo ( $result['relay3']) ?>"></iframe>
            <br>
            <h6 class="m-0 font-weight-bold text-danger">   Note:</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan naik (1) berati kondisi ON</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan turun (0) berati kondisi OFF</h6>
        </div>
        <div class="card-body">
        <button class="btn btn-success" id="relay3-on" type="button">ON</button>
         <button class="btn btn-danger" id="relay3-off" type="button">OFF</button>
        </div>
    </div>

</div>

<div class="col-lg-6">

    <!-- Dropdown Card Example -->

    <!-- Card Header - Dropdown -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relay 2</h6>
        </div>
        <div class="card-body">
            <iframe class="custom-iframe" width="450" height="260" style="border: 1px solid #cccccc;" src="<?php echo ( $result['relay2']) ?>"></iframe>
            <br>
            <h6 class="m-0 font-weight-bold text-danger">   Note:</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan naik (1) berati kondisi ON</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan turun (0) berati kondisi OFF</h6>
        </div>
        <div class="card-body">
        <button class="btn btn-success" id="relay2-on" type="button">ON</button>
         <button class="btn btn-danger" id="relay2-off" type="button">OFF</button>

        </div>
    </div>


    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relay 4</h6>
        </div>
        <div class="card-body">
            <iframe class="custom-iframe" width="450" height="260" style="border: 1px solid #cccccc;" src="<?php echo ( $result['relay4']) ?>"></iframe>
            <br>
            <h6 class="m-0 font-weight-bold text-danger">   Note:</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan naik (1) berati kondisi ON</h6>
            <h6 class="m-0 font-weight-bold text-danger"> - jika relay dalam keadaan turun (0) berati kondisi OFF</h6>
        </div>
        <div class="card-body">
        <button class="btn btn-success" id="relay4-on" type="button">ON</button>
         <button class="btn btn-danger" id="relay4-off" type="button">OFF</button>

        </div>

    </div>

</div>

</div>
<!-- Script Kirim data Ke Thinkspeak -->
<script>
                    document.getElementById('relay1-on').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field1=1"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );

                    document.getElementById('relay1-off').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field1=0"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );


                    document.getElementById('relay2-on').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field2=1"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );

                    document.getElementById('relay2-off').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field2=0"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );


                    document.getElementById('relay3-on').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field3=1"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );

                    document.getElementById('relay3-off').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field3=0"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );

                    document.getElementById('relay4-on').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field4=1"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );

                    document.getElementById('relay4-off').addEventListener('click',
                        function() {
                            var ip = document.getElementById('ip').value;
                            var url = "http://api.thingspeak.com/update?api_key=" +
                                ip + "&field4=0"

                            $.getJSON(url, function(data) {
                                    console.log(data);
                                }

                            );
                        }

                    );
                </script>








                                            
                                            
<?php }
                                
                                ?>                  
                                
                          
                    </div>
                </div>
            </div>
        </diva>
</form>
</div>
</div>

<?php
require 'footer.php';
?>
