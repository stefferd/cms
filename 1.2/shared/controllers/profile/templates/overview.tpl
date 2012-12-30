{* Smarty *}
<h1>Beheerders</h1>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>E-mailadres</th>
            <th>Laatst gewijzigd op</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    {section name=profiles loop=$data}
        {assign var=profile value=$data[profiles]}
        <tr>
            <td>{$profile->getName()|escape}</td>
            <td>{$profile->getLastname()|escape}</td>
            <td>{$profile->getEmailaddress()|escape}</td>
            <td>{$profile->getUpdated()|date_format:"%d-%m-%Y"}</td>
            <td><a href="{$SCRIPT_NAME|replace:'index.php':''}users/edit/{$profile->getId()}/" title="Bewerken" class="btn btn-mini"><i class="icon-edit"></i> Bewerken</a></td>
            <!--<td><a href="{$SCRIPT_NAME|replace:'index.php':''}users/delete/{$profile->getId()}/" title="Verwijderen">Verwijderen</a></td>-->
        </tr>
    {/section}
    </tbody>
</table>
<a href="{$SCRIPT_NAME|replace:'index.php':''}users/create/" title="Beheerder toevoegen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Beheerder toevoegen</a>