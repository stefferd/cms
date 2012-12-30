{* Smarty *}

{function name=nav level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $page}
        <li class="{if $module == $page->getUniqueid()} active{/if}">
            <a href="{$SCRIPT_NAME|replace:'index.php':''}{$page->getUniqueid()}/" title="{$page->getTitle()|escape}">{$page->getTitle()|escape}</a>
            {$children = $daopage->getChildren($page->getId())}
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
        <ul class="nav pull-right">
        {call name=nav data=$daopage->getMain() daopage=$daopage module=$module level=0}
        </ul>
    </div>

</div>