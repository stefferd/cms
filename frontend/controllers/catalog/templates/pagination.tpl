{* Smarty *}
{counter start=1 skip=1 print=false assign=position}
<div class="pagination">
    <ul>
        {while $position <= $pages}
            <li{if $position == $current} class="active"{/if}><a href="{$url}inventory/pages/{$position}/" title="Page {$position}">{$position}</a></li>
            {counter}
        {/while}
    </ul>
</div>