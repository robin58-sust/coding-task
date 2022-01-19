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
                <h1 class="page-header">View Category <a href="<?php echo base_url();?>category"
                        class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <td><?php echo $category->ranking; ?></td>
                            </tr>
                            <tr>
                                <th>Name_en</th>
                                <td><?php echo $category->name_en; ?></td>
                            </tr>
                            <tr>
                                <th>Name_bn</th>
                                <td><?php echo $category->name_bn; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($category->is_active == '1'){ ?>
                                    <span class="btn btn-xs btn-success">Active</span>
                                    <?php }else{ ?>
                                    <span class="btn btn-xs btn-danger">Inactive</span>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <?php if(!empty($category)){?>
                                <td>
                                    <img style="width: 100px;"
                                        src="<?php echo base_url() . '../images/categories/80/'. $category->app_image;?>"
                                        id="imgapp_image" class="img-fluid" alt="">
                                </td>
                                <?php }?>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>