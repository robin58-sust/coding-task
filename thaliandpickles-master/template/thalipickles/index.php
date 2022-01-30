<div id="wrapper">
    <section class="main-banner project-hero">
        <div id="carousel-example-generic" class="carousel slide topslider full-height" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <picture>
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_280.webp" media="(max-width: 280px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_360.webp" media="(min-width: 281px) and (max-width: 360px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_411.webp" media="(min-width: 361px) and (max-width: 411px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_540.webp" media="(min-width: 412px) and (max-width: 540px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_768.webp" media="(min-width: 541px) and (max-width: 768px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/banner_1024.webp" media="(min-width: 769px) and (max-width: 1024px)">
                        <source srcset="<?php echo $config['url']; ?>/images/banner/main_1857.webp" media="(min-width: 1025px) and (max-width: 1920px)">
                        <img src="<?php echo $config['url']; ?>/images/banner/main-banner.webp" height="800px" width="1920px" alt="image">
                    </picture>
                    <div class="slider-caption">
                        <div class="container">
                            <div class="row" style="margin-top: 120px;">
                                <div class="col-md-12">
                                    <div class="slider-text text-center">
                                        <h2 id="poem">Indian food delivery in Balham</h2>
                                        <h2 id="poem">Experience&nbsp; the&nbsp; true essence of Indian food</h2>
                                        <div class="hwrap">
                                            <div class="hmove">
                                                <div class="hslide">
                                                    <!-- <h3>Discounts</h3> -->
                                                    <h1 style="color:white;">Thali and Pickles</h1>

                                                    </span>
                                                </div>
                                                <div class="hslide">
                                                    <!-- <h3>Slide 2</h3> -->
                                                    <p>
                                                        <span class="">Get
                                                            <strong style="color:#f0b32b;"> 30% </strong> Discount (Not On Drinks) <br> On Reservation (Sunday - Thursday)
                                                    </p>
                                                    <p>Get <strong style="color:#f0b32b;"> 15% </strong> off on all online orders.</p>
                                                </div>
                                                <div class="hslide">
                                                    <!-- <h3>Slide 3</h3> -->
                                                    <p style="color:#f0b32b;">If you have any allergies please call us before placing your order</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="reviews-sec all-section ">

        <!-- <div class="text-center realistic-marker-highlight">
        <h2 class="ch2">Dis<span class="double-color">counts</span></h2>
          <p class="realistic-marker-highlight" style="color:#65450a;"><strong> 30% </strong> Discount (On Food Only, Not On Drink) <br> On Reservation ( Sunday - Thursday )</p>
          <p class="realistic-marker-highlight" style="color:#65450a;">Get <strong> 15% </strong> off on all online orders. Free poppodoms and chutney with every order</p>
      </div><br><br> -->
        <!-- <div class="text-center realistic-marker-highlight">
        <h2 class="ch2">Allergy <span class="double-color">Notice</span></h2>
          <p class="realistic-marker-highlight" style="color:#65450a;">If you have any allergies please call us before placing your order</p>
      </div> -->
      <div class="container">
          <div class="row">
              <div class="text-center " style="margin-top: 2rem;">
              <a href="<?=$config['base_url']?>/reservation.html" class="theme-btn ">Online Reservation</a>
              &nbsp;&nbsp;
              <a href="<?=$config['base_url']?>/orderonline_old.html" class="theme-btn ">Online Order</a>
              </div>
          </div>
      </div>
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 col-xs-12 ">
                    <div class="primary-heading text-center ">
                        <h2 class="review">Clients Revi<span class="double-color">ews</span></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="row ">
                <div class="col-md-12 col-xs-12 ">
                    <div class="testimonial-slider">
                        <?php $allreviews = $sql->query("SELECT  * FROM `tbl_review` order by `id` asc");
                        $j = 0;
                        foreach ($allreviews as $review) {
                            $j++;
                            if ($j > 0 && $review['description'] !== "") {
                        ?>
                        <div>
                            <div class="testi-box text-center ">
                              <div class="star-rating" style="color:#c99817;font-size: 26px;" data-starrating="5">
                              <i class="fas fa-star"></i>&nbsp;
                              <i class="fas fa-star"></i>&nbsp;
                              <i class="fas fa-star"></i>&nbsp;
                              <i class="fas fa-star"></i>&nbsp;
                              <i class="fas fa-star"></i> </div>
                                <p><?php echo $review['description']; ?></p>
                                <h4><span class="double-color"><?php echo $review['title']; ?></span></h4>
                            </div>
                        </div>
                        <?php }
                        } ?>
                    </div>
                    
                </div>
            </div>
        </div> -->
            <div class="demo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 ">
                            <div id="testimonial-slider" class="owl-carousel">
                                <!-- <div class="testimonial">
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus molestie, justo nec convallis sollicitudin, sapien lorem dictum lacus, non consequat odio ipsum nec est. Sed mattis egestas elementum. Nulla facilisi. Quisque placerat risus ac nunc ornare tincidunt. Sed quis faucibus nunc. Pellentesque accumsan arcu mi, eget venenatis mauris.
                                </p>
                                <h3 class="title">williamson</h3>
                                <span class="post">Web Developer</span>
                            </div> -->
                                <?php $allreviews = $sql->query("SELECT  * FROM `tbl_review` order by `id` asc");
                                $j = 0;
                                foreach ($allreviews as $review) {
                                    $j++;
                                    if ($j > 0 && $review['description'] !== "") {
                                ?>
                                        <div>
                                            <div class="testimonial">
                                                <div class="star-rating" style="color:#c99817;font-size: 26px;" data-starrating="5">
                                                    <i class="fas fa-star"><img src="<?php echo $config['url']; ?>/images/svg/star.svg" height="30px" width="30px"></i>&nbsp;
                                                    <i class="fas fa-star"><img src="<?php echo $config['url']; ?>/images/svg/star.svg" height="30px" width="30px"></i>&nbsp;
                                                    <i class="fas fa-star"><img src="<?php echo $config['url']; ?>/images/svg/star.svg" height="30px" width="30px"></i>&nbsp;
                                                    <i class="fas fa-star"><img src="<?php echo $config['url']; ?>/images/svg/star.svg" height="30px" width="30px"></i>&nbsp;
                                                    <i class="fas fa-star"><img src="<?php echo $config['url']; ?>/images/svg/star.svg" height="30px" width="30px"></i>
                                                </div>
                                                <p class="description"><?php echo $review['description']; ?></p>
                                                <h3 class="title"><span class="double-color1"><?php echo $review['title']; ?></span></h3>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="home-content home-about ">
        <div class="row ">
            <div class="content-wrap ">

                <h1 class="review text-center">Best Indian Foods in <span class="double-color">South West London</span></h1>
                <div class="su-row ">
                    <div class="su-column su-column-size-1-2 maxheight400 ">
                        <div class="su-column-inner su-u-clearfix su-u-trim ">
                            <div id="slida-container">
                                <div id="slida-1" class="samp-slider samp-slider-mask">
                                    <ul class="samp-container-horizontal">
                                        <li class="samp-container">
                                            <picture loading="lazy">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/280/2.webp" media="(max-width: 280px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/360/2.webp" media="(min-width: 281px) and (max-width: 360px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/411/2.webp" media="(min-width: 361px) and (max-width: 411px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/540/2.webp" media="(min-width: 412px) and (max-width: 540px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/768/2.webp" media="(min-width: 541px) and (max-width: 768px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/1024/2.webp" media="(min-width: 769px) and (max-width: 1024px)">
                                                <source srcset="<?php echo $config['url']; ?>/images/slider/2.webp" media="(min-width: 1025px) and (max-width: 1920px)">
                                                <img src="<?php echo $config['url']; ?>/images/slider/2.webp" height="627px" width="1048px">
                                            </picture>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="su-column su-column-size-1-2 ">
                        <div class="su-column-inner su-u-clearfix su-u-trim ">
                            <h2 class="best-food text-center"><small>Welcome to</small><br /> <span class="sitename">Thali and Pickles</span> </h2>
                            <p class="sitedetails" style="color: #555555">Thali and Pickles established in 2014 brings you delicious, tasty, and most traditional Indian Thali in London. We have top-class veterans specialized in Indian food. For the first time in history, we took an initiative to open Indian restaurant in South London located in Balham.</p>
                            <p class="sitedetails" style="color: #555555"> All the major Indian cuisines - traditional to continental you will find here from our distinguished delicacies of your preference. The use of natural, fresh, and top branded ingredients for preparation is our top priority. Visit our website to check our list of expansive Indian menus.</p>
                            <p class="sitedetails" style="color: #555555">Thali & Pickles is a family oriented business running by Abdul Mukith. He is a multifarious person having 25 years of experience with Indian restaurants. And this is how the idea of Thali and Pickles originated.The concept behind was to bring Indian Thali in London for Indian food lovers.&#8230;</p>
                            <p class="sitedetails" style="color: #555555"><a class="submit " title="About Thali and Pickles - Fine Indian Food " href="<?= $config['base_url'] ?>/about.html">More about us</a><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<section class="blog-sec all-section ">
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="theme-heading text-center ">
                    <h2>Our Food <span>Blogs</span></h2>
                    <div class="theme-h-before "><img height="40px" width="40px" class="img-responsive " src="<?php echo $config['url']; ?>/images/theme-h-before.png " alt="icon " /></div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12 ">
                <div class="blog-slider ">
                    <div class="card">
                        <div class=" blog-box ">
                            <img alt="image" height="220px" width="360px" data-sizes="auto" data-src="<?php echo $config['url']; ?>/images/thumb/shuslik.jpg" data-srcset="<?php echo $config['url']; ?>/images/thumb/360/shuslik.jpg 300w,
                                <?php echo $config['url']; ?>/images/thumb/1024/shuslik.jpg 600w,
                                <?php echo $config['url']; ?>/images/thumb/1024/shuslik.jpg 900w" class="lazyload">
                            <div class="blog-text ">
                                <p class="date "><i class="fa fa-clock-o " aria-hidden="true "></i> 27 Nov, 2020</p>
                                <h2>Chicken <span class="double-color">Shashlik </span></h2>
                                <a href="https://blog.thaliandpickles.co.uk/?p=159">Read More <i class="fa fa-arrow-right " aria-hidden="true "></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="blog-box ">
                            <img alt="image" height="220px" width="360px" data-sizes="auto" data-src="<?php echo $config['url']; ?>/images/thumb/chicken_tikka.jp" data-srcset="<?php echo $config['url']; ?>/images/thumb/360/chicken_tikka.jpg 300w,
                                <?php echo $config['url']; ?>/images/thumb/1024/chicken_tikka.jpg 600w,
                                <?php echo $config['url']; ?>/images/thumb/1024/chicken_tikka.jpg 900w" class="lazyload">
                            <div class="blog-text ">
                                <p class="date "><i class="fa fa-clock-o " aria-hidden="true "></i> 27 Nov, 2020</p>
                                <h2>Chicken <span class="double-color">tikka</span></h2>
                                <a href="https://blog.thaliandpickles.co.uk/?p=142">Read More <i class="fa fa-arrow-right " aria-hidden="true "></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="blog-box ">
                            <img alt="image" height="220px" width="360px" data-sizes="auto" data-src="<?php echo $config['url']; ?>/images/thumb/ch_65.jpg" data-srcset="<?php echo $config['url']; ?>/images/thumb/360/ch_65.jpg 300w,
                                <?php echo $config['url']; ?>/images/thumb/1024/ch_65.jpg 600w,
                                <?php echo $config['url']; ?>/images/thumb/1024/ch_65.jpg 900w" class="lazyload">
                            <div class="blog-text ">
                                <p class="date "><i class="fa fa-clock-o " aria-hidden="true "></i> 27 Nov, 2020</p>
                                <h2>Korhai <span class="double-color">Chicken</span></h2>
                                <a href="https://blog.thaliandpickles.co.uk/?p=66">Read More <i class="fa fa-arrow-right " aria-hidden="true "></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>