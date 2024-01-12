<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body class="nav-md">
  <?php $page = 'archive';
  include 'include/sidebar.php'; ?>
  <?php include 'include/menufooter.php'; ?>
  </div>
  </div>

  <?php include 'include/topnav.php'; ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="fa fa-file-text"></i> archives articles</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List of articles</h2>

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


                <!-- ... (your HTML code) ... -->

                <tbody>
                  <?php
                  $uniqueArticles = array();
                  foreach ($articles as $article) :
                    $articleId = $article['wiki_id'];
                    if (!isset($uniqueArticles[$articleId])) {
                      $uniqueArticles[$articleId] = $article;
                      $uniqueArticles[$articleId]['tags'] = array();
                    }
                    $uniqueArticles[$articleId]['tags'][] = $article['tag_name'];
                  endforeach;
                  ?>
                  <?php foreach ($uniqueArticles as $article) : ?>
                    <tr>
                      <td><?php echo $article['title'] ?></td>
                      <td><?php echo $article['content'] ?></td>
                      <td><?php echo $article['category_name'] ?></td>
                      <td>
                        <?php foreach ($article['tags'] as $tag) : ?>
                          
                            <?php echo $tag; ?>
                          
                        <?php endforeach; ?>
                      </td>
                      <td>
                        <a href="/archiveArticle?id=<?php echo $article['wiki_id']; ?>" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i> Archive</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>

                <!-- ... (the rest of your HTML code) ... -->

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <?php include 'include/footer.php'; ?>
</body>

</html>