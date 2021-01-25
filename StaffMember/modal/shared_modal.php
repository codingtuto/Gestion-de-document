

<!-- Update Photo -->
<div class="modal fade" id="sharedID">
           <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Shared File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body">
            <div id="msgs"></div>
              <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="col-md-12">
                                <label for="Corporate"><b>Shared to</b></label>
                                <select class="form-control form-control-sm" id="StaffID" required="">
                                <option value="" disabled="disabled" selected="selected">&larr; Select Type &rarr;</option>
                                    <?php
                                       require_once("../config/connection/access_db.php");
                                        $sql = "SELECT  *  FROM  staff";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_array()) {
                                            echo "<option value=\"" . htmlspecialchars($row['StaffID']) . "\">" . $row['FirstName'] .' '.$row['MiddleName'].'. '.$row['LastName']. "</option>";
                                        }
                                     ?>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="shared_filename" >
            <input type="hidden" id="shared_size" >
            <input type="hidden" id="shared_download" >
            <input type="hidden" id="shared_timeupload" >
            <input type="hidden" id="shared_fullname" >
            <input type="hidden" id="shared_status" >
            <input type="hidden" id="shared_variable" >
            <div class="modal-footer">
              <input type="hidden" id="shared_id" >
               <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="button" class="btn btn-primary btn-flat btn-sm" id="shared" name="upload"><i class="fa fa-check-square-o"></i><i class="fa fa-share"></i>  Shared</button>
              </form>
            </div>
        </div>
    </div>
</div>    



    <script type="text/javascript">
   $(document).ready(function() {
   
    document.getElementById("shared").addEventListener("click", (e) =>{
     e.preventDefault();

      const StaffID = ($('#StaffID option:selected').val());
      const shared_filename = document.querySelector('input[id=shared_filename]').value;
      const shared_size = document.querySelector('input[id=shared_size]').value;
      const shared_download = document.querySelector('input[id=shared_download]').value;
      const shared_timeupload = document.querySelector('input[id=shared_timeupload]').value;
      const shared_fullname = document.querySelector('input[id=shared_fullname]').value;
      const shared_status = document.querySelector('input[id=shared_status]').value;
      const shared_variable = document.querySelector('input[id=shared_variable]').value;
      const shared_id = document.querySelector('input[id=shared_id]').value;


         var delay = 100;
               var data = new FormData(this.form);
                data.append('StaffID', StaffID);
                data.append('shared_filename', shared_filename);
                data.append('shared_size', shared_size);
                data.append('shared_download', shared_download);
                data.append('shared_timeupload', shared_timeupload);
                data.append('shared_fullname', shared_fullname);
                data.append('shared_status', shared_status);
                data.append('shared_variable', shared_variable);
                data.append('shared_id', shared_id);
   
            $.ajax({
                url: '../controllers/shared_process.php',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
   
                async: false,
                cache: false,
   
                success: function(data) {
                    setTimeout(function() {
                        $('#msgs').html(data);
                    }, delay);
                    setTimeout(location.reload.bind(location), 200);
   
                },
                error: function(data) {
                    console.log("Failed");
                }
            });
   
        });
    });
</script>