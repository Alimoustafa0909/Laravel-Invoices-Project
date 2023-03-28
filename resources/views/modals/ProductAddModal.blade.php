<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{route('product.store')}}" autocomplete="off" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name</label>
                        <input type="text"  class="form-control" id="product_id" name="product_name">
                    </div>


                        <label for="recipient-name" class="side-menu__item">Section</label>


                        <select name="section_id" id="section_id" class="form-control" required>
                            <option value="" selected disabled> --حدد القسم--</option>
                            @foreach($sections as $section)
                                <option value=" {{$section->id}}">{{$section->section_name}}</option>
                            @endforeach

                        </select>


                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"  ></textarea>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>