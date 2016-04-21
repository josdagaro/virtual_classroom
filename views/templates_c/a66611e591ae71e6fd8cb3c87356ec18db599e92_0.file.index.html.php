<?php
/* Smarty version 3.1.30-dev/59, created on 2016-04-20 18:51:42
  from "/var/www/html/virtual_classroom/views/User/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_571807fe8cf0d5_63615918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a66611e591ae71e6fd8cb3c87356ec18db599e92' => 
    array (
      0 => '/var/www/html/virtual_classroom/views/User/index.html',
      1 => 1461129708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571807fe8cf0d5_63615918 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
		<head>
				<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
				<meta charset = "utf-8"/>
				<meta name = "viewport" content = "width = device-width, initial-scale = 1"/>
				<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['bootstrapCss']->value;?>
"/>
				<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['bootstrapValidatorCss']->value;?>
"/>
				<link rel = "stylesheet" href = "views/User/css/main.css"/>
		</head>
		<body class = "landing">
				<header id = "header" class = "alt">
						<a href = "#nav">Menú</a>
				</header>
				<nav id = "nav">
						<ul class = "links">
								<li>									
										<a href = "Index">
											<span class = "glyphicon glyphicon-home"></span>
											Inicio
										</a>
								</li>
								<li>
										<a href = "Course">Cursos</a>
								</li>
								<li>
										<a href = "#">Perfil</a>
								</li>
								<li>
										<a href = "#">Configuración</a>
								</li>
								<li>
										<a id = "closeAccount" href = "#">Salir</a>
								</li>
						</ul>
				</nav>
				<section id = "banner">
						<div id = "img-container">
								<img src = "public/img/unicor.png" width = "100"/>
						</div>
						<h2 id = "h-login">Conéctate</h2>
						<div class = "inner">
								<header class = "major narrow">
										<p id = "p-login">Ingresa a nuestra plataforma con tu cuenta personal</p>
								</header>
								<form id = "sign-in-form">
										<div class = "container 75%">
												<div class = "row uniform 50%">
														<div class = "12u 12u$(xsmall)">
																<div class = "form-group row">
																		<input id = "signInEmail" class = "form-control" name = "signInEmail" placeholder = "Correo electrónico" type = "email"/>
																</div>
														</div>
														<div class = "12u$ 12u$(xsmall)">
																<div class = "form-group row">
																		<input id = "signInPassword" class = "form-control" name = "signInPassword" placeholder = "Contraseña" type = "password"/>
																</div>
														</div>
												</div>
										</div>
										<ul class = "actions">
												<li>
														<input type = "submit" class = "special" value = "Ingresar"/>
												</li>
												<li>
														<input type = "reset" class = "alt" value = "Registrarse" id = "go-sign-up"/>
												</li>
										</ul>
								</form>
								<div class = "panel-body">
										<form id = "sign-up-form" role = "form">
												<div class = "container 75%">
														<div class = "row uniform 50%">
																<div class = "12u 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "identifier" class = "form-control" name = "identifier" placeholder = "Número de identificación" type = "text"/>
																		</div>
																</div>
																<div class = "12u 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "name" class = "form-control" name = "name" placeholder = "Nombres" type = "text"/>
																		</div>
																</div>
																<div class = "12u 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "lastName" class = "form-control" name = "lastName" placeholder = "Apellidos" type = "text"/>
																		</div>
																</div>
																<div class = "12u$ 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "signUpEmail" class = "form-control" name = "signUpEmail" placeholder = "Correo electrónico" type = "email"/>
																		</div>
																</div>
																<div class = "12u$ 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "signUpPassword" class = "form-control" name = "signUpPassword" placeholder = "Contraseña" type = "password"/>
																		</div>
																</div>
																<div class = "12u$ 12u$(xsmall)">
																		<div class = "form-group row">
																				<input id = "verifyPassword" class = "form-control" name = "verifyPassword" placeholder = "Verificar contraseña" type = "password"/>
																		</div>
																</div>
														</div>
												</div>
												<ul class = "actions">
														<li>
																<input type = "submit" class = "special" value = "Registrarse"/>
														</li>
														<li>
																<input type = "reset" class = "alt" value = "Volver" id = "go-sign-in"/>
														</li>
												</ul>
										</form>
								</div>
						</div>
				</section>
				<footer id="footer">
						<div class="inner">
								<ul class="icons">
										<li>
												<a href = "#" class = "icon fa-facebook">
														<span class = "label">Facebook</span>
												</a>
										</li>
										<li>
												<a href = "#" class = "icon fa-twitter">
														<span class = "label">Twitter</span>
												</a>
										</li>
										<li>
												<a href = "#" class = "icon fa-instagram">
														<span class = "label">Instagram</span>
												</a>
										</li>
										<li>
												<a href = "#" class = "icon fa-linkedin">
														<span class = "label">LinkedIn</span>
												</a>
										</li>
								</ul>
								<ul class="copyright">
										<li><?php echo $_smarty_tpl->tpl_vars['applicationCompany']->value;?>
</li>
										<li>Imágenes: <a href="http://unsplash.com">Unsplash</a>.</li>
										<li>Diseño: <a href="http://templated.co">TEMPLATED</a>.</li>
								</ul>
						</div>
				</footer>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['jquery']->value;?>
"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "views/User/js/skel.min.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "views/User/js/util.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "views/User/js/main.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "virtual_classroom/<?php echo $_smarty_tpl->tpl_vars['bootstrapJs']->value;?>
"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapValidatorJs']->value;?>
"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['userJs']->value;?>
"><?php echo '</script'; ?>
>
		</body>
</html>
<?php }
}
