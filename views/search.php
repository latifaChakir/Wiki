<head>
	<?php include 'include/header.php'; ?>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wikipedia Template</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="/styles/styles.css">
</head>

<div class="article">
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

		<a href="/detail?id=<?php echo $article['wiki_id']; ?>">
			<h1><?php echo $article['title']; ?></h1>
		</a>
		<p class="siteSub">From Wikipedia, the free encyclopedia</p>
		<p class="roleNote">this article belongs to the category <strong><?php echo $article['category_name']; ?></strong> </p>

		<div class="articleRight">
			<div class="articleRightInner">
				<?php
				$imagePath = "img/" . $article['image_path'];
				?>
				<img src="<?php echo $imagePath; ?>" alt="pencil" />
			</div>
			This is a an image of <a href=""><?php echo $article['category_name']; ?></a>
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
	<?php endforeach; ?>


	<div class="pagination">
		<?php for ($page = 1; $page <= $totalPages; $page++) : ?>
			<a href="/search?search=&page=<?php echo $page; ?>" <?php echo ($currentPage == $page) ? 'class="active"' : ''; ?>><?php echo $page; ?></a>

		<?php endfor; ?>
	</div>



</div>