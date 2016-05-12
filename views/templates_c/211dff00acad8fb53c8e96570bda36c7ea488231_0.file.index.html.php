<?php
/* Smarty version 3.1.30-dev/59, created on 2016-05-12 00:19:29
  from "/opt/lampp/htdocs/virtual_classroom/views/Receives/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_5733aff1c27456_38340802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '211dff00acad8fb53c8e96570bda36c7ea488231' => 
    array (
      0 => '/opt/lampp/htdocs/virtual_classroom/views/Receives/index.html',
      1 => 1463004983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5733aff1c27456_38340802 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
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
						<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
						<p><span class = "glyphicon glyphicon-info-sign"></span> Solicitudes pendientes</p>
					</header>					
        </div>
        </section>

<!--=============================================================================================================-->		
        <div class = "container" id = "req-container">
        	<?php if ($_smarty_tpl->tpl_vars['requests']->value == null) {?>
	        	<div class = "panel panel-success" id = "no-ntf">
	        		<div class = "panel-heading">
	        			<h2>No hay solicitudes</h2>
	        		</div>	        	
	        		<div class = "panel-body">
	        			Cuando haya una nueva solicitud, se hará notorio en la barra de navegación
	        		</div>
	        	</div>
        	<?php }?>

        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['requests']->value, 'values', false, 'requestId');
foreach ($_from as $_smarty_tpl->tpl_vars['requestId']->value => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->_loop = true;
$__foreach_values_0_saved = $_smarty_tpl->tpl_vars['values'];
?>
	        	<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php if ($_smarty_tpl->tpl_vars['values']->value['type'] == 0) {?>
								Solicitud de rol
							<?php }?>
						</h3>
					</div>
					<div class="panel-body">
						<form role = "form">
							<div class = "form-group">
								<label>Nombres del emisor: <?php echo $_smarty_tpl->tpl_vars['values']->value['user']['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['values']->value['user']['last_name'];?>
</label>
								<label>Correo electrónico: <?php echo $_smarty_tpl->tpl_vars['values']->value['user']['email'];?>
</label>
								<label>
									Rol actual:
									<?php if ($_smarty_tpl->tpl_vars['values']->value['user']['type'] == 0) {?>
										<span class = "label label-success">Administrador</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['values']->value['user']['type'] == 1) {?>
										<span class = "label label-success">Docente</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['values']->value['user']['type'] == 2) {?>
										<span class = "label label-success">Estudiante</span>
									<?php } else { ?>
										<span class = "label label-default">Desconocido</span>
									<?php }?> | 
									<?php if ($_smarty_tpl->tpl_vars['values']->value['body'] == "teacher") {?>
										Petición de ascenso a <span class = "label label-success">docente</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['values']->value['body'] == "admin") {?>
										Petición de ascenso a <span class = "label label-success">administrador</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['values']->value['body'] == "student") {?>
										Petición de ascenso a <span class = "label label-success">estudiante</span>
									<?php } else { ?>
										Petición de ascenso <span class = "label label-default">desconocido</span>
									<?php }?>
								</label>
							</div>
							<div class = "form-group">
								<button id = "a<?php echo $_smarty_tpl->tpl_vars['values']->value['id'];?>
" class = "btn btn-default" type = "button">Aceptar</button>
								<button id = "c<?php echo $_smarty_tpl->tpl_vars['values']->value['id'];?>
" class = "btn btn-default" type = "button">Ignorar</button>
							</div>
						</form>
					</div>
				</div> 
			<?php
$_smarty_tpl->tpl_vars['values'] = $__foreach_values_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
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
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['receivesJs']->value;?>
"><?php echo '</script'; ?>
>		
	</body>
</html>
<?php }
}
