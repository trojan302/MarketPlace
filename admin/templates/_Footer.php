<script src="<?= __SHOP__ ?>admin/libs/js/jquery.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/bootstrap.min.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/jquery.dataTables.min.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/raphael-min.js"></script>
<!-- <script src="<?= __SHOP__ ?>admin/libs/js/jquery-1.8.2.min.js"></script> -->
<script src="<?= __SHOP__ ?>admin/libs/js/morris-0.4.1.min.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/bootstrap-toggle.min.js"></script>

<script>
	$(document).ready(function(){

		$("#table_order").on('change', '#update_process', function(event) {
			event.preventDefault();

			var idOrder = $(this).attr('data-update');

			$.get('update_status.php?idOrder='+$(this).attr('data-update'), function(data) {
				console.log('Data ' + data + ' Successfully updated!');
			});
			
			return false;

		});

		$("#table_payment").on('change', '#update_payment', function(event) {
			event.preventDefault();

			var idStruk = $(this).attr('data-payments');

			$.get('payment_update.php?id_struk='+$(this).attr('data-payments'), function(data) {
				console.log('Data ' + data + ' Successfully updated!');
			});
			
			return false;

		});

		$("#user_confirmations").on('change', '#activated', function(event) {
			event.preventDefault();

			var idStruk = $(this).attr('data-activated');

			$.get('user_activated.php?id_user='+$(this).attr('data-activated'), function(data) {
				console.log('Data ' + data + ' Successfully updated!');
			});
			
			return false;

		});

		$("#table_user").DataTable();
		$("#table_payment").DataTable();
		$("#table_products").DataTable();
		$("#table_categories").DataTable();
		$("#table_order").DataTable();
		$("#user_confirmations").DataTable();

		$(".change-status").on('click',function(event) {
			event.preventDefault();

				$.get('detail_user.php?id_user='+$(this).attr('data-idUser'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});
       
		$("#table_user").on('click', '.edit-data' ,function(event) {
			event.preventDefault();

				$.get('detail_user.php?id_user='+$(this).attr('data-idUser'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$("#table_products").on('click', '.edit-dataProduct' ,function(event) {
			event.preventDefault();
		
				$.get('detail_product.php?id_product='+$(this).attr('data-idProduct'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$("#table_categories").on('click', '.edit-dataCategory' ,function(event) {
			event.preventDefault();

				$.get('detail_category.php?id_cat='+$(this).attr('data-idCategory'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$('[data-toggle=offcanvas]').click(function() {
		    $('.row-offcanvas').toggleClass('active');
		});



		// Morris.Line({
		//   element: 'line-chart',
		//   data: [
		//     { y: '2006', a: 100, b: 90 },
		//     { y: '2007', a: 75,  b: 65 },
		//     { y: '2008', a: 50,  b: 40 },
		//     { y: '2009', a: 75,  b: 65 },
		//     { y: '2010', a: 50,  b: 40 },
		//     { y: '2011', a: 75,  b: 65 },
		//     { y: '2012', a: 100, b: 90 }
		//   ],
		//   xkey: 'y',
		//   ykeys: ['a', 'b'],
		//   labels: ['Transaction A', 'Transaction B']
		// });
		// 

		
		var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];		
		$.ajax({
			url: 'resources/transaction.php',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				
				Morris.Line({
				  element: 'line-chart',
				  data: data,
				  xkey: 'm',
				  ykeys: ['a'],
				  labels: ['Transaction'],
				  xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
				    var month = months[x.getMonth()];
				    return month;
				  },
				  dateFormat: function(x) {
				    var month = months[new Date(x).getMonth()];
				    return month;
				  },
				});

			}
		});

		$.ajax({
			url: 'resources/earning.php',
			type: 'GET',
			dataType: 'json',
			success: function(data){

				Morris.Area({
				  element: 'area-chart',
				  data: data,
				  xkey: 'm',
				  ykeys: ['a', 'b'],
				  labels: ['Gross Income', 'Net Income'],
				   xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
				    var month = months[x.getMonth()];
				    return month;
				  },
				  dateFormat: function(x) {
				    var month = months[new Date(x).getMonth()];
				    return month;
				  },
				});

			}
		});
    });
</script>
</body>
</html>