<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="images/f_icon.png" alt=""/><span class="delivery">Free delivery services</span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="images/f_icon1.png" alt=""/><span class="delivery">Customer Service :<span class="orange"> (800) 000-2587 (freephone)</span></span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="images/f_icon2.png" alt=""/><span class="delivery">Fast delivery & free returns</span></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="wrap">
            <div class="section group">
                <div class="col_1_of_middle span_1_of_middle">
                    <div id="google_translate_element" style="margin:auto"></div><script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                        }
                    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap">
            <div class="section group">

                        <?php
                        $genres = $db->getGenre();
                        foreach ($genres as $key => $genre) {

                            if (((($key) % 5 == 0 || $key == 0) && $key != 4) ) {
                                echo '<div class="col_1_of_3 span_1_of_3 no-border"><ul class="sub_list">';
                                //echo 'start' . $key . ' ';
                            }
                            echo '<li><a href="shops/' . $genre['genre_name'] . '">' . $genre['genre_name'] . '</a></li>';
                            //echo $key;
                            if (($key) % 5  == 4 ) {
                                echo '</ul></div>';
                                //echo 'end' . $key . ' ';
                            }
                        }

                  ?>



                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="wrap">
            <p>© All rights reserved</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>