<div class="article">
					<?php foreach($articles as $article):
						 ?>
					<h1><?php echo $article['title'];?></h1>
					<p class="siteSub">From Wikipedia, the free encyclopedia</p>
					<p class="roleNote">this article belongs to the category <strong><?php echo $article['category_name'];?></strong> </p>

					<div class="articleRight">
						<div class="articleRightInner">
						<?php
                        $imagePath = "img/" . $article['image_path'];
                        ?>
							<img src="<?php echo $imagePath; ?>" alt="pencil" />
						</div>
						This is a blue <a href="">pencil</a>
					</div>
					<p><?php echo $article['content'];?></p>
				
					<div class="contentsPanel">
						<div class="contentsHeader">Tags</div>
						<ul>
							<li>
							
								<a href="#"><?php echo $article['tag_name'];?></a>
								
							</li>
						</ul>
					</div>
					<?php endforeach?>
					<div class="lavenderBox">
						<div class="header">Panel title</div>
						<div class="subtitle linklist"><a href="#">Lorem</a> <a href="#">Ipsum</a> <a href="#">Dolorestitas</a> </div>
						<div class="linklist">
							<a href="#">Percipit </a> <a href="#">Mnesarchum </a> <a href="#">Molestie </a> <a href="#">Phaedrum </a> <a href="#">Luptatum constituam </a> <a href="#">Habeo adipisci </a> <a href="#">Inani zril  </a> <a href="#">Forensibus sea </a> <a href="#">Habeo adipisci </a> <a href="#">Minimum corrumpit </a> <a href="#">Regione suscipit </a> <a href="#">Has et partem </a><a href="#">Percipit </a> <a href="#">Mnesarchum </a> <a href="#">Molestie </a> <a href="#">Phaedrum </a> <a href="#">Luptatum constituam </a> <a href="#">Habeo adipisci </a> <a href="#">Inani zril  </a> <a href="#">Vel nisl albucius </a> <a href="#">Habeo adipisci </a> <a href="#">Minimum corrumpit </a> <a href="#">Regione suscipit </a> <a href="#">Percipit maiestatis </a> <a href="#">Regione suscipit </a> <a href="#">Percipit maiestatis </a>
						</div>
						
						<div class="subtitle">Subtitle</div>
					</div>
					
					<div class="categories">
						<a href="#">Minimum corrumpit </a> <a href="#">Regione suscipit </a> <a href="#">Has et partem </a>
					</div>
					
				</div>