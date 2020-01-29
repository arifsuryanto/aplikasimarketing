<!-- VIEW CUSTOMER -->

<div class="container">
<!-- button add activity -->
<button class="btn btn-warning" data-toggle="modal" data-target="#customer">Add Customer</button>
<!-- Modal -->
<div class="modal fade" id="customer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <h4 align="center">Add Activity</h4>
            <form action="<?=base_url('Activity/addActivity')?>" method="post">
                <div class="form-group">
                  <label for="activity">Name Activity</label>
                  <input type="text" class="form-control" id="activity" name="activity" >   
                </div>
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control">
               
                  </select> 
                </div>
                <div class="form-group">
                    <label for="customer">Customer</label>
                    <select name="customer" id="customer" class="form-control">
                   

                    </select> 
                    <button class="btn btn-warning">Add Customer</button>
                </div>
               
                <div class="form-group">
                  <label for="stage">Stage</label>
                  <select name="stage" id="stage" class="form-control">
                    <!-- contoh doang belum ambil dari db -->
                    <option value="">abc</option>
                  </select>   
                </div>
                <div class="form-group">
                  <label for="note">Note</label>
                  <textarea name="note" id="note" class="form-control"></textarea>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</div>