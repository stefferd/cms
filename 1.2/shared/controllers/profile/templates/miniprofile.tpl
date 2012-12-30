{* Smarty *}
<div class="blocks logins">
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