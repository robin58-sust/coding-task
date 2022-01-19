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
                <h1 class="page-header">View Product <a href="<?php echo base_url();?>product"
                        class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <td><?php 
                                        $id = $product->category_id;
                                        $category = $this->common_model->getTableData('category',array('id'=>$id),array())->row(); 
                                        echo $category->name_bn;

                                        ?></td>
                            </tr>
                            <tr>
                                <th>Ranking</th>
                                <td><?php echo $product->ranking; ?></td>
                            </tr>
                            <!--tr>
                                        <th>Name_en</th>
                                        <td><?php echo $product->name_en; ?></td>
									</tr-->
                            <tr>
                                <th>Name</th>
                                <td><?php echo $product->name_bn; ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><?php echo $product->price; ?></td>
                            </tr>
                            <tr>
                                <th>Sale Price</th>
                                <td><?php echo $product->sale_price; ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $product->description_bn; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($product->is_active == '1'){ ?>
                                    <span class="btn btn-xs btn-success">Active</span>
                                    <?php }else{ ?>
                                    <span class="btn btn-xs btn-danger">Inactive</span>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <th>Thumb Image</th>
                                <?php if(!empty($product)){?>
                                <td>
                                    <img style="width: 100px;height: 100px"
                                        src="<?php echo base_url(). '../images/products/80/' . $product->picture;?>"
                                        id="imgapp_image" class="img-fluid" alt="">
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Slider Image</th>
                                <?php if(!empty($product->slider_image)){?>
                                <td>

                                    <ul style="list-style-type:none">
                                        <?php if($product->slider_image != '')
									       {
											   $images = explode(",",$product->slider_image);
										   }
										   foreach($images as $img) {
											   echo '<li><img src="' . base_url(). '../images/products/slider/80/' . $img . '" width="100" height="100" style="padding:5px;" /> </li>';
										   }
									?>
                                    </ul>
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