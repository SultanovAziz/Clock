<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/bnr-1.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--about-starts-->
<?php if ($brands): ?>
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <?php foreach ($brands as $brand): ?>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/<?=$brand->img; ?>" alt=""/>
                            <figcaption>
                                <h2><?= $brand->title; ?>></h2>
                                <p><?= $brand->description; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--about-end-->
<?php if ($hits): ?>
    <?php $currency = \clock\App::$app->getProperty('currency'); ?>
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                <?php for($i=0;$i<count($hits); $i++):?>
                    <div class="product-one">
                        <?php foreach ($hits[$i] as $hit): ?>
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?=$hit->alias; ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $hit->img; ?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3><a href="product/<?= $hit->alias; ?>"><?= $hit->title;  ?></a></h3>
                                        <p>Explore Now</p>
                                        <h4><a class="add-to-cart-link" href="cart/add?id<?=$hit->id;?>"><i></i></a> <span class=" item_price"> <?= $currency['symbol_left'].$hit->price*$currency['value'].$currency['symbol_right']; ?></span>
                                            <?php if($hit->old_price): ?>
                                                <small><del><b> <?= $hit->old_price*$currency['value']; ?></b></del></small>
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                    <div class="srch">
                                        <?php if($hit->old_price): ?>
                                            <span><?='A discount : ' .round((($hit->old_price-$hit->price)/$hit->old_price)*100) ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--product-end-->