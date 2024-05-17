<?php
/* Smarty version 3.1.30, created on 2022-10-21 14:19:05
  from "C:\xampp\htdocs\php_06_namespaces\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63528e392e9037_76641062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a05cc4397848293efee8169f9cc1be563024687' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06_namespaces\\app\\views\\templates\\main.tpl',
      1 => 1666354742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63528e392e9037_76641062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? 'Opis domyślny' : $tmp);?>
">
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/styles/styles.css">
	<link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/favicon.ico">
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/index.js"><?php echo '</script'; ?>
>
	<meta name="author" content="Tomasz Bracik">
</head>
<body>

<div id="app_top" class="menu">
	<div class="my-menu">
		<a href="">Kalkulator Kredytowy</a>
		<ul>
			<li><a href="#">Góra strony</a></li>
			<li><a href="#main">Idź do kalkulatora</a></li>
		</ul>
	</div>
</div>

<div class="header">
	<img class="pepe" alt="" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/pepe_happy.png">
	<h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
	<h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_header']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h2>
	<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? "Opis domyślny" : $tmp);?>
</p>
</div>

<div id="main" class="content">
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118946913663528e392e7e35_51986341', 'content');
?>

</div>

<div class="footer">
	<p>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_32886852063528e392e85e2_98916966', 'footer');
?>

	</p>
	<p>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96215485463528e392e8c80_58964036', 'footer_desc');
?>

	</p>
</div>
</body>
</html><?php }
/* {block 'content'} */
class Block_118946913663528e392e7e35_51986341 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości ... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_32886852063528e392e85e2_98916966 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki ... <?php
}
}
/* {/block 'footer'} */
/* {block 'footer_desc'} */
class Block_96215485463528e392e8c80_58964036 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Dodatkowy tekst stopki <?php
}
}
/* {/block 'footer_desc'} */
}
