<?php
/* Smarty version 3.1.30-dev/59, created on 2016-04-20 20:02:48
  from "/var/www/html/virtual_classroom/views/User/confirmUser.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_571818a8a620f9_96600907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f2fd5f503ce19c92a57a233dcb7f25d5376851e' => 
    array (
      0 => '/var/www/html/virtual_classroom/views/User/confirmUser.html',
      1 => 1461196857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571818a8a620f9_96600907 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><?php echo '<script'; ?>
 src="assets/js/ie/html5shiv.js"><?php echo '</script'; ?>
><![endif]-->
    <link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['bootstrapCss']->value;?>
"/>
    <link rel = "stylesheet" href = "http://159.203.112.148:8080/views/User/css/main.css"/>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><img class = "gravatar" src = "<?php echo $_smarty_tpl->tpl_vars['gravatar']->value;?>
"/></h1>
				<a href="#nav">Menú</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class = "links">
								<li>
										<a href = "Index">Inicio</a>
								</li>								
								<li>
										<a href = "#">Cursos</a>
								</li>
								<li>
										<a href = "#">Perfil</a>
								</li>
								<li>
										<a href = "#">Configuración</a>
								</li>
						</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
						<p>Cuenta Inscrita bajo correo electrónico: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
            <p>Ha sido activada, se le redigirá a la página principal dentro de 5 segundos</p>
            <p>Si no ocurre nada en 5 segundos, puede hacer clic <a href = "http://159.203.112.148:8080">aquí</a></p>
					</header>
        </div>
        </section>
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
          <ul class="copyright">
              <li><?php echo $_smarty_tpl->tpl_vars['applicationCompany']->value;?>
</li>
              <li>Imágenes: <a href="http://unsplash.com">Unsplash</a>.</li>
              <li>Diseño: <a href="http://templated.co">TEMPLATED</a>.</li>
          </ul>
				</div>
			</footer>

		<!-- Scripts -->

			<!--[if lte IE 8]><?php echo '<script'; ?>
 src="assets/js/ie/respond.min.js"><?php echo '</script'; ?>
><![endif]-->
      <?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['jquery']->value;?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src = "http://159.203.112.148:8080/views/User/js/skel.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src = "http://159.203.112.148:8080/views/User/js/util.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src = "http://159.203.112.148:8080/views/User/js/main.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src = "http://159.203.112.148:8080/views/User/js/confirmUser.js"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
