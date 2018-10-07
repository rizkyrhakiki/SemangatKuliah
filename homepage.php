<?php 
require 'header.php';
require 'navbar.php';
require_once ("assets/conn.php");
$user = $_SESSION['nama'];
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form action="">
                <div class="cardpost">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="img/image.png" name="dp" width="50px" alt="">
                        </div>
                        <div class="namepost">
                            <div class="ml-5" name="nama" style="margin-top:6px;">
                                <?php echo $user; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h6><strong>Pencapaian</strong></h6>
                        <p>28 Permasalahan telah dibagikan
                            <br>7 permasalahanmu telah teratasi
                            <br>72 permasalahan disetujui</p>

                        <h6><strong>History</strong></h6>
                        <p>Coba aja kalo ada laundry sepatu di...
                            <br>7Chilin di deket ITB oenu bgt antri..</p>

                        <h6><strong>Others</strong></h6>
                        <p><a href="#">Akun Bisnis</a>
                            <br><a href="#">Pengaturan Akun</a>
                            <br><a href="assets/process_logout.php">Logout</a> </p>
                    </div>
                </div>

            </form>
        </div>
        <div class=" col-lg-7">
            <div class="cardpost">
                <div class="row">
                    <div class="col-md-1">
                        <img src="img/image.png" name="dp" width="50px" alt="">
                    </div>
                    <div class="col-md-11">
                        <form action="assets/post_process.php" method="POST">
                            <div class="statuspost">
                                <div name="status">
                                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                                    <textarea class="form-control" name="text" id="buatstatus" cols="20" rows="3"
                                        placeholder="Masalah apa yang anda alami, <?php echo $user; ?>?"></textarea>
                                </div>
                            </div>

                            <hr>
                            <center>
                                <div class="lbl" style="margin:auto">
                                    <div class="row">
                                        <select class="form-dropdown" name="category" id="category">
                                            <option value="Makanan">Makanan</option>
                                            <option value="Penyedia Jasa">Penyedia Jasa</option>
                                        </select>
                                        <input type="submit" class="btn btn-danger btn-sm" value="Kirim" style="margin-left:26em;">
                                    </div>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>

            </div>

            <?php 
    $query = mysqli_query($con,"SELECT * FROM posts ORDER BY time DESC");
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
        $post_id = $row["post_id"];
        $jumlahvote = mysqli_num_rows(mysqli_query($con,"SELECT * FROM stats WHERE post_id = $post_id AND type='vote'"));
        $jumlahkomentar = mysqli_num_rows(mysqli_query($con, "SELECT * FROM comments WHERE post_id = $post_id"));
        $jumlahshare = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE post_id = $post_id AND type='bagikan'"));
        $jumlahdilihat = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE post_id = $post_id AND type='dilihat'"));
        $checkvote = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE type='vote' AND user = '$user' AND post_id = $post_id"));
        ?>


            <!-- action="" method="_POST" -->
            <div style="padding-top:5px;margin:auto;width:635px;">
                <?php 
                if($row["status"] == 1){
                    ?>
                <div class="terselesaikan">
                    <img src="img/tick.png" width="18px" alt="">
                    Terselesaikan
                </div>
                <?php
                }
                ?>
                <div class="cardpost bg-white">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="img/image.png" name="dp" width="50px" alt="">
                        </div>
                        <div class="col-md-11">
                            <div class="namepost">
                                <div name="nama">
                                    <?php echo $row["user"]; ?>
                                </div>
                            </div>
                            <div class="statuspost">
                                <div name="status">
                                    <?php echo $row["text"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 setujuiket" style="text-align:left">
                                    <div name="setuju">
                                        <?php echo $jumlahvote; ?> Orang mengalami masalah ini</div>
                                </div>
                                <span class="text-right col-md-6 komentarket" style="float:right">
                                    <span name="komentar" class="ml-1">
                                        <?php echo $jumlahkomentar; ?> Komentar</span>
                                    <span name="share" class="ml-1">
                                        <?php echo $jumlahshare; ?> kali dibagikan</span>
                                    <span name="lihat" class="ml-1">
                                        <?php echo $jumlahdilihat; ?> </span>
                                    <span class=""><i class="ml-1 fa fa-eye"></i></span>
                                </span>
                            </div>
                            <hr>
                            <center>
                                <div class="lbl" style="margin:auto">
                                    <?php 
                                        if($checkvote>0){
                                            ?>
                                    <button name="setuju-btn" class="lbl-btn setuju-lbl" disabled style="color:blue;"><i
                                            class="align-middle fa fa-thumbs-up button-post" style="color:blue;"></i>
                                        Setujui</button>
                                    <?php   
                                        }else{
                                            ?>
                                    <form action="assets/vote_post.php" method="POST" class="form" style="display:inline;">
                                        <input type="hidden" name="user" value="<?php echo $user; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                        <button name="setuju-btn" class="lbl-btn setuju-lbl" type="submit"><i class="align-middle far fa-thumbs-up button-post"></i>
                                            Setujui</button>
                                    </form>
                                    <?php
                                        }
                                        ?>
                                    <button name="komentar-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-comment-alt button-post"></i>
                                        Komentar</button>
                                    <button name="share-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-share-square button-post"></i>
                                        Bagikan</button>
                                    <button name="setujui-btn" class="lbl-btn setuju-lbl" data-toggle="modal"
                                        data-target="#modalDetail<?php echo $row["post_id"]; ?>"><i class="align-middle fa fa-chart-line button-post"></i>
                                        Detail</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
<div class="modal fade" id="modalDetail<?php echo $row["post_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="namepost">
                    <div class="row">
                    <div name="nama col-sm-10 " style="margin-left:15px;">
                        <strong><img src="img/image.png" name="dp" width="50px" alt=""> <?php echo $row["user"];?></strong> <i class="pull-right"><?php echo substr($row["time"],0,10);?></i>
                    </div>
                    </div>
                </div>
                <div class="statuspost">
                    <div name="status">
                        <p> <?php echo $row["text"] ?></p>
                    </div>
                </div>
                <div class="font-biru">
                    <a href="#">Jl. Haji salim nomor 1 blok C3</a>
                </div>
                <hr class="border-hr">
                <div>
                    <strong>Orang yang mengalami masalah yang sama 0</strong> 
                </div>
                <div>
                    <p><br>Rata-rata orang yang mengalami/hari : 7
                    <br>Orang yang mengalami diwaktu yang sama : 250
                    <br>Orang yang mengalami ditempat yang sama : 192
                    <br>
                    Share link : 21
                    <br>Orang yang membuka dari Shared Link : 48
                    <br>
                    <br>Pelaku bisnis yang tertaik melihat detail : 15</p>
                    <hr>
                    <img src="img/data.png" alt="" width=100%>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
            <?php
    }
    ?>
        </div>

    </div>
</div>



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
<footer style="background-color: #FF4343; padding: 10px; color:white; margin-top: 20px; ">
    <div class="container">
        <h5>&copy;2018 TopiQ.com</h5>
    </div>
</footer>