<?php
// $personas = PersonData::getAll(); -- renzot
$personas = PersonData::getAllActive(); // RENZOT

// RENZOT >>
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
endif;
// << RENZOT

?>
<div class="row">
	<div class="col-md-12">
		<h1>Personas </h1>
	<?php if($u->is_admin):?><a href="index.php?view=newperson" class="btn btn-default"><i class='fa fa-asterisk'></i> Nueva persona</a><?php endif;?>

<br><br>
		<?php
		if(count($personas)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Empresa</th>
			<?php if($u->is_admin):?><th></th><?php endif;?>
			</thead>
			<?php
			foreach($personas as $al){
				$persona = $al;
				?>
				<tr>
				<td><?php echo $persona->lastname.", ".$persona->name; ?></td>
				<td><?php echo $persona->c1_fullname; ?></td>
				<?php if($u->is_admin):?>
				<td style="width:160px;">
					<a href="index.php?view=editperson&id=<?php echo $persona->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?action=delperson&id=<?php echo $persona->id;?>&tid=<?php echo $team->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				<?php endif;?>
				</tr>
				<?php

			}

echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Personas</p>";
		}


		?>


	</div>
</div>