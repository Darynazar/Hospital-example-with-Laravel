

    <div class="content-center">

      

        <form action="{{ route('admin.tag.update',$tag->tag_slug) }}" method="post" id="validate-tag">
            @csrf 
            @method('patch')
            <div class="row row-sm">
              <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="tag_name" class="form-control" value="{{ $tag->tag_name }}"/>
                    
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="tag_description" class="form-control" row="10">{{ $tag->tag_description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
        </form>
    </div>
   

