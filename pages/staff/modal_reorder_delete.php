<div id="modal-reorder-delete<?php echo $row['prod_id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Cancel Purchase Request</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/purchase_request_delete.php" enctype='multipart/form-data'>
                    <!--Hidden ID of customer-->
                    <input type="hidden" class="form-control" name="pr_id" value="<?php echo $row['pr_id'];?>" required> 
            
                    <p>Are you sure you want to cancel the purchase request for<br />
                        <b class="text-danger"><?php echo $row['prod_name'];?></b>?
                    </p>
                   
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            
                            <button type="submit" name="update" class="fcbtn btn btn-danger btn-outline btn-1e"><i class="fa fa-arrows-alt"></i> Delete </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>