<head>
	<link type="text/css" href="<?php base()?>dist/css/album.css" rel="stylesheet">
</head>
<div class="wrap-content">
	<div class="global-container">
		<section class="content-header">
			<h1>
				Album Name
				<span class="input-sm">pictures</span>
			</h1>
			<span><?php echo $albumDescription;?></span>
		</section>
		<section id="blog-section" >
		  	<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<aside>
								<form action="<?php base();?>multi-upload.php" method="post" class="multi-upload" enctype='multipart/form-data'>
									<div class="pic-container">
										<div class="upload-multi">
											<span>
												<center><h3>Upload Pictures</h3></center>
												<p>Upload Multiple pictures here in this album!</p>
											</span>
											<div class="album-form">
												<center><label for="upload"><i class="fa fa-plus"></i></label></center>
												<input type='file' class='input-file-group disable' name='files[]' id='upload' multiple>

											</div>
										</div>
									</div>
									<div class="content-title">
										<div class="text-center">
											<input type="hidden" name="albumid" value="">
											<h3><button type="submit" name="upload-multi"><a>Upload photos</a></button></h3>
										</div>
									</div>
								</form>
								<div id="status"></div>
							</aside>
						</div>
					</div>
				</div>
				<?php
					$sql2 = DB::getInstance()->get('alb_pics', array('albumid', '=', $render[3]));
					foreach($sql2->results() as $sql2){
						$picName = $sql2->picName;
						$uploadDate = $sql2->uploadDate;
						getpics($picName, $uploadDate);
					}
				?>

	<!--===========// Other Albums===========-->

				<!--<div class="col-lg-4">
					<div class="widget-sidebar">
						<h2 class="title-widget-sidebar">// Other Albums</h2>
						<div class="content-widget-sidebar">
							<ul>
								<li class="recent-post">
									<div class="post-img">
										<img src="https://lh3.googleusercontent.com/-ndZJOGgvYQ4/WM1ZI8dH86I/AAAAAAAADeo/l67ZqZnRUO8QXIQi38bEXuxqHfVX0TV2gCJoC/w424-h318-n-rw/thumbnail8.jpg" class="img-responsive">
									</div>
									<a href="#"><h5>Album Name</h5></a>
									<p><small><i class="fa fa-calendar" data-original-title="" title=""></i> Discription</small></p>
								</li>
								<hr>
							</ul>
						</div>
					</div>
				</div>-->
			</div>
		</section>
	</div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="<?php base();?>dist/js/ajax.js"></script>
		<?php
			function getpics($picName, $uploadDate){
		?>
		<div class="col-lg-6 col-md-6">
			<aside>
				<img src="<?php base()?>uploads/<?php echo $albumName;?>" class="img-responsive">
				<div class="content-footer">
					<span class="pull-left content-footer-wid">
						<a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>
						<a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments" ></i> 30</a>
					</span>
					<span class="pull-right">
						<div class="dropup pull-right content-footer-wid">
							<a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown" title="More Options"><i class="ion-more" style="color: white;"></i></a>
							<ul class="dropdown-menu dropdown-menu-photos">
								<li><a href="#" style="color: black;">HTML</a></li>
								<li><a href="#" style="color: black;">CSS</a></li>
								<li><a href="#" style="color: black;">JavaScript</a></li>
								<li class="divider"></li>
								<li><a href="#" style="color: black;">About Us</a></li>
							</ul>
						</div>
					</span>
				</div>
			</aside>
		</div>
		<?php
			}
		}
	} echo "This album does not belong to you.";
?>
