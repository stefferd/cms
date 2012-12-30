{* Smarty *}
<div class="blocks logins">
    {if isset($profile)}
        <div class="block login">
            <ul>
                <li><a href="{$SCRIPT_NAME|replace:'index.php':''}profile/view/{$profile->getId()|escape}/">{$profile->getName()|escape} {$profile->getLastname()|escape}</a>
                    <ul>
                        <li><a href="{$SCRIPT_NAME|replace:'index.php':''}users/edit/{$profile->getId()|escape}/" title="Profiel wijzigen">Profiel wijzigen</a></li>
                        <li><a href="{$SCRIPT_NAME|replace:'index.php':''}profile/logout/" title="Uitloggen">Uitloggen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    {/if}
</div>