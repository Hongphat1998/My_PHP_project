<div class="back-to-top"><i class="fa fa-chevron-up"></i></div>
<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +0938-900-000</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> hongphat701@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 180 Cao Lỗ</a></li>
            </ul>            

            <ul class="header-links pull-right">
                <li>            
                    <a href="<?php echo BASE_URL; ?>/module/languages/switch.php?lang=en"><img src="<?php echo BASE_URL;?>/img/us_flag.png" alt=""> <?php echo getText('en');?></a>                      
                </li>
                <li><a href="<?php echo BASE_URL; ?>/module/languages/switch.php?lang=vi"><img src="<?php echo BASE_URL;?>/img/vn_flag.png" alt=""> <?php echo getText('vi');?></a></li>
                <li><a href="user"><i class="fa fa-dollar"></i> <?php echo getText('check_order');?></a></li>
                <?php
                    //$email = isset($_COOKIE['user_email'])?$_COOKIE['user_email']:'';
                    $name = isset($_SESSION['user'])?$_SESSION['user']['user_id']:'';
                    if($name != '') 
                        echo "<li><a><i class='fa fa-user-o'></i>".getText('welcome').", $name</a></li>
                              <li><a href='index.php?mode=exit'><i class='fa fa-sign-out'></i>".getText('logout')."</a></li>";
                    else 
                     echo "<li><a href='subpage/login.php'><i class='fa fa-user-o'></i>".getText('login')."</a></li>";
                ?>
               
            </ul>
        </div>
    </div>
    <div id="header">
    
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <img src="./img/logo.png" alt="logo" title="Hồng Thuận Phát">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action='store.php' method='get'>
                            <select class="input-select" name='cat-id'>
                               <option value='all'></i><?php echo getText('all_cat');?></option>
                                <?php
                                    $cats_clt = new Category();
                                    $cats_clt->setPageSize(20);
                                    $arr_cats = $cats_clt->getAll();
                                    foreach ($arr_cats as $value) {
                                        echo "<option value='{$value['cat_id']}'>{$value['cat_name']}</option>";
                                    }
                                ?>
                            
                                    
                            </select>
                            <input class="input" name='key' placeholder="<?php echo getText('search_plchldr');?> . . . . ">
                            <input type='hidden' name='mode' value='product'>
                            <input type='hidden' name='ac' value='search'>
                            <button class="search-btn" name='basic-search' value='Search'></i> <?php echo getText('search_btn');?></button>
                        </form>                    
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                    
                        <div onClick='ShowWishList()' id='btn-wishlist'>
                            <a>
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo getText('wish_list');?></span>
                                <div class="qty cart"><?php echo isset($_SESSION['wishlist'])?count($_SESSION['wishlist']):0; ?></div>
                            </a>
                           
                        </div>
                        <!-- /Wishlist -->
                                    
                        <!-- Cart -->
                        <?php
                            if(isset($_SESSION['shopping-cart'])){
                                $count = 0;
                                $total = 0;
                                $str = '';
                                foreach ($_SESSION['shopping-cart'] as $key => $value) {                                    
                                    $str .= "<div class='product-widget'>
                                                <div class='product-img'>
                                                    <img src='./image/{$value['image']}' alt=''>
                                                </div>
                                                <div class='product-body'>
                                                    <h3 class='product-name'><a href='#'>{$value['name']}</a></h3>
                                                    <h4 class='product-price'><span class='qty'>{$value['quantity']}x</span>".number_format($value['price'],0,'',',')."<sup>đ</sup></h4>
                                                </div>
                                                <button class='delete' onClick=\"RemoveProductToCart('$key')\"><i class='fa fa-close'></i></button>
                                            </div>";
                                    $count += $value['quantity'];
                                    $total += $value['quantity']*$value['price'];
                                }
                            }
                            
                        ?>
                        <div class="dropdown" id='shopping-cart'>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo getText('shopping_cart');?></span>
                                <div class="qty cart"><?php echo isset($_SESSION['shopping-cart'])?$count:0; ?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">                                   
                                    <?php
                                       echo isset($str)?$str:'';                                        
                                    ?>       
                                     
                                </div>
                                <div class="cart-summary">
                                    <small><?php echo isset($_SESSION['shopping-cart'])?$count:0; ?> <?php echo getText('selected_items'); ?></small>
                                    <h5><?php echo getText('total_cart'); ?>: <?php echo isset($total)?number_format($total,0,'',','):0; ?> đ</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="./cart.php"><?php echo getText('check_cart');?></a>
                                    <a href="./checkout.php"><?php echo getText('checkout');?> <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                    
                </div>
                <!-- /ACCOUNT -->
            </div>

            <!-- row -->
        </div>
        <!-- container -->
        

    </div>
    <div id="wishlist" class="scrollmenu">
         <?php
            if(isset($_SESSION['wishlist'])){
                //Duyệt ngược    
                foreach ($_SESSION['wishlist'] as $key => $value) {
                    echo '<div class="product-wishlist">
                            <div class="product-wishlist-img">
                                <img src="../image/'.$value['image'].'" alt="">
                            </div>
                            <div class="product-wishlist-name">'.$value['name'].'</div>
                        </div>';           
                }         
            }
        ?>       
    </div>
</header>