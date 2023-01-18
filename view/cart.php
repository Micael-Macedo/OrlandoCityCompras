<?php include_once("header.php"); ?>
<section>
    <div class="cartSection" ng-controller="cart-controller">
        <h1>Carrinho de compras</h1>
        <hr>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th colspan="2">Produto(s)</th>
                    <th>Quantidade</th>
                    <th>Entrega</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="produto in produtos">
                    <td><img src="images/{{produto.foto_principal}}" alt=""></td>
                    <td>{{produto.nome_prod_longo}}</td>
                    <td>{{produto.quantidade}}</td>
                    <td>{{produto.}}</td>
                    <td>{{produto.}}</td>
                    <td>{{produto.}}</td>
                </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="col-md-10">
                <h2>Simule o prazo de entrega e o frete para o seu CEP Abaixo</h2>
            </div>
            <div class="col-md-2">

                <button>comprar</button>
            </div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>
<script>
    angular.module("shop", []).controller("cart-controller", function($scope, $http) {

        $scope.produtos = [];

        var carregarCarrinho = function() {
            $http({
                method: 'GET',
                url: 'carrinho-dados'
            }).then(function successCallback(response) {
                console.log(response)
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
        carregarCarrinho();
    });
</script>