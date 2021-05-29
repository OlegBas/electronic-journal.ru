<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>№</th>
                  <th>ФИО</th>
                  <th>Семья полная</th>
                  <th>Семья неполная</th>
                  <th>Многодетные</th>
                  <th>Беженцы переселенцы</th>
                  <th>Родители инвалиды</th>
                  <th>Дети инвалиды</th>
                  <th>Опекаемые</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($peoples as $onePeople) {?> 
                <tr>
                  <td><?=$onePeople->id?></td>
                  <td><?=$onePeople->user["fio"]?></td>
                  <td><?=$onePeople->prop1?></td>
                  <td><?=$onePeople->prop2?></td>
                  <td><?=$onePeople->prop3?></td>
                  <td><?=$onePeople->prop4?></td>
                  <td><?=$onePeople->prop5?></td>
                  <td><?=$onePeople->prop6?></td>
                  <td><?=$onePeople->prop7?></td>
                </tr>
                <?php }?>
              </tbody>
            </table>