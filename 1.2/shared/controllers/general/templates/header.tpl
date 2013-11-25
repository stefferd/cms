<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>MMCMS - {$version}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link media="screen" rel="stylesheet" href="{$url}{$theme}css/style.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="{$url}{$theme}javascript/jquery-1.7.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="{$url}{$theme}javascript/default-controller.js"></script>
        <script language="javascript" type="text/javascript" src="{$url}../1.2/shared/editor/jscripts/tiny_mce/tiny_mce.js"></script>
        <!-- Bootstap -->
        <link media="screen" rel="stylesheet" href="{$url}../1.2/shared/libs/bootstrap/bootstrap-responsive.min.css" type="text/css" />
        <link media="screen" rel="stylesheet" href="{$url}../1.2/shared/libs/bootstrap/bootstrap.min.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="{$url}../1.2/shared/libs/bootstrap/bootstrap.min.js"></script>
        <!-- Lightbox -->
        <link media="screen" rel="stylesheet" href="{$url}../1.2/shared/libs/lightbox/jquery.lightbox-0.5.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="{$url}../1.2/shared/libs/lightbox/jquery.lightbox-0.5.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a href="{$url}" class="brand">MMCMS</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            {if isset($profile)}
                                {include file='menu-rights.tpl' scope=parent}
                            {/if}
                        </ul>
                        <div class="pull-right">
                            {if isset($profile)}
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="{$SCRIPT_NAME|replace:'index.php':''}profile/view/{$profile->getId()|escape}/">
                                        {$profile->getName()|escape} {$profile->getLastname()|escape}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{$SCRIPT_NAME|replace:'index.php':''}users/edit/{$profile->getId()|escape}/" title="Profiel wijzigen">Profiel wijzigen</a></li>
                                        <li><a href="{$SCRIPT_NAME|replace:'index.php':''}profile/logout/" title="Uitloggen">Uitloggen</a></li>
                                    </ul>
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">