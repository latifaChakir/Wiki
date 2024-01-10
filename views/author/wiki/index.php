<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';?>

  <body class="nav-md">
            <?php include 'include/sidebar.php';?>
            <?php include 'include/menufooter.php';?>
          </div>
        </div>

        <?php include 'include/topnav.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-desktop"></i> Wikis Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>SLS-101-21</strong> <small class="text-success">Nov 5, 2021</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="/addWiki" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Wiki</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Category</th>
                          <th>Tags</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($wikis as $wiki) : ?>
                        <tr>
                          <td><?php echo $wiki['title'] ?></td>
                          <td><?php echo $wiki['content'] ?></td>
                          <td><?php echo $wiki['category_name'] ?></td>
                          <td><?php echo $wiki['tag_name'] ?></td>
                          <td>
                              <a href="/editWiki?id=<?php echo $wiki['wiki_id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                              <a href="/deleteWiki?id=<?php echo $wiki['wiki_id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                          </td>
                        </tr>
                        <?php endforeach?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <?php include 'include/footer.php';?>
  </body>
</html>
