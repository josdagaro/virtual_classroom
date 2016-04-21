<?php
/* Smarty version 3.1.30-dev/59, created on 2016-04-20 18:57:20
  from "/var/www/html/virtual_classroom/views/Course/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/59',
  'unifunc' => 'content_57180950d9f353_49076004',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e51264f38acec592772ea53600eca5f4f337ba53' => 
    array (
      0 => '/var/www/html/virtual_classroom/views/Course/index.html',
      1 => 1461191818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57180950d9f353_49076004 (Smarty_Internal_Template $_smarty_tpl) {
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
		<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['bootstrapValidatorCss']->value;?>
"/>
		<link rel = "stylesheet" href = "<?php echo $_smarty_tpl->tpl_vars['fileInputCss']->value;?>
"/>
		<link rel = "stylesheet" href = "views/Course/css/main.css"/>		
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href = "#"><img class = "gravatar"/></a></h1>
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
										<a href = "Course">Cursos</a>
								</li>
								<li>
										<a href = "#">Perfil</a>
								</li>
								<li>
										<a href = "#">
											<span class = "glyphicon glyphicon-cog"></span>
											Configuración
										</a>
								</li>
								<li>
										<a id = "closeAccount" href = "#">Salir</a>
								</li>
						</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
						<p><span class = "glyphicon glyphicon-list-alt"></span> Bienvenido al área de gestión de cursos</p>
					</header>
        </div>
        </section>
<!--===========AGREGAR O EDITAR CURSO=================================================================================-->
	<div class = "container" id = "add-edit-container">
		<div class = "row-fluid">
			<div class = "col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<label id = "panel-label">Agregar curso</label>
					</div>
				  <div class="panel-body">
				  		<form id = "add-edit-form" enctype = "multipart/form-data"><!--action = "Course/addOrUpdate" method = "post"-->
							<div class = "form-group">
								<div class = "form-group">
									<label class = "control-label">Identificador:</label>
									<input id = "identifier-label" name = "course-id" class = "form-control" type = "text" readonly/>
								</div>
							</div>
				  			<div class = "form-group">
				  				<label class = "control-label">Nombre</label>
				  				<input id = "name" class = "form-control" type = "text" name = "name"/>
				  			</div>				  							  		
				  			<div class = "form-group">
				  				<label class = "control-label"><span class = "glyphicon glyphicon-picture"></span> Portada</label>
				  				<input id = "img" class = "file" type = "file" name = "img" data-show-upload = "false" data-show-caption = "true"/>
				  			</div>
				  			<div class = "form-group">
				  				<label class = "control-label">Descripción</label>
				  				<textarea id = "description" class = "form-control" rows = "2" name = "description" resizable = "disabled"></textarea>
				  			</div>
				  			<div class = "form-group">
				  			
				  				<button type = "submit" form = "add-edit-form" class = "btn btn-success">
				  					<span class = "glyphicon glyphicon-ok"></span>
				  					Guardar
				  				</button>
				  				<button type = "reset" class = "btn btn-default" name = "cancel-add-edit">
				  					<span class = "glyphicon glyphicon-chevron-up"></span>
				  					Cancelar
				  				</button>
				  			</div>
				  		</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
<!--=============================================================================================================-->

        <div class = "container">
        	<div class = "table-responsive">
	        	<table class = "table table-hover table-striped table-condensed" id = "crud-table">
	        		<tr>
	        			<td colspan = "6">
	        				<button id = "add-course-btn" class = "btn btn-info">
	        					<span class = "glyphicon glyphicon-plus"></span>
	        					Agregar curso
	        				</button>
	        			</td>
	        		</tr>
	        		<tr class = "success">
	        			<td>
	        				<strong>Identificador</strong>
	        			</td>
	        			<td><strong>Nombre</strong></td>
	        			<td>
	        				<strong>Descripción</strong>
	        			</td>
	        			<td><strong>Fecha de creación</strong></td>
	        			<td><strong>Imagen</strong></td>
	        			<td class = "td-options">
	        				<strong>Opciones</strong>
	        			</td>
	        		</tr>
	        		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'values', false, 'courseIdentifier');
foreach ($_from as $_smarty_tpl->tpl_vars['courseIdentifier']->value => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->_loop = true;
$__foreach_values_0_saved = $_smarty_tpl->tpl_vars['values'];
?>
	        			<tr>
	        				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
</td>
	        				<td id = "nam<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
"><?php echo $_smarty_tpl->tpl_vars['values']->value['name'];?>
</td>
	        				<td id = "des<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
"><?php echo $_smarty_tpl->tpl_vars['values']->value['description'];?>
</td>
	        				<td id = "crd<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
"><?php echo $_smarty_tpl->tpl_vars['values']->value['creation_date'];?>
</td>
	        				<td>
	        					<img id = "img<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" class = "table-img" src = "<?php echo $_smarty_tpl->tpl_vars['values']->value['image'];?>
" width = "40" align = "center"/>
	        				</td>
	        				<td><ul>				        				
	        					<li class = "table-li">	        						
	        						<a id = "m<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" href = "" class = "table-links">
	        							<span class = "glyphicon glyphicon-pencil"></span> Editar
	        						</a>
	        					</li>
	        					<li class = "table-li">
	        						<div class = "row-fluid">	        							
	        							<a id = "d<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" href = "" class = "table-links">
	        								<span class = "glyphicon glyphicon-trash"></span> Eliminar
	        							</a>
	        						</div>
	        					</li>
	        				</td></ul>
	        			</tr>	        			
	        			<tr id = "table-delete-buttons-<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" class = "table-button">
	        				<td colspan = "6">
		        				<button id = "db<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" class = "btn btn-danger">
		        					<span class = "glyphicon glyphicon-remove"></span>
		        					Eliminar
		        				</button>
		        				<button id = "cd<?php echo $_smarty_tpl->tpl_vars['values']->value['identifier'];?>
" class = "btn btn-default">
		        					<span class = "glyphicon glyphicon-chevron-up"></span>
		        					Cancelar
		        				</button>
	        				</td>
	        			</tr>
	        		<?php
$_smarty_tpl->tpl_vars['values'] = $__foreach_values_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
	        	</table>
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
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['bootstrapValidatorJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['courseJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['fileInputJs']->value;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src = "<?php echo $_smarty_tpl->tpl_vars['validationsJs']->value;?>
"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
