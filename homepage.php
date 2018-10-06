<?php 
require 'header.php';
require 'navbar.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form action="">
                <div class="cardpost">
                    <div class="row">
                        <div class="col-md-1">
                                <img src="img/dp.png" name="dp" width="50px" alt="">
                        </div>
                        <div class="namepost">
                            <div class="ml-5" name="nama">Nama user</div>
                        </div>  
                    </div>
                    <hr>
                        <div>
                            <h6><strong>Pencapaian</strong></h6>
                            <p>28 Permasalahan telah dibagikan </p>
                            <p>7 permasalahanmu telah teratasi</p>
                            <p>72 permasalahan disetujui</p>

                             <h6><strong>History</strong></h6>
                            <p>Coba aja kalo ada laundry sepatu di... </p>
                            <p>7Chilin di deket ITB oenu bgt antri..</p>
                            
                             <h6><strong>Others</strong></h6>
                            <p>Akun bisnis </p>
                            <p>Pengaturan akun</p>
                            <p>Logout</p>
                        </div>
                </div>
                
            </form>
        </div>
        <div class=" col-lg-6">
            <div class="cardpost">
                <div class="row">
                    <div class="col-md-1">
                        <img src="img/dp.png" name="dp" width="50px" alt="">
                    </div>
                    <div class="col-md-11">
                        <div class="statuspost">
                            <div name="status">
                                <textarea class="form-control" name="buatstatus" id="buatstatus" cols="20" rows="3"
                                    placeholder="Masalah apa yang anda alami, Dendy?"></textarea>
                            </div>
                        </div>

                        <hr>
                        <center>
                            <div class="lbl" style="margin:auto">
                                <div class="row ml-3">
                                    <select class="form-dropdown" name="kategory" id="kategory">
                                        <option value="">Makanan</option>
                                    </select>
                                    <input class="form-dropdown ml-2" type="file"></div>

                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </div>
    </div>