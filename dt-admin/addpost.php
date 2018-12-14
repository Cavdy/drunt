<?php 
    require_once('core/index.php');
    include('includes/header.php'); 
?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Basic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-9">
                
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Post Title</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <input name="posttitle" type="text" id="company" placeholder="Post title" class="form-control"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                
                                <div name="postbody" id="editor">

                                </div>
                                
                            </div>
                        </div> <!-- .card -->

                        <div class="card">
                            <div class="card-body">
                                <a href="addpost.php" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp; Create Post</a>
                            </div>
                        </div>
                    
                </div>
                <!--/.col-->

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Category</strong>
                        </div>
                        <div class="card-body">

                            <select data-placeholder="Select a category" class="standardSelect" tabindex="1" name="category">
                            <?php
                                global $connect;
                                $ViewQuery = "SELECT * FROM dt_category ORDER BY datetime desc";
                                $Execute = mysqli_query($connect, $ViewQuery);

                                while ($DataRows = mysqli_fetch_array($Execute)) {
                                    $Id = $DataRows['category_id'];
                                    $Category_name = $DataRows['category_name'];

                            ?>
                                <option value=""></option>
                                <option value="<?php echo $Category_name ?>"><?php echo $Category_name ?></option>

                            <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        <strong class="card-title">Select Featured Image</strong>
                        </div>
                        <div class="card-body">

                            <div class="row form-group">
                                
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="imageselect" class="form-control-file"></div>
                                                                                      </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div><!-- .animated -->
    </div><!-- .content -->

<?php include('includes/footer.php'); ?>