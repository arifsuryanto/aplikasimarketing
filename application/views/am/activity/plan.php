<br><br><br>
<div class="main-panel">
    <div class="page-inner">
        <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Plan</h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addPlan">
								<i class="fa fa-plus"></i>
								Add Plan 
							</button>
						</div>
					</div>
					<div class="card-body">
						<!-- Modal -->
									<div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Add Plan</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form  action="<?=base_url('activity_am/addCust')?>" method="post">
																<div class="form-group">
																	<label>Name Activity</label>
																	<input name="name_activity" id="name_activity" type="text" class="form-control" placeholder="Fill Name Activity">
																</div>

																<div class="form-group">
																	<label>Type</label>
																															
																	<select  id="type" name="type" class="form-control">
																		<option value="1">Call</option>
																		<option value="2">Administration</option>
																		<option value="3">Email/Fax</option>
																		<option value="4">Customer Meeting</option>
																		<option value="5">Visitation</option>
																		<option value="6">Product Presentation</option>
																	</select>
																</div>

																<div class="form-group ui-front">
																	<label>Customer</label>
																	<input id="customer" name="customer" type="text" class="form-control" placeholder="Fill Customer">
																	<input id="id" name="id_customer" type="hidden" class="form-control" placeholder="Fill Customer">
																
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
																			select: function (event, ui) {
																			$('[name="customer"]').val(ui.item.customer); 
																			$('[name="id_customer"]').val(ui.item.id); 
																			  }
																		});
																});
																</script>
																<!--  END Autocomplete customer -->
																<button class="btn btn-warning">Add Customer</button>
																</div>

																<div class="form-group">
																	<label>Stage</label>
																	<select  id="stage" name="stage" class="form-control">
																		<option value="1">Open Prospect</option>
																		<option value="2">Prospecting Progress	</option>
																		<option value="3">Closing Deal</option>
																		<option value="4">Fail</option>
																		<option value="5">Project Progress</option>
																	</select>
																</div>

																<div class="form-group">
																	<label>Noted</label>
																	<input name="note" id="note" class="form-control">
																</div>
															
														
													
												</div>
												<div class="modal-footer no-bd">
													<input type="submit" id="addPlan" name="addPlan" class="btn btn-primary" value="Add">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover table-border" >
											<thead>
												<tr>
													<th>No</th>
													<th>Activity</th>
													<th>Type</th>
													<th>Stage</th>
													<th>Customer Name</th>
													<th>Date</th>
													<th>Noted</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php 
												$time=0;
												$bil=0;
													foreach($plans as $plan)
													{
														$bil=$bil+1;
														$data="$plan->time";
														$splittedstring=explode(" ",$data);
														if ($splittedstring[0]!=$time)
														{?>
														<tr><th colspan="9"><?=$splittedstring[0];?></th></tr>
														<?php }?>
													<tr>
													<td><?=$bil;?></td>
													<td><?=$plan->name_activity;?></td>
													<td> <?=$plan->type; ?></td>
													<td><?=$plan->stage;?></td>
													<td><?=$plan->nama_customer;?></td>
													<td><?=$plan->time;?></td>
													<td><?=$plan->note;?></td>
													<td>
														<a href='' id='btn-edit' class="btn btn-warning" data-id='<?php echo $plan->id_activity;?>'>Edit </a>
														<!-- <a href="" data-toggle="modal" data-target="#btn-edit" class="btn btn-warning" data-id="<?=$plan->id_activity;?>">Edit</a> -->
														<!-- <button class="btn btn-warning editbtn" id="#editplan" data-toggle="modal" data-target="#editplan" 
														data-id="<?=$plan->id_activity;?>" data-nama="<?=$plan->name_activity;?>" 
														data-type="<?=$plan->type;?>" data-stage="<?=$plan->stage ;?>" data-customer="<?=$plan->nama_customer;?>"
														data-time="<?=$plan->time;?>" data-note="<?=$plan->note;?>">Edit</button> -->
													</td>
													<td>
													<a class="btn btn-warning" href="<?=base_url(); ?>activity_am/update/<?=$plan->id_activity?>" onclick="return confirm ('Sudah yakin ?')" >Done</a>
													</td>
													</tr>
													<?php $time=$splittedstring[0]; } ?>
												
											</tbody>
										</table>
										<!-- Modal Edit -->
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit Plan</span> 
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="">
																<input type="text" name="id_activity" class="form-control" value="">
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
													<input type="submit" id="addPlan" name="addPlan" class="btn btn-primary" value="Edit">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
									<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
									<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
									<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
																
									<script type="text/javascript">
									$(document).ready(function() {
									$('.editbtn').on('click',function(){
										$('#editplan').modal('show');//bootstrap thing
										
										$tr = $(this).closest('tr');
										var data = $tr.children("td").map(function(){
										return $(this).text();
										}).get();

										console.log(data);

										$('id_activity').val(data[0]);
										$('activity').val(data[1]);
										// $('type').val(data[2]);
										// $('customer').val(data[3]);
										// $('stage').val(data[4]);
										// $('note').val(data[5]);
										});
										});
									</script>

									</div>
					</div>
				</div>
            </div>
        </div>
	</div>
</div>
