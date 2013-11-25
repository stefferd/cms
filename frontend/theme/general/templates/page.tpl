<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Classics-world - Classics-world.com</title>
    <meta name="Identifier-URL" content="Classics-world." />
    <meta http-equiv="content-language" content="EN-en" />
    <meta name="revisit-after" content="5" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="noodp" />
    <meta name="copyright" content="&copy; Classics-world.com" />
    <meta name="language" content="English" />
    <meta name="author" content="Classics-world.com" />
    <meta name="web_author" content="Stef van den Berg / Paul Wijnhoven" />
    <script src="{$url}{$theme}javascript/jquery-1.7.2.min.js" type="text/javascript"></script>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="{$cms}../1.2/shared/libs/bootstrap/bootstrap.min.css" type="text/css" media="screen" />
    <!-- Lightbox -->
    <link rel="stylesheet" href="{$cms}../1.2/shared/libs/lightbox/jquery.lightbox-0.5.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="{$url}{$theme}css/style.css" type="text/css" media="screen" />
    <!--[if IE 7]><link rel="stylesheet" href="{$url}{$theme}css/ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body>
    <div class="container">
        {include file='menu.tpl' scope=parent}
        <div class="container header">
            <p>WWW.CLASSICS-WORLD.COM</p>
        </div>
        <div class="container content">
            <div class="section">
                {if $module == 'home'}
                    {include file='startpagina.tpl' scope=parent}
                {elseif $module == 'our-news'}
                    <h1>Our news</h1>
                    {include file='nieuws.tpl' scope=parent}
                {elseif $module == 'nieuwsbrieven'}
                    {$content}
                    {include file='newsletters.tpl' scope=parent}
                {elseif $module == 'gastenboek'}
                    {$content}
                    {include file='gastenboek.tpl' scope=parent}
                {elseif $module == 'teams'}
                    {$content}
                    {include file='teams.tpl' scope=parent}
                {else}
                    {$content}
                {/if}
            </div>
        </div>
    </div>
    <div class="container footer">
        {include file="footer.tpl"}
    </div>
    <script src="{$url}{$theme}javascript/default-controller.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{$cms}../1.2/shared/libs/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="{$cms}../1.2/shared/libs/lightbox/jquery.lightbox-0.5.min.js" type="text/javascript"></script>
</body>
</html>