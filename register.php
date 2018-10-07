<?php 
require 'header.php';
require 'navbar.php';
?>

<section>
    <div class="container ">
        <div class="row">
            <div class="col text-center mt-5 color-brand fs-16-bold ">
                <div><a class="color-brand fs-16-bold" href="">TopiQ</a></div>
                <br>
                <span class="section-heading">Daftar Akun Baru Sekarang!</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 ">
                <form method="POST" action="" aria-label="">
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" value="" placeholder="Nama Lengkap"
                            required autofocus>

                        <small class="color-budayaku"></small>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" value="" placeholder="E-mail"
                            required autofocus>

                    </div>

                    <div class="form-group">

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gender" value="1" id="gMan" class="custom-control-input"
                                {{ (old('gender') == 2) ? 'checked' : '' }} required>
                            <label class="custom-control-label" for="gMan">Laki-Laki</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gender" value="2" id="gWoman" class="custom-control-input"
                                {{ (old('gender') == 2) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="gWoman">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" value=""
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            required autofocus>
                        <small class="color-budayaku"></small>
                    </div>
                    <div class="form-group">
                        <input type="password" id="confirmation-password" name="password_confirmation" class="form-control mb-3"
                            placeholder="Confirm Password" required>
                    </div>

                    <p>Dengan klik daftar, kamu telah menyetujui <strong><a href="#" class="color-brand">Aturan
                                Penggunaan</a></strong>dan <strong><a href="#" class="color-brand">Kebijakan Privasi</a></strong>
                        dari <span class="font-budayaku color-budayaku">Budayaku</span>.</p>

                    <center><button type="submit" class="btn btn-nyeletuk mt-3 mb-5">Daftar</button></center>
                </form>

            </div>
        </div>
    </div>

</section>