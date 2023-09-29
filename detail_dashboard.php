<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');

  $getId = $_GET['id'];


?>
 <!-- Main Content -->
      <div class="main-content d-flex justify-content-center" style="background-color: #0996e8;">
        <section class="section text-center mt-5" style="width: 400px;">
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas = $getId");
                  $row = mysqli_fetch_array($query);
                  ?>
                  <div class="card-stats-title mb-5">DATA KELAS <?php echo $row['nama_kelas'];?>
                    <div class="dropdown d-inline">
                      <ul class="dropdown-menu dropdown-menu-sm">
                      </ul>
                    </div>
                  </div>
                   <div class="card">
                    <div class="card">
                      <?php
                        $q = mysqli_query($koneksi,"SELECT COUNT(nama) FROM siswa WHERE id_kelas =$getId GROUP BY nama");
                        $res = mysqli_num_rows($q);
                      ?>
                      <div class="text-center" style="font-size: 24px;font-weight: 800;"><?php echo $res;?></div>
                      <div >Siswa</div>
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
