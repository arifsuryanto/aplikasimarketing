
<!-- Bar Chart -->

<div class="container">
  <div class="row justify-content-md-center">

  <div class="col col-lg-3"></div>
    <div class="col col-lg-9">
      <div class="card shadow mb-4 marginChart ratios " style="margin-top:90px;">
        <div class="card-header py-3 bg-gradient-primary">
          <h6 class="m-0 font-weight-bold text-white "> Chart Customer </h6>
            <div class="d-flex align-items-center">
							<h4 class="card-title">Customer</h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addPlan">
								<i class="fa fa-plus"></i>
								Add Customer 
							</button>
						</div>

        </div>
        <div class="card-body ">
          <!-- Modal -->
									<div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Add Customer</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="">
																<div class="form-group">
																	<label>Name Activity</label>
																	<input name="name_activity" id="name_activity" type="text" class="form-control" placeholder="Fill Name Activity">
																</div>

																<div class="form-group ui-front">
																	<label>Type</label>
																	<input id="type" name="type" type="text" class="form-control" placeholder="Fill Type">
																
																<!-- Autocomplete type -->
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
																<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
																<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
																<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
																
																<script type="text/javascript">
															
																	$(document).ready(function(){

																	$('#type').autocomplete({
																			source: "<?php echo base_url('activity_am/autocomplete_type');?>",
																			
																		});
																	
																});
																</script>
																<!--  END Autocomplete type -->
																</div>

																<div class="form-group ui-front">
																	<label>Customer</label>
																	<input id="customer" name="customer" type="text" class="form-control" placeholder="Fill Customer">
																
																<!-- Autocomplete customer -->
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
																<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
																<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
																<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
																
																<script type="text/javascript">
										
																	$(document).ready(function(){

																	$('#customer').autocomplete({
																			source: "<?php echo base_url('activity_am/get_autocomplete');?>",
																		});
																});
																</script>
																<!--  END Autocomplete customer -->
																<button class="btn btn-warning">Add Customer</button>
																</div>

																<div class="form-group ui-front">
																	<label>Stage</label>
																	<input id="stage" name="stage" type="text" class="form-control" placeholder="Fill Stage">
																
																<!-- Autocomplete stage -->
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
																<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
																<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
																<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
																
																<script type="text/javascript">
										
																	$(document).ready(function(){

																	$('#stage').autocomplete({
																			source: "<?php echo base_url('activity_am/autocomplete_stage');?>",
																		});
																});
																</script>
																<!--  END Autocomplete stage -->
																</div>

																<div class="form-group">
																	<label>Noted</label>
																	<textarea name="note" id="note" class="form-control"></textarea>
																</div>
															
														
													</form>
													


												</div>
												<div class="modal-footer no-bd">
													<input type="submit" id="addPlan" name="addPlan" class="btn btn-primary" value="Add">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
              <div class="row">
            <div class="col-12">
              <canvas id="myBarChart" height=500></canvas>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Page level plugins -->
  <script src="<?= base_url ('assets')?>/js/plugin/chart.js/chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script>
 $(document).ready(function(){
    var dataNama =[];
  var dataJumlah = [];
  var myBarChart = document.getElementById('myBarChart').getContext('2d');
 

  var settings = {
      "url": "getCust",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var obj = JSON.parse(response);
    
   
    $.each(obj, function(i,c){
      dataNama.push(c.nama_customer);
      dataJumlah.push(c.n);
    }); 
  });
  console.log(dataNama);
  console.log(dataJumlah);
  var myBarChart = new Chart(myBarChart, {
	type: 'horizontalBar',
	data: {
		labels:dataNama,
		datasets : [{
			data:dataJumlah,label: "Customers",
			backgroundColor: 'rgb(23, 125, 255)',
			borderColor: 'rgb(23, 125, 255)',
			
		}],
	},
      options:{
        responsive: true,
        maintainAspectRatio: false,
        title:{
          display:true,
          text:'Chart Customer',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        scales:{
          xAxes: [{
            ticks: {
              min: 0,
            }
        }
      ]},
        layout:{
          padding:{
            left: 10,
            right: 25,
            top: 10,
            bottom: 0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  }); 

  </script>

