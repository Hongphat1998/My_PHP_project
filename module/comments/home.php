<?php
    //echo "This is Home Comment";
    $product_id = getIndex('id');
    if($product_id != ''){
        $page = getIndex('page',1);
        $arr_comments = $comments_clt->getCommentByProductId($page,$product_id);
        $arr_rate = $comments_clt->rating_AVG($comments_clt->getCommentByProductId(-1,$product_id));    
        $count_comment = $comments_clt->getCount();

        $products_clt = new Product();
		$product = $products_clt->searchById($product_id);
		
		//var_dump($product);

		$products_clt->setPageSize(4);
		$related_products = $products_clt->basic_seachByCategory(1,'',$product['cat_id']);
		//var_dump($related_products);
    }  
	else {
		echo "<script>alert('ID sản phẩm ko hợp lệ!'); window.location.href = 'store.php';</script>";
		exit;
	}
?>