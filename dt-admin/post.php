<?php
    include('core/index.php');
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
                        <li><a href="#">Table</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="addpost.php" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp; Add New Post</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    global $connect;
                                    $ViewQuery = "SELECT * FROM dt_category ORDER BY datetime desc";
                                    $Execute = mysqli_query($connect, $ViewQuery);

                                    while ($DataRows = mysqli_fetch_array($Execute)) {
                                        $Id = $DataRows['category_id'];
                                        $Category_name = $DataRows['category_name'];
                                        $Author = $DataRows['creator_name'];

                                    ?>
                                    <tr>
                                        <td><?php echo $Category_name; ?></td>
                                        <td><?php echo $Author; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php include('includes/footer.php'); ?>
