<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inventory Toko</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  

</head>

<body id="page-top">
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
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
        <div class="sidebar-brand-text mx-3">Inventory Toko</div>
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
        <a class="nav-link" href="./userlogin/tables.php">
        <i class="fas fa-users"></i>
          <span>User Login</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="logout.php">
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

        
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             

              <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#orangeModalSubscription" >
                    <span class="icon text-white-50">
                    <i class="far fa-plus-square"></i>
                    </span>
                    <span class="text">Tambah Barang</span>
                  </a>

             

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Nomor</th>
                      <th>Nama</th>
                      <th>Merek</th>
                      <th>Jumlah</th>
                      <th>Tempat</th>
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tfoot>

                    <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                      <th>Merek</th>
                      <th>Jumlah</th>
                      <th>Tempat</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from gudang");
		while($d = mysqli_fetch_array($data)){
			?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['merek']; ?></td>
                      <td><?php echo $d['jumlah']; ?></td>
                      <td><?php echo $d['tempat']; ?></td>
                    
    <td>
   
                  <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-icon btn-sm" >
                    <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>  
                
                  <a href="hapus.php?id=<?php echo $d['id']; ?>"  onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-icon btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                  </a>
                </td>
                     
                    </tr>
                    <?php 
		}
		?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





<!-- konten tambah -->

<div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <form method="post" action="tambah_aksi.php">
      <div class="modal-body">
        <div class="md-form ">
        <label data-error="wrong" data-success="right" for="form3">Nama Barang</label>
          <input type="text" id="form3" class="form-control validate" name="name">
         
        </div>

        <div class="md-form ">
        <label data-error="wrong" data-success="right" for="form3">Merek</label>
          <input type="text" id="form3" class="form-control validate" name="merek">
         
        </div>
        <div class="md-form ">
        <label data-error="wrong" data-success="right" for="form3">Jumlah</label>
          <input type="text" id="form3" class="form-control validate" name="jumlah">
         
        </div>
       
        <div class="md-form ">
        <label data-error="wrong" data-success="right" for="form3">Tempat</label>
          <Select type="text" id="form3" class="form-control validate" name="tempat" >
          <option value="Gudang A">Gudang A</option>
<option value="Gudang B">Gudang B</option>
<option value="Gudang C">Gudang C</option>
         </Select>
        </div>


        


        
      </div>
      
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <input type="submit" class="btn btn-outline-warning waves-effect" value="simpan">
      </div>
    </div>
    	</form>
    <!--/.Content-->
  </div>
</div>





















      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Inventory Toko 2021</span>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
