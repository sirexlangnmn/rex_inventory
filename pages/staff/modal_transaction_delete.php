<div id="modal-trans-delete<?php echo $row['temp_trans_id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Remove to Cart</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/transaction_delete.php" enctype='multipart/form-data'>
                    <!--Hidden ID of customer-->
                    <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>   
                    <!--Hidden ID of temporary transaction-->
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['temp_trans_id'];?>" required>  
                    
                    <p>Are you sure you want to remove 
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