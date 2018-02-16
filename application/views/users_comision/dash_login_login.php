
<div class="container_12">
    <br>
    <br>
    <br>
    <div class="grid_4 prefix_4" >
        <?php if (isset($errorlogin)): ?>
            <section id="message" class="">
                <div class="block-border"><div class="block-content no-title dark-bg">
                        <p class="mini-infos">Intente de nuevo <b>Usuario</b> y/o <b>Contraseña</b> Incorrectos</p>
                    </div></div>
            </section>
        <?php endif ?>
        <?php if (isset($texterror)): ?>
            <section id="message" class="">
                <div class="block-border"><div class="block-content no-title dark-bg">
                        <p class="mini-infos"><?php echo $texterror ?></p>
                    </div></div>
            </section>
        <?php endif ?>
        <section id="login-block " > 
            <div class="block-border" ><div class="block-content">
                    <h1>Adminitrador</h1>
                    <div class="block-header">SAN RAFAEL LATE <br> </div>
                    <form class="form with-margin" name="login-form" id="login-form" method="post" action="<?php echo base_url(); ?>users_comision/dash_login/verificar">
                        <input type="hidden" name="a" id="a" value="send">
                        <p class="inline-small-label" align="left">
                            <label for="Usuario" align="right"><span class="big">Usuario:</span></label>
                            <input type="text" name="Usuario" id="Usuario" class="full-width" value="">
                        </p>
                        <p class="inline-small-label">
                            <label for="Clave" align="right"><span class="big">Contraseña:</span></label>
                            <input type="password" name="Clave" id="Clave" class="full-width" value="">
                        </p>

                        <button type="submit" class="float-right">Ingrese</button>
                        <p class="input-height">

                        </p>
                    </form>

                    <form class="form" id="password" method="post" action="<?php echo base_url() . "users_comision/dash_comision/recuperarpass" ?>">
                        <fieldset class="grey-bg no-margin collapse">
                            <legend><a href="#">Perdio su Clave?</a></legend>
                            <p class="input-with-button">
                                <label for="recuperarpass">ingrese su direccion de e-mail</label>
                                <input type="text" name="recuperarpass" id="recuperarpass" value="" Placeholder="Escriba su Email">
                                <button type="submit">enviar</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


