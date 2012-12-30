{function name=entries level=0}
    {counter start=0 skip=1 print=false assign=position}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
<ul class="guestbook">
    {foreach $data as $entry}
        <li>
            <div class="header">{$entry->getTitle()|escape} - {$entry->getCreated()|date_format:"%d-%m-%Y"}</div>
            <div class="message">{$entry->getText()}</div>
        </li>
        {counter}
    {/foreach}
</ul>
{/function}
<div class="blocks">
    <div class="block double">
        <h2>Berichten</h2>
        {call name=entries data=$guestbookentries level=0}
    </div>
    <div class="block">
        <h3>Laat hier uw bericht achter</h3>
        <form class="contact" action="{$SCRIPT_NAME|replace:'index.php':''}gastenboek/" method="POST" id="contactform">
            <div class="inputholder text">
                <div class="question text">
                    <label for="contact_name">Naam:</label>
                </div>
                <div class="answer text">
                    <input type="text" value="" class="text" id="contact_name" name="contact_name" title="Naam: *">
                </div>
            </div>
            <div class="inputholder hidden">
                <div class="question">
                    <label for="name">E-mail</label>
                </div>
                <div class="answer text">
                    <input type="text" value="" id="name" name="name" />
                </div>
            </div>
            <div class="inputholder textarea">
                <div class="question textarea">
                    <label for="contact_message">Bericht</label>
                </div>
                <div class="answer textarea">
                    <textarea class="textarea" cols="40" rows="10" id="contact_message" name="contact_message" title="Vraag / Opmerking: *"></textarea>
                </div>
            </div>
            <div class="explain">Alle velden zijn verplicht, vult u deze niet in dan zal het bericht niet geplaatst worden.</div>
            <input type="submit" value="Verzenden" class="submit">
        </form>
    </div>
</div>