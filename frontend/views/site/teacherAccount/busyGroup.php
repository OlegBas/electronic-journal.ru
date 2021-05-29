<table class="table table-bordered table-hover">
              <thead>
                
                <tr>
                  <th>№</th>
                  <th>ФИО</th>
                  <th>Название секции</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($peoples as $people) {?>
                <tr>
                  <td><?= $people->id?></td>
                  <td><?=$people->user["fio"]?></td>
                  <td><?=$people->prop11?></td>
                </tr>
                <?php }?>
              </tbody>
          </table>