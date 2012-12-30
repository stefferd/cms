<?php /* Smarty version Smarty-3.1.8, created on 2012-07-10 20:58:37
         compiled from "controllers/pages/templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287884ff9f293a0cc27-48722401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4736fe0db792739ee89fe1e34f51604f78751786' => 
    array (
      0 => 'controllers/pages/templates\\form.tpl',
      1 => 1341953880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287884ff9f293a0cc27-48722401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4ff9f293ac75c5_10587330',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff9f293ac75c5_10587330')) {function content_4ff9f293ac75c5_10587330($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\wamp\\www\\de-stijlert\\libs\\smarty\\plugins\\modifier.replace.php';
?>
<form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
pages/save/" method="post">
    <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
        <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
        <?php }?>
    <?php }?>
    <div class="blocks pageform">
        <div class="block settings">
            <div class="field">
                <div class="question"><label for="title">Titel</label></div>
                <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Titel" /></div>
            </div>
            <div class="field">
                <div class="question"><label for="active">Actief</label></div>
                <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
            </div>
            <div class="field">
                <div class="question"><label for="metatitle">Meta titel</label></div>
                <div class="answer"><input id="metatitle" name="metatitle" type="text" value="" maxlength="160" placeholder="Titel van de pagina voor de zoekmachines, max 160 karakters" /></div>
            </div>
            <div class="field">
                <div class="question"><label for="metadescription">Meta omschrijving</label></div>
                <div class="answer"><textarea id="metadescription" name="metadescription" placeholder="Omschrijving van de pagina voor de zoekmachines, max 320 karakters"></textarea></div>
            </div>
            <div class="field">
                <div class="question"><label for="keywords">Trefwoorden (keywords)</label></div>
                <div class="answer"><textarea id="keywords" name="keywords" placeholder="Zoekwoord suggesties voor de zoekmachines, max 20 suggesties" ></textarea></div>
            </div>
            <div class="buttons">
                <input type="submit" value="Opslaan" />
            </div>
        </div>
        <div class="block page">
            <div class="field">
                <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"></textarea></div>
            </div>
        </div>
    </div>
</form><?php }} ?>