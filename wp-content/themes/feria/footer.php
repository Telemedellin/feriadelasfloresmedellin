    <div class="clearfix row-fluid">
        <div class="span12 Decoration">
            <?php if(qtrans_getLanguage() == 'es'): ?>
            <ul class="menuInferior hidden-phone">
                <li class="preguntasFrecuentes">
                    <a href="<?php echo home_url(); ?>/preguntas-frecuentes/" title="Preguntas Frecuentes">Preguntas Frecuentes</a>
                </li>
                <li class="directorioArtistas">
                    <a href="http://directorioartisticomedellin.com/" title="Directorio de artistas" target="_blank">Directorio Artistas</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="menuInferior hidden-phone"> 
                <li class="preguntasFrecuentesEn">
                    <a href="<?php echo home_url(); ?>/en/preguntas-frecuentes/" title="FAQs">FAQs</a>
                </li>
                <li class="directorioArtistasEn">
                    <a href="http://www.feriadelasfloresmedellin.gov.co/directorio/" title="Artistic Directory" target="_blank">Artistic Directory</a> 
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>

    <footer role="contentinfo" >
        <div id="inner-footer">
            <?php if(qtrans_getLanguage() == 'es'): ?>
            <span class="titulo-patrocinadores">Grandes patrocinadores</span>
            <?php else: ?>
            <span class="titulo-patrocinadores">Big sponsors:</span>
            <?php endif; ?>
            <ul class="patrocinadores">
                <li>
                    <a class="pilsen" href="http://www.pilsen.com.co/" target="_blank">Pilsen</a>
                </li>
                <li>
                    <a class="exito" href="http://www.grupoexito.com.co/" target="_blank">Extio</a>
                </li>
                <li>
                    <a class="cocacola" href="http://www.coca-cola.com.co/" target="_blank">Coca Cola</a>
                </li>
                <li>
                    <a class="epm" href="http://www.epm.com.co/site/" target="_blank">EPM</a>
                </li>
                <li>
                    <a class="caracol" href="http://www.caracoltv.com/" target="_blank">Caracol TV</a>
                </li>
            </ul>
            <div class="row-fluid content-organizadores">
                <div class="span6">
                    <?php if(qtrans_getLanguage() == 'es'): ?>
                    <span class="titulo-apoyan">Apoyan:</span>
                    <?php else: ?>
                    <span class="titulo-apoyan">Support:</span>
                    <?php endif; ?>
                    <ul class="apoyan">
                        <li>
                            <a class="mincultura" href="http://www.mincultura.gov.co/" target="_blank">Mincultura</a>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                    <?php if(qtrans_getLanguage() == 'es'): ?>
                    <span class="titulo-organizadores">Organizan:</span>
                    <?php else: ?>
                    <span class="titulo-organizadores">Organizers :</span>
                    <?php endif; ?>
                    <ul class="organizadores">
                        <li>
                            <a class="bureau" href="http://www.medellinconventionbureau.com/" target="_blank">Medellín Convention Bureau</a>
                        </li>
                        <li>
                            <a class="alcaldia" href="http://www.mincultura.gov.co/" target="_blank">Alcaldia de Medellín</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- end #inner-footer -->
    </footer> <!-- end footer -->
</div><!-- end #container -->

    <!--[if lt IE 7 ]>
  	    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  	    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
    <!-- FACEBOOK PLUGGIN INCLUIDO -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=1416538475270198&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>        
    <!-- G+ pluggin activado -->
    <script type="text/javascript">
    window.___gcfg = {lang: 'es'};

    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/platform.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
    </script>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <?php wp_footer(); // js scripts are inserted using this function ?>
    <script>
        var node = window.location.pathname;
        switch (node)
        {
            case '/programacion/':
            case '/en/programacion/':
                jQuery('.menu_programacion > a').addClass('active');
                break;
            case '/infoturistica/':
            case '/en/infoturistica/':
                jQuery('.menu_turistica > a').addClass('active');
                break;
            case '/historia/':
            case '/en/historia/':
                jQuery('.menu_historia > a').addClass('active');
                break;
            case '/saladeprensa/':
            case '/en/saladeprensa/':
                jQuery('.menu_saladeprensa > a').addClass('active');
                break;
            case '/contacto/':
            case '/en/contacto/':
                var span = jQuery('.tit > span');
                var tit = jQuery('.tit');
                var i = jQuery('<i>', {
                    'class': 'icono-contacto'
                });

                tit.append(i.append(span));
                
                jQuery('.menu_contactenos > a').addClass('active');
                break;
            case '/la-feria-en-vivo/':
            case '/en/la-feria-en-vivo/':
                var span = jQuery('.tit > span');
                var tit = jQuery('.tit').get(0);
                var i = jQuery('<i>', {
                    'class': 'icono-envivo'
                });

                jQuery(tit).append(i.append(span));

                jQuery('.menu_envivo > a').addClass('active');
                break;
        }
    </script>
    </body>
</html>