<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script>
            setTimeout(function(){
                window.location.reload(1);
            }, 1000);
            //10 Detik 
        </script>

        <meta charset="utf-8">
        <title>Penyiraman Aeroponik Otomatis</title>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #FFF;
                margin: 40px;
                font: 16px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
                word-wrap: break-word;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 24px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 16px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 16px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">

            <center><h1>Penyiraman Aeroponik Otomatis</h1></center>

            <div id="body">
                <table border="1" cellspacing="0">

                    <!-- <td>No</td> -->
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo "Tanggal : "; echo date('Y-m-d'); echo "<br>";
                    echo "Waktu   : "; echo date('H:i:s');
                    ?>
                    <center><h2>Kondisi Terkini</h2></center><br><br>
                    <?php

                    foreach($hasil as $r) { ?>


                        <img src="http://192.168.1.3/rest_api/assets/img/suhu2.png" width="250">
                        Suhu (ᵒC) <?php echo $r['suhu']; ?> 
                        <img src="http://192.168.1.3/rest_api/assets/img/kelembapan.png">
                        Kelembapan (%) <?php echo $r['kelembapan']; ?> 
                        <img src="http://192.168.1.3/rest_api/assets/img/duration.png" width="150">
                        Durasi (detik) <?php echo $r['durasi']; ?>

                    <?php } ?>
                    <br><br><br>

                </table>

            </div>


        </div>
    </body>
</html>
