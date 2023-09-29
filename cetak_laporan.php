<?php
	include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

    
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Pembayaran-SPP.xls");

?>
<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN</title>

</head>
<body>


		<!-- Main Content -->
    <div class="main-content" style="background-color: #0996e8;">
        <section class="section">
          <div class="section-header">
            <h1>LAPORAN</h1>
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card" style="padding: 10px 20px;">
                  <div class="card-header">
                    <h4 style="color: #0996e8;font-size: 28px;">Laporan Pembayaran</h4>
                    <div class="card-header-form">
                      </div>
                    </div>
                    
                    <table class="table table-striped">
                      <thead> 
                  <tr class="text-center">
                    <!-- <th scope="col">Id Pembayaran</th> -->

               <th scope="col"> NISN</th>
               <th scope="col"> Nama Siswa</th>
                <th scope="col">Tgl Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">Saldo</th>
                <th scope="col">Total bayar</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran,spp,siswa WHERE pembayaran.id_spp=spp.id_spp AND pembayaran.nisn=siswa.nisn ORDER BY bulan_dibayar ASC");
                

                  while ($data=mysqli_fetch_array($query)) {
                    echo" <tr class='text-center'>
                          <td>$data[nisn]</td>
                          <td>$data[nama]</td>
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
                
    
        
        </div>
</body>
</html>