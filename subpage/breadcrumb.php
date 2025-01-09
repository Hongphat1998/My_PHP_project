<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php"><?php echo getText('index'); ?></a></li>
                    <li><a href="store.php"><?php echo getText('cat'); ?></a></li>							
                    <li class="active"><?php echo getText('prod'); ?> (<?php echo isset($count_item)?$count_item:0; ?> kết quả tìm kiếm) <?php echo isset($basic_key)&&$basic_key!=''?" với từ khoá: <strong style='color:red; font-size:140%;'>$basic_key</strong>":''; ?></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>