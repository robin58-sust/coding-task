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
						<h1 class="page-header">Add Customer <a href="<?php echo base_url();?>customer" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<div class="col-md-4">
							<div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" required>
                            </div></div>
                            <div class="col-md-4">
							<div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" name="mobile" required>
                            </div></div>
                            <div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="not_verified"  value="0">Not Verified
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="verified"  value="1">Verified
														</label>
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							<div class="col-md-4">
							<div class="form-group">
                                <label>House</label>
                                <input class="form-control" name="house" required>
                            </div></div>
                            <div class="col-md-4">
							<div class="form-group">
                                <label>Flat/Apart.</label>
                                <input class="form-control" name="flat" required>
                            </div></div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Road</label>
                                <input class="form-control" name="road">
                                
                            </div></div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Block / Sector</label>
                                <input class="form-control" name="block" required>
                            </div></div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Area</label>
                                <input class="form-control" name="area" required>
                            </div></div>
                            <div class="row">
                            <div class="col-md-12">
							<div class="form-group">
                                <label>Address Instruction</label>
                                <input class="form-control" name="instruction" Placeholder="Adress Instruction" >
                                <!--select class="form-control" name="is_active" >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select-->
                            </div></div></div>
							<button type="submit" name="submit" class="btn btn-success">Save</button>
							<a href="<?php echo base_url();?>customer" class="btn btn-danger ">Back</a>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		