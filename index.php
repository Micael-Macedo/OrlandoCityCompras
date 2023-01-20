<?php

require 'inc/configuration.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () {
        require_once("view/index.php");
    }
);
$app->get(
    '/videos',
    function () {
        require_once("view/videos.php");
    }
);
$app->get(
    '/shop',
    function () {
        require_once("view/shop.php");
    }
);
$app->get(
    '/produtos',
    function () {

        $sql = new Sql();

        $data = $sql->select("SELECT * FROM tb_produtos where preco_promocional > 0 order by preco_promocional desc limit 3;");

        foreach ($data as &$produto) {
            $preco = $produto['preco'];
            $centavos = explode(".", $preco); //separa a partir de  um valor, no caso o .
            $produto['preco'] = number_format($preco, 0, ",", ".");
            $produto['centavos'] = end($centavos);
            $produto['parcelas'] = 10;
            $produto['parcela'] = number_format($preco / $produto['parcelas'], 2, ",", ".");
            $produto['total'] = number_format($preco, 2, ",", ".");
        }

        echo json_encode($data);
    }
);

$app->get(
    '/produtos-mais-buscados',
    function () {
        $sql = new Sql();

        $data = $sql->select("SELECT 
        tb_produtos.id_prod,
        tb_produtos.nome_prod_curto,
        tb_produtos.nome_prod_longo,
        tb_produtos.codigo_interno,
        tb_produtos.id_cat,
        tb_produtos.preco,
        tb_produtos.peso,
        tb_produtos.largura_centimetro,
        tb_produtos.altura_centimetro,
        tb_produtos.quantidade_estoque,
        tb_produtos.preco_promocional,
        tb_produtos.foto_principal,
        tb_produtos.visivel,
        cast(avg(review) as dec(10,2)) as media, 
        count(id_prod) as reviews
        FROM tb_produtos 
        INNER JOIN tb_reviews USING(id_prod) 
        GROUP BY 
        tb_produtos.id_prod,
        tb_produtos.nome_prod_curto,
        tb_produtos.nome_prod_longo,
        tb_produtos.codigo_interno,
        tb_produtos.id_cat,
        tb_produtos.preco,
        tb_produtos.peso,
        tb_produtos.largura_centimetro,
        tb_produtos.altura_centimetro,
        tb_produtos.quantidade_estoque,
        tb_produtos.preco_promocional,
        tb_produtos.foto_principal,
        tb_produtos.visivel
        LIMIT 4;");

        foreach ($data as &$produto) {
            $preco = $produto['preco'];
            $centavos = explode(".", $preco); //separa a partir de  um valor, no caso o .
            $produto['preco'] = number_format($preco, 0, ",", ".");
            $produto['centavos'] = end($centavos);
            $produto['parcelas'] = 10;
            $produto['parcela'] = number_format($preco / $produto['parcelas'], 2, ",", ".");
            $produto['total'] = number_format($preco, 2, ",", ".");
        }

        echo json_encode($data);
    }
);

$app->get("/produto-:id_prod", function ($id_prod) {
    $sql = new Sql();

    $produtos = $sql->select("select * FROM tb_produtos where id_prod = $id_prod");

    $produto = $produtos[0];
    $preco = $produto['preco'];
    $centavos = explode(".", $preco);
    $produto['centavos'] = end($centavos);
    $produto['parcelas'] = 10;
    $produto['parcela'] = number_format($preco / $produto['parcelas'], 2, ",", ".");
    $produto['total'] = number_format($preco, 2, ",", ".");

    require_once('view/shop-produto.php');
});

$app->get("/cart", function () {

    require_once('view/cart.php');
});
$app->get('/carrinho-dados', function () {
    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();
    $carrinho['produtos'] = $sql->select("CALL sp_carrinhosprodutos_list(".$carrinho['id_car'].")");
    $carrinho['total_car'] = number_format((float)$carrinho['total_car'], 2,',');
    $carrinho['subtotal_car'] = number_format((float)$carrinho['subtotal_car'], 2,',');
    $carrinho['frete_car'] = number_format((float)$carrinho['frete_car'], 2,',');

    echo json_encode($carrinho);
});
$app->post('/carrinho', function () {
    $request_body = json_decode(file_get_contents('php://input'), true);

    var_dump($request_body);
});
$app->get('/carrinhoAdd-:id_prod', function ($id_prod) {
    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get('".session_id()."')");

    $carrinho = $result[0];
    
    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_add(".$carrinho['id_car'].",".$id_prod.")");

    header("Location: cart");
    exit;
});
$app->delete("/carrinhoRemoveAll-:id_prod", function ($id_prod) {
    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get('".session_id()."')");

    $carrinho = $result[0];
    
    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutostodos_rem(".$carrinho['id_car'].",".$id_prod.")");

});
$app->post("/carrinho-produto", function(){

    $data = json_decode(file_get_contents("php://input"), true);

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_add(".$carrinho['id_car'].", ".$data['id_prod'].")");

    echo json_encode(array(
        "success"=>true
    ));

});
$app->delete("/carrinho-produto", function ($id_prod) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = new Sql();

    $result = $sql->select("CALL sp_carrinhos_get('".session_id()."')");

    $carrinho = $result[0];

    $sql = new Sql();

    $sql->query("CALL sp_carrinhosprodutos_ram(".$carrinho['id_car'].", ".$data['id_prod'].")");

    echo json_encode(array(
        "success"=>true
    ));

});

$app->run();
