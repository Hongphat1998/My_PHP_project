<?php
	if(!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include "config/config.php";
	include ROOT."/include/function.php";
	spl_autoload_register("loadClass");	
?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Thông tin sản phẩm</title>

		<link rel="shortcut icon" href="img/favicon.png">
 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
	<body onload="SetDefault();">
		<?php include 'mode.php'; ?>
		<?php
			$final_rate = 0;
			if(isset($arr_rate)&&count($arr_rate)){
				$total_rate = 0;
				$count_rate  = 0;
				foreach ($arr_rate as $key => $value) {
					$total_rate += $key*$value;
					$count_rate += $value;
				}
				$final_rate = ceil($total_rate/$count_rate);
			}
			$str_rate = '';
			for ($i=0; $i < 5 ; $i++) { 
				if($i < $final_rate) $str_rate.= "<i class='fa fa-star'></i>";
				else $str_rate .= "<i class='fa fa-star-o'></i>";
			}
		?>
		<!-- HEADER -->
		<?php include 'subpage/header.php'; ?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<?php include_once 'subpage/navigation.php'; ?>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<?php include_once 'subpage/breadcrumb.php'; ?>		
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./image/<?php echo $product['product_img']; ?>" alt="">
							</div>
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $product['product_name'];?></h2>
							<div>
								<div class="product-rating">
									<?php echo $str_rate;?>
								</div>
								<a class="review-link" href="#reviews"><span id="count-comment-first"><?php echo isset($count_comment)?$count_comment:0; ?></span> <?php echo getText('cmt'); ?> | <?php echo getText('add_cmt'); ?></a>
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format($product['product_price'],0,'',',').' <sup>đ</sup>'; ?></h3>
								<span class="product-available"><?php echo getText('big_deal'); ?></span>
							</div>
							<p><?php echo nl2br($product['product_description']);?></p>
							
							<div class="add-to-cart">
								<div class="row">
									<div class="col-xs-3">
										<h4 style='margin-top:8px'><?php echo getText('qty'); ?> &nbsp;</h4>
									</div>									
									<div class="col-xs-2">
										<div class='form-group'>
										<input class='form-control' id='quantity' type="number" value='1' min='1' max='99'>
										</div>
									</div>

									<div class="col-xs-7">	
										<button class='add-to-cart-btn' id='quantity-cart' 
										onClick="AddProductToCart(
										<?php echo $product['product_id'];?>,
										'<?php echo $product['product_name'];?>',
										<?php echo $product['product_price'];?>,
										'<?php echo $product['product_img'];?>',
										'<?php echo $product['cat_name'];?>',
										1)">
											<i class='fa fa-shopping-cart'></i> <?php echo getText('add_cart'); ?>
										</button>										
									</div>
								</div>																
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> <?php echo getText('add_wishlist'); ?></a></li>
						
							</ul>
							<ul class="product-links">

								<li><?php echo getText('cat'); ?>:</li>
								<li><a href="store.php?cat-id=<?php echo $product['cat_id']; ?>&key=&mode=product&ac=search&basic-search=Search"><?php echo $product['cat_name']; ?></a></li>
								
							</ul>

							<ul class="product-links">
								<li><?php echo getText('share'); ?>:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1"><?php echo getText('detail_info'); ?></a></li>	
								<li><a data-toggle="tab" href="#tab2" ><?php echo getText('cmt'); ?> (<span id="count-comment-last"><?php echo isset($count_comment)?$count_comment:0; ?></span>)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo nl2br($product['product_detail']);?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab3  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
												<?php
													// $final_rate = 0;
													// if(isset($arr_rate)&&count($arr_rate)){
													// 	$total_rate = 0;
													// 	$count_rate  = 0;
													// 	foreach ($arr_rate as $key => $value) {
													// 		$total_rate += $key*$value;
													// 		$count_rate += $value;
													// 	}
													// 	$final_rate = ceil($total_rate/$count_rate);
													// 	echo $final_rate;
													// }
													// else echo '0';
													echo isset($final_rate)?$final_rate:0;
												?>
													<span></span>
													<div class="rating-stars">
													<?php 
														// if(isset($final_rate)){
														// 	for ($i=0; $i < 5 ; $i++) { 
														// 		if($i < $final_rate) echo "<i class='fa fa-star'></i>";
														// 		else echo "<i class='fa fa-star-o'></i>";
														// 	}
														// }
														echo isset($final_rate)?$str_rate:'';
													?>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo isset($arr_rate['5'])&&isset($total_rate)?ceil((($arr_rate['5']*5)/$total_rate)*100):'0';?>%;"></div>
														</div>
														<span class="sum"><?php echo isset($arr_rate['5'])?$arr_rate['5']:0; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo isset($arr_rate['4'])&&isset($total_rate)?ceil((($arr_rate['4']*4)/$total_rate)*100):'0';?>%;"></div>
														</div>
														<span class="sum"><?php echo isset($arr_rate['4'])?$arr_rate['4']:0; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo isset($arr_rate['3'])&&isset($total_rate)?ceil((($arr_rate['3']*3)/$total_rate)*100):'0';?>%;"></div>
														</div>
														<span class="sum"><?php echo isset($arr_rate['3'])?$arr_rate['3']:0; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo isset($arr_rate['2'])&&isset($total_rate)?ceil((($arr_rate['2']*2)/$total_rate)*100):'0';?>%;"></div>
														</div>
														<span class="sum"><?php echo isset($arr_rate['2'])?$arr_rate['2']:0; ?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: <?php echo isset($arr_rate['1'])&&isset($total_rate)?ceil(($arr_rate['1']/$total_rate)*100):'0';?>%;"></div>
														</div>
														<span class="sum"><?php echo isset($arr_rate['1'])?$arr_rate['1']:0; ?></span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
												<?php
												if(isset($arr_comments)){
													foreach ($arr_comments as $value) {
														$str_rate = '';
														for ($i=0; $i < 5; $i++) { 
															if($i < $value['comment_rate']) $str_rate .= '<i class="fa fa-star"></i>';
															else $str_rate .= '<i class="fa fa-star-o empty"></i>';
														}
														$date_mix = explode(' ',$value['comment_date']);
														$date_int= explode('-',$date_mix[0]);																								                 $date = mktime(0,0,0,$date_int[1],$date_int[2],$date_int[0]);
										                 $true_date = date('d-m-Y',$date);
														echo " <li>
																<div class=\"review-heading\">
																	<h5 class=\"name\">".(strlen($value['user_id'])<14?$value['user_id']:substr($value['user_id'],0,13).'...')."</h5>
																	<p class=\"date\">$true_date {$date_mix[1]}</p>
																	<div class=\"review-rating\">
																		".$str_rate."
																	</div>
																</div>
																<div class=\"review-body\">
																	<p>".nl2br($value['comment_content'])."</p>
																</div>
															</li>";
													}
												}
												?>													
												</ul>

												<ul class="reviews-pagination">
												<?php
													for($i=1; $i<=$comments_clt->getPageCount(); $i++)
													{
														if($i == $page) echo "<li id='$i' class='active'>$i</li>";
														else echo "<li id='$i' onClick='SwitchPageComment($i,$product_id)'>$i</li>";
														//echo "<li id='$i' onClick='SwitchPageComment($i)'>$i</li>";
													}
												?>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
											
												<form class="review-form" action="comment_ajax.php" method='get'> 													
													<textarea id="comment-content" name="comment-content" class="input" placeholder="Viết bình luận"></textarea>
													<div class="input-rating">
														<span>Đánh giá: </span>
														<div class="stars">															
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>															
														</div>									
													</div>
													<?php
														echo "<button type=\"button\" onClick=\"AddComment($product_id)\" class=\"primary-btn\">Bình luận</button>";
													?>
													
													<div id='result'></div>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<!-- Related Products -->
							<h3 class="title"><?php echo getText('related_prod'); ?></h3>
						</div>
					</div>

					<!-- product -->
					<?php 
						foreach ($related_products as $value) {
							echo '<div class="col-md-3 col-xs-6">
									<div class="product">
										<div class="product-img">
											<img src="./image/'.$value['product_img'].'" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">'.$value['cat_name'].'</p>
											<h3 class="product-name"><a href="product.php?mode=detail&id='.$value['product_id'].'">'.$value['product_name'].'</a></h3>
											<h4 class="product-price">'.number_format($value['product_price'],0,'',',').'<sup> đ</sup></h4>
											<div class="product-rating">
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button 
											onClick="AddProductToCart('.$value['product_id'].',\''.$value['product_name'].'\','.$value['product_price'].',\'aaaaaaaaaa.jpg\',\''.$value['cat_name'].'\')" class="add-to-cart-btn">											
											<i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
								</div>';
								
						}
					?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		<?php include 'subpage/newsletter.php';?>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include 'subpage/footer.php';?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script>
			function flyToElement(flyer, flyingTo) {
			    var $func = $(this);			      			      
			    // Nhân bản đối tượng(hình ảnh) sẽ bay vào giỏ hàng
			    var flyerClone = $(flyer).clone();
			    
			    // Thiết lập đối tượng nhân bản này trùng với đối tượng thực tế 
			    $(flyerClone).css({
			        position: 'absolute',
			        top: $(flyer).offset().top + 35 + "px",
			        left: $(flyer).offset().left + 35 + "px",
			        opacity: 1,
			        'z-index': 99999,
			        width:'150px',
			        height:'150px'
			    }).appendTo($('body'));

			    // Lấy về tọa độ của giỏ hàng
			    var gotoX = $(flyingTo).offset().left;
			    var gotoY = $(flyingTo).offset().top;

			    // Hiệu ứng bay vào giỏ hàng
			    $(flyerClone).animate({
			        opacity: 0.4,
			        left: gotoX,
			        top: gotoY,
			        width: $(flyingTo).width(),
			        height: $(flyingTo).height()
			    }, 700,
			    function () {
			         $(flyerClone).fadeOut('slow', function () {
			              	 $(flyerClone).remove();
			          });             
			    });
			}        

			$('.add-to-cart-btn').click(function(){
			    var $_this = $(this);
			    var itemImg = $(this).closest('.product').find('img').eq(0);				    
			    flyToElement($(itemImg), $('#shopping-cart'));
			});
		</script>		
	</body>
</html>
