<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditModal">Edit Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="section/update" method="post" autocomplete="off">
                    {{method_field('patch')}}
                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">Section Name</label>
                        <input type="text" class="form-control" id="section_name" name="section_name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Sure To Edit</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>