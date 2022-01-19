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
						<h1 class="page-header">Edit Notification <a href="<?php echo base_url();?>notification" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<input type="hidden"  name="noti_image" value="<?php echo $notification->image;?>" />
							<div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" required value="<?php echo $notification->title;?>">
                            </div>
							<div class="form-group">
                                <label>Description</label>
                                <!--input class="form-control" name="description" required value="<?php echo $notification->description;?>"-->
                                <textarea class="form-control" rows="5" name="description"><?php echo $notification->description;?></textarea>
                            </div>
							<div class="form-group">
                                <label>Publish Date</label>
                                <input type="date" class="form-control" name="publish_date" required value="<?php echo $notification->publish_date;?>">
                            </div>
							<div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active" >
                                    <option value="1" <?php if($notification->is_active == '1' ){ echo 'selected'; } ?> >Active</option>
                                    <option value="0" <?php if($notification->is_active == '0' ){ echo 'selected'; } ?>>Inactive</option>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Image</label>
                                <input type="file" name="noti_image" id="noti_image" >
                            </div>
							<div class="form-group">
								<div class="imgnoti-image">
									<img  style="width: 300px;" src="http://tazafol.com/<?php echo $notification->image;?>"  id="imgnoti_image" class="img-fluid" alt="">
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-success">Update</button>
							<a href="<?php echo base_url();?>notification" class="btn btn-danger ">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#noti_image').on('change', function() {
					var file = $(this).get(0).files;
					var reader = new FileReader();
					reader.readAsDataURL(file[0]);
					reader.addEventListener("load", function(e) {
					var image = e.target.result;
						$("#imgnoti_image").attr('src', image);
					});
				});
			});
		</script>
