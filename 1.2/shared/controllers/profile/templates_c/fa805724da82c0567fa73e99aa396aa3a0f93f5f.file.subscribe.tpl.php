<?php /* Smarty version Smarty-3.1.8, created on 2012-06-29 16:40:23
         compiled from "module/profile/templates\subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139024fedda2cbc3524-94772793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa805724da82c0567fa73e99aa396aa3a0f93f5f' => 
    array (
      0 => 'module/profile/templates\\subscribe.tpl',
      1 => 1340987966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139024fedda2cbc3524-94772793',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fedda2ccc0cb5_23708319',
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedda2ccc0cb5_23708319')) {function content_4fedda2ccc0cb5_23708319($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\wamp\\www\\hobbeezz\\libs\\smarty\\plugins\\modifier.replace.php';
?>

<form action="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['SCRIPT_NAME']->value,'index.php','');?>
profile/subscription/" method="post">
    <?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found'){?> De gebruikersnaam en het wachtwoord komen niet overeen, probeer het opnieuw.
        <?php }elseif($_smarty_tpl->tpl_vars['error']->value=='email_invalid'){?> Vul een geldig emailadres in.
        <?php }?>
    <?php }?>
    <div class="field double-answer">
        <div class="question"><label for="name">Naam / Achternaam</label></div>
        <div class="answer"><input id="name" name="name" type="text" value="" /></div>
        <div class="answer"><input id="lastname" name="lastname" type="text" value="" /></div>
    </div>
    <div class="field">
        <div class="question"><label for="emailaddress">Emailadres</label></div>
        <div class="answer"><input id="emailaddress" name="emailaddress" type="text" value="" /></div>
    </div>
    <div class="buttons">
        <input type="submit" value="Aanmelden" />
    </div>
</form><?php }} ?>