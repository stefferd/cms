<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 23:02:22
         compiled from "../1.2/shared/controllers/news/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91526995250369a5e301012-70908530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf09abccbedb5ee03b877de30351a3535d45719f' => 
    array (
      0 => '../1.2/shared/controllers/news/templates/form.tpl',
      1 => 1345752930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91526995250369a5e301012-70908530',
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
  'unifunc' => 'content_50369a5e350ed6_59676040',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50369a5e350ed6_59676040')) {function content_50369a5e350ed6_59676040($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<div class="form">
    <form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
news/save/" method="post">
    <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
        <?php }?>
    <?php }?>
        <div class="blocks pageform">
            <div class="block">
                <div class="field">
                    <div class="question"><label for="title">Titel</label></div>
                    <div class="answer"><input id="title" name="title" type="text" value="" placeholder="Titel" /></div>
                </div>
                <div class="field">
                    <div class="question"><label for="active">Actief</label></div>
                    <div class="answer"><input id="active" name="active" type="checkbox" checked="checked" /></div>
                </div>
                <div class="field memo">
                    <div class="question"><label for="tinymce">Tekst</label></div>
                    <div class="answer"><textarea id="tinymce" name="text" placeholder="Tekstuele inhoud"><h1>Titel</h1><p>Tekstuele inhoud van de pagina</p></textarea></div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Opslaan" />
                </div>
            </div>
        </div>
    </form>
</div><?php }} ?>