<div id="modal-cat-insert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/cat_insert.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" class="form-control" name="category" placeholder="Category" data-error="Required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            
                            <button type="submit" name="insert" class="fcbtn btn btn-success btn-outline btn-1e"><i class="fa fa-plus-circle"></i> Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>