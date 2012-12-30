{* Smarty *}

{function name=newsletters level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    <ul class="news">
    {foreach $data as $newsletter}
        <li>
            <div>
                <span>{$newsletter->getCreated()|date_format:"%d-%m-%Y"} - </span>
                <a href="{$cms}{$newsletter->getDocument()}" target="_blank" title="{$newsletter->getTitle()}">{$newsletter->getTitle()}</a>
            </div>
        </li>
        {counter}
    {/foreach}
    </ul>
{/function}

{call name=newsletters data=$newsletters level=0}