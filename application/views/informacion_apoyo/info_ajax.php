<div class="col-lg-12 text-justify" data-aos="zoom-in">
          <label for="slc_nivel">Seleccione nivel</label>
          <select id="slc_nivel" class="form-control">
            <option value='0'>TODOS</option>
            <?php foreach ($c_nivel as $key => $value) { ?>
              
                <option value="<?=$value['idnivel']?>" <?=$selected = ($value['idnivel'] == $nivel)? 'selected':''?> ><?=$value['nivel']?></option>
                <?php } ?>
            </select>

            <label for="slc_area">Seleccione área</label>
            <select id="slc_area" class="form-control">
              <option value='0'>TODOS</option>
            <?php foreach ($c_area as $key => $value) { ?>
                <option value="<?=$value['idarea']?>" <?=$selected = ($value['idarea'] == $area)? 'selected':''?>><?=$value['area']?></option>
                <?php } ?>
            </select>

            <label for="slc_grado">Seleccione grado</label>
            <select id="slc_grado" class="form-control">
              <option value='0'>TODOS</option>
            <?php foreach ($c_grado as $key => $value) { ?>
              
                <option value="<?=$value['grado']?>" <?=$selected = ($value['grado'] == $grado)? 'selected':''?>><?=$value['grado']?></option>
                <?php } ?>
            </select>
            <button id="btn_buscar_filtro">Buscar</button>
            <table class="table table-sm table-borderless dataTables_length" id="tabla_datos">
             <thead>
              <tr>
                <th>Nombre del recurso</th>
                <th>Fuente</th>
                <th>Tipo de recurso</th>
                <th>Público objetivo</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($datos_tabla as $key => $v) { ?>
               <tr>
                <td><a href="<?=$v['link']?>"><?=$v['nombre']?></a></td>
                <td><?=$v['fuente']?></td>
                <td><?=$v['tipo_recurso']?></td>
                <td><?=$v['publico_objetivo']?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>