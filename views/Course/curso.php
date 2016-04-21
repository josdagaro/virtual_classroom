<h1 class="page-header">cursos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=curso&a=Crud">Nuevo curso</a>
 <a class="btn btn-primary" href="./">INICIO</a>


</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Descripcion</th>

            <th style="width:120px;">fecha</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->descripcion; ?></td>

            <td><?php echo $r->fecha; ?></td>
            
            <td>
                <a href="?c=curso&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=curso&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
