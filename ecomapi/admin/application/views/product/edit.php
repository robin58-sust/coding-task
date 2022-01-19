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
                <h1 class="page-header">Edit Product <a href="<?php echo base_url();?>product"
                        class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="thumb_image" value="<?php echo $product->picture;?>" />
                    <input type="hidden" name="slide_image" value="<?php echo $product->slider_image;?>" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <?php if(!empty($category)){?>
                                <?php foreach($category as $category_arr){?>
                                <option value="<?php 
											echo $category_arr->id; ?>" <?=$category_arr->id == $product->category_id ? ' selected="selected"' : '';?>>
                                    <?php echo ucfirst($category_arr->name_bn); ?></option>
                                <?php }?>
                                <?php }?>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ranking</label>
                            <input class="form-control" name="ranking" Placeholder="Only Number i.e 1,2,3...."
                                value="<?php echo $product->ranking;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name_en</label>
                            <input class="form-control" name="name_en" required value="<?php echo $product->name_en;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name_bn" required value="<?php echo $product->name_bn;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <!--input class="form-control" name="name_bn" required value="<?php echo $product->name_bn;?>"-->
                        <textarea class="form-control" rows="5"
                            name="description_bn"><?php echo $product->description_bn;?></textarea>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" required value="<?php echo $product->price;?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Unit</label>
                            <input class="form-control" name="unit" required value="<?php echo $product->unit;?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input class="form-control" name="sale_price" required
                                value="<?php echo $product->sale_price;?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Have Discount ?</label>
                            <select class="form-control" name="is_discount">
                                <option value="1" <?php if($product->is_discount == '1' ){ echo 'selected'; } ?>>Yes
                                </option>
                                <option value="0" <?php if($product->is_discount == '0' ){ echo 'selected'; } ?>>No
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Discount Amount</label>
                            <input class="form-control" name="amount" value="<?php echo $product->amount;?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select class="form-control" name="is_percentage">
                                <option value="1" <?php if($product->is_percentage == '1' ){ echo 'selected'; } ?>>
                                    Percentage</option>
                                <option value="0" <?php if($product->is_percentage == '0' ){ echo 'selected'; } ?>>Flat
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" <?php if($product->is_active == '1' ){ echo 'selected'; } ?>>Active
                            </option>
                            <option value="0" <?php if($product->is_active == '0' ){ echo 'selected'; } ?>>Inactive
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thumb Image</label>
                        <input type="file" name="thumb_image" id="thumb_image">
                    </div>
                    <div class="form-group">
                        <div class="img-app_image ">
                            <img style="width: 100px;height: 100px"
                                src="<?php echo base_url() . '../images/products/80/' . $product->picture;?>"
                                id="imgapp_image" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="file" name="slide_image[]" multiple id="slide_image">
                    </div>
                    <div class="form-group">
                        <div class="img-app_image ">
                            <div class="img-app_image" id="slide_images">
                                <ul style="list-style-type:none">
                                    <?php if($product->slider_image != '')
									       {
											   $images = explode(",",$product->slider_image);
											   foreach($images as $img) {
												echo '<li><img src="' . base_url(). '../images/products/slider/80/' . $img . '" width="100" height="100" style="padding:5px" /> </li>';
												}
										   }
										   
									?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <a href="<?php echo base_url();?>product" class="btn btn-danger ">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#thumb_image').on('change', function() {
        var file = $(this).get(0).files;
        var reader = new FileReader();
        reader.readAsDataURL(file[0]);
        reader.addEventListener("load", function(e) {
            var image = e.target.result;
            $("#imgapp_image").attr('src', image);
        });
    });

    $('#slide_image').on('change', function() {
        let file = $(this).get(0).files;
        var preview = document.querySelector('#slide_images');
        preview.innerHTML = '';
        for (let i = 0; i < file.length; i++) {
            appendToView(file[i]);
        }

        function appendToView(file) {

            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                }, false);

                reader.readAsDataURL(file);
            }
        }

    });
});
</script>
