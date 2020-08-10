<table class="table table-sm table-borderless dataTables_length" id="tabla_datos_aprendizajes">
  <thead>
    <tr>
      <th style="width:15% !important">Eje</th>
      <th style="width:25% !important">Tema</th>
      <th style="width:50% !important">Aprendizaje esperado</th>
      <th style="width:5% !important"></th>
      <th style="width:5% !important"></th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($aprendizajes)): ?>
    <?php foreach ($aprendizajes as $key => $v): ?>
      <tr>
        <td><?=$v['eje']?></td>
        <td><?=$v['tema']?></td>
        <td><?=$v['aprendizaje_esperado']?></td>
        <td><a class="btn btn-primary btn-sm" href="<?=base_url("reportes/aprendizajes/{$v['idnivel']}/{$v['idcomponente']}/{$v['idcampo']}/{$v['idgrado']}/{$v['idasignatura']}/{$v['ideje']}/{$v['idtema']}/{$v['idaprendizaje_esperado']}")?>" target="_blank" title="Generar Ficha del Aprendizaje Esperado">Ficha</a></td>
        <td>

          <?php if ($v['ligas'] != null): ?>
            <?php
            $ligas = explode(",", $v['ligas']);
            for ($i=0; $i < count($ligas); $i++) { ?>
              <a class="btn btn-primary btn-sm"  href="<?=$ligas[$i] ?>" target="_blank"  title="Ir a referencia"><i class="fas fa-paperclip"></i></a>
            <?php }
            ?>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
    <?php endif ?>
  </tbody>
</table>
<script src="<?= base_url('assets/js/aprendizajes_esperados/tabla_aprendizajes.js'); ?>"></script>
