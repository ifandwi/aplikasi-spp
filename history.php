<?php
    include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI</title>

</head>
<body>

    <?php

    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');
?>

    <!-- main content -->
    <div class="main-content" style="background-color: #0996e8;">
        <section class="section">
          <div class="section-header">
            <h1>HISTORY</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="history.php">History</a></div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card" style="padding: 10px 20px;">
                  <div class="card-header">
                    <h4 style="color: #0996e8;font-size: 28px;">History Pembayaran</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa,kelas WHERE siswa.id_kelas=kelas.id_kelas AND nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                
                ?>

                <h6 style="margin-left: 27px;font-size: 14px;margin-top: 30px;">DATA SISWA</h6>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nama_kelas']; ?></td>
                  </tbody>
                </table>

                <h6 style="margin-left: 27px;font-size: 14px;margin-top: 30px;">DATA SPP SISWA</h6>
              <table class="table table-striped">
                <thead> 
                  <tr class="text-center">
                    <!-- <th scope="col">Id Pembayaran</th> -->

               <th scope="col"> id petugas</th>
               <th scope="col"> NISN</th>
                <th scope="col">Tgl Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">Saldo</th>
                <th scope="col">Total bayar</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran,spp WHERE pembayaran.id_spp=spp.id_spp AND nisn='$data[nisn]' ORDER BY bulan_dibayar ASC");
                

                  while ($data=mysqli_fetch_array($query)) {
                    echo" <tr class='text-center'>
                          <td>$_SESSION[username]</td>
                          <td>$data[nisn]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[bulan_dibayar]</td>
                          <td>$data[tahun_dibayar]</td>
                          <td>$data[nominal]</td>
                          <td>$data[jumlah_bayar]</td>

                        </tr>";
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    ?>      
        
        </div>
  </body>
</html>