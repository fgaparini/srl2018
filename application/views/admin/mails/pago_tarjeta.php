<?php
//Datos Acceso Mercado Pago
$acc_id       = "acc_id=601717";
$enc          = "enc=HcLHFMfd6sCGa9HxU%2FWRWx9XeAY%3D";
$item_id      = "item_id=" . $localizador;
$name_item    = "name=Reserva - " . $tipo_Hotel . " " . $nombre_Hotel . " - " . $nombre . " " . $apellido;
$currency     = "currency=ARG";
$total_estadia_pagar2= $total_estadia_pagar/0.94;
$price        = "price=" . $total_estadia_pagar2;
$cart_name    = "cart_name=" . $nombre;
$cart_surname = "cart_surname=" . $apellido;
$cart_email   = "cart_email=" . $email;
?>
<p></p>
<table width="">
    <tr>
        <td ><b>PAGO CON TARJETA DE CRÉDITO (Mercado Pago) </b></td>
    </tr>
    <tr>
        <td>
            <p>Puede pagar en hasta en 18 cuotas sin Interes (dependiendo Tarjeta y banco que la emite). </p> 
            <p>El sistema es muy sencillo y seguro (la entidad de cobro es una de las prestigiosas "MERCADO PAGO", www.mercadopago.com , perteneciente a MERCADOLIBRE.com).</p>
            <p>Solo presione botón "PAGAR" y siga los pasos que le indican.</p>
            <p>Recuerde que el pago con tarjeta  tiene un recargo de 6% por gastos administrativos ya incluidos en el botón de pago.</p>
            <a href="https://www.mercadopago.com/mla/buybutton?<?php echo $acc_id . "&" . $enc . "&" . $item_id . "&" . $name_item . "&" . $currency . "&" . $price . "&" . $cart_name . "&" . $cart_surname . "&" . $cart_email; ?>"><img src="<?php echo base_url() ?>imagenes/pagar.jpg" alt="Click para Pagar"></a>
            </p>
        </td>
    </tr>
</table>