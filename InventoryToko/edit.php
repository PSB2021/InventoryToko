<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gudang Toko Baru</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
        <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gudang Toko Baru </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

  
     

     
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Barang</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="index.html">
        <i class="fas fa-users"></i>
          <span>User Login</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="index.html">
        <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>


      
    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

       <h2 class="center text-gray-800">Data Barang</h2>

        

            
           


        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Content Row -->
          

           

              <!-- Area Chart -->
              <div class="card shadow mb-4" style="margin-right:100px; margin-left:100px;">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                  <?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from gudang where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
                    <form method="post" action="update.php">
                      <div class="modal-body">
                        <div class="md-form ">
                        <label data-error="wrong" data-success="right" for="form3">Nama Barang</label>
                        <input type="hidden" id="form3" class="form-control validate" name="id" value="<?php echo $d['id']; ?>">
                          <input type="text" id="form3" class="form-control validate" name="nama" value="<?php echo $d['nama']; ?>">
                         
                        </div>
                
                        <div class="md-form ">
                        <label data-error="wrong" data-success="right" for="form3">Merek</label>
                          <input type="text" id="form3" class="form-control validate" name="merek" value="<?php echo $d['merek']; ?>">
                         
                        </div>
                        <div class="md-form ">
                        <label data-error="wrong" data-success="right" for="form3">Jumlah</label>
                          <input type="text" id="form3" class="form-control validate" name="jumlah" value="<?php echo $d['jumlah']; ?>">
                         
                        </div>
                       
                        <div class="md-form ">
                        <label data-error="wrong" data-success="right" for="form3">Tempat</label>
                          <Select type="text" id="form3" class="form-control validate" name="tempat"  value="<?php echo $d['tempat']; ?>">
                          <option value="Gudang A">Gudang A</option>
                <option value="Gudang B">Gudang B</option>
                <option value="Gudang C">Gudang C</option>
                         </Select>
                        </div>
                
                
                        
                
                
                        
                      </div>
                      
                      <!--Footer-->
                      
                  </div>
                 
                  <div class="modal-footer justify-content-center">
                      <input type="submit" class="btn btn-outline-warning waves-effect" value="simpan">
                    </div>
                  
                    </form>
                    <?php 
	}
	?>
                </div>
              </div>
            
              <!-- Bar Chart -->
             

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Toko Baru 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
