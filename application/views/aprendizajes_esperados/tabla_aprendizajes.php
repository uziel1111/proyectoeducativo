<table class="table table-sm table-borderless dataTables_length" id="tabla_datos_aprendizajes">
  <thead>
    <tr>
      <th style="width:10% !important">Eje</th>
      <th style="width:10% !important">Tema</th>
      <th style="width:10% !important">Aprendizaje esperado</th>
      <th style="width:5% !important"></th>
      <th style="width:5% !important"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($aprendizajes as $key => $v): ?>
      <tr>
        <td><?=$v['eje']?></td>
        <td><?=$v['tema']?></td>
        <td><?=$v['aprendizaje_esperado']?></td>
        <td><button class="btn btn-primary btn-sm">PDF</button></td>
        <td>
          <?php if ($v['ligas'] != null): ?>
            <?php 
            $ligas = explode(",", $v['ligas']);
            for ($i=0; $i < count($ligas); $i++) { ?>
              <a href="<?=$ligas[$i] ?>">liga</a>
            <?php }
            ?>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<script src="<?= base_url('assets/js/aprendizajes_esperados/tabla_aprendizajes.js'); ?>"></script>