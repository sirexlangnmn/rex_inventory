<div id="modal-creditor-update<?php echo $cid;?>"  class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update CI Details</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" class="form-horizontal" method="post" action="queries/creditor_update.php" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>  
                            <div class="form-group">
                                <label class="control-label">CI Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['ci_name'];?>" placeholder="Name of CI" data-error="Required" required> 
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CI Remarks</label>
                                <textarea class="form-control" name="ci" placeholder="CI remarks" data-error="Required" required><?php echo $row['ci_remarks'];?></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CI Date</label>
                                <input type="date" class="form-control" name="date" value="<?php echo $row['ci_date'];?>" data-error="Required" required> 
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="control-label"></label>
                                <?php if ($row['payslip'] == 1): ?>
                                <input type="checkbox" name="payslip" class="form-check" checked value="1" />Payslip
                                <?php else: ?>
                                <input type="checkbox" name="payslip" class="form-check" value="1" />Payslip
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <?php if ($row['valid_id'] == 1): ?>
                                <input type="checkbox" name="valid_id" class="form-check" checked value="1" />2 Valid IDs
                                <?php else: ?>
                                <input type="checkbox" name="valid_id" class="form-check" value="1" />2 Valid IDs
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <?php if ($row['cert'] == 1): ?>
                                <input type="checkbox" name="cert" class="form-check" checked value="1" />Brgy. Certificate
                                <?php else: ?>
                                <input type="checkbox" name="cert" class="form-check" value="1" />Brgy. Certificate
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <?php if ($row['cedula'] == 1): ?>
                                <input type="checkbox" name="cedula" class="form-check" checked value="1" />Cedula
                                <?php else: ?>
                                <input type="checkbox" name="cedula" class="form-check" value="1" />Cedula
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <?php if ($row['income'] == 1): ?>
                                <input type="checkbox" name="income" class="form-check" checked value="1" />Income
                                <?php else: ?>
                                <input type="checkbox" name="income" class="form-check" value="1" />Income
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="update" class="fcbtn btn btn-success btn-outline btn-block btn-1e">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>