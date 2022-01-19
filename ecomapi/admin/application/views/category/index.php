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
                <h1 class="page-header">Category List <a href="<?php echo base_url();?>category/add"
                        class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Category</a></h1>
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
                                <th>Ranking</th>
                                <th>Name_en</th>
                                <th>Name_bn</th>
                                <th>Image Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($category)){ ?>
                            <?php foreach($category as $category_arr){?>
                            <tr>
                                <td><?php echo $category_arr->ranking; ?></td>
                                <td><?php echo $category_arr->name_en; ?></td>
                                <td><?php echo $category_arr->name_bn; ?></td>
                                <td> <img
                                        src="<?php  echo base_url(). '../images/categories/80/' . $category_arr->app_image; ?>"
                                        height="100" width="100" /></td>
                                <td>
                                    <?php if($category_arr->is_active == '1'){ ?>
                                    <span class="btn btn-xs btn-success">Active</span>
                                    <?php }else{ ?>
                                    <span class="btn btn-xs btn-danger">Inactive</span>
                                    <?php }?>
                                </td>
                                <td>
                                    <a title="Category View"
                                        href="<?php echo base_url();?>category/view/<?php echo $category_arr->id; ?>"
                                        class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                    <a title="Edit Category"
                                        href="<?php echo base_url();?>category/edit/<?php echo $category_arr->id; ?>"
                                        class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a title="Delete Category"
                                        href="<?php echo base_url();?>category/deleted/<?php echo $category_arr->id; ?>"
                                        class="btn btn-xs btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this category?');"><i
                                            class="fa fa-trash"></i></a>
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

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script ty pe="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [20, 50, 100],
        "pageLength": 50
    });
});
</script>
