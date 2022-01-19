<style>
    #page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    height: 680px;
}
.edit{
    width: 100%;
    height: 25px;
}

.editMode{
    /*border: 1px solid black;*/
 
}

.txtedit{
    display: none;
    width: 99%;
    height: 30px;
}

.txteditd{
    display: none;
    width: 99%;
    height: 30px;
}
.selected { background-color: #f5f5f5; }
</style>
	<div id="page-wrapper">
            <div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Order Details <a onclick="goBack()" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Name : </label>
									<?php echo $orders->name;?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Mobile : </label>
									<?php echo $orders->mobile;?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Order Date : </label>
									<?php echo date('j M y',strtotime($orders->order_date));?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>House : </label>
									<?php echo $orders->house;?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Flat/aprt : </label>
									<?php echo $orders->flat;?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Block/Sector : </label>
									<?php echo $orders->block;?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Road : </label>
									<?php echo $orders->road;?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Area : </label>
									<?php echo $orders->area;?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Address Instruction : </label>
									<?php echo $orders->instruction;?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Delivery note  : </label>
									<?php echo $orders->delivery_note;?>
								</div>
							</div>
						</div>
						<d<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											
											<th>Particulars of goods</th>
											<th>Unit Price</th>
											<th>Ordered Qty</th>
											<th>Deliverable Qty</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($order_details_product)){?> 
										
													
													
													<input type="hidden" name="post_grand_total" id="post_grand_total" value="<?php echo $orders->total_price ?>">
													
										<?php foreach($order_details_product as $order_details_product_arr){
												$id=$order_details_product_arr['id'];
												$subtotal = $order_details_product_arr['price'] * $order_details_product_arr['quantity'];
											?>
											<tr id="tr_<?php echo $id?>">
												
												
												<td><?php echo $order_details_product_arr['name_bn']; ?></td>
												<td >
													
													
													<?php echo $order_details_product_arr['price'] ?>
													/<?php echo $order_details_product_arr['unit'];?> 
												</td> 
												<td>
													
														<?php echo $order_details_product_arr['quantity'] ?>
														<?php echo $order_details_product_arr['unit'];?> 
												</td>
												<td>
													
														<?php echo $order_details_product_arr['quantity'] ?>

													<?php echo $order_details_product_arr['unit'];?> </td>
												
												<td>
													<div id="subtotal_<?php echo $id; ?>" class="subtotal_cls">
													<?php 
													
														echo $subtotal;
													
													?> 
													</div>
												</td>
											</tr>
										<?php }?>
										<?php }?>
										<tr>
										
											<td>Delivery Charges</td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												<span class="edit_unit" id="span_del_charges"><?php echo $orders->delivery_charge;?></span>
												<input type='text' class='txtedit' value='<?php echo $orders->delivery_charge ?>' id='delivery_charges' style="width:50px;" >
											</td>
										</tr>
										<tr>
											
											<td>Fish Clean Fee</td>
											<td><span id="fish_clean_unit">30 /kg</span></td>
											<td></td>
											<td><span class="edit_unit" id="span_fish_charges">0</span>
												<input type='text' class='txtedit' value='0' id='fish_charges' style="width:50px;" ></td>
											<td>
												<span id="fish_clean_total">0</span>
											</td>
										</tr>
										<tr>
											
											<td>Previous Due</td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												<span class="edit_unit" id="span_dues"><?php echo $orders->due;?></span>
												<input type='text' class='txtedit' value='<?php echo $orders->due ?>' id='due' style="width:50px;" >
											
											</td>
										</tr>
										<tr>
											
											<td><span style="color:green;">Discount</span></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
											<span style="color:green;" id="span_discount"><?php echo $orders->discount;?></span>
											</td>
										</tr>
										<tr>
											
											<td></td>
											<td></td>
											<td></td>
											<td><span style="color:red;">Total</span></td>
											<td>
											<span style="color:green;" id="final_grand_total"></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
                    </div>
                </div>
			
			</div>
		</div>
		
		<script>
function calculate_total()
{
	var subtotal_orders_calculate=0;
	<?php foreach($order_details_product as $order_details_product_arr){ 
		$id=$order_details_product_arr['id'];
	?>
		//if($("#check_<?php echo $id?>").is(':checked')){
			var subtotal_order=$('#subtotal_<?php echo $id?>').text();
			subtotal_orders_calculate=parseInt(subtotal_orders_calculate)+parseInt(subtotal_order);
		//}
	   
	<?php } ?>
	var span_del_charges=0;
	var span_dues=0;
	var span_discount=0;
	var fish_clean_fee=0;
	var fish_clean_total=0;
	
		var span_del_charges=$('#span_del_charges').text();
	
	
		var span_dues=$('#span_dues').text();
	
	
		var span_discount=$('#span_discount').text();
	
	
		var fish_clean_total=$('#fish_clean_total').text();
	
	
	var subtotal_orders_without_discount=parseInt(subtotal_orders_calculate)+parseInt(span_del_charges)+parseInt(span_dues)+parseInt(fish_clean_total);
	var subtotal_orders_with_discount=parseInt(subtotal_orders_without_discount)-parseInt(span_discount);
	
	$('#final_grand_total').text(subtotal_orders_with_discount);
	$('#post_grand_total').val(subtotal_orders_with_discount);
	
}
$(document).ready(function(){
		calculate_total();		
    
});
			function goBack() {
			  window.history.back();
			}
		</script>