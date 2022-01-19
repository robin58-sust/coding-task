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
						<h1 class="page-header">Add Offer <a href="<?php echo base_url();?>offer" class="btn btn-default pull-right"><i class="fa fa-undo"></i> Back</a></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" enctype='multipart/form-data'>
							<div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" required>
                            </div>
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                            <div class="col-md-6">
							<div class="form-group">
                                <label>Offer Start</label>
                                <input type="datetime-local" class="form-control" name="offer_start" required>
                            </div></div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer End</label>
                                <input type="datetime-local" class="form-control" name="offer_end" required>
                            </div></div>
							<div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active" >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Image</label>
                                <input type="file" name="offer_image" id="offer_image" required>
                            </div>
							<div class="form-group">
								<div class="img-app_image ">
									<img  style="width: 300px;" id="imgapp_image"   class="img-fluid" alt="">
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-success">Save</button>
							<a href="<?php echo base_url();?>category" class="btn btn-danger ">Back</a>
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