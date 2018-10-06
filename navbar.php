<?php require 'header.php' ?>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand color-brand" href="index.php">
               <strong>NYELETUK</strong> 
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#loginModal" href=""><strong>LOGIN</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><strong>REGISTER</strong></a>
                        </li>
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
                <div class="color-brand text-center mb-4 fs-16-bold">Nyeletuk</div>
                <form method="POST" id="input-login" action="" aria-label="">
                    <div class="form-group">
                        <input type="text" id="username" name="email" class="form-control" placeholder="Email/Username" value=""
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <a class="color-brand" href="#"><small>Lupa Password?</small></a>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-nyeletuk">Login</button>
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