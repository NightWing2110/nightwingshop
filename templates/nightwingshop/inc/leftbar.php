                <!-- Main Slider Start -->
                <div class="header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Danh Mục Sản Phẩm
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM cat WHERE parent_id = 0");
                                    while ($rowCat = mysqli_fetch_assoc($query)) {
                                        $cat_id = $rowCat['cat_id'];
                                    ?>
                                        <li><a href="cat.php?cat_id=<?php echo $cat_id ?>"><?php echo $rowCat['name'] ?></a>
                                            <div>
                                                <ul>
                                                    <?php
                                                    $query1 = mysqli_query($mysqli, "SELECT * FROM cat WHERE parent_id = $cat_id");
                                                    while ($rowCat1 = mysqli_fetch_assoc($query1)) {
                                                    ?>
                                                        <li><a href="cat.php?cat_id=<?php echo $cat_id ?>"><?php echo $rowCat1['name'] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>

                            </div>
                            <div class="col-md-6">
                                <div class="header-slider normal-slider">
                                    <div class="header-slider-item">
                                        <img src="templates/nightwingshop/img/TV-slider.png" alt="Slider Image" />
                                        <div class="header-slider-caption">
                                            <p>Giảm giá sốc khi mua online</p>
                                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                    </div>
                                    <div class="header-slider-item">
                                        <img src="templates/nightwingshop/img/giadunggiare-slider.png" alt="Slider Image" />
                                        <div class="header-slider-caption">
                                            <p>Đồ gia dụng giá rẻ</p>
                                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                    </div>
                                    <div class="header-slider-item">
                                        <img src="templates/nightwingshop/img/tulanh-slider.png" alt="Slider Image" />
                                        <div class="header-slider-caption">
                                            <p>Tủ lạnh </p>
                                            <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="header-img">
                                    <div class="img-item">
                                        <img src="templates/nightwingshop/img/cat1-slider.png" />
                                        <a class="img-text" href="#">
                                        </a>
                                    </div>
                                    <div class="img-item">
                                        <img src="templates/nightwingshop/img/samsung-slider.png" />
                                        <a class="img-text" href="#">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Slider End -->