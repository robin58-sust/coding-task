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
                <h1 class="page-header">Edit Category <a href="<?php echo base_url();?>category"
                        class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="app_image" value="<?php echo $category->app_image;?>" />
                    <div class="form-group">
                        <label>Ranking</label>
                        <input class="form-control" name="ranking" Placeholder="Only Number i.e 1,2,3...."
                            value="<?php echo $category->ranking;?>">
                    </div>
                    <div class="form-group">
                        <label>Name_en</label>
                        <input class="form-control" name="name_en" required value="<?php echo $category->name_en;?>">
                    </div>
                    <div class="form-group">
                        <label>Name_bn</label>
                        <input class="form-control" name="name_bn" required value="<?php echo $category->name_bn;?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" <?php if($category->is_active == '1' ){ echo 'selected'; } ?>>Active
                            </option>
                            <option value="0" <?php if($category->is_active == '0' ){ echo 'selected'; } ?>>Inactive
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="app_image" id="app_image">
                    </div>
                    <div class="form-group">
                        <div class="img-app_image ">
                            <img style="width: 100px;"
                                src="<?php echo base_url(). '../images/categories/80/'. $category->app_image;?>"
                                id="imgapp_image" class="img-fluid" alt="">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <a href="<?php echo base_url();?>category" class="btn btn-danger ">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#app_image').on('change', function() {
        var file = $(this).get(0).files;
        var reader = new FileReader();
        reader.readAsDataURL(file[0]);
        reader.addEventListener("load", function(e) {
            var image = e.target.result;
            $("#imgapp_image").attr('src', image);
        });
    });
});
</script>