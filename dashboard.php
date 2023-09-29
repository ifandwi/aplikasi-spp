<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');

  $sql_jml = mysqli_query($koneksi,"SELECT COUNT(nama) FROM siswa AS jumlah GROUP BY nama");
  $query_jml = mysqli_num_rows($sql_jml);

  $sql_lunas = mysqli_query($koneksi,"SELECT COUNT(nisn) FROM pembayaran AS lunas GROUP BY nisn");
  $query_lunas = mysqli_num_rows($sql_lunas);
?>
 <!-- Main Content -->
      <div class="main-content d-flex justify-content-center" style="background-color: #0996e8;">
        <section class="section text-center mt-5" style="width: 400px;">
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title mb-5">JUMLAH SISWA KESELURUHAN
                    <div class="dropdown d-inline">
                      <ul class="dropdown-menu dropdown-menu-sm">
                      </ul>
                    </div>
                  </div>
                  <div class="card" >
                    <div class="card">
                      <div class="text-center" style="font-size: 24px;font-weight: 800;"><?php echo $query_jml;?></div>
                      <div class="">Siswa</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-info mt-5" style="background-color: #0996e8;">
                  <a href="data_kelas.php"><i class="fas fa-users"></i></a>
                  
                
        </section>
      </div>
    </div>
  </div>
</body>
