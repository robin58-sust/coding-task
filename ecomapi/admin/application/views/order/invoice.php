<?php
 /* echo'<pre>';
  print_r($_POST);
  die; */
		/* if(isset($_POST['send_sms']) && $_POST['send_sms'] =='1'){
			$message  = 'orderID - '.$orders->id."<br>";
			if(!empty($_POST['product_name'])){ 
				$disableRow = $_POST['disableRow'];
				$product_name = $_POST['product_name'];
				$post_unit_price = $this->input->post('post_unit_price');
				$product_unit = $this->input->post('product_unit');
				$post_total = $this->input->post('post_total');
				foreach($disableRow as  $k=>$order_details_product_arr) {
					$message  .= $product_name[$k].'-'.$post_unit_price[$k].' '.$product_unit[$k]."<br>";
				}
			} 
			if(isset($_POST['extraCharges']['delivery_charges'])){
				$message .= 'Delivery charge - '.$_POST['post_delivery_charges']."<br>";
			}
			if(isset($_POST['extraCharges']['fish_clean_fee'])){
				$message .= 'Fish clean - '.$_POST['post_fish_fee']."<br>";
			}
			if(isset($_POST['extraCharges']['previous_due'])){
				$message  .= 'Previous due - '.$_POST['post_dues']."<br>";
			}
			if(isset($_POST['extraCharges']['discount'])){
				//$message  .= 'Discount - '.$orders->discount."<br>";
				$message  .= 'Discount - '.$_POST['post_discount']."<br>";
				
			}
			echo $message  .= 'Total - '.$_POST['post_grand_total']."<br>";  
		} */
		
	
?>

