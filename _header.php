<?php

include_once 'include/DbFunction.php';
$db = new DbFunction();

if(isset($_SESSION['user'])) {
  $user = $db->getmember();
} else {
    $user = null;


}

?>


<div class="header-top">
    <div class="wrap">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt=""/></a>
        </div>
        <div class="cssmenu">
            <ul>


<?php if($user == null) :?>
    <li class="active"><a href="login.php">Sign up & Login</a></li>
                <?php else:?>
    <li class="dropbox"><a href="#"><?php echo $user['member_name'];?></a>
        <div class="dropdown-content">
            <a href="m-acc.php">My Account</a>
            <a href="#">My Order</a>
            <a href="#">Reward &amp; Point</a>
        </div></li>

    <li class="active"><a href="logout.php">Logout</a></li>
                <?php endif;?>


            </ul>
        </div>
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="active-icon c2" href="#"> </a>
                <ul class="sub-icon2 list">
                    <li><h3>Products</h3><a href="shop.php"></a></li>
                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                </ul>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="header-bottom">
    <div class="wrap">
        <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li><a class="color1" href="index.php">Home</a></li>
            <li class="grid"><a class="color2" href="shop.php">Shop</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <?php
                                    $genres = $db->getGenre();
                                    foreach($genres as $genre){
                                        echo '<li><a href="shop/'.$genre['genre_name'].'">'.$genre['genre_name'].'</a></li>';


                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="h_nav">

                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">

                            </div>
                        </div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <img src="images/nav_img.jpg" alt=""/>
                    </div>
                </div>
            </li>
            <li class="active grid"><a class="color4" href="new-arrival.php">New Arrivals</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>shop</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>help</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>my company</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>account</h4>
                                <ul>
                                    <li><a href="shop.php">login</a></li>
                                    <li><a href="shop.php">create an account</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                    <li><a href="shop.php">my shopping bag</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <img src="images/nav_img1.jpg" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col2"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                    </div>
                </div>
            </li>
            <li><a class="color5" href="ratings.php">Top Ratings</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">login</a></li>
                                </ul>
                            </div>
                            <div class="h_nav">
                                <h4 class="top">man</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>style zone</h4>
                                <ul>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <img src="images/nav_img2.jpg" alt=""/>
                    </div>
                </div>
            </li>
            <li><a class="color6" href="about.php">About</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>shop</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                </ul>
                            </div>
                            <div class="h_nav">
                                <h4 class="top">my company</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>man</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>help</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>account</h4>
                                <ul>
                                    <li><a href="shop.php">login</a></li>
                                    <li><a href="shop.php">create an account</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                    <li><a href="shop.php">my shopping bag</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>my company</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col2"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                    </div>
                </div>
            </li>
            <li><a class="color7" href="contact.php">Contact</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>shop</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>help</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>my company</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>account</h4>
                                <ul>
                                    <li><a href="shop.php">login</a></li>
                                    <li><a href="shop.php">create an account</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                    <li><a href="shop.php">my shopping bag</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                    <li><a href="shop.php">create wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>my company</h4>
                                <ul>
                                    <li><a href="shop.php">trends</a></li>
                                    <li><a href="shop.php">sale</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col2"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                    </div>
                </div>
            </li>
            <li><a class="color8" href="#">Shop</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>style zone</h4>
                                <ul>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">women</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">brands</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">men</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">login</a></li>
                                </ul>
                            </div>
                            <div class="h_nav">
                                <h4 class="top">man</h4>
                                <ul>
                                    <li><a href="shop.php">new arrivals</a></li>
                                    <li><a href="shop.php">accessories</a></li>
                                    <li><a href="shop.php">kids</a></li>
                                    <li><a href="shop.php">style videos</a></li>
                                </ul>
                            </div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
            </li>

        </ul>
        <div class="clear"></div>
    </div>
</div>