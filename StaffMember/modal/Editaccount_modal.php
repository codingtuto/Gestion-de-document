<!-- Modal -->
<div class="modal fade" id="editaccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST">
                        <div id="msgs"></div>
                        <div class="form-group">
                            <label><b>Full Name </b></label>
                            <input type="text" class="form-control" id="edit_fullname" readonly="">
                        </div>
                        <div class="form-group">
                            <label><b>User Name </b></label>
                            <input type="text" class="form-control" id="edit_username" readonly="">
                        </div>
                        <div class="form-group">
                            <label><b>Status </b></label>
                            <select type="text" id="edit_status" class="form-control">
                                <option value="" disabled="disabled" selected="selected">&larr; Select Type &rarr;</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>Account Type </b></label>
                            <input type="text" class="form-control" id="edit_accounttype" readonly="">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="edit_id">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="edit_account">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        document.getElementById("edit_account").addEventListener("click", (e) => {
            e.preventDefault();

            const Status = ($('#edit_status option:selected').val());
            const AccountID = document.querySelector('input[id=edit_id]').value;


            var delay = 100;
            var data = new FormData(this.form);
            data.append('Status', Status);
            data.append('AccountID', AccountID);

            $.ajax({
                url: '../controllers/editaccount_process.php',
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