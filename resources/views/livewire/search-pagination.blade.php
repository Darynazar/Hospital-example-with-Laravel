<div class="container">
    <div class="row">
        <div class="col-md-12">
             
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
 
            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($employees as $employee)
                <tr>
                    <td>
                        {{ $employee->body }}
                    </td>
                    {{-- <td>
                        {{ $employee->email }}
                    </td> --}}
                </tr>
                @endforeach
            </table>
            {{ $employees->links() }}
        </div>
    </div>
</div>