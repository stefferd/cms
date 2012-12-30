<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 22:38:51
         compiled from "../1.2/shared/controllers/newsletter/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1396974834503694db7128d4-90356247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7155a909d27b2bc819993b2470cba379b4e23a0' => 
    array (
      0 => '../1.2/shared/controllers/newsletter/templates/form.tpl',
      1 => 1345752931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1396974834503694db7128d4-90356247',
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
  'unifunc' => 'content_503694db76e6b2_21216989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503694db76e6b2_21216989')) {function content_503694db76e6b2_21216989($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
newsletter/save/" method="post" enctype="multipart/form-data">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
            <?php }?>
        <?php }?>
        <div class="blocks pageform">
            <div class="block settings">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Naam van het team" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="document">Document</label></div>
                    <div class="answer">
                        <input id="document" class="droparea thumb" name="document" type="file" value="" data-width="140" data-canvas="true" placeholder="Locatie document" />
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