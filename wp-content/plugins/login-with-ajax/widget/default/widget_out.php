<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>    
<title>Yogobierno 3.0 | Registro</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.admin.stylesheet-complete.min.css" />
<div class="content" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lock-1.jpg');height:100%; min-height:1600px" >
<div class="row row-app" >
            <div class="col-md-12">
                <div class="col-separator col-separator-first box col-unscrollable col-fs">
                    <div class="col-table">
                        <div class="col-table-row">
                            <div class="col-app col-unscrollable tab-content">
                                <div class="col-app lock-wrapper lock-bg-1 tab-pane active animated fadeIn" id="lock-1-1" style="background-repeat:repeat;height:100%;">
                                    <h3 class="text-white innerB text-center">Acceso a YoGobierno</h3>
                                    <div class="lock-container">
                                        <div class="innerAll text-center" style="margin:0 auto;color: #797979; font-size:14px; background:#fff; text-align: center !important; width:300px; height:332px;">
                                            <!-- Formulario -->
                                            <form class="lwa-form" style="position: relative; margin-bottom: 1em;display: block; margin-top: 0em;  " action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
                                                <br>
                                                <img style="margin:10px 0px;" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotipo.png" class=""/>
                                                <br>
                                                <div class="innerLR">
                                                    <input class="form-control text-center bg-gray" type="text" name="log" placeholder="<?php esc_html_e( 'Username','login-with-ajax' ) ?>"/>
                                                    <input class="form-control text-center bg-gray" type="password" name="pwd"  placeholder="<?php esc_html_e( 'Password','login-with-ajax' ) ?>"/>
                                                </div>
                                                <?php do_action('login_form'); ?>
                                                <div class="innerT">
                                                    <button type="submit" class="btn btn-primary" name="wp-submit" id="lwa_wp-submit">Entrar <i class="fa fa-fw fa-unlock-alt"></i></button>
                                                    <input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr($lwa_data['profile_link']); ?>" />
                                                    <input type="hidden" name="login-with-ajax" value="login" />
                                                </div>
                                                
                                                
                                                <?php if( !empty($lwa_data['remember']) ): ?>
                                                <a class="btn margin-none" href="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','login-with-ajax') ?>"><?php esc_attr_e('Lost your password?','login-with-ajax') ?></a>                                                        
                                                <?php endif; ?>

                                                <?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
                                                    <a class="btn margin-none" href="<?php echo get_bloginfo('url');?>/registro" class="lwa-links-register lwa-links-modal"><?php esc_html_e('Register','login-with-ajax') ?></a> 
                                                <?php endif; ?>                                                        
                                            </form>
                                            <!-- End Formulario -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
</div>