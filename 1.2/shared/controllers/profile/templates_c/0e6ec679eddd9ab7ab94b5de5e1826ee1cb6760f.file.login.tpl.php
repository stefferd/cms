<?php /* Smarty version Smarty-3.1.8, created on 2013-11-09 17:55:13
         compiled from "../1.2/shared/controllers/profile/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159827596050255436ae56d4-31528707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e6ec679eddd9ab7ab94b5de5e1826ee1cb6760f' => 
    array (
      0 => '../1.2/shared/controllers/profile/templates/login.tpl',
      1 => 1384016109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159827596050255436ae56d4-31528707',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50255436b36314_30153858',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50255436b36314_30153858')) {function content_50255436b36314_30153858($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/deb33946/domains/mmcms.net/public_html/1.2/shared/libs/smarty/plugins/modifier.replace.php';
?>
<form class="form-signin" action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
profile/login/" method="post">
    <h3 class="form-signin-heading">Inloggen</h3>
    <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
            <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
        <?php }?>
    <?php }?>
    <div class="img" style="width: 100%; height: 75px; margin-bottom: 30px;">
        <div class="login" style="width: 75px; height: 75px; border: 2px solid #9E9E9E; border-radius: 150px;margin: 0 auto;text-align: center; background-color: #FFF;">
            <span class="icon-user" style="margin-top: 30px;">&nbsp;</span>
        </div>
    </div>
    <input type="text" name="username" placeholder="Gebruikersnaam / E-mailadres" class="input-block-level" style="margin-bottom: 0; border-radius: 5px 5px 0 0; border-bottom: 0; padding: 10px;">
    <input type="password" name="password" placeholder="Wachtwoord" class="input-block-level" style="margin-bottom: 30px; border-radius: 0 0 5px 5px; padding: 10px;">
    <button type="submit" class="btn btn-large btn-primary">Inloggen</button>
</form><?php }} ?>