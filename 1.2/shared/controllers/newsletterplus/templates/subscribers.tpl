{* Smarty *}
<h1>Aanmeldingen nieuwsbrief</h1>
<form class="form-search" action="{$smarty.const.url}newsletter-plus/search-subscribers/" method="post">
    <input type="text" name="search" class="input-medium search-query">
    <button type="submit" class="btn">Search</button>
</form>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Naam</th>
            <th>E-mail</th>
            <th>Aangemeld op</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
    <tbody>
    {section name=subscriberec loop=$data}
        {assign var=subscriber value=$data[subscriberec]}
        <tr>
            <td>{$subscriber->getName()|escape}</td>
            <td>{$subscriber->getEmail()|escape}</td>
            <td>{$subscriber->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/subscriber-edit/{$subscriber->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/subscriber-delete/{$subscriber->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/section}
    </tbody>
</table>
<div class="container">
    <p>Totaal aantal aanmeldingen: <strong>{$total}</strong>&nbsp;Pagina {$current} van de {$pages}</p>
</div>
<div class="pagination">
    <ul class="pager">
        {if $current ne 1}
            <li><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/subscribers/{$previous}/">Vorige</a></li>
        {/if}
        {if $current != $pages}
            <li><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/subscribers/{$next}/">Volgende</a></li>
        {/if}
    </ul>
</div>
<form method="POST" action="{$SCRIPT_NAME|replace:'index.php':''}newsletter-plus/save-subscriber/">
    <fieldset>
        <legend>Contactpersoon toevoegen</legend>
        <div class="row">
            <span class="span4">
                <div class="control-group">
                    <label class="control-label" for="name">Naam</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="Naam" class="span4" />
                    </div>
                </div>
            </span>
            <span class="span4">
                <div class="control-group">
                    <label class="control-label" for="email">E-mailadres</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="E-mailadres" class="span4" />
                    </div>
                </div>
            </span>
            <span class="span4">
                <div class="control-group">
                    <label class="control-label">&nbsp;</label>
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Contactpersoon toevoegen</button>
                    </div>
                </div>
            </span>
        </div>
    </fieldset>
</form>