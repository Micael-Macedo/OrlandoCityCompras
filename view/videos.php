<?php include_once("header.php"); ?>
<section>
    <div class="videosSection">
        <h2>Videos</h2>
        <hr>
        <div class="videosContent">
            <video controls data-poster="img/highlights.jpg" id="player">
                <source src="video/highlights.mp4" type="video/mp4" />
            </video>
            <p>Volume</p>
            <input type="range" id="volumeVideo" min="0" max="1" step="0.01">
            <button type="button" id="btn-play-pause" class="btn btn-sucess">PLAY</button>
        </div>
    </div>
    <div class="newsContent owl-carousel owl-theme thumbnails">
        <div class="item" data-video="Orlando_City_Foundation_2015">
            <div class="cardNews item-inner">
                <img src="img/Orlando_City_Foundation_2015.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="highlights">
            <div class="cardNews item-inner">
                <img src="img/highlights.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="highlights">
            <div class="cardNews item-inner">
                <img src="img/highlights.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="Orlando_City_Foundation_2015">
            <div class="cardNews item-inner">
                <img src="img/Orlando_City_Foundation_2015.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="highlights">
            <div class="cardNews item-inner">
                <img src="img/highlights.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="Orlando_City_Foundation_2015">
            <div class="cardNews item-inner">
                <img src="img/Orlando_City_Foundation_2015.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
        <div class="item" data-video="highlights">
            <div class="cardNews item-inner">
                <img src="img/highlights.jpg" alt="" srcset="">
                <h3>Orlando City Adquires Goalkeep Joe Bendik From Toronto FC</h3>
            </div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>
<script>
    $(function() {
        $(".thumbnails .item").on("click", function() {
            $("video").attr({
                src: "video/" + $(this).data("video") + ".mp4",
                poster: "img/" + $(this).data("video") + ".jpg",
            });
        });

        $("#volumeVideo").on("mousemove", function() {
            $("video")[0].volume = $(this).val();
        });

        $("#btn-play-pause").on("click", function() {
            $(this).toggleClass("btn-sucess btn-danger");
            var video = $("video")[0];

            if ($(this).hasClass("btn-sucess")) {
                $(this).text("STOP");
                video.play();
            } else {
                $(this).text("PLAY");
                video.pause();
            }
        });
        $("#btn-bars .bi-list").on("click", function() {
            $("header").toggleClass("open-menu");
        });
        $("#close-menu-mobile  .bi-x").on("click", function() {
            $("header").removeClass("open-menu");
        });
        $("#btn-bars .bi-search").on("click", function() {
            $("#inputSearch").toggleClass("open-search");
        });
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