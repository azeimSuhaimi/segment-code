        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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
        <div class="modal-body">Select "Logout" below if you are ready to logout.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('asset/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('asset/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('asset/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('asset/');?>js/sb-admin-2.min.js"></script>

  

</body>

</html>

<script>
$(document).ready(function(){

	$('#print').click(function(){ //this button
		window.print();
    });//end click

	$("#myInput").on("keyup", function() 
        {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() 
            {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });//end filter

        });//END KEYUP
		

    $('#show_password').click(function(){ //this button
		var passfield = $('#password'); //this is attribute
        
		
		if(passfield.attr('type') == "password")
		{
			passfield.attr('type','text');
            
			//$(this).text('hide password');
            $(this).html("     <span class=\"glyphicon glyphicon glyphicon-eye-close\"></span>");
		}
		else
		{
			passfield.attr('type','password');
            
			//$(this).text('show password');
            $(this).html("     <span class=\"glyphicon glyphicon glyphicon-eye-open\"></span>");
		}
	});//end click show password



	$('.delete').click(function(e){

		e.preventDefault();

		const href = $(this).attr('href');

		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
		}).then((result) => {
		if (result.isConfirmed) {
			
			document.location.href= href;
			
		}
		});
	});

});//end function ready
</script>