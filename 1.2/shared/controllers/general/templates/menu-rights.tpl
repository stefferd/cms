{* Smarty *}
{if Rights::users == true}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}users/" title="Beheerders">Beheerders</a></li>
{/if}
{if Rights::pages}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}pages/" title="Pagina's">Pagina's</a></li>
{/if}
{if Rights::snippets}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}snippet/" title="Snippets">Snippets</a></li>
{/if}
{if Rights::teams}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/" title="Teams">Teams</a></li>
{/if}
{if Rights::catalog}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}catalog/" title="{$smarty.const.catalog_title}">{$smarty.const.catalog_title}</a></li>
{/if}
{if Rights::news}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}news/" title="Nieuws">Nieuws</a></li>
{/if}
{if Rights::newsletterBasic}
    <li><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter/" title="Nieuwsbrieven">Nieuwsbrieven</a></li>
{/if}
{if Rights::newsletterPlus}
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Nieuwsbrieven <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/" title="Nieuwsbrieven">Nieuwsbrieven</a></li>
            <li class="divider"></li>
            <li><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/subscribers/" title="Aanmeldingen">Aanmeldingen</a></li>
        </ul>
    </li>
{/if}
{if Rights::notes}
<li><a href="{$SCRIPT_NAME|replace:'index.php':''}note/" title="Notities">Notities</a></li>
{/if}