<?php include_once("header.php"); ?>
<section>
    <div class="productSection">
        <div class="container produto-destaque-content" ng-controller="destaque-controller">
            <div id="destaque-produtos" class="owl-carousel owl-theme">
                <div class="item" ng-repeat="produto in produtos">
                    <div class="imgProduct">
                        <a href="produto-{{produto.id_prod}}">
                            <img src="img/{{produto.foto_principal}}" alt="">
                        </a>
                    </div>
                    <div class="infoProduct">
                        <h2>{{produto.nome_prod_longo}}</h2>
                        <div class="payment">
                            <p class="boleto">no boleto por:<span>R$</span></p>
                            <div class="value">
                                <p>{{produto.preco}}</p><span>,{{produto.centavos}}</span>
                            </div>
                        </div>
                        <div>
                            <p>
                                ou até {{produto.parcelas}}x de R$ {{produto.parcela}}
                                <br>
                                total a prazo R$ {{produto.total}}
                            </p>
                        </div>
                        <div class="btnBuyNow">
                            <i class="bi bi-cart3"></i><button>compre agora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="discountSection">
        <div class="chooseDiscount box-discount">
            <h3>escolha por desconto</h3>
        </div>
        <div class="box-discount">
            <h3>até</h3>
            <div class="discountValue">
                <span>40</span>
                <div class="porcentoff">
                    <div class="porcent">
                        <p>%</p>
                    </div>
                    <div class="off">
                        <p>OFF</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-discount">
            <h3>até</h3>
            <div class="discountValue">
                <span>60</span>
                <div class="porcentoff">
                    <div class="porcent">
                        <p>%</p>
                    </div>
                    <div class="off">
                        <p>OFF</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-discount">
            <h3>até</h3>
            <div class="discountValue">
                <span>80</span>
                <div class="porcentoff">
                    <div class="porcent">
                        <p>%</p>
                    </div>
                    <div class="off">
                        <p>OFF</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-discount">
            <h3>até</h3>
            <div class="discountValue">
                <span>85</span>
                <div class="porcentoff">

                    <div class="porcent">
                        <p>%</p>
                    </div>
                    <div class="off">
                        <p>OFF</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section ng-controller="destaque-controller">
    <div id="osMaisUsadosSection">
        <h2>os mais buscados</h2>
        <hr>
        <div class="productsMoreUsed">
            <div class="container">
                <div class="row">
                    <div class="product col-md-3" ng-repeat="produto in buscados">
                        <a href="produto-{{produto.id_prod}}">
                            <img src="img/{{produto.foto_principal}}" alt="">
                            <h3>{{produto.nome_prod_longo}}</h3>
                            <div>
                                <div class="stars" data-score="{{produto.media}}"></div>
                                <p>({{produto.reviews}})</p>
                            </div>
                            <h4>R$ {{produto.total}}</h4>
                            <p>{{produto.parcelas}}x de R$ {{produto.parcela}} sem juros</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>
<script>
    angular.module("shop", []).controller("destaque-controller", function($scope, $http) {

        $scope.produtos = [];
        $scope.buscados = [];

        var initCarousel = function() {
            $('#destaque-produtos').owlCarousel({
                loop: false,
                items: 1,
                nav: false,
                navText: ['<button id="btn-destaque-prev"><i class="bi bi-chevron-left"></i></button>', '<button id="btn-destaque-next"><i class="bi bi-chevron-right"></i></button>']
            });
            var owlDestaque = $("#destaque-produtos").data('owlCarousel');

            $('#btn-destaque-prev').on("click", function() {
                console.log("teste")
                owlDestaque.trigger('prev.owl.carousel');

            });

            $('#btn-destaque-next').on("click", function() {
                console.log("teste");
                owlDestaque.trigger('next.owl.carousel');
            });
        }

        $http({
            method: 'GET',
            url: 'produtos'
        }).then(function successCallback(response) {
            $scope.produtos = response.data;

            setTimeout(initCarousel, 1000);
        }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });

        var initStars = function() {
            $('.stars').each(function() {
                $(this).raty({
                    starHalf: "lib/raty-master/lib/images/star-half.png",
                    starOff: "lib/raty-master/lib/images/star-off.png",
                    starOn: "lib/raty-master/lib/images/star-on.png",
                    score: parseFloat($(this).data("score"))
                });
            });
        }

        $http({
            method: 'GET',
            url: 'produtos-mais-buscados'
        }).then(function successCallback(response) {

            $scope.buscados = response.data;
            console.log($scope.buscados)
            setTimeout(initStars, 1000);

        }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });


    });
</script>