<?php

$html = '
<h1>Payment</h1>

<h2>User</h2>

<table>
    <tbody>
        <tr>
            <th scope="row" style="text-align: left;">Name:</th>
            <td>' . $userData['name'] . '</td>
        </tr>
        <tr>
            <th scope="row" style="text-align: left;">Email:</th>
            <td>' . $userData['email'] . '</td>
        </tr>
        <tr>
            <th scope="row" style="text-align: left;">Morada:</th>
            <td>' . $userData['address'] . '</td>
        </tr>
        <tr>
            <th scope="row" style="text-align: left;">Cidade:</th>
            <td>' . $userData['city'] . '</td>
        </tr>
        <tr>
            <th scope="row" style="text-align: left;">Código Postal:</th>
            <td>' . $userData['zip'] . '</td>
        </tr>
        
    </tbody>
</table>

<hr>

<h2>Order</h2>

<table style="width:100%;">
    <thead>
        <tr>
            <th scope="col" style="text-align: left;">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col" style="text-align: right;">Preço</th>
        </tr>
    </thead>

    <tbody>
';

$total = 0;

foreach (getCartProducts() as $product) {
    $total += $product['quantity'] * $product['product_price'];

    $html .= '
        <tr>
            <td>' . $product['product_title'] . '</td>
            <td style="text-align: center;">' . $product['quantity'] . '</td>
            <td style="text-align: right;">' . $product['product_price'] . '</td>
        </tr>
        ';
}

$html .= '
    </tbody>

    <tfoot>
        <tr>
            <th colspan="2" style="text-align: right;">Total:</th>
            <th style="text-align: right;">' . $total . '</th>
        </tr>
    </tfoot>
</table>
';
?>
