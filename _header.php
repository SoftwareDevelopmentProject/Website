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
            <ul><?php if($user == null) :?>
                    <li class="active"><a href="login.php">Sign up & Login</a></li>
                <?php else:?>
                    <li class="dropbox"><a href="#"><?php echo $user['member_name'];?></a>
                            <div class="dropdown-content">
                                 <a href="m-acc.php"><i class="fa fa-user" style="margin-right: 5px;"></i>My Account</a>
                                <a href="order_history.php"><i class="fa fa-th-list" style="margin-right: 5px;"></i>My Order</a>
                             </div>
                    </li>
                    <li class="active"><a href="logout.php">Logout</a></li>
                <?php endif;?>
                    <li>
                        <a class="fa fa-shopping-cart" aria-hidden="true" href="cart.php" style="text-decoration: none;color: black;font-size: 20px;"></a>
                    </li>
            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="header-bottom">
    <div class="wrap">
        <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li><a class="color1" href="index.php">Home</a></li>
            <li class="grid"><a class="color2" href="#">Shop</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <?php
                                    $genres = $db->getGenre();
                                    foreach($genres as $genre){
                                        echo '<li><a href="shops/'.$genre['genre_name'].'">'.$genre['genre_name'].'</a></li>';
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
                        <img src="images/Products/8.jpg" alt=""/>
                    </div>
                </div>
            </li>
            <li class="active grid"><a class="color4" href="new-arrival.php">New Arrivals</a>

            </li>
            <li><a class="color5" href="ratings.php">Top Ratings</a>

            </li>
            <li><a class="color6" href="about.php">About</a>
            </li>
            <li><a class="color7" href="contact.php">Contact</a>
            </li>
            <li><a class="color8" href="reward.php">Reward</a>

            </li>

        </ul>
        <div class="clear"></div>
    </div>
</div>