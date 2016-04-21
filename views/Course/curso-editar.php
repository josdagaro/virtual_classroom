<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=curso">Cursos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=curso&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre"  title="por favor escriba solo texto" data-validacion-tipo="requerido|min:3" />
    </div>
     
    
    <div class="form-group">
        <label>Descripcion</label>

        <textarea type="textarea" name="descripcion" value="<?php echo $alm->descripcion; ?>" class="form-control" placeholder="Ingrese su descripcion" data-validacion-tipo="requerido|min:10" />
        </textarea>
    </div>
    

    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" value="<?php echo $alm->fecha; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>
    
    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>