<div id="modal-cat-update<?php echo $cat_row['cat_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/cat_update.php" enctype='multipart/form-data'>
                    <div class="form-group">
                        <input type="hidden" name="cat_id" class="form-control" value="<?php echo $cat_row['cat_id']; ?>" data-error="Required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="control-label">Name</label>
                        <input type="text" name="category" class="form-control" placeholder="Category" value="<?php echo $cat_row['cat_name'];?>" data-error="Required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            
                            <button type="submit" name="update" class="fcbtn btn btn-success btn-outline btn-1e"><i class="fa fa-plus-circle"></i> Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>