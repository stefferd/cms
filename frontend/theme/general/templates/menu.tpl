{* Smarty *}

{function name=nav level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $page}
        <li class="{if $module == $page->uniqueid} active{/if}">
            <a href="{$SCRIPT_NAME|replace:'index.php':''}{$page->uniqueid}/" title="{$page->title|escape}">{$page->title|escape}</a>
            {$children = $daopage->getChildren($page->id)}
            {assign var=count value=$children|@count}
            {if $count > 0}
                <ul>{call name=nav data=$children daopage=$daopage module=$module level=$level+1}</ul>
            {/if}
        </li>
        {counter}
    {/foreach}
{/function}

<div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
        <a class="brand" href="{$url}" class="logo" title="Classics-world.com">&nbsp;</a>
        <div class="jaguar">&nbsp;</div>
        <div class="flags">
            <img src="{$url}theme/default/images/vlaggen.png" alt="International flags" width="365" height="35" />
        </div>
        <ul class="nav pull-right">
        {call name=nav data=$daopage->getMain() daopage=$daopage module=$module level=0}
        </ul>
    </div>

</div>