<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include 'include/header.php'; ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wikipedia Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/styles.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                </div>
            </nav>
            <div class="mainsection">

                <div class="tabs clearfix">
                    <div class="tabsLeft">
                        <ul>
                            <li><a href="/" class="active"><i class="fa fa-arrow-left"></i>
                                </a></li>

                        </ul>
                    </div>
                    <div id="simpleSearch">
                    </div>
                </div>
                <div class="article">
                    <?php
                    $uniqueArticles = array();
                    foreach ($article as $article) :
                        // dump($article);
                        $articleId = $article['wikis_id'];
                        if (!isset($uniqueArticles[$articleId])) {
                            $uniqueArticles[$articleId] = $article;
                            $uniqueArticles[$articleId]['tags'] = array();
                        }
                        $uniqueArticles[$articleId]['tags'][] = $article['tag_name'];
                    endforeach;
                    ?>

                    <?php foreach ($uniqueArticles as $article) : ?>

                        <h1><?php echo $article['title']; ?></h1>
                        <p class="siteSub">Created At <strong><?php echo $article['creation_date']; ?></strong></p>
                        <p class="roleNote">this article belongs to the category <strong><?php echo $article['category_nam']; ?></strong> </p>

                        <div class="articleRight">
                            <div class="articleRightInner">
                                <?php
                                $imagePath = "img/" . $article['image_path'];
                                ?>
                                <img src="<?php echo $imagePath; ?>" alt="pencil" />
                            </div>
                            This is a an image of <a href=""><?php echo $article['category_nam']; ?></a>
                        </div>
                        <p><?php echo $article['content']; ?></p>

                        <div class="contentsPanel">
                            <div class="contentsHeader">Tags</div>
                            <ul>
                                <?php foreach ($article['tags'] as $tag) : ?>
                                    <li>
                                        <a href="#"><?php echo $tag; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php
                        if (isset($article['update_date'])) {
                            echo '<p class="siteSub">Modified At <strong>' . $article['update_date'] . '</strong></p>';
                        }
                        ?>
                        <p class="siteSub">Created by <strong><?php echo $article['username']; ?></strong></p>
                        <p class="siteSub"><i class="fa fa-envelope"></i>
                            <strong><?php echo $article['email']; ?></strong>
                        </p>
                    <?php endforeach; ?>

                </div>



            </div>
        </div>

        <style>
            #simpleSearch {
                border: none !important;
                ;
                background: #F6F6F6;
            }
        </style>

</body>

</html>