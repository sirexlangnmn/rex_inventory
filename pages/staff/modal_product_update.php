<div id="modal-product-update<?php echo $row['prod_id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #03A9F4;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Product Details</h4>
            </div>
            <div class="modal-body">
                <form  data-toggle="validator"  class="form-horizontal" method="post" action="queries/product_update.php" enctype='multipart/form-data'>
                    <div class="row" style="margin: 4px; ">
                        <div class="col-md-4">
                            <input type="hidden" class="form-control" name="prod_id" value="<?php echo $row['prod_id'];?>"  data-error="Required" required>
                            <div class="form-group">
                                <label class="control-label">Product Code</label>
                                <input type="text" class="form-control" name="serial" value="<?php echo $row['serial'];?>" placeholder="Supplier Name" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input type="text" class="form-control" name="prod_name" value="<?php echo $row['prod_name'];?>" placeholder="Address" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Product Description</label>
                                <input type="text" class="form-control" name="desc" value="<?php echo $row['prod_desc'];?>" placeholder="Product Description" data-error="Required" required>
                                <div class="help-block with-errors"></div>
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" name="supplier" required>
                                    <option value="<?php echo $row['supplier_id'];?>"><?php echo $row['supplier_name'];?></option>
                                      <?php
                                    
                                        $query2=mysqli_query($con,"SELECT * FROM supplier WHERE supplier_id != '$supp_id' ")or die(mysqli_error());
                                          while($row2=mysqli_fetch_array($query2)) :
                                      ?>
                                    <option value="<?php echo $row2['supplier_id'];?>"><?php echo $row2['supplier_name'];?></option>
                                  <?php endwhile; ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                  <input type="text" class="form-control" name="prod_price" value="<?php echo $row['prod_price'];?>" required>  
                                  <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                    <?php
                                      $query3=mysqli_query($con,"SELECT * FROM category WHERE cat_id != '$cate_id'")or die(mysqli_error());
                                        while($row3=mysqli_fetch_array($query3)) :
                                        ?>
                                      <option value="<?php echo $row3['cat_id'];?>"><?php echo $row3['cat_name'];?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div><!-- /.form group -->
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Reorder</label>
                                  <input type="number" class="form-control" name="reorder" value="<?php echo $row['reorder'];?>" required> 
                                  <div class="help-block with-errors"></div> 
                            </div>
                            <div class="form-group">
                                <label class="control-label">Picture</label>
                                  <input type="hidden" class="form-control" name="image1" value="<?php echo $row['prod_pic'];?>"> 
                                  <input type="file" class="form-control" name="image">  
                            </div>
                        </div>
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