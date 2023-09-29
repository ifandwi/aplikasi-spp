<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
  
  </head>
<body>

	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
  <!-- Main Content -->
      <div class="main-content" style="background-color: #0996e8;">
        <section class="section">
          <div class="section-header">
            <h1>DATA SISWA KESELURUHAN</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">Data Siswa</div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 style="color: black;">LIST SISWA</h4>
                    <div class="card-header-form">
                    
                    </div>
                  </div>
                  <div class="card-body p-0 ">
                  <div class="col-md-12">
                    <div class="table-responsive ">
                      <table class="table table-striped ">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>NISN</th>
                          <th>NAMA</th>
                          <th>KELAS</th>
                          <th>TAHUN</th>
                          <th>SUDAH DIBAYAR</th>
                          <th>SISA BAYAR</th>
                           <th>STATUS</th>   
                           <th>HISTORY</th>   
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nama_kelas ASC";
                        $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              foreach($result as $data)
                              {
                                $data_pembayaran = mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                                $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                                $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                                $kekurangan =  $data['nominal']-$data_pembayaran['jumlah_bayar'];
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nisn']; ?></td>
                            <td><?php echo $data['nama']; ?></td>  
                            <td><?php echo $data['nama_kelas']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
                              <td><?= number_format($sudah_bayar,2,',','.');?></td>
                              <td><?= number_format($kekurangan,2,',','.');?></td>
                          <!-- <td>
                          <a href="transaksi.php?id=<?php echo $row['nisn']; ?>"class="btn" style="background-color: #0996e8;"><i class="fas fa-edit"></i></a></td>
                          <td> -->
                          <td>
                    <?php 
                    if($kekurangan == 0) {
                        echo "<span class='badge text-bg-success'>Sudah Lunas</span>";
                    }else {?>
                        <a href="transaksi.php?nisn=<?= $data['nisn']?>&kekurangan=<?= $kekurangan?>" class="btn btn-info">BAYAR</a>
                    <?php }?>
                </td>
                <td>
                    <a 
                        href="history.php?nisn=<?= $data['nisn']?>" 
                        class="btn btn-secondary text-dark" >HISTORY
                    </a>
                </td>
                        </tr>
                         <?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </section>
      </div>
</body>
</html>