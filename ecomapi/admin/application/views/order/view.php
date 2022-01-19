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
			<form action="<?php echo base_url();?>order/invoice/<?php echo $orders->id;?>" method="POST">
               <div class="row" style="padding-top:10px;padding-bottom:10px;">
					<div class="col-md-4">
					<a  onclick="goBack()" class="btn btn-default"><i class="fa fa-undo"></i> Back</a> 
					</div>
					<div class="col-md-5">
					<h2>Order Details - <?php echo $orders->id;?></h2>
					</div>
					<div class="col-md-3">
					<input type="checkbox" name="send_sms"  value="1" >&nbsp;<span>Send SMS</span>
					<button type="submit" name="submit" class="btn btn-success pull-right">Print Invoice</button>
					</div>
				
					
					
				</div>
				<hr>
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
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Ordered Total : </label>
									<?php echo $orders->total_price;?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Previous due : </label>
									<span style="color:red"> <?php echo $user->due;?></span>
								</div>
							</div>
							<?php if(!empty($orders->delivery_man)){ ?>
							<div class="col-md-4">
								<div class="form-group">
									<label>Delivery Man : </label>
									<span> <?php echo $orders->delivery_man;?></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Select</th>
											<th>Particulars of goods</th>
											<th>Unit Price</th>
											<th>Ordered Qty</th>
											<th>Deliverable Qty</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($order_details_product)){?> 
										<input type="hidden" name="post_delivery_charges" id="post_delivery_charges" value="<?php echo $orders->delivery_charge ?>">
													
													<input type="hidden" name="post_fish_fee" id="post_fish" value="0">
													<input type="hidden" name="post_other_fee" id="post_other" value="0">
													<input type="hidden" name="post_fish_qty" id="post_fish_qty" value="0">
													<input type="hidden" name="post_fish_unit" id="post_fish_unit" value="30">
													<input type="hidden" name="post_dues" id="post_dues" value="<?php echo $orders->due ?>">
													<input type="hidden" name="post_discount" id="post_discount" value="<?php echo $orders->discount ?>">
													<input type="hidden" name="post_grand_total" id="post_grand_total" value="<?php echo $orders->total_price ?>">
										<?php foreach($order_details_product as $order_details_product_arr){
												$id=$order_details_product_arr['id'];
												$subtotal = $order_details_product_arr['price'] * $order_details_product_arr['quantity'];
											?>
											<tr id="tr_<?php echo $id?>">
												
												<td>
													<input type="hidden" name="product_name[<?php echo $id?>]" id="product_name<?php echo $id?>" value="<?php echo $order_details_product_arr['name_bn'];?>">

													<input type="hidden" name="product_name_en[<?php echo $id?>]" id="product_name_en<?php echo $id?>" value="<?php echo $order_details_product_arr['name_en'];?>">
													
													<input type="hidden" name="product_unit[<?php echo $id?>]" id="product_unit<?php echo $id?>" value="<?php echo $order_details_product_arr['unit'];?>">
													
													
													<input type="hidden" name="post_unit_price[<?php echo $id?>]" id="post_unit_price_<?php echo $id?>" value="<?php echo $order_details_product_arr['price'];?>">
													
													
													
													<input type="hidden" name="post_deliver_qty[<?php echo $id?>]" id="post_deliver_qty_<?php echo $id?>" value="<?php echo $order_details_product_arr['quantity'];?>">
													
													<input type="hidden" name="post_total[<?php echo $id?>]" id="post_total_<?php echo $id?>" value="<?php echo $subtotal;?>">
													
													
													
													<div class="checkbox">
														<label>
															<input type="checkbox" name="disableRow[<?php echo $id?>]"  value="<?php echo $order_details_product_arr['id'];?>" checked id="check_<?php echo $id?>" >
														</label>
													</div>
												</td>
												<td><?php echo $order_details_product_arr['name_bn']; ?></td>
												<td >
													
													<span class="edit_unit" id="span_unit_<?php echo $id; ?>"><?php echo $order_details_product_arr['price'];?></span>
													<input type='text' class='txtedit' value='<?php echo $order_details_product_arr['price'] ?>' id='unit_<?php echo $id; ?>' style="width:50px;" >
													/<?php echo $order_details_product_arr['unit'];?> 
												</td> 
												<td>
													<span class="edit_unit" ><?php echo $order_details_product_arr['quantity'];?></span>
														<input type='text' class='txtedit' value='<?php echo $order_details_product_arr['quantity'] ?>' id='qty_<?php echo $id; ?>' style="width:50px;" >
														<?php echo $order_details_product_arr['unit'];?> 
												</td>
												<td>
													<span class="edit_unit" id="span_deliver_<?php echo $id; ?>"><?php echo $order_details_product_arr['quantity'];?></span>
														<input type='text' class='txtedit' value='<?php echo $order_details_product_arr['quantity'] ?>' id='deliver_qty_<?php echo $id; ?>' style="width:50px;" >

													<?php echo $order_details_product_arr['unit'];?> </td>
												
												<td>
													<div id="subtotal_<?php echo $id; ?>" class="subtotal_cls">
													<?php 
													
														echo round($subtotal,2);
													
													?> 
													</div>
												</td>
											</tr>
										<?php }?>
										<?php }?>
										<tr>
											<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="extraCharges[delivery_charges]"  value="delivery_charges" id="delivery_check" checked >
														</label>
													</div>
											</td>
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
											<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="extraCharges[fish_clean_fee]"  value="fish_clean_fee" id="fish_clean_fee_check"  >
														</label>
													</div>
											</td>
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
											<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="extraCharges[other_clean_fee]"  value="other_clean_fee" id="other_clean_fee_check"  >
														</label>
													</div>
											</td>
											<td>Chicken/Duck/Pigeon/Other Clean Fee</td>
											<td></span></td>
											<td></td>
											<td></td>
											<td>
												<span class="edit_unit" id="other_clean_total">0</span>
												<input type='text' class='txtedit' value='0' id='other_charges' style="width:50px;" >
											</td>
										</tr>
										<tr>
											<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="extraCharges[previous_due]"  value="previous_due" id="due_check">
														</label>
													</div>
											</td>
											<td>Previous Due</td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												<span class="edit_unit" id="span_dues"><?php echo $user->due;?></span>
												<input type='text' class='txtedit' value='<?php echo $user->due ?>' id='due' style="width:50px;" >
											
											</td>
										</tr>
										<tr>
											<td>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="extraCharges[discount]"  value="discount" id="discount_check">
														</label>
													</div>
											</td>
											<td><span style="color:green;">Discount</span></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
										
											<span class="edit_unit" id="span_discount" style="color:green;"><?php echo $orders->discount;?></span>
												<input type='text' class='txtedit' value='<?php echo $orders->discount ?>' id='discount_charge' style="width:50px;" ></td>
										</tr>
										<tr>
											<td></td>
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
				</form>
			</div>
		</div>
		<script>
