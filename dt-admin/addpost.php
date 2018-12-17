<?php 
    require_once('core/index.php');

    $dateTime = strftime("%B-%d-%Y %H:%M:%S", time());

  if(isset($_POST['submit'])) {
    $postTitle = $drunt-> checkInput($_POST['posttitle']);
    $postContent = $drunt-> checkInput($_POST['postbody']);
    $postCategory = $drunt-> checkInput($_POST['category']);
    $admin = "Cavdy";
    $Image = $_FILES["imageselect"]['name'];
    $ImageDir = "assets/upload/images".basename($Image);

    if(empty($postTitle) || empty($postContent) || empty($postCategory)) {
      $_SESSION['ErrorMessage'] = "All fields are required";
      $drunt-> redirect("addpost.php");
    } else if(strlen($postTitle) < 2 || strlen($postContent) < 2) {
      $_SESSION['ErrorMessage'] = "Fields should not be less than 2 characters";
      $drunt-> redirect("addpost.php");
    } else {
      global $connect;

      $Query = "INSERT INTO dt_addpost(post_datetime,post_title,post_content,post_category, post_thumbnail, post_author) VALUES('$dateTime', '$postTitle', '$postContent', '$postCategory', '$Image', '$admin')";
      $Execute = mysqli_query($connect,$Query);
      move_uploaded_file($_FILES["imageselect"]["tmp_name"], $ImageDir);
      if($Execute) {
        $_SESSION['SuccessMessage'] = "Post created successfully";
        $drunt-> redirect("post.php");
      } else {
        $_SESSION['ErrorMessage'] = "Failed to submit! Try again";
        $drunt-> redirect("addpost.php");
      }
    }
    mysqli_close($connect);
  }
?>
    <?php include('includes/header.php'); ?>
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
            
            <form action="addpost.php" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-9">
                <?php echo ErrorMessage(); ?>
                        <!-- Post Title-->
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Post Title</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <input name="posttitle" type="text" placeholder="Post title" class="form-control"></div>
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="card">
                            <div class="card-body">
                                
                                <textarea name="postbody" rows="15" type="text" id="editor" class="form-control"></textarea>
                                
                            </div>
                        </div> <!-- .card -->
                        
                        <!-- Create Button -->
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp; Create Post</button>
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