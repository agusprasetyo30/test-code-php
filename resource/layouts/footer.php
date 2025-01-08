   </div>
      </div>
         <footer id="footer" class="bg-primary">
            <div class="footer-copyright text-center">
               ©Copyright : Agus Prasetyo
            </div>
         </footer>
      </div>
   </body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>

   <script>
		var toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timerProgressBar: true,
			timer: 3000
		});
	</script>
   <?php
      // untuk javascript yg ditampilkan sesuai menu
      // if ($menu == null) {
      //    echo '<script src="../../dist/js/dashboard/index.js"></script>';
      // } else if ($menu == 'bio') {
      //    echo '<script src="../../dist/js/biodata/index.js"></script>';
      // } else if ($menu == 'profil') {
      //    echo '<script src="../../dist/js/profil/index.js"></script>';
      // } else if ($menu == 'daftar-pesan') {
      //    echo '<script src="../../dist/js/daftar-pesan/index.js"></script>';
      // }
   ?>
</html>
