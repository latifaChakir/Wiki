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
					<div class="logo">
						<a href="/"><img src='img/logo.png' alt="logo" class="img-fluid"></a>
					</div>
					<ul class="nav flex-column">
						<li class="nav-item"><a class="nav-link" href="#">Main page</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Contents</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Featured content</a></li>
					</ul>
					<h3>Interaction</h3>
					<ul class="nav flex-column">
						<li class="nav-item"><a class="nav-link" href="#">Help</a></li>
						<li class="nav-item"><a class="nav-link" href="#">About</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Portal</a></li>
					</ul>
				</div>
			</nav>
			<div class="mainsection">
				<div class="headerLinks">
					<span class="user">Not logged in</span> <a href="#">Talk</a> <a href="#">Contributions</a> <a href="/register">Create account</a> <a href="/login">Log in</a>
				</div>
				<div class="tabs clearfix">
					<div class="tabsLeft">
						<ul>
							<li><a href="#" class="active">Article</a></li>
							<li><a href="#">Talk</a></li>
						</ul>
					</div>
					<div id="simpleSearch">
						<input type="text" name="searchInput" id="searchInput" placeholder="Search Wikipedia" size="12" />
						<div id="submitSearch"></div>
					</div>
					<div class="tabsRight">
						<ul>
							<li><a href="#" class="active">Read</a></li>
							<li><a href="#">View source</a></li>
							<li><a href="#">View history</a></li>
						</ul>
					</div>

				</div>
				<div class="article">


				</div>


				<div class="lavenderBox">
					<div class="header">Panel title</div>
					<div class="subtitle linklist"><a href="#">Lorem</a> <a href="#">Ipsum</a> <a href="#">Dolorestitas</a> </div>
					<div class="linklist">
						<a href="#">Percipit </a> <a href="#">Mnesarchum </a> <a href="#">Molestie </a> <a href="#">Phaedrum </a> <a href="#">Luptatum constituam </a> <a href="#">Habeo adipisci </a> <a href="#">Inani zril </a> <a href="#">Forensibus sea </a> <a href="#">Habeo adipisci </a> <a href="#">Minimum corrumpit </a> <a href="#">Regione suscipit </a> <a href="#">Has et partem </a><a href="#">Percipit </a> <a href="#">Mnesarchum </a> <a href="#">Molestie </a> <a href="#">Phaedrum </a> <a href="#">Luptatum constituam </a> <a href="#">Habeo adipisci </a> <a href="#">Inani zril </a> <a href="#">Vel nisl albucius </a> <a href="#">Habeo adipisci </a> <a href="#">Minimum corrumpit </a> <a href="#">Regione suscipit </a> <a href="#">Percipit maiestatis </a> <a href="#">Regione suscipit </a> <a href="#">Percipit maiestatis </a>
					</div>

					<div class="subtitle">Subtitle</div>
				</div>


				<?php foreach ($categories as $categorie) : ?>
					<div class="categories">
						<a href="#"><?php echo $categorie['nom']; ?></a>
					</div>
				<?php endforeach ?>
				<div class="pagefooter">
					This page was last edited on 29.07.2017 | Template by <a href="http://html5-templates.com/" target="_blank" rel="nofollow">HTML5 Templates</a> <!-- Please leave this link unchanged -->
					<div class="footerlinks">
						<a href="#">Privacy policy</a> <a href="#">About</a> <a href="#">Terms and conditions</a> <a href="#">Cookie statement</a> <a href="#">Developers</a>
					</div>
				</div>


			</div>
		</div>

		<script src="/build/js/script.js"></script>


</body>

</html>