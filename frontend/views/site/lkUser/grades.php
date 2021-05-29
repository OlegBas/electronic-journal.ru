<div class="row">
   <div class="col-md-6">
      <table class = "table">
         <tr>
            <td><b>ID</b></td>
            <td><b>Наименование</b></td>
         </tr>
         <tr>
            <td>1</td>
            <td><a href="#" data-toggle="modal" data-target="#infoGrade">Математика</a></td>
         </tr>
         <tr>
            <td>2</td>
            <td><a href="#" data-toggle="modal" data-target="#infoGrade">Физика</a></td>
         </tr>
      </table>
   </div>
</div>
<div class="modal fade" id="infoGrade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><b>Предмет:</b> Математика</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12" >
                  <form class="form-inline" role="form">
                     <div class="form-group">
                        <label for="exampleInputPart">Выберите четверть:</label>
                        <select class="form-control input-sm" id = "exampleInputPart">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                        </select>
                     </div>
                     <button type="submit" class="btn btn-primary">Применить</button>
                  </form>
                  <br>
                  <br>
                  <table class = "table">
                     <tr>
                        <td>КР1</td>
                        <td>КР2</td>
                        <td>КР3</td>
                        <td>КР4</td>
                        <td>КР5</td>
                        <td>СР балл по предмету</td>
                     </tr>
                     <tr>
                        <td>4</td>
                        <td>4</td>
                        <td>5</td>
                        <td>5</td>
                        <td>5</td>
                        <td>4,5</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>