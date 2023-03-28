<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DeleteModal">delete Attachment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('delete_file')}}" method="post" autocomplete="off">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="text" name="id_file" id="id_file" value="">
                        <input type="text" name="file_name" id="file_name"value="" >
                        <input type="text" name="invoice_number" id="invoice_number"value="" >
                        <label for="recipient-name" class="col-form-label"> Are You Sure To Delete ?</label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
                        <button type="submit" class="btn btn-success">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
