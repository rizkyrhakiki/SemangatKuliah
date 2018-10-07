<?php require 'header.php';
session_start();?>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand color-brand" href="index.php">
               <strong>TopiQ</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li>
                            <div class="collapse navbar-collapse" id="">
                                <form class="form-group has-search my-2 my-lg-0 ml-auto">

                                <input class="form-control search-bar" type="search" placeholder="Cari Masalah..."
                                        aria-label="Search">
                                    <span class="fa fa-search form-control-feedback"></span>

                                </form>

                        </li>
                        <?php if(!isset($_SESSION['nama'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="">
                              <strong>LOGIN</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" data-toggle="modal" data-target="#registerModal"><strong>REGISTER</strong></a>
                        </li>
                        <?php } 
                        else { ?>
                            <li class="nav-item">
                                <strong><?php echo $_SESSION['nama']; ?></strong>
                            </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Silahkan Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php

              // Login
                if (isset($_POST['login']) && !empty($_POST['email'])
                   && !empty($_POST['pass'])) {

                   // if ($_POST['email'] == 'rizqi' &&
                   //    $_POST['pass'] == 'rizqi') {
                   //    $_SESSION['valid'] = true;
                   //    $_SESSION['timeout'] = time();
                   //    $_SESSION['email'] = 'rizqi';
                   //
                   //    echo 'Berhasil Login';
                   // }else {
                   //    echo 'Salah Email / Password';
                   // }
                   $username = $_POST['email'];
                   $password = $_POST['pass'];
                   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_URL, "http://patrakomala.disbudpar.bandung.go.id:8080/api/v1/public/client/login?username=%22".$username."%22&password=%22".$password."%22");
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                   curl_setopt($ch, CURLOPT_HEADER, FALSE);

                   curl_setopt($ch, CURLOPT_POST, TRUE);

                   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                     "Content-Type: Application/Json",
                     "access-key: a4102aa0f9267fea9ad3b763474e66"
                   ));

                   $response = curl_exec($ch);
                   curl_close($ch);
                //    echo var_dump($response);
                   // echo "<pre>$response</pre>";
                   $ambilData = json_decode($response, TRUE);

                   $_SESSION['nama'] = $ambilData['data']['user']['first_name'];

                   if ($ambilData['message'] == 'success') {
                     echo "Sukses <br>";
                     echo " Selamat Datang ".$ambilData['data']['user']['first_name'];
                     $_SESSION["FirstName"]=$ambilData['data']['user']['first_name']; 
                    // header('Location: homepage.php');

                   }else {
                     echo "Gagal";
                   }
                }

              ?>

                <div class="color-brand text-center mb-4 fs-16-bold">Nyeletuk</div>
                <form method="POST" id="input-login" action="" aria-label=""
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                        ?>"
                method="post"
                >
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control"
                        placeholder="Email/Username" value=""
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" class="form-control"
                        placeholder="Password" required>
                    </div>
                    <a class="color-brand" href="#"><small>Lupa Password?</small></a>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-nyeletuk" name="login">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <a class="color-brand" href="register.php"><small>Belum punya akun?</small></a>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="loginModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Silahkan Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            // register
              if (isset($_POST['register'])) {
                     $ch = curl_init();
                     $firstname = $_POST['nama_depan'] ;
                     $lastname = $_POST['nama_belakang'];
                     $email = $_POST['email'];
                     $password = $_POST['password'];
                     curl_setopt($ch, CURLOPT_URL,
                                 "http://patrakomala.disbudpar.bandung.go.id:8080/api/v1/public/client/register?client_first_name=%22".$firstname."%22&client_last_name=".$lastname."&client_email=%22".$email."%22&client_password=%22".$password."%22&client_password_confirmation=%22".$password."%22&company_name=%22patrakomala%22");
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                     curl_setopt($ch, CURLOPT_HEADER, FALSE);

                     curl_setopt($ch, CURLOPT_POST, TRUE);


                     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       "Content-Type: Application/Json",
                       "access-key: a4102aa0f9267fea9ad3b763474e66"
                     ));

                     $response = curl_exec($ch);
                     curl_close($ch);

                     $ambilData = json_decode($response, TRUE);

                     if ($ambilData['message'] == 'Created') {
                       echo "Berhasil <br> Dibuat";
                     }else {
                       echo "Gagal";
                     }
                }


             ?>
            <div class="modal-body">
                <div class="color-brand text-center mb-4 fs-16-bold">Nyeletuk</div>
                <form method="POST" id="input-register" action="" aria-label=""
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                        ?>"
                >

                  <div class="form-group">
                      <input type="text" id="nama_depan" name="nama_depan" class="form-control"
                      placeholder="Nama Depan" value=""
                          required autofocus>
                  </div>

                  <div class="form-group">
                      <input type="text" id="nama_belakang" name="nama_belakang" class="form-control"
                      placeholder="Nama Belakang" value=""
                          required autofocus>
                  </div>

                  <div class="form-group">
                      <input type="text" id="email" name="email" class="form-control"
                      placeholder="Email" value=""
                          required autofocus>
                  </div>

                  <div class="form-group">
                      <input type="password" id="password" name="password" class="form-control"
                      placeholder="Password" value=""
                          required autofocus>
                  </div>

                  <div class="form-group">
                      <input type="password" id="ulangPassword" name="ulangPassword" class="form-control"
                      placeholder="Ketik Ulang Password" value=""
                          required autofocus>
                  </div>

                  <div class="form-group">
                      <input type="number" id="no_hp" name="no_hp" class="form-control"
                      placeholder="No. HP" value=""
                          required autofocus>
                  </div>


                    <a class="color-brand" href="#"><small>Lupa Password?</small></a>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-nyeletuk" name="register">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <a class="color-brand" href="login.php" ><small>Sudah punya akun?</small></a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Register -->

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
</body>
