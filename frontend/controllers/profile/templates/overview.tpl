{* Smarty *}
<div class="blocks admins">
    <div class="header">
        <h2>Beheerders</h2>
        <span class="action"><a href="{$SCRIPT_NAME|replace:'index.php':''}users/create/" title="Beheerder toevoegen">Beheerder toevoegen</a></span>
    </div>
    <div class="block admins">
        <div class="row header">
            <div class="column column1">Naam</div>
            <div class="column column2">Achternaam</div>
            <div class="column column3">E-mailadres</div>
            <div class="column column4">Aangepast op</div>
            <div class="column column5">&nbsp;</div>
            <!--<div class="column column6">&nbsp;</div>-->
        </div>
    {section name=profiles loop=$data}
        {assign var=profile value=$data[profiles]}
        <div class="row instance">
            <div class="column column1">{$profile->getName()|escape}</div>
            <div class="column column2">{$profile->getLastname()|escape}</div>
            <div class="column column3">{$profile->getEmailaddress()|escape}</div>
            <div class="column column4">{$profile->getUpdated()|date_format:"%d-%m-%Y"}</div>
            <div class="column column5"><a href="{$SCRIPT_NAME|replace:'index.php':''}users/edit/{$profile->getId()}/" title="Bewerken">Bewerken</a></div>
            <!--<div class="column column6"><a href="{$SCRIPT_NAME|replace:'index.php':''}users/delete/{$profile->getId()}/" title="Verwijderen">Verwijderen</a></div>-->
        </div>
    {/section}
    </div>
</div>