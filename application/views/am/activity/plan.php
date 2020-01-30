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
												<form  action="<?=base_url('activity_am/addPlan')?>" method="post">
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
																	<input id="id" name="id_customer" type="text" class="form-control" placeholder="Fill Customer">
																
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
																<a href="<?php echo base_url('activity_am/customer');?>" class="btn btn-warning">Add Customer</a>
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
													<td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editPlan<?=$plan->id_activity;?>"> Edit</a></td>
													<td>
													<a class="btn btn-warning" href="<?=base_url(); ?>activity_am/update/<?=$plan->id_activity?>" onclick="return confirm ('Sudah yakin ?')" >Done</a>
													</td>
													</tr>
													<?php $time=$splittedstring[0]; } ?>
												
											</tbody>
										</table>
									</div>
								</div>


								<!-- Modal Edit-->
								<?php 
									foreach($plans as $plan)
									{	$idPlan=$plan->id_activity;
										$namaPlan=$plan->name_activity;
										$idType=$plan->id_type;
										$namaCust=$plan->nama_customer;
										$idCust=$plan->id_customer;
										$idStage=$plan->id_stage;
										$noted=$plan->noted;
								
									?>

									<div class="modal fade" id="editPlan<?=$plan->id_activity;?>" tabindex="-1" role="dialog" aria-hidden="true">
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
												<form  action="<?=base_url('activity_am/UpdatePlan')?>" method="post">
													<div class="form-group">
														<label>Name Activity</label>
														<input name="EditIdAct" id="id_activity" type="hidden" class="form-control" value="<?=$idPlan;?>">
														<input name="EditNameAct" id="name_activity" type="text" class="form-control" value="<?=$namaPlan;?>">
													</div>

													<div class="form-group">
														<label>Type</label>	
														<select  id="EditType" name="EditType" class="form-control">				
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
																	<input id="EditNameCust" name="EditNameCust" type="text" value="<?=$namaCust;?>" class="form-control" placeholder="Fill Customer">
																	<input id="id" name="EditIdCust" type="hidden" value="<?=$idCust;?>" class="form-control" placeholder="Fill Customer">
																
																<!-- Autocomplete customer -->
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
																<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
																<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
																<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
																<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
																
																<script type="text/javascript">
										
																	$(document).ready(function(){

																	$('#EditNameCust').autocomplete({
																			source: "<?php echo base_url('activity_am/get_autocomplete');?>",
																			select: function (event, ui) {
																			$('[name="EditNameCust"]').val(ui.item.EditNameCust); 
																			$('[name="EditIdCust"]').val(ui.item.id); 
																			  }
																		});
																});
																</script>
																<!--  END Autocomplete customer -->
																<a href="<?php echo base_url('activity_am/customer');?>" class="btn btn-warning">Add Customer</a>
																</div>

																<div class="form-group">
																	<label>Stage</label>
																	<select  id="EditStage" name="EditStage" class="form-control">
																		<option value="1">Open Prospect</option>
																		<option value="2">Prospecting Progress	</option>
																		<option value="3">Closing Deal</option>
																		<option value="4">Fail</option>
																		<option value="5">Project Progress</option>
																	</select>
																</div>

																<div class="form-group">
																	<label>Noted</label>
																	<input name="EditNote" id="EditNote" value="<?=$noted?>" class="form-control">
																</div>
														</div>
														<div class="modal-footer no-bd">
															<input type="submit" id="updatePlan" name="updatePlan" class="btn btn-primary" value="Update">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>											
									<?php }?>
					</div>
            	</div>
        	</div>
	</div>
</div>


