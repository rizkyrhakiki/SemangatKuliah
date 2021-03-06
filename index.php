<?php
require 'header.php';
require 'navbar.php';
require_once("assets/conn.php"); 
$user = "faathir";
?>
<div>
    <div class="mt-5 center-content">
        <h1>Bersama Kita Atasi Masalah</h1>
        <h3>Ceritakan masalahmu dan tunggu para pelaku<br>bisnis mewujudkan impianmu </h3>
        <?php if(isset($_SESSION['nama'])) { ?>
        <a class="btn btn-nyeletuk mt-3 mb-5" style="padding-top:10px;" href="homepage.php"><h5>Ceritakan Sekarang!</h5></a>
        <?php } else { ?>
        <a class="btn btn-nyeletuk mt-3 mb-5" style="padding-top:10px;" data-toggle="modal" data-target="#loginModal" href=""><h5>Ceritakan Sekarang!</h5></a>
        <?php } ?>
    </div>
    
    <div class="bg-white mt-5 center-content" style="padding-bottom:30px;">
    <?php 
    $query = mysqli_query($con,"SELECT * FROM posts ORDER BY time DESC LIMIT 3");
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
        $post_id = $row["post_id"];
        $jumlahvote = mysqli_num_rows(mysqli_query($con,"SELECT * FROM stats WHERE post_id = $post_id AND type='vote'"));
        $jumlahkomentar = mysqli_num_rows(mysqli_query($con, "SELECT * FROM comments WHERE post_id = $post_id"));
        $jumlahshare = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE post_id = $post_id AND type='bagikan'"));
        $jumlahdilihat = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE post_id = $post_id AND type='dilihat'"));
        $checkvote = mysqli_num_rows(mysqli_query($con, "SELECT * FROM stats WHERE type='vote' AND user = '$user' AND post_id = $post_id"));
        ?>
            
        
                <!-- action="" method="_POST" -->
            <div style="padding-top:1px;margin:auto;margin-top:10px;width:600px;">
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
                <div class="cardpost">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="img/image.png" name="dp" width="50px" alt="">
                        </div>
                        <div class="col-md-11">
                            <div class="namepost">
                                <div name="nama"><?php echo $row["user"]; ?></div>
                            </div>
                            <div class="statuspost">
                                <div name="status"><?php echo $row["text"]; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 setujuiket" style="text-align:left">
                                    <div name="setuju"><?php echo $jumlahvote; ?> Orang mengalami masalah ini</div>
                                </div>
                                <span class="text-right col-md-6 komentarket" style="float:right">
                                    <span name="komentar" class="ml-1"><?php echo $jumlahkomentar; ?> Komentar</span>
                                    <span name="share" class="ml-1"><?php echo $jumlahshare; ?> kali dibagikan</span>
                                    <span name="lihat" class="ml-1"><?php echo $jumlahdilihat; ?> </span>
                                    <span class=""><i class="ml-1 fa fa-eye"></i></span>                         
                                </span>
                            </div>
                            <hr>
                            <center>
                                    <div class="lbl" style="margin:auto">
                                        <?php 
                                        if($checkvote>0){
                                            ?> <button name="setuju-btn" class="lbl-btn setuju-lbl" style="color:#4366d8;" disabled><i class="align-middle fa fa-thumbs-up button-post" style="color:#4366d8;"></i> Setujui</button> <?php   
                                        }else{
                                            ?>  
                                                <form action="assets/vote_post.php" method="POST" class="form" style="display:inline;">
                                                    <input type="hidden"  name="user" value="<?php echo $user; ?>">
                                                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                                    <button name="setuju-btn" class="lbl-btn setuju-lbl" type="submit"><i class="align-middle far fa-thumbs-up button-post"></i> Setujui</button>
                                                </form>
                                            <?php
                                        }
                                        ?>
                                        <button name="komentar-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-comment-alt button-post"></i> Komentar</button>
                                        <button name="share-btn" class="lbl-btn setuju-lbl"><i class="align-middle far fa-share-square button-post"></i> Bagikan</button>
                                        <button name="setujui-btn" class="lbl-btn setuju-lbl"><i class="align-middle fa fa-chart-line button-post"></i> Detail</button>
                                    </div>
                            </center>
                        </div>
                    </div>
                </div>
            
            </div> 
        <?php
            }
        ?>
        <br>
        <?php if(isset($_SESSION['nama'])) { ?>
            <center><a href="homepage.php" style="font-size:18px;color:">Lihat lebih banyak masalah..</a></center>
        <?php } else { ?>
            <center><a data-toggle="modal" data-target="#loginModal"href="" style="font-size:18px;color:grey">Lihat lebih banyak masalah..</a></center>
        <?php } ?>

    </div>
    


    <section style="background-color: rgb(167, 167, 167); padding-top: 20px; padding: 50px;">
        <div class="container text-center">
            <h1 style="color: gray;"><strong>BERAWAL DARI MASALAH</strong></h1>
            <p style="color:white; font-size: 20px;font-weight: bold;">Masalah menjadi hal yang selalu dihindari oleh sebagian orang, namun dibalik itu tanpa adanya masalah seluruh bisnis yang sudah ada sekarang tidak akan berjalan karena tidak adanya customer. Tanpa adanya masalah setiap orang akan dapat melakukan segalanya secara mandiri. Dapat disimpulkan bahwa masalah juga dapat memberikan peluang bisnis untuk orang-orang yang bisa menangkap momen dan mau mencari solusi atas permasalahan itu. Karna akan ada orang yang rela mengeluarkan uangnya demi sebuah solusi.</p>
        </div>
    </section>
    <footer style="background-color: #FF4343; padding: 20px; color:white;">
        <div class="container"></div>
            <h5>&copy;2018 topiq.com</h5>
        </div>
    </footer>
</div>