function calculate_total()
{
	var subtotal_orders_calculate=0;
	<?php foreach($order_details_product as $order_details_product_arr){ 
		$id=$order_details_product_arr['id'];
	?>
		if($("#check_<?php echo $id?>").is(':checked')){
			var subtotal_order=$('#subtotal_<?php echo $id?>').text();
			subtotal_orders_calculate=parseFloat(subtotal_orders_calculate)+parseFloat(subtotal_order);
		}
	   
	<?php } ?>
	var span_del_charges=0;
	var span_dues=0;
	var span_discount=0;
	var fish_clean_fee=0;
	var fish_clean_total=0;
	var other_clean_total=0;
	if($("#delivery_check").is(':checked')){
		var span_del_charges=$('#span_del_charges').text();
	}
	if($("#due_check").is(':checked')){
		var span_dues=$('#span_dues').text();
	}
	if($("#discount_check").is(':checked')){
		var span_discount=$('#span_discount').text();
	}
	if($("#fish_clean_fee_check").is(':checked')){
		var fish_clean_total=$('#fish_clean_total').text();
	}
	if($("#other_clean_fee_check").is(':checked')){
		var other_clean_total=$('#other_clean_total').text();
	}
	
	var subtotal_orders_without_discount=parseFloat(subtotal_orders_calculate)+parseFloat(span_del_charges)+parseFloat(span_dues)+parseFloat(fish_clean_total)+parseFloat(other_clean_total);
	var subtotal_orders_with_discount=parseFloat(subtotal_orders_without_discount).toFixed(2)-parseFloat(span_discount).toFixed(2);
	
	$('#final_grand_total').text(subtotal_orders_with_discount);
	$('#post_grand_total').val(subtotal_orders_with_discount);
	
}
$(document).ready(function(){
	calculate_total();			
	$('tbody :checkbox').change(function() {
		if(!$(this).is(":checked"))
		{
			$(this).closest('tr').addClass('selected');
			calculate_total();	
		}else{
			$(this).closest('tr').removeClass('selected');
			calculate_total();	
		}
		
	});
	/*$('thead :checkbox').change(function() {
		$('tbody :checkbox').prop('checked', this.checked).trigger('change');
	});*/
 
    // Show Input element
    $('.edit_unit').click(function(){
        $('.txtedit').hide();
        $(this).next('.txtedit').show().focus();
        $(this).hide();
    });


  
	$(".txtedit").on('focusout',function(){
        
        // Get edit id, field name and value
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];
        var pro_id = split_id[2];
        var value = $(this).val();
		//alert(field_name);
		//span_del_charges
		
		
		if(field_name=='qty')
		{
			$('#post_order_qty_'+edit_id).val(value);
		}
		if(field_name=='delivery')
		{
			$('#post_delivery_charges').val(value);
		}
		if(field_name=='discount')
		{
			$('#post_discount').val(value);
		}
		if(field_name=='due')
		{
			$('#post_dues').val(value);
		}
		
		if(field_name=='unit')
		{
			var deliver_qty=$('#span_deliver_'+edit_id).text();
			var total_price=parseFloat(deliver_qty)*parseFloat(value);
			total_price = total_price.toFixed(2);
			$("#subtotal_"+edit_id).text(total_price);
			$('#post_unit_price_'+edit_id).val(value);
			$('#post_total_'+edit_id).val(total_price);
			
		}
		if(field_name=='deliver')
		{
			var unit_price=$('#span_unit_'+pro_id).text();
			var total_price=parseFloat(unit_price)*parseFloat(value);
			total_price = total_price.toFixed(2);
			$("#subtotal_"+pro_id).text(total_price);
			$('#post_deliver_qty_'+pro_id).val(value);
			$('#post_total_'+pro_id).val(total_price);
			
		}
		
		if(field_name=='fish')
		{
			var unit_price=$('#fish_clean_unit').text();
			var total_price=parseFloat(unit_price)*parseFloat(value);
			total_price = total_price.toFixed(2);
			$('#post_fish').val(total_price);
			$('#fish_clean_total').text(total_price);
			$('#post_fish_qty').val(value);
		}

		if(field_name=='other')
		{
			$('#post_other').val(value);
		}
		
        // Hide Input element
        $(this).hide();

        // Hide and Change Text of the container with input elmeent
        $(this).prev('.edit_unit').show();
        $(this).prev('.edit_unit').text(value);
		calculate_total();		
        // Sending AJAX request
       /* $.ajax({
            url: 'update.php',
            type: 'post',
            data: { field:field_name, value:value, id:edit_id },
            success:function(response){
                console.log('Save successfully'); 
            }
        });*/
    
    });
	
	

});
		</script>
			<script>
			function goBack() {
			  window.history.back();
			}
			
		</script>