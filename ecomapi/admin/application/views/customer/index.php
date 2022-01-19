<style>
    #page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
    height: 938px;
}
</style>	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customer List <a href="<?php echo base_url();?>customer/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Customer</a></h1>
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Area</th>
                                        <th>Orders</th>
                                        <th>Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php if(!empty($customer)){ ?>
									<?php foreach($customer as $customer_arr){?>
                                    <tr>
                                        <td><?php 
                                        //$id = $customer_arr->user_id; 
                                        //$category = $this->common_model->getTableData('category',array('id'=>$id),array())->row();
                                        echo $customer_arr->user_id;

                                        ?></td>
                                        <td><?php echo substr($customer_arr->name,0,25); ?></td>
                                        <td><?php echo $customer_arr->mobile; ?></td>
                                        <td><?php echo substr($customer_arr->area,0,35); ?></td>
                                        <td>
											<?php 
                                        		$user_id = $customer_arr->user_id; 
                                        		$query = $this->db->query('SELECT * FROM `orders` WHERE `user_id`='.$user_id.'');
                                        		echo $query->num_rows();
                                        		//$orders = $this->common_model->getTableData('orders',array('user_id'=>$user_id),array())->row();
                                        		//echo $orders->num_rows();
                                        	?>
										</td>
										<td><?php echo $customer_arr->due; ?></td>
										<td>
											
											<a title="Edit Product" href="<?php echo base_url();?>customer/edit/<?php echo $customer_arr->user_id; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
											<!--a title="Delete Product" href="<?php echo base_url();?>customer/deleted/<?php echo $customer_arr->user_id; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this product?');" ><i class="fa fa-trash"></i></a-->
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