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
						<h1 class="page-header">Edit Offer <a href="<?php echo base_url();?>offer" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<input type="hidden"  name="offer_image" value="<?php echo $offer->image;?>" />
							<div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $offer->title;?>">
                            </div>
							<div class="form-group">
                                <label>Description</label>
                             
                                <textarea class="form-control" rows="5" name="description"><?php echo $offer->description;?></textarea>
                            </div>
                            <div class="col-md-6">
							<div class="form-group">
                                <label>Offer Start</label>
                                <input class="form-control" name="offer_start" required value="<?php echo $offer->offer_start;?>">
                            </div></div>
                            <div class="col-md-6">
							<div class="form-group">
                                <label>Offer End</label>
                                <input class="form-control" name="offer_end" required value="<?php echo $offer->offer_end;?>">
                            </div></div>
							<div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active" >
                                    <option value="1" <?php if($offer->is_active == '1' ){ echo 'selected'; } ?> >Active</option>
                                    <option value="0" <?php if($offer->is_active == '0' ){ echo 'selected'; } ?>>Inactive</option>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Image</label>
                                <input type="file" name="offer_image" id="offer_image" >
                            </div>
							<div class="form-group">
								<div class="img-app_image ">
									<img  style="width: 300px;" src="http://tazafol.com/<?php echo $offer->image;?>"  id="imgapp_image" class="img-fluid" alt="">
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-success">Update</button>
							<a href="<?php echo base_url();?>offer" class="btn btn-danger ">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#offer_image').on('change', function() {
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
