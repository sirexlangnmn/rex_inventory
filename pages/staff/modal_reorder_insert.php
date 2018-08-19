<div id="modal-reorder-insert<?php echo $row['prod_id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Request Purchase</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/purchase_request_insert.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="pid" value="<?php echo $row['prod_id'];?>" required>  
                        <label class="control-label">Product Code</label>
                        <input type="text" class="form-control" name="serial" value="<?php echo $row['serial'];?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                        <input type="text" class="form-control" name="prod_name" value="<?php echo $row['prod_name'];?>" required readonly>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Supplier</label>
                        <input type="text" class="form-control" name="supplier_name" value="<?php echo $row['supplier_name'];?>" required readonly>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="text" class="form-control" name="prod_price" value="<?php echo $row['prod_price'];?>" required readonly>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control pull-right" name="reorder" placeholder="Quantity" required>
                        </div>
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