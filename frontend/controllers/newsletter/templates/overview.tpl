{* Smarty *}
<div class="blocks pages">
    <div class="header">
        <h2>Nieuwsbrieven</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter/create/" title="Team toevoegen">Nieuwsbrief toevoegen</a></span>
    </div>
    <div class="block pages">
        <div class="row header">
            <div class="column column1">Naam</div>
            <div class="column column2">Actief</div>
            <div class="column column3">Aangemaakt op</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    {section name=newsletterec loop=$data}
        {assign var=newsletter value=$data[newsletterec]}
        <div class="row instance" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}newsletter/edit/{$newsletter->getId()}/';">
            <div class="column column1">{$newsletter->getTitle()|escape}</div>
            <div class="column column2">{if $newsletter->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
            <div class="column column3">{$newsletter->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column4">{$newsletter->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter/edit/{$newsletter->getId()}/" title="Bewerken">Bewerken</a></div>
            <div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}newsletter/delete/{$newsletter->getId()}/" title="Verwijderen">Verwijderen</a></div>
        </div>
    {/section}
    </div>
</div>