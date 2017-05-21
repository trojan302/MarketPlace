	<div class="container-fluid" style="background-color: #222;color:#e3e3e3;padding:10px 50px;margin-bottom: 0px;">
  
	  <div class="row-fluid">
	    
	    <div class="col-md-4">
	      <h2>E - Market</h2>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae eos vero, repellendus voluptatem. Neque accusamus ipsa, pariatur dolore laudantium, labore praesentium quia, reprehenderit iusto obcaecati temporibus. In minus, perspiciatis ut.</p>
	    </div>

	    <div class="col-md-8">
	      
	      <div class="row-fluid text-center">
	      	<div class="col-md-6">
	      	<h2>Courier</h2>
	      		<img src="<?= __SHOP__ ?>assets/images/pengiriman.png" alt="Logo Courier" class="img-responsive" style="margin: auto;">
	      	</div>
	      	<div class="col-md-6">
	      	<h2>Bank</h2>
	      		<img src="<?= __SHOP__ ?>assets/images/logo-bank.png" alt="Logo Courier" class="img-responsive" style="margin: auto;">
	      	</div>
	      </div>

	    </div>

	  </div>

	</div>

	<script src="<?= __SHOP__ ?>assets/js/jquery.js"></script>
	<script src="<?= __SHOP__ ?>assets/js/tabcordion.js"></script>
    <script src="<?= __SHOP__ ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/html2canvas.js"></script>
    <script src="<?= __SHOP__ ?>admin/libs/js/jquery.dataTables.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
    
    $(document).on('click', '.edit-dataProduct' ,function(event) {
		event.preventDefault();

		console.log('Click Firing');

		$.get('detail_product.php?id_product='+$(this).attr('data-idProduct'), function(data) {
			 $(".modal-edit").html(data);
		});
		
		$("#modalEdit").modal('show');

	});

	$('.tabcordion').tabcordion();

    $(document).ready(function() {

    	$(".jumbotron").backstretch([
		    "assets/images/slides/slide1.jpg",   
		    "assets/images/slides/slide2.jpg",   
		    "assets/images/slides/slide3.jpg",   
		    "assets/images/slides/slide4.jpg"
		], {duration: 4000, fade: 2000});

		  $('#quote-carousel').carousel({
		    pause: true,
		    interval: 4000,
		  });

    		$("#table_order_user").DataTable();
    		$("#table_all_order").DataTable();	

    		$(".nav a").on("click", function(){
			   $(".nav").find(".active").removeClass("active");
			   $(this).parent().addClass("active");
			});

			setTimeout(function(){
				$('#alert_struk').hide();
			}, 3000);

		  	if(window.location.href.indexOf('#item_exists') != -1) {

			    $('#item_exists').modal('show').on('shown', function () {
			    	window.setTimeout(function () {
			        	$("#item_exists").modal("hide");
			    	}, 2000);
			    });

			}


			if(window.location.href.indexOf('#alert-messages') != -1) {

			    $('#alert-messages').modal('show').on('shown', function () {
			    	window.setTimeout(function () {
			        	$("#alert-messages").modal("hide");
			    	}, 2000);
			    });

			}


			$("#table_order_user").on('click', '#delete_order_user', function(event) {
				event.preventDefault();

				$.get('http://localhost/market/actions/delete_order_user.php?deleteOrder='+$(this).attr('data-user-order'), function(data) {
					console.log('Data ' + data + ' Successfully deleted!');
				});
				
				return false;

			});

			$("#table_categories").on('click', '.edit-dataCategory' ,function(event) {
				event.preventDefault();

					$.get('detail_category.php?id_cat='+$(this).attr('data-idCategory'), function(data) {
						 $(".modal-body").html(data);
					});
					
					$("#modalEdit").modal('show');

			});


			var element = $("#html-content-holder"); // global variable
			var getCanvas; // global variable
			 
	            $("#btn-Preview-Image").on('click', function () {
			         html2canvas(element, {
			         onrendered: function (canvas) {
			                $("#previewImage").append(canvas);
			                getCanvas = canvas;
			             }
			         });
			    });

				$("#btn-Convert-Html2Image").on('click', function () {
			    var imgageData = getCanvas.toDataURL("image/png");
			    // Now browser starts downloading it instead of just showing it
			    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
			    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
			    
				});
    	});

		</script>
  </body>
</html>