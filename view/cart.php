<?php include_once("header.php"); ?>
<section>
    <div class="cartSection" ng-controller="carrinho-controller">
        <h1>Carrinho de compras</h1>
        <hr>
        <div class="cart-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Produto(s)</th>
                        <th>Quantidade</th>
                        <th>Entrega</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="produto in produtos">
                        <td class="productImage"><img src="img/{{produto.foto_principal}}" alt="" srcset=""></td>
                        <td class="productName">{{produto.nome_prod_longo}}</td>
                        <td>
                            <button ng-click="addQtd(produto)" type="button"><i class=" bi bi-chevron-up"></i></button>
                            <p ng-model="produto.qtd_car"></p>
                            <button ng-click="removeQtd(produto)" type="button"><i class=" bi bi-chevron-down"></i></button>
                        </td>
                        <td>Entrega para o CEP: {{carrinho.cep}}</td>
                        <td>R$ {{produto.preco}}</td>
                        <td>R$ {{produto.total}}</td>
                        <td><button ng-click="removeAll(produto)" style="color:blueviolet">X</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container shippingProducts">
            <div class="infoCart">
                <div class="calculateFreight">
                    <h2>Simule seu frete para seu CEP abaixo:</h2>
                    <div class="input-zip-code">
                        <input type="text">
                        <button>Calcular Frete</button>
                    </div>
                </div>
                <div class="summaryCart">
                    <div class="CartValue">
                        <p>
                            Subtotal ({{carrinho.qtd_prod}} item):
                            <br>
                            <br>
                            Frete:
                        </p>
                        <p>
                            R$: {{carrinho.subtotal}}
                            <br>
                            <br>
                            R$: {{carrinho.frete}}
                        </p>
                    </div>
                    <hr>
                    <div class="totalCart">
                        <p>Total:</p>
                        <p>R$ {{carrinho.total}}</p>
                    </div>
                </div>
            </div>
            <button class="btn-buy">comprar</button>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>
<script>
    angular.module("shop", []).controller("carrinho-controller", function($scope, $http) {

        var carregarCarrinho = function() {

            $http({
                method: 'GET',
                url: 'carrinho-dados'
            }).then(function(response) {

                $scope.carrinho = {
                    cep: response.data.cep_car,
                    subtotal: response.data.subtotal_car,
                    frete: response.data.frete_car,
                    total: response.data.total_car,
                    prazo: response.data.prazo_car + ' dias úteis'
                };

                $scope.produtos = response.data.produtos;

            }, function(response) {

                console.error(response);

            });

        };

        $scope.addQtd = function(_produto) {

            $http({
                method: 'POST',
                url: 'carrinho-produto',
                data: JSON.stringify({
                    id_prod: _produto.id_prod
                })
            }).then(function(response) {

                carregarCarrinho();

            }, function() {



            });

        };

        $scope.removeQtd = function(_produto) {

            $http({
                method: 'DELETE',
                url: 'carrinho-produto',
                data: JSON.stringify({
                    id_prod: _produto.id_prod
                })
            }).then(function(response) {

                carregarCarrinho();

            }, function() {



            });

        };

        $scope.removeAll = function(_produto) {

            $http({
                method: 'DELETE',
                url: 'carrinhoRemoveAll-' + _produto.id_prod
            }).then(function(response) {

                carregarCarrinho();

            }, function() {



            });

        };

        $scope.calcularFrete = function(_cep) {

            $http({
                method: 'GET',
                url: 'calcular-frete-' + _cep
            }).then(function(response) {

                carregarCarrinho();

            }, function() {



            });

        };

        carregarCarrinho();

    });
</script>