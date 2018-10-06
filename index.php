<?php 
require 'header.php';
require 'navbar.php';
?>
<div>
    <div class="mt-5 center-content">
        <h1>Bersama Kita Atasi Masalah</h1>
        <h3>bla bla bla </h3>
        <button class="btn btn-nyeletuk mt-3 mb-5">Nyeletuk Sekarang!</button>
    </div>
    <div class="bg-white mt-5 center-content">
        
            <!-- action="" method="_POST" -->
        <div style="padding-top:1px;margin:auto;width:600px;">
            <div class="terselesaikan">
                <img src="img/tick.png" width="18px" alt="">
                Terselesaikan
            </div>
            <div class="cardpost">
                <div class="row">
                    <div class="col-md-1">
                        <img src="img/dp.png" name="dp" width="50px" alt="">
                    </div>
                    <div class="col-md-11">
                        <div class="namepost">
                            <div name="nama">nama</div>
                        </div>
                        <div class="statuspost">
                            <div name="status">status</div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 setujuiket" style="text-align:left">
                                <div name="setuju">0 Orang mengalami masalah ini</div>
                            </div>
                            <span class="text-right col-md-6 komentarket" style="float:right">
                                <span name="komentar" class="ml-1">0 Komentar</span>
                                <span name="share" class="ml-1">0 kali dibagikan</span>
                                <span name="lihat" class="ml-1">0 </span>
                                <span class=""><i class="ml-1 fa fa-eye"></i></span>                         
                            </span>
                        </div>
                        <hr>
                        <center>
                                <div class="lbl" style="margin:auto">
                                    <button name="setuju-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-thumbs-up button-post"></i> Setujui</button>
                                    <button name="komentar-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-comment-alt button-post"></i> Setujui</button>
                                    <button name="share-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-share-square button-post"></i> Setujui</button>
                                    <button name="setujui-btn" class="lbl-btn setuju-lbl"><i class="align-middle fa fa-chart-line button-post"></i> Setujui</button>
                                </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>