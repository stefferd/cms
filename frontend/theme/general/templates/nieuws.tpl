{* Smarty *}

{function name=news level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    <ul class="news">
    {foreach $data as $news}
        <li>
            <div>{$news->getText()}</div>
        </li>
        {counter}
    {/foreach}
    </ul>
{/function}

{call name=news data=$news level=0}