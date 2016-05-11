<?php
/* Smarty version 3.1.30-dev/59, created on 2016-05-11 08:02:21
  from "/opt/lampp/htdocs/virtual_classroom/views/Index/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_5732caede18d37_25776365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcfbb52bfe680069ba9f7d2d836d94cae8d33138' => 
    array (
      0 => '/opt/lampp/htdocs/virtual_classroom/views/Index/index.html',
      1 => 1462946490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5732caede18d37_25776365 (Smarty_Internal_Template $_smarty_tpl) {
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
				<link rel = "stylesheet" href = "views/Index/css/main.css"/>
		</head>
		<body class = "landing">
				<header id = "header" class = "alt">
						<h1><a href = "User?go=profile"><img class = "gravatar"/></a></h1>
						<a href = "#nav">Menú</a>
				</header>
				<nav id = "nav">
						<ul class = "links">
								<li>									
									<a href="#">
										<span class = "glyphicon glyphicon-info-sign"></span>
										Notificaciones <span class="badge">42</span>
									</a>
								</li>
								<li>										
										<a href = "Index">
											<span class = "glyphicon glyphicon-home"></span>
											Inicio
										</a>
								</li>

								<li>
										<a href = "Course">
											<span class = "glyphicon glyphicon-book"></span>
											Cursos
										</a>
								</li>
								<li>
										<a href = "User?go=profile">
											<span class = "glyphicon glyphicon-education"></span>
											Perfil
										</a>
								</li>
								<li>										
										<a href = "User/control">
											<span class = "glyphicon glyphicon-user"></span>
											Control de usuarios
										</a>
								</li>
								<li>										
										<a href = "#">
											<span class = "glyphicon glyphicon-cog"></span>
											Configuración
										</a>
								</li>
								<li>
										<a id = "closeAccount" href = "#">
											<span class = "glyphicon glyphicon-log-out"></span>
											Salir
										</a>
								</li>
						</ul>
				</nav>
				<section id = "banner">
						<div id = "img-container">
								<img src = "public/img/unicor.png" width = "100"/>
						</div>
						<h2>Aula virtual Unicor</h2>
						<p>Comprometidos con el desarrollo regional</p>
						<ul class = "actions">
								<li>
										<a href = "#" class = "button big special">Ver más</a>
								</li>
						</ul>
						<div id = "row-spacing"></div>
				</section>
				<div class = "bann">
						<ul>
								<li style = "background-image: url(<?php echo $_smarty_tpl->tpl_vars['img_1']->value;?>
);"></li>
								<li style = "background-image: url(<?php echo $_smarty_tpl->tpl_vars['img_2']->value;?>
);"></li>
								<li style = "background-image: url(<?php echo $_smarty_tpl->tpl_vars['img_3']->value;?>
);"></li>
						</ul>
				</div>
				<section id = "one" class = "wrapper style1">
						<div class = "inner">
							<header class = "major narrow">
									<h2>Cursos</h2>
									<p>Estos son nuestros 4 cursos mejor calificados</p>
							</header>
						

<!--===============================================================================================================-->

<div class = "container-fluid">
  	<div class = "row">
  		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'values', false, 'courseIdentifier');
foreach ($_from as $_smarty_tpl->tpl_vars['courseIdentifier']->value => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->_loop = true;
$__foreach_values_0_saved = $_smarty_tpl->tpl_vars['values'];
?>
	  		<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-3">  	
				<div class="thumbnail">
				   	<br>
				    <img class = "tumb-img" src="<?php echo $_smarty_tpl->tpl_vars['values']->value['image'];?>
" width = "100">
				    <div class="caption">			      			
				      	<h3><?php echo $_smarty_tpl->tpl_vars['values']->value['name'];?>
</h3>
				      	<a href="Course" class="btn btn-primary center-block" role="button">Ver más</a>
				    </div>
				</div>
			</div>	
		<?php
$_smarty_tpl->tpl_vars['values'] = $__foreach_values_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
  	</div>
 </div>


</div>
</section>

<!--===============================================================================================================-->

				<section id = "three" class = "wrapper style3 special">
						<div class = "inner">
								<header class = "major narrow">
										<h2>Matrículas</h2>
										<p>Revisa nuestro catálogo de cursos disponibles</p>
								</header>
								<ul class = "actions">
										<li>
												<a href = "#" class = "button big alt">Ir al sitio</a>
										</li>
								</ul>
						</div>
				</section>
				<section id = "four" class = "wrapper style2 special">
						<div class = "inner">
								<header class = "major narrow">
										<h2>Contáctanos</h2>
										<p>Infórmanos sobre cualquier duda que tengas</p>
								</header>
								<form>
										<div class = "container 75%">
												<div class = "row uniform 50%">
														<div class = "6u 12u$(xsmall)">
																<input name = "name" placeholder = "Nombre" type = "text"/>
														</div>
														<div class = "6u$ 12u$(xsmall)">
																<input name = "email" placeholder = "Correo electrónico" type = "email"/>
														</div>
														<div class = "12u$">
																<textarea id = "contact-textarea" name = "message" placeholder = "Mensaje" rows = "4"></textarea>
														</div>
												</div>
										</div>
										<ul class = "actions">
												<li>
														<input type = "submit" class = "special" value = "Enviar"/>
												</li>
												<li>
														<input type = "reset" class = "alt" value = "Borrar"/>
												</li>
										</ul>
								</form>
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
 src = "views/Index/js/skel.min.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "views/Index/js/util.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "views/Index/js/main.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "http://unslider.com/unslider.min.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['slideJs']->value;?>
"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['indexJs']->value;?>
"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapJs']->value;?>
"><?php echo '</script'; ?>
>
		</body>
</html>
<?php }
}
