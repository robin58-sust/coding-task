<style>
    #page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    height: 1100px;
}
</style>	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order List </h1>
                    </div>
                </div>
                 <div class="row">
					<?php 
						$error = $this->session->flashdata('error');
						$success = $this->session->flashdata('success');
					?>
					<?php if($success != '') { ?>
						<div class="col-lg-12">
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 <strong><?php echo $success;?></strong> 
							</div>
						</div>
					<?php }?>
					<?php if($error != '') { ?>
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 <strong><?php echo $error;?></strong> 
							</div>
						</div>
					<?php }?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                      
                        <div class="table-responsive">
                             <table class="table table-bordered table-hover table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Or.ID</th>
                                        <th>Date</th>
										<th>Status</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Products</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php if(!empty($orders)){ ?>
									<?php foreach($orders as $orders_arr){?>
                                    <tr>
										<td><?php echo $orders_arr->id; ?></td>
										<td><?php echo date('j M',strtotime($orders_arr->order_date)); ?></td>
										<td>
											
											<?php if($orders_arr->status =='0'){ ?>
												<span class="btn btn-xs btn-success">Pending</span>
											<?php }else if($orders_arr->status =='11'){?>
												<span class="btn btn-xs btn-warning">Processing</span>
											<?php }?>
												
										</td>
										<td style="color: #25258e;font-weight: 700;" ><?php echo $orders_arr->name; ?></td>
										<td><?php echo $orders_arr->mobile; ?></td>
										<td>
										<?php 
											$products = getOrderDetails($orders_arr->id);
											
											echo $products;
										
										?>
										</td>
										<td>
											
											<a title="Edit Order" href="<?php echo base_url();?>order/edit/<?php echo $orders_arr->id; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
											<a title="Delete Order" href="<?php echo base_url();?>order/deleted/<?php echo $orders_arr->id; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this Order?');"><i class="fa fa-trash"></i></a>
										</td>
                                    </tr>
									<?php } ?>
									<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable(
				{
					"lengthMenu": [20, 50,100],
					"pageLength": 50
				});
		});
	</script>