<html lang="en">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/invoice/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/invoice/all.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/invoice/stylesheet.css"/>
	<body>
		<div class="container-fluid invoice-container">
			
				<!--div class="row">
					<div class="col-sm-6"><strong>Receipt-single</strong> </div>
					<div class="col-sm-6 text-sm-right"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">Print</a></div>
				</div>
			<hr-->
			<header>
				<div class="row align-items-center">
					<div class="col-sm-12 text-center ">
						<h4 class="text-7 mb-0">TazaFol-তাজাফল</h4>
						<h6 class="mb-0">http://tazafol.com/</h6>
						<h6 class="mb-0">https://www.facebook.com/TazaFol.BD/</h6>
						<h6 class="mb-0">01970413031, 01612426026, 01717413031(personal bKash)</h6>
					</div>
				</div>
			</header>
			<main>
				<hr>
				<div class="row">
					<div class="col-sm-6 text-sm-right order-sm-1"> <strong></strong>
						<address>
							Area : <b><?php echo $orders->area;?> </b><br />
							Mobile : <b><?php echo $orders->mobile;?></b><br />
							Flat/aprt : <b><?php echo $orders->flat;?></b><br />
							Block/Sector : <b><?php echo $orders->block;?></b><br />
							
							Delivery Man : <b><?php echo $orders->delivery_man;?></b>
							
						</address>
					</div>
					<div class="col-sm-6 order-sm-0">
						<address>
							Order ID : <b><?php echo $orders->id;?></b> <br />
							Name : <b><?php echo $orders->name;?></b><br />
							House : <b><?php echo $orders->house;?></b><br />
							Road : <b><?php echo $orders->road;?></b><br />
							Ordered : <b><?php echo date('j M y',strtotime($orders->order_date));?></b>
						</address>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 order-sm-0">
						<address>
							Address Note : <b><?php echo $orders->instruction;?></b> <br />
							Delivery Note : <b><?php echo $orders->delivery_note;?></b><br />
						</address>
					</div>
				</div>  
				<div class="card">
					<table class="table">
						  <thead>
							<tr>
							  <th colspan="3" style="text-align:center">Particulars of goods	</th>
							  <th colspan="3" style="text-align:center">Rate</th>
							  <th colspan="3" style="text-align:center">Quantity</th>
							  <th colspan="3" style="text-align:center">Value</th>
							</tr>
						  </thead>
						  <tbody>
								<?php 
									if(!empty($_POST['product_name'])){ 
										$disableRow = $_POST['disableRow'];
										$product_name = $_POST['product_name'];
										$post_unit_price = $this->input->post('post_unit_price');
										//$post_order_qty = $this->input->post('post_order_qty');
										$post_deliver_qty = $this->input->post('post_deliver_qty');
										$product_unit = $this->input->post('product_unit');
										$post_total = $this->input->post('post_total');
										//foreach($product_name as  $k=>$order_details_product_arr) {
										foreach($disableRow as  $k=>$order_details_product_arr) {
									?>
									<tr>
										<td colspan="3" style="text-align:center"> <?php echo $product_name[$k]; ?></th>
										<td colspan="3" style="text-align:center"><?php echo $post_unit_price[$k] ?>/<?php echo $product_unit[$k];?></td>
										<td colspan="3" style="text-align:center"><?php echo $post_deliver_qty[$k];?> (<?php echo $product_unit[$k];?>)</td>
										<td colspan="3" style="text-align:center"><?php echo $post_total[$k]; ?></td>
									</tr>
								<?php }?>
								<?php }?>
							<?php if(isset($_POST['extraCharges']['delivery_charges'])){?>
								<tr>
									<td colspan="3" style="text-align:center">Delivery Charges</td>
									<td colspan="3" style="text-align:center"></td>
									<td colspan="3" style="text-align:center"></td>
									<td colspan="3" style="text-align:center">
										<?php 
											if(isset($_POST['extraCharges']['delivery_charges'])){
												echo $_POST['post_delivery_charges'];
											}
										?>
									</td>
								</tr>
							<?php }?>
							<?php if(isset($_POST['extraCharges']['fish_clean_fee'])){?>
								<tr>
									<td colspan="3" style="text-align:center">Fish Clean Fee</td>
									<td colspan="3" style="text-align:center"> 
										<?php 
											if(isset($_POST['extraCharges']['fish_clean_fee'])){
												echo $_POST['post_fish_unit'];
											}
										?>/kg
									</td>
									<td colspan="3" style="text-align:center">
										<?php 
											if(isset($_POST['extraCharges']['fish_clean_fee'])){
												echo $_POST['post_fish_qty'];
											}
										?>
									</td>
									<td colspan="3" style="text-align:center">
										<?php 
											if(isset($_POST['extraCharges']['fish_clean_fee'])){
												echo $_POST['post_fish_fee'];
											}
										?>
									</td>
								</tr>
							<?php }?>
							<?php if(isset($_POST['extraCharges']['other_clean_fee'])){?>
								<tr>
									<td colspan="3" style="text-align:center">Chicken/Duck/Pigeon/Other Clean Fee</td>
									<td colspan="3" style="text-align:center"></td>
									<td colspan="3" style="text-align:center"></td>
									<td colspan="3" style="text-align:center">
										<?php 
											if(isset($_POST['extraCharges']['other_clean_fee'])){
												echo $_POST['post_other_fee'];
											}
										?>
									</td>
								</tr>
							<?php }?>
							<?php if(isset($_POST['extraCharges']['previous_due'])){?>
							<tr>
								<td colspan="3" style="text-align:center">Previous Due</td>
								<td colspan="3" style="text-align:center"></td>
								<td colspan="3" style="text-align:center"></td>
								<td colspan="3" style="text-align:center">
									<?php 
										if(isset($_POST['extraCharges']['previous_due'])){
											echo $_POST['post_dues'];
										}
									?>
								</td>
							</tr>
							<?php }?>
							<?php if(isset($_POST['extraCharges']['discount'])){?>
							<tr>
								<td colspan="3" style="text-align:center">Discount</td>
								<td colspan="3" style="text-align:center"></td>
								<td colspan="3" style="text-align:center"></td>
								<td colspan="3" style="text-align:center">
								<?php 
									if(isset($_POST['extraCharges']['discount'])){
										//echo $orders->discount;
										echo $_POST['post_discount'];
									}
								?>
								
								</td>
							</tr>
							<?php }?>
							<tr>
								<td colspan="10" class="bg-light-2 text-right"><strong>Total:</strong></td>
								<td class="bg-light-2" style="text-align:center">
									<?php 
										if(!empty($_POST['post_grand_total'])){
											echo $_POST['post_grand_total'];
										}
									?>
								</td>
							</tr>
					  </tbody>
					</table>
				</div>
			</main>
			 
		</div>
	</body>
</html>