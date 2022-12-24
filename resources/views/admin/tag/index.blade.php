

    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tag->tag_name }}</td>
                        <td>{{ $tag->tag_description }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($tag->created_at)->toDayDateTimeString() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.tag.edit',$tag->tag_slug) }}">Edit</a> 
                            |
                            <a href=""
                            onclick="if(confirm('Are you sure to delete this?'))event.preventDefault(); document.getElementById('delete-{{$tag->tag_slug}}').submit();">Delete</a>

                            <form id="delete-{{$tag->tag_slug}}" method="post" action="{{route('admin.tag.delete',$tag->tag_slug)}}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No tags found!</p>
                @endforelse
            </tbody>
        </table>
    </div>
