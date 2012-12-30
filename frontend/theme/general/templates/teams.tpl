{* Smarty *}

{function name=teams level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $team}
        <div class="block {$classes[$position]}" style="width: 49%;">
            <h3>{$team->getTitle()|escape}</h3>
            {if $team->getPicture() == ''}
                <img src="{$url}{$theme}images/teams-foto.jpg" width="450" height="300" alt="{$team->getTitle()}" title="{$team->getTitle()}" /><br/>
            {else}
                <img src="{$cms}{$team->getPicture()}" width="450" height="300" alt="{$team->getTitle()}" title="{$team->getTitle()}" /><br/>
            {/if}
            <span class="teams">{$team->getText()}</span>
        </div>
        {counter}
    {/foreach}
{/function}

<div class="blocks">
    {call name=teams data=$teams level=0}
</div>