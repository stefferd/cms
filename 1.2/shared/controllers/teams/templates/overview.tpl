{* Smarty *}
{function name=row level=0}
    {$classes = array('main', 'child child_1', 'child child_2', 'child child_3', 'child child_4', 'child child_5')}
    {foreach $data as $team}
        <tr class="{$classes[$level]}">
            <td>{$team->getTitle()|escape}</td>
            <td>{if $team->getActive() ne 0}Actief{else}Niet-actief{/if}</td>
            <td>{$team->getCreated()|date_format:"%d-%m-%Y"}</td>
            <td>{$team->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/edit/{$team->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}teams/delete/{$team->getId()}/" title="Verwijderen" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Verwijderen</a></td>
        </tr>
    {/foreach}
{/function}

<h1>Team's</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Actief</th>
            <th>Aangemaakt op</th>
            <th>Aangepast op</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        {call name=row data=$data}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}teams/create/" title="Team toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Team toevoegen</a>