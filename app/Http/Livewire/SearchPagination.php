<?php
 
namespace App\Http\Livewire;
 
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\Post;

class SearchPagination extends Component
{
    use WithPagination;
    public $searchTerm;
 
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-pagination',[
            'employees' => Post::where('body','like', $searchTerm)->paginate(10)
        ]);
    }
}