<style>
    #page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    height: 680px;
}
</style>	
	<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Edit Customer <a href="<?php echo base_url();?>customer" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
                                		<label>Name</label>
                                		<input class="form-control" name="name" value="<?php echo $customer->name;?>">
                            		</div>
                            	</div>
                            	<div class="col-md-4">
									<div class="form-group">
                                		<label>Mobile</label>
                                		<input class="form-control" name="mobile" value="<?php echo $customer->mobile;?>">
                            		</div>
                            	</div>
                            	<div class="col-md-4">
                            		<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="not_verified"  value="0" <?php if($customer->is_verified == '0'){?> checked <?php }?>>Not Verified
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="verified"  value="1" <?php if($customer->is_verified == '1'){?> checked <?php }?>>Verified
														</label>
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
                                	<label>House</label>
                                	<input class="form-control" name="house" required value="<?php echo $customer->house;?>">
                            	</div>
                            </div>
                            <div class="col-md-4">
								<div class="form-group">
                                	<label>Flat/aprt</label>
                                	<input class="form-control" name="flat" required value="<?php echo $customer->flat;?>">
                            	</div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label>Road</label>
                                	<input class="form-control" name="road" required value="<?php echo $customer->road;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
								<div class="form-group">
                                	<label>Block/Sector</label>
                                	<input class="form-control" name="block" required value="<?php echo $customer->block;?>">
                            	</div>
                            </div>
                            <div class="col-md-6">
                            	<div class="form-group">
                                	<label>Area</label>
                                	<input class="form-control" name="area" required value="<?php echo $customer->area;?>">
                            	</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-12">
                            	<div class="form-group">
                                	<label>Address Instruction</label>
                                	<input class="form-control" name="instruction" required value="<?php echo $customer->instruction;?>">
                            	</div>
                            </div>
                        </div>

							<button type="submit" name="submit" class="btn btn-success">Update</button>
							<a href="<?php echo base_url();?>customer" class="btn btn-danger ">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		