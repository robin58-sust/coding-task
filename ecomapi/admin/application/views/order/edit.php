
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Edit Order <a onclick="goBacks()" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name : </label>
										<input class="form-control" name="name" Placeholder="Name" value="<?php echo $orders->name;?>" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Mobile : </label>
										<input class="form-control" name="mobile" Placeholder="Mobile" value="<?php echo $orders->mobile;?>" >
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tbody>
											<tr>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="not_verified"  value="0" <?php if($user->is_verified == '0'){?> checked <?php }?>>Not Verified
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_verified" id="verified"  value="1" <?php if($user->is_verified == '1'){?> checked <?php }?>>Verified
														</label>
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>House : </label>
										<input class="form-control" name="house" Placeholder="House" value="<?php echo $orders->house;?>" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Flat/aprt : </label>
										<input class="form-control" name="flat" Placeholder="Flat/aprt" value="<?php echo $orders->flat;?>" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Road : </label>
										<input class="form-control" name="road" Placeholder="Road" value="<?php echo $orders->road;?>" >
									</div>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Block/Sector : </label>
										<input class="form-control" name="block" Placeholder="Block/Secto" value="<?php echo $orders->block;?>" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Area : </label>
										<input class="form-control" name="area" Placeholder="Area" value="<?php echo $orders->area;?>" >
									</div>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Address Instruction : </label>
										<input class="form-control" name="instruction" Placeholder="Address Instruction" value="<?php echo $orders->instruction;?>" >
									</div>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Delivery note : </label>
										<input class="form-control" name="delivery_note" Placeholder="Delivery note" value="<?php echo $orders->delivery_note;?>" >
									</div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Admin Message : </label>
										<input class="form-control" name="admin_msg" Placeholder="Admin Message" value="<?php echo $orders->admin_msg;?>" >
									</div>
								</div>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->user_id ?>">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>Order Status : </label>
										<select class="form-control" name="status" >
											<?php if(!empty($order_status)){?> 
											<?php foreach($order_status as $order_status_arr){?>
												<option value="<?php echo $order_status_arr->code; ?>" <?php if($order_status_arr->code == $orders->status){?> selected <?php }?>><?php echo ucfirst($order_status_arr->name); ?></option>
												
											<?php }?>
											<?php }?>
										</select>
									</div>
									<div class="" name="sms" id="sms">
										<label>
											<input type="checkbox" name="check_sms" id="check_sms"  value="0"> Send SMS
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Cash Collection : </label>
										<input class="form-control" name="cash_collection" Placeholder="Cash Collection" value="<?php echo $orders->cash_collection;?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>This order Due : </label>
										<input class="form-control" name="due" Placeholder="Due" value="<?php echo $orders->due;?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Previous Due : </label>
										<input class="form-control" name="previous_due" Placeholder="Previous Due" value="<?php echo $user->due;?>">
									</div>
								</div>
								
                            </div>
							<div class="row" id="delivery_man" style="display:none">
								<div class="col-md-4">
									<div class="form-group">
										<label>Delivery Man : </label>
										<select class="form-control" name="delivery_man" >
											<?php if(!empty($delivery_mans)){?> 
											<?php foreach($delivery_mans as $delivery_arr){?>
												<option value="<?php echo $delivery_arr->name; ?>"><?php echo ucfirst($delivery_arr->name); ?></option>
											<?php }?>
											<?php }?>
										</select>
									</div>
								</div>
                            </div>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<tbody>
										<?php if(!empty($order_details_product)){?> 
										<?php foreach($order_details_product as $order_details_product_arr){?>
											<input type="hidden" name="order_detail_id[]"  value="<?php echo $order_details_product_arr['id'];?>" >

											<tr>
												<td><?php echo $order_details_product_arr['name_bn']; ?></td>
												<td>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group input-group">
																<input type="text" class="form-control" name="quantity[]"  value="<?php echo $order_details_product_arr['quantity'];?>" style="height:37px">
																<span class="input-group-addon"> <?php echo $order_details_product_arr['unit'];?></span>
															</div>
														</div>
													</div>
												</td> 
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_delivered_<?php echo $order_details_product_arr['id'];?>"  value="0" <?php if($order_details_product_arr['is_delivered'] == '0'){?> checked <?php }?>>Not Delivered
														</label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label>
															<input type="radio" name="is_delivered_<?php echo $order_details_product_arr['id'];?>"  value="2" <?php if($order_details_product_arr['is_delivered'] == '2'){?> checked <?php }?>>Partially delivered
														</label>
													</div>
												</td>
												<td>
													<div class="radio" >
														<label>
															<input type="radio" name="is_delivered_<?php echo $order_details_product_arr['id'];?>"  value="1" <?php if($order_details_product_arr['is_delivered'] == '1'){?> checked <?php }?>>Delivered
														</label>
													</div>
												</td>
											</tr>
										<?php }?>
										<?php }?>
									</tbody>
								</table>
							</div>
							<button type="submit" name="submit" class="btn btn-success">Update</button>
							
							

						</form>
							<button onclick="goBack()" class="btn btn-danger" style="margin:-56px 0px 0px 73px;">Back</button>
					</div>
				</div>
			</div>
		</div>
		<script>
		$(document).ready(function(){
			$("select").change(function(){
				$( "select option:selected").each(function(){
					if($(this).attr("value")=="12"){
						$("#delivery_man").show();
						$("#sms").hide();
					}
					if($(this).attr("value")=="0"){
						$("#delivery_man").hide();
						$("#sms").hide();
					}
					if($(this).attr("value")=="21"){
						$("#delivery_man").show();
						$("#sms").hide();
					}
					if($(this).attr("value")=="22"){
						$("#delivery_man").show();
						$("#sms").hide();
					}
					if($(this).attr("value")=="41"){
						$("#delivery_man").hide();
						$("#sms").hide();
					}
					if($(this).attr("value")=="42"){
						$("#delivery_man").hide();
						$("#sms").hide();
					}
					if($(this).attr("value")=="11"){
						$("#delivery_man").hide();
						$("#sms").show();
						
					}
				});
			}).change();
		});
		function goBack() {
		  window.history.back();
		}
		function goBacks() {
		  window.history.back();
		}
</script>