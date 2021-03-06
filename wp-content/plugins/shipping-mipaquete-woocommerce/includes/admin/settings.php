<?php

wc_enqueue_js( "
    jQuery( function( $ ) {
    
    let shipping_mipaquete_live_fields = '#woocommerce_shipping_mipaquete_wc_email, #woocommerce_shipping_mipaquete_wc_password';
    
    let shipping_mipaquete_sandbox_fields = '#woocommerce_shipping_mipaquete_wc_sandbox_email, #woocommerce_shipping_mipaquete_wc_sandbox_password';

    $( '#woocommerce_shipping_mipaquete_wc_environment' ).change(function(){

        $( shipping_mipaquete_sandbox_fields + ',' + shipping_mipaquete_live_fields ).closest( 'tr' ).hide();

        if ( '0' === $( this ).val() ) {
            $( '#woocommerce_shipping_mipaquete_wc_credentials, #woocommerce_shipping_mipaquete_wc_credentials + p' ).show();    
            
            $( '#woocommerce_shipping_mipaquete_wc_sandbox_credentials, #woocommerce_shipping_mipaquete_wc_sandbox_credentials + p' ).hide();
            $( shipping_mipaquete_live_fields ).closest( 'tr' ).show();
            
        }else{
          $( '#woocommerce_shipping_mipaquete_wc_sandbox_credentials, #woocommerce_shipping_mipaquete_wc_sandbox_credentials + p' ).show();
          
          $( '#woocommerce_shipping_mipaquete_wc_credentials, #woocommerce_shipping_mipaquete_wc_credentials + p' ).hide(); 
          $( shipping_mipaquete_sandbox_fields ).closest( 'tr' ).show();
        }
    }).change();
    
    $( '#woocommerce_shipping_mipaquete_wc_environment' ).change(function(){

        $( shipping_mipaquete_sandbox_fields + ',' + shipping_mipaquete_live_fields ).closest( 'tr' ).hide();

        if ( '0' === $( this ).val() ) {
            $( '#woocommerce_shipping_mipaquete_wc_credentials, #woocommerce_shipping_mipaquete_wc_credentials + p' ).show();    
            
            $( '#woocommerce_shipping_mipaquete_wc_sandbox_credentials, #woocommerce_shipping_mipaquete_wc_sandbox_credentials + p' ).hide();
            $( shipping_mipaquete_live_fields ).closest( 'tr' ).show();
            
        }else{
          $( '#woocommerce_shipping_mipaquete_wc_sandbox_credentials, #woocommerce_shipping_mipaquete_wc_sandbox_credentials + p' ).show();
          
          $( '#woocommerce_shipping_mipaquete_wc_credentials, #woocommerce_shipping_mipaquete_wc_credentials + p' ).hide(); 
          $( shipping_mipaquete_sandbox_fields ).closest( 'tr' ).show();
        }
    }).change();

    $( '#woocommerce_shipping_mipaquete_wc_environment' ).change(function(){
        });
}); 
");

return array(
    'enabled' => array(
        'title' => __('Activar/Desactivar'),
        'type' => 'checkbox',
        'label' => __('Activar Mipaquete'),
        'default' => 'no'
    ),
    /*'title'        => array(
        'title'       => __( 'T??tulo m??todo de env??o' ),
        'type'        => 'text',
        'description' => __( 'Esto controla el t??tulo que el usuario ve durante el pago' ),
        'default'     => __( 'Mipaquete' ),
        'desc_tip'    => true
    ),*/
    'debug'        => array(
        'title'       => __( 'Depurador' ),
        'label'       => __( 'Habilitar el modo de desarrollador' ),
        'class'       => 'hide_debug_option',
        'type'        => 'checkbox',
        'default'     => 'no',
        'description' => __( 'Enable debug mode to show debugging information on your cart/checkout.' ),
        'desc_tip' => true
    ),
    'environment' => array(
        'title' => __('Entorno'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Entorno de pruebas o producci??n'),
        'desc_tip' => true,
        'default' => '0',
        'options'     => array(
            '0'    => __( 'Producci??n'),
            '1'    => __( 'Pruebas'),
        ),
    ),
    'sandbox_credentials'          => array(
        'title'       => __( 'Credenciales de pruebas' ),
        'type'        => 'title',
        'description' => __( 'email y contrase??a para el entorno de pruebas' )
    ),
    'sandbox_email' => array(
        'title' => __( 'Email' ),
        'type'  => 'email',
        'description' => __( 'Usuario asignado' ),
        'desc_tip' => true
    ),
    'sandbox_password' => array(
        'title' => __( 'Contrase??a' ),
        'type'  => 'password',
        'description' => __( 'No confunda con la de seguimiento de despachos' ),
        'desc_tip' => true
    ),
    'credentials'          => array(
        'title'       => __( 'Credenciales de producci??n' ),
        'type'        => 'title',
        'description' => __( 'email y contrase??a para el entorno de producci??n' )
    ),
    'email' => array(
        'title' => __( 'Email (Con el que est??s registrado en app.mipaquete.com/registro)' ),
        'type'  => 'email',
        'description' => __( 'Usuario registrado en mipaquete.com' ),
        'desc_tip' => true
    ),
    'password' => array(
        'title' => __( 'Contrase??a' ),
        'type'  => 'password',
        'description' => __( 'No confunda con la de seguimiento de despachos' ),
        'desc_tip' => true
    ),
    'name_store' => array(
        'title' => __( 'Nombre del remitente (Nombre que aparecer?? en la gu??a y en la genraci??n, puede ser diferente al de la tienda)' ),
        'type'  => 'text',
        'description' => __( 'El nombre del remitente no debe superar los 120 caracteres' ),
        'desc_tip' => true
    ),
    'nit' => array(
        'title' => __( 'NIT o C??dula' ),
        'type'  => 'number',
        'description' => __( 'El NIT o C??dula como se hubiera registrado en Mipaquete' ),
        'desc_tip' => true
    ),
    'city_sender' => array(
        'title' => __('Ciudad del remitente (donde se encuentra ubicada la tienda)'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Se recomienda seleccionar ciudadades centrales'),
        'desc_tip' => true,
        'default' => true,
        'options'     => include dirname(__FILE__) . '/../cities.php'
    ),
    'address_sender' => array(
        'title' => __('Direcci??n del remitente (donde se realizan las recogidas de paquetes)'),
        'type'        => 'text',
        'description' => __('Se recomienda ser lo m??s espec??fico posible en la direcci??n de recogida (barrio, torre, apartamento, lugar de referencia)'),
        'desc_tip' => true,
        'default' => ''
        
    ),
    'phone_sender'      => array(
        'title' => __( 'Tel??fono del remitente' ),
        'type'  => 'number',
        'description' => __( 'Necesario para generar solicitud de env??os en Mipaquete' ),
        'desc_tip' => true
    ),
    'value_select' => array(
        'title' => __('Criterio de selecci??n de la transportadora'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Criterio de selecci??n de la transportadora por (menor precio, menor tiempo de entrega, mejor calidad del servicio)'),
        'desc_tip' => true,
        'default' => '1',
        'options'     => array(
            '1' => __('Precio'),
            '2' => __('Tiempo'),
            '3' => __('Servicio')
        )
    ),
    'transportadora_select' => array(
        'title' => __('??nica transportadora'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Priorizaremos realizar tus env??os por la transportadora, sin embargo, si no hay cobertura automaticamente escogeremos la transportadora m??s econ??mica. '),
        'desc_tip' => true,
        'default' => '0',
        'options'     => array(
            '0' => __('Ninguna trasnportadora en espec??fico'),
            '5cb0f5fd244fe2796e65f9fc' => __('Coordinadora'),
            '5ca22d9587981510092322f6' => __('TCC'),
            '5fceb46c8229797cb139a7aa' => __('Servientrega'),
            '5ea34d5e254c3206ee0fc628' => __('Tempo Express'),
            '6080a75ef08a770ddd9724fd' => __('Env??a'),
            /*'5f52bfedc12fcb79f70890b0' => __('Serviefectivo SAS'),
            '5e766397e2866c61b97f3f6e' => __('Vueltap')*/
        )
    ),
    
    'collection' => array(
        'title' => __('??Qu?? tipo de env??os realizas?'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('El Servicio especial de cobro de racaudo solo esta habilitado para valores m??ximos a recaudar de dos millones de pesos (2.000.000)'),
        'desc_tip' => true,
        'default' => '0',
        'options'     => array(
            '0' => __('Env??os sin pago contranentrega (sin recaudo del valor del producto)'),
            '2' => __('Env??os con pago contranentrega (con recaudo del valor del producto)'),
            '3' => __('Ambos'),
        )
    ),
    /*'free_shipping' => array(
        'title' => __('Generar solicitud de env??os en Mipaquete cuando los mismos son gratuitos en la tienda'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Puede permitir que en el comercio los env??os gratuitos e indiferente se de la solicitud del mismo en Mipaquete'),
        'desc_tip' => true,
        'default' => '0',
        'options'     => array(
            '0' => __('No'),
            '1' => __('S??'),
        )
    ),*/
    'title_collection' => array(
    'title'       => __( 'Nota' ),
    'type'        => 'title',
    'description' => __( '<b>Ten en cuenta</b>
        <br> Antes de configurar el plugin, debes registrarte en <a href="https://app.mipaquete.com/registro" target="_blank">app.mipaquete.com/registro</a>. Utiliza el mismo correo y la misma contrase??a con que completaste el registro. 
        <br> - En las opciones de configuraci??n de pago de tu tienda, la opci??n de contra reembolso esta asociada directamente a generar env??os con pago contra entrega en mipaquete.com, por favor no uses este m??todo de pago para algo diferente. 
        <br> Si por alguna raz??n el plugin no te calcula los precios verifica que las zonas de env??o est??nn configuradas con mipaquete.com y que los productos tengan medidas(cm) y peso(kg).
        <li>Descarga las gu??as directamente desde las notas del pedido. La generaci??n de estas tarda entre 20 y 50 segundos</li>
        <li>Si por alguna raz??n tu gu??a no se genera de manera autom??tica, puedes descargarla en <a href="https://app.mipaquete.com/historial-envios" target="_blank">https://app.mipaquete.com/historial-envios</a></li>
        <li>Si necesitas aprender m??s sobre el plugin, ingresa  <a href="https://mipaquete.com/plugin" target="_blank">mipaquete.com/plugin</a> all?? encontrar??s videotutoriales y manuales para que lo uses sin ning??n problema.</li>
        <li>Si necesitas soporte o ayuda adicional escr??benos a <a href="mailto:soporte@mipaquete.com" target="_blank">soporte@mipaquete.com</a> o a <a href="mailto:lissette.carranza@mipaquete.com" target="_blank">lissette.carranza@mipaquete.com</a>  </li>
        <li>Si el comprador cambia el m??todo de pago, en la pantalla de finalizar compra debe escoger nuevamente la ciudad o municipio para calcular el costo del env??o. </li>
        <br>Si tus env??os son con pago contraentrega debes tener registrados los datos bancarios en tu perfil de usuario en la plataforma <a href="https://app.mipaquete.com/usuario/perfil-usuario" target="_blank">https://app.mipaquete.com/usuario/perfil-usuario</a>
        <br>Al configurar el plugin de mipaquete.com, aceptas los siguientes t??rminos y condiciones de uso <a href="https://mipaquete.com/terminos-plugin-woocommerce/" target="_blank">>T??rminos y condiciones uso plugin mipaquete.com</a>')
    ),
        /*
    'name_beneficiary' => array(
        'title' => __( 'Nombre del beneficiario' ),
        'type'  => 'text',
        'description' => __( 'Nombre del beneficiario' ),
        'default' => 'N/A',
        'desc_tip' => true
    ),
    'number_beneficiary' => array(
        'title' => __( 'Numero del beneficiario' ),
        'type'  => 'number',
        'description' => __( 'Numero del beneficiario' ),
        'default' => '11111',
        'desc_tip' => true,
    ),
    'number_account' => array(
        'title' => __( 'Numero de cuenta' ),
        'type'  => 'number',
        'description' => __( 'Numero de cuenta' ),
        'default' => '111111',
        'desc_tip' => true
    ),
    
    'bank' => array(
        'title' => __('Nombre del banco'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Nombre del banco'),
        'desc_tip' => true,
        'default' => 'Bancolombia',
        'options'     => array(
            'Bancolombia' => __('Bancolombia (Desembolso $0)'),
            'Nequi' => __('Nequi (Desembolso $7.400  )'),
            'Daviplata' => __('Daviplata (Desembolso $7.400  )'),
            'Banco AV Villas' => __('Banco AV Villas (Desembolso $7.400  )'),
            'Banco caja social' => __('Banco caja social (Desembolso $7.400  )'),
            'Banco davivienda' => __('Banco davivienda (Desembolso $7.400  )'),
            'Banco de bogot??' => __('Banco de bogot?? (Desembolso $7.400  )'),
            'Banco de occidente' => __('Banco de occidente (Desembolso $7.400  )'),
            'Banco finandina' => __('Banco finandina (Desembolso $7.400  )'),
            'Banco GNB Sudameris' => __('Banco GNB Sudameris (Desembolso $7.400  )'),
            'Banco Multibank' => __('Banco Multibank (Desembolso $7.400  )'),
            'Banco Popular' => __('Banco Popular (Desembolso $7.400  )'),
            'Banco Santander' => __('Banco Santander (Desembolso $7.400  )'),
            'Bancoomeva' => __('Bancoomeva (Desembolso $7.400  )'),
            'BBVA' => __('BBVA (Desembolso $7.400  )'),
            'Citibank' => __('Citibank (Desembolso $7.400  )'),
            'Colpatria' => __('Colpatria (Desembolso $7.400  )'),
            'Coltefinanciera' => __('Coltefinanciera (Desembolso $7.400  )'),
            'Fallabella' => __('Fallabella (Desembolso $7.400  )'),
            'ITAU' => __('ITAU (Desembolso $7.400  )'),

        )
    ),
    'type_account' => array(
        'title' => __('Tipo de Cuenta'),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'description' => __('Escoje el tipo de cuenta que tienes'),
        'desc_tip' => true,
        'default' => 'A',
        'options'     => array(
            'A' => __('A (Ahorros)'),
            'C' => __('C (Corriente)'),
        )
    )
    */
   
);

// cambiar numero de cuenta y beneficiario a 11111111