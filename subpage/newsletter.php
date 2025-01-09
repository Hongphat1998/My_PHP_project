<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p><?php echo getText('subcribe_title'); ?></p>							
							<form method="post" action="index.php?mode=news&ac=dosendmail">
								<input class="input" type="email" name="email" placeholder="<?php echo getText('subcribe_plchlr'); ?>">
								<button class="newsletter-btn" name="sm-newsletter" value="Đăng ký"><i class="fa fa-envelope"></i> <?php echo getText('subcribe_btn'); ?></button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>