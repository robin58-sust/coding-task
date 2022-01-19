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
                <h1 class="page-header">Add Product <a href="<?php echo base_url();?>product"
                        class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <?php if(!empty($category)){?>
                                <?php foreach($category as $category_arr){?>
                                <option value="<?php echo $category_arr->id; ?>">
                                    <?php echo ucfirst($category_arr->name_bn); ?></option>
                                <?php }?>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ranking</label>
                            <input class="form-control" name="ranking" Placeholder="Only Number i.e 1,2,3....">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name_en</label>
                            <input class="form-control" name="name_en">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name_bn</label>
                            <input class="form-control" name="name_bn" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <!--input class="form-control" name="description_bn"-->
                        <textarea class="form-control" rows="5" name="description_bn"></textarea>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Unit</label>
                            <input class="form-control" name="unit" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input class="form-control" name="sale_price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Have Discount ?</label>
                            <select class="form-control" name="is_discount">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Discount Amount</label>
                            <input class="form-control" name="amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select class="form-control" name="is_percentage">
                                <option value="1">Percentage</option>
                                <option value="0">Flat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thumb Image</label>
                        <input type="file" name="thumb_image" id="thumb_image" required>
                    </div>
                    <div class="form-group">
                        <div class="img-app_image ">
                            <img style="width: 100px;" id="imgapp_image" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slide Image</label>
                        <input type="file" name="slide_image[]" id="slide_image" multiple="multiple" required>
                    </div>
                    <div class="form-group">
                        <div class="img-app_image" id="slide_images">

                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
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
        for (let i = 0; i < file.length; i++) {
            appendToView(file[i]);
        }

        function appendToView(file) {
            var preview = document.querySelector('#slide_images');
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