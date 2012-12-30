{* Smarty *}
<div class="blocks pages">
    <div class="header">
        <h2>Teams's</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/create/" title="Team toevoegen">Team toevoegen</a></span>
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
    {section name=teamsec loop=$data}
        {assign var=teams value=$data[teamsec]}
        <div class="row instance" onclick="document.location.href='{$SCRIPT_NAME|replace:'index.php':''}teams/edit/{$teams->getId()}/';">
            <div class="column column1">{$teams->getTitle()|escape}</div>
            <div class="column column2">{if $teams->getActive() ne 0}Actief{else}Niet-actief{/if}</div>
            <div class="column column3">{$teams->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column4">{$teams->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/edit/{$teams->getId()}/" title="Bewerken">Bewerken</a></div>
            <div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/delete/{$teams->getId()}/" title="Verwijderen">Verwijderen</a></div>
        </div>
    {/section}
    </div>
</div>