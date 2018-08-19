<div id="modal-product-insert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" method="post" action="queries/product_insert.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Product Code</label>
                                <input type="text" class="form-control" name="serial" placeholder="Supplier Name" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input type="text" class="form-control" name="prod_name" placeholder="Address" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Product Description</label>
                                <input type="text" class="form-control" name="prod_desc" placeholder="Contact" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" name="supplier" data-placeholder="Choose Branch Here" tabindex="1" required>
                                    <option>Choose Branch Here . . .</option>
                                    <?php
                                      $query = mysqli_query($con,"SELECT * FROM supplier")or die(mysqli_error($con));
                                      while($row = mysqli_fetch_array($query)) :
                                    ?>
                                    <option value="<?php echo $row['supplier_id'];?>">
                                        <?php echo $row['supplier_name'];?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="text" class="form-control" name="prod_price" placeholder="Address" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select class="form-control" name="category" data-placeholder="Choose Branch Here" tabindex="1" required>
                                    <option>Choose Branch Here . . .</option>
                                    <?php
                                      $query = mysqli_query($con,"SELECT * FROM category")or die(mysqli_error($con));
                                      while($row = mysqli_fetch_array($query)) :
                                    ?>
                                    <option value="<?php echo $row['cat_id'];?>">
                                        <?php echo $row['cat_name'];?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Reorder</label>
                                <input type="text" class="form-control" name="reorder" placeholder="Supplier Name" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Picture</label>
                                 <input type="file" class="form-control" name="image"> 
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
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