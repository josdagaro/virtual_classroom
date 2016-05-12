<?php
/* Smarty version 3.1.30-dev/59, created on 2016-05-11 23:58:40
  from "/opt/lampp/htdocs/virtual_classroom/views/User/profile.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_5733ab10134f13_19898449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30eb68a5ee3f4883308315f2360ab7f6020fd543' => 
    array (
      0 => '/opt/lampp/htdocs/virtual_classroom/views/User/profile.html',
      1 => 1463003316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5733ab10134f13_19898449 (Smarty_Internal_Template $_smarty_tpl) {
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
    	<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['bootstrapCss']->value;?>
"/>    				
    	<link rel = "stylesheet" href = "views/Course/css/main.css"/>
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href = "User?go=profile"><img class = "gravatar"/></a></h1>	
				<a href="Receives">Notificaciones <span class="badge"></span></a>							
				<a href="#nav">Menú</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class = "links">
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

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2 id = "user-name"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
						<p><span class = "glyphicon glyphicon-user"></span> Perfil de usuario</p>
					</header>					
        </div>
        </section>

<!--=============================================================================================================-->		
        <div class = "container">
        	<div class="panel panel-default">
        		<div class="panel-heading">
					<h3 class="panel-title">Información de la cuenta</h3>
				</div>
				<div class="panel-body">
					<div class = "row">
						<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label id = "user-email" class = "label label-primary"></label>
						</div>
						<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label id = "user-id" class = "label label-default"></label>
						</div>
					</div>
				</div>
        	</div>
        	<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Solicitud de rol</h3>
				</div>
				<div class="panel-body">
					<form id = "user-rol">
						<div class="form-group">
							<label class = "label label-success" id = "current-role">						
							</label>
						  	<label for="rol-sel">Roles disponibles:</label>
						  	<select class="form-control" id="rol-sel" name = "selected-role">
						    	<option value = "2" selected>Estudiante</option>
						    	<option value = "1">Docente</option>
						    	<option value = "0">Administrador</option>
						  	</select>
						</div>
						<div class = "form-group">
							<button id = "btn-sel" type = "button" class="btn btn-info">Solicitar</button>
						</div>						
					</form>
				</div>
			</div>        
		</div>
 <!--=============================================================================================================-->

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
      	<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['jquery']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "views/Course/js/skel.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "views/Course/js/util.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "views/Course/js/main.js"><?php echo '</script'; ?>
>
		<!--<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapDropdown']->value;?>
"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['profileJs']->value;?>
"><?php echo '</script'; ?>
>		
	</body>
</html>
<?php }
}
