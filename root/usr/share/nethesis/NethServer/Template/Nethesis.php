<?php
$filename = basename(__FILE__);
$bootstrapJs = <<<"EOJS"
/*
 * bootstrapJs in {$filename}
 */
jQuery(document).ready(function($) {
    $('script.unobstrusive').remove();
    $('#pageContent').Component();
    $('.HelpArea').HelpArea();
    $('#allWrapper').css('display', 'block');
});
EOJS;

$view
    // Javascript:
    ->includeJavascript($bootstrapJs)
    // CSS:
    ->useFile('css/default/jquery-ui-1.8.16.custom.css')
    ->useFile('css/jquery.qtip.min.css')
    ->useFile('css/base.css')
    ->useFile('css/blue.css')
;

?><!DOCTYPE html>
<html lang="<?php echo $view['lang'] ?>">
    <head>
        <title><?php echo htmlspecialchars($view['company'] . " - " . $view['moduleTitle']) ?></title>
        <link rel="icon"  type="image/png"  href="<?php echo $view['favicon'] ?>" />
        <meta name="viewport" content="width=device-width" />  
        <script>document.write('<style type="text/css">#allWrapper {display:none}</style>')</script><?php echo $view->literal($view['Resource']['css']) ?>
    </head>
    <body>
        <div id="allWrapper"><?php echo $view['notificationOutput'] ?>
            <?php if ( ! $view['disableHeader']): ?>
                <div id="pageHeader">
                    <a id="product" href="Dashboard" title='NethServer'></a>
                    <h1 id="ModuleTitle"><?php echo htmlspecialchars($view['moduleTitle']) ?></h1>
                    <div id="productTitle">NethServer</div>
                </div>
            <?php endif; ?>
            <div id="pageContent">
                <div class="primaryContent" role="mainTask">
                    <div id="CurrentModule"><?php echo $view['currentModuleOutput'] ?></div>
                    <?php if ( ! $view['disableFooter']): ?><div id="footer"><p><?php echo htmlspecialchars($view['company'] . ' - ' . $view['address']) ?></p></div><?php endif; ?>
                </div>
                <?php if ( ! $view['disableMenu']): ?><div class="secondaryContent" role="otherTask"><h2><?php echo htmlspecialchars($view->translate('Other modules')) ?></h2><?php echo $view['menuOutput'] . $view['logoutOutput'] ?></div><?php endif; ?>
            </div><?php echo $view['helpAreaOutput'] ?>
        </div><?php echo $view->literal($view['Resource']['js']) ?>
    </body>
</html>
