<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DeleteModal">Edit Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="section/destroy" method="post" autocomplete="off">
                    {{method_field('delete')}}
                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">Section Name</label>
                        <input type="text" class="form-control" id="section_name" name="section_name">
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
