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

<div class="row">
    <div class="span7">
        {$content}
    </div>
    <div class="span4" style="background-color: #00483a; padding: 10px; border: 5px solid #d4cd86; border-radius: 5px;">
        <aside style="margin-top: 90px;">
            <h6>CLASSIC CAR NEWS</h6>
            {call name=news data=$lastestnews limit=3 level=0}
        </aside>
    </div>
</div>