<div id="modal-qty-update<?php echo $row['temp_trans_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Quantity</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/transaction_update.php" enctype='multipart/form-data'>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>  
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['temp_trans_id'];?>" required> 
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control pull-right" name="qty" value="<?php echo $row['qty'];?>" placeholder="Quantity" required>
                        </div>
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