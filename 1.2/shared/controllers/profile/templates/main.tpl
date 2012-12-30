{* Smarty *}
<div class="blocks logins">
    <div class="header">
        <h2>Ingelogd</h2>
        <span class="action"><a href="{$SCRIPT_NAME}?action=add" title="Aanmelden">Aanmelden</a></span>
    </div>
    {foreach from=$data item='entry'}
        <div class="block login">
            <div class="header"><h3>{$entry[1]|escape}</h3></div>
            <div class="section">{$entry[2]|escape}</div>
        </div>
    {/foreach}
</div>