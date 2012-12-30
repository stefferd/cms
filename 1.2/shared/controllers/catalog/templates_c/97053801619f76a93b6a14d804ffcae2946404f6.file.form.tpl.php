<?php /* Smarty version Smarty-3.1.8, created on 2012-12-28 00:51:08
         compiled from "../1.2/shared/controllers/catalog/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144873106150dcdeec9805f9-41359295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97053801619f76a93b6a14d804ffcae2946404f6' => 
    array (
      0 => '../1.2/shared/controllers/catalog/templates/form.tpl',
      1 => 1356652045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144873106150dcdeec9805f9-41359295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dcdeec9d53c1_69866421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dcdeec9d53c1_69866421')) {function content_50dcdeec9d53c1_69866421($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
teams/save/" method="post" enctype="multipart/form-data">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
        <div class="blocks pageform">
            <div class="block settings">
                <div class="field">
                    <div class="question"><label for="title">Team naam</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Naam van het team" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="text">Team omschrijving</label></div>
                    <div class="answer"><textarea id="text" name="text" placeholder="Team omschrijving, max 320 karakters"></textarea></div>
                </div>
                <div class="field">
                    <div class="question"><label for="picture">Team foto</label></div>
                    <div class="answer">
                        <input id="picture" class="droparea thumb" onchange="Default.imagePreview(this, '#preview');" name="picture" type="file" value="" data-width="140" data-canvas="true" placeholder="Locatie teamfoto" />
                        <img id="preview" src="#" alt="Afbeelding preview" />
                    </div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
        </div>
    </form>
</div>
<?php }} ?>