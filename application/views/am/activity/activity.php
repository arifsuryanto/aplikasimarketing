<br><br><br>

<div class="main-panel">
    <div class="page-inner">
        <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Activity</h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addActivity">
								<i class="fa fa-plus"></i>
								Add Activity 
							</button>
						</div>
					</div>
					<div class="card-body">
						<!-- Modal -->
									<div class="modal fade" id="addActivity" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Add Activity</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form>
																<div class="form-group">
																	<label>Name Activity</label>
																	<input id="name" type="text" class="form-control" placeholder="Fill Name Activity">
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
													<button type="button" id="add" class="btn btn-primary"><a href="">Add</a></button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%" >
											<thead>
												<tr>
													<!-- <th>No</th> -->
													<th>Activity</th>
													<th>Type</th>
													<th>Stage</th>
													<th>Customer Name</th>
													<th>Date</th>
													<th>Noted</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<!-- <th></th> -->
													<th>Activity</th>
													<th>Type</th>
													<th>Stage</th>
													<th>Customer Name</th>
													<th>Date</th>
													<th>Noted</th>
													</tr>
											</tfoot>
											<tbody>
											<?php 
												$time=0;
												$bil=0;
													foreach($activities as $act)
													{
														// $bil=$bil+1;
														// $data="$act->time";
														
														?>
													<tr>
													<!-- <td>?=$bil;?></td> -->
													<td><?=$act->name_activity;?></td>
													<td><?=$act->type; ?></td>
													<td><?=$act->stage;?></td>
													<td><?=$act->nama_customer;?></td>
													<td><?=$act->time;?></td>
													<td><?=$act->note;?></td>	
													<td>
													<a class="btn btn-warning">Edit</a>
													</td>
													</tr>
													<?php } ?>
												
											</tbody>
										</table>
									</div>
									
					</div>
				</div>
            </div>
        </div>
	</div>
</div>
<script src="<?=base_url('/assets/js/plugin/datatables/datatables.min.js')?>"></script>
<script >
		$(document).ready(function() {
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);
							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

		});
	</script>
									