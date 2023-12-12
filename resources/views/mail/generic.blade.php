<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Portal Empresarial</title>

        <style>
            * {
                font-family: Arial, Helvetica, sans-serif; 
            }

            body {
                background-color: #e8e8e8;
            }

            .container {
                background-color: #f7f7f7;
                border-radius: 5px;
                box-shadow: 0 0 5px #b0b0b0;
                margin: 0 auto;
                max-width: 600px;
                padding: 20px;
            }

            .header {
                background-image: url(https://www.monlau.com/estudis-professionals/wp-content/uploads/sites/3/2020/02/recepci%C3%B3-1.jpg);
                width: 100%;
                border-radius: 5px; 
                text-align: center;
                color: white;
                font-weight: bold;
                padding-top: 30px;
                padding-bottom: 30px;
                font-size: 30px;
                text-shadow: 0px 0px 10px black;
            }

            .content {
                margin-top: 20px;
            } 

            footer {
                margin-top: 30px; 
                opacity: .4;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <section class="header">
                {!! $header !!}
            </section>
            
            <div class="content">
                {!! $content !!}
            </div>  

            <footer>
                <p><strong>Aviso Importante: Este Correo Puede No Estar Dirigido Para Usted</strong></p>

                <p>Estimado destinatario,</p>

                <p>Por la presente, le informamos que el correo electrónico que está recibiendo desde la dirección "portalempresarial@monlau.com" puede no estar destinado específicamente para usted. Este mensaje es enviado desde el sistema de correo electrónico del Portal Empresarial de Monlau Grup.</p>

                <p>Si ha recibido este correo por error o considera que no es relevante para usted, le rogamos que lo ignore y acepte nuestras disculpas por cualquier inconveniente que esto pueda causar.</p>

                <p>Monlau Grup no se hace responsable de la recepción accidental de mensajes no destinados al destinatario específico. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nuestro equipo de soporte.</p>

                <p>Agradecemos su comprensión.</p>

                <p>Atentamente,<br>
                Monlau Group</p>

            </footer>
        </div>
    </body>
</html>