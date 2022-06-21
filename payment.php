<?php
session_start();
include("functions/functions.php");
require_once 'lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (isset($_POST['issue_payment'])) {
    $userData = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $_POST['address'] ?? '',
        'city' => $_POST['city'] ?? '',
        'zip' => $_POST['zip'] ?? '',


    ];

    require_once('views/payment-receipt.php');

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream();
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>DStore Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="container mt-5">
            <div class="row">                
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Dados de Envio</h4>

                    <form class="needs-validation" novalidate="" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nome</label>

                                <input type="text" class="form-control" id="name" name="name" placeholder="" value=""
                                       required>

                                <div class="invalid-feedback"> Valid first name is required.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted"></span></label>

                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">

                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Morada</label>

                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>

                            <div class="invalid-feedback"> Por favor preencha com a sua morada.</div>
                        </div>
                        <div class="mb-3">
                            <label for="city">Cidade <span class="text-muted"></span></label>

                            <input type="city" class="form-control" id="city" name="city" placeholder="Guimarães">

                            <div class="invalid-feedback"> Por favor adiciona uma cidade.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="zip">Código Postal <span class="text-muted"></span></label>

                            <input type="zip" class="form-control" id="zip" name="zip" placeholder="1234-123">

                            <div class="invalid-feedback"> Por favor adiciona uma código postal.
                            </div>
                        </div>

                        <hr class="mb-4">

                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="issue_payment">
                            Proceder ao pagamento
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
