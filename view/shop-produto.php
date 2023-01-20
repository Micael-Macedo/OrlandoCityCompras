<?php include_once("header.php"); ?>
<section>
    <div class="productSection">
        <div class="container produto-destaque-content">
            <div id="destaque-produtos">
                <div class="item" ng-repeat="produto in produtos">
                    <div class="imgProduct">
                        <img src="img/<?= $produto['foto_principal'] ?>" alt="">
                    </div>
                    <div class="infoProduct">
                        <h2><?= $produto['nome_prod_longo'] ?></h2>
                        <div class="payment">
                            <p class="boleto">no boleto por:<span>R$</span></p>
                            <div class="value">
                                <p><?= $produto['preco'] ?></p><span>,<?= $produto['centavos'] ?></span>
                            </div>
                        </div>
                        <div>
                            <p>
                                ou até <?= $produto['parcelas'] ?>x de R$ <?= $produto['parcela'] ?>
                                <br>
                                total a prazo R$ <?= $produto['total'] ?>
                            </p>
                        </div>
                        <div class="btnBuyNow">
                            <a href="carrinhoAdd-<?= $produto['id_prod'] ?>"><i class="bi bi-cart3"></i>compre agora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>