<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="header-main">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . $module . '/productcategory'; ?>"><i class="fa fa-square"></i> Product category</a></li>
                <li class="active">Add</li>
            </ol>
            <div class="header-right pull-right"><a href="<?php echo base_url() . $module . '/productcategory'; ?>" class="btn btn-default"><?php echo $this->lang->line('default_cancel');?></a></div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url() . $module . '/productcategory/add'; ?>" method="post" id="my_form" enctype="multipart/form-data">
            <?php
            if (validation_errors('<li>','</li>') != '') {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo validation_errors('<li>', '</li>'); ?>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($error) && $error != ''){
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <li></li><?php echo $error; ?></li>
                </div>
            <?php }
            ?>
            <div class="row section">
                <div class="col-md-3 section-summary">
                    <h1>Product category information</h1>
                    <p>The information of product category in system</p>
                </div>
                <div class="col-md-9 section-content">
                    <div class="col-md-6 clear form-group">
                        <label for="fparentid"><?php echo $this->lang->line('category_parent');?></label>
                        <select name="fparentid" id="fparentid" class="form-control">
                            <option value="0">Choose parent category</option>
                            <?php getMenuList($productcategorys); ?>
                        </select>
                    </div>
                    <div class="col-md-6 clear form-group">
                        <label for="fname"><?php echo $this->lang->line('category_name');?><span class="star_required">*</span></label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" />
                    </div>
                    <div class="col-md-6 clear form-group">
                        <label for="fslug"><?php echo $this->lang->line('category_slug');?><span class="star_required">*</span></label>
                        <input type="text" class="form-control" name="fslug" id="fslug" value="<?php echo set_value('fslug'); ?>" />
                    </div>
                    <div class="col-md-12 clear form-group">
                        <label for="fdescription"><?php echo $this->lang->line('category_description');?></label>
                        <textarea class="form-control" cols="" rows="4" name="fdescription" id="fdescription"><?php echo set_value('fdescription'); ?></textarea>
                    </div>
                    <script>
                        CKEDITOR.replace( 'fdescription' );
                    </script>
                    <div class="col-md-3 clear form-group">
                        <label for="fstatus"><?php echo $this->lang->line('category_status');?></label>
                        <select id="fstatus" name="fstatus" class="form-control">
                            <?php
                            foreach ($statusOptions as $id => $name) {
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row section buttons">
                <input type="submit" class="btn btn-success pull-right" id="fsubmit" name="fsubmit" value="Add" />
                <span class="pull-left">
                    <span class="star_required">*</span> : is required
                </span>
            </div>
        </form>
    </section>
</aside>