<?php include_once("header.php"); ?>
<section>
    <div class="landingPage">
        <div>
            <h1>Orlando City</h1>
            <p>Orlando City Soccer Club</p>
        </div>
    </div>
</section>
<section>
    <div class="news">
        <h2>Latest News</h2>
        <hr>
        <div class="newsContent owl-carousel owl-theme">
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
            <div class="item">
                <div class="cardNews item-inner">
                    <img src="img/noticia-thumb.jpg" alt="" srcset="">
                    <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
                    <p>December 15, 2015</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="data">
        <div class="dataContent">
            <h3>61348</h3>
            <p>STADIUM CAPACITY</p>
        </div>
        <div class="dataContent">
            <h3>2010</h3>
            <p>FOUNDED</p>
        </div>
        <div class="dataContent">
            <h3>7th</h3>
            <p>EASTERN CONFERENCE</p>
        </div>
    </div>
</section>
<section>
    <div class="register">
        <h2>American can number one in Brazil</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quam possimus hic amet officia
            placeat eum nesciunt. Quo autem minima nam exercitationem ut accusantium, quis expedita
            magnam dolor numquam et. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quam
            possimus hic amet officia placeat eum nesciunt. Quo autem minima nam exercitationem ut
            accusantium, quis expedita magnam dolor numquam et.</p>
        <div class="btns">
            <button class="btnShop">Shop</button><button class="btnRegister">Register</button>
        </div>
    </div>
</section>
<?php include_once("footer.php");?>
<script>
    $(function(){
        $(".newsContent").owlCarousel({
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
            }
        }
    });
});
</script>