<?php

namespace App\Livewire;

use App\Models\JobCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SearchRoleForm extends Component
{
    use WithPagination;

    #[Url(as : 's', history : true)]
    public $role;

    #[Url(as: 't', history: true)]
    public $type = [];

    #[Url(as: 'l', history: true)]
    public $level = [];

    #[Computed()] 
    public function roles() { // job role options
        return JobCategories::all();
    }

    function search_role() {
        $this->validate([
            'role' => 'required'
        ],[
            // validations
            'role.required' => 'Role is required',
        ]);
    }

    public function render()
    {
        $searchQuery = DB::table('job_posts')
                            ->join('users', 'job_posts.by_user', '=', 'users.id')
                            ->select(
                                'job_posts.*',
                                'users.profile_photo as user_image',
                                'users.name as user_name',
                                'users.currency as user_currency',
                                'users.location as user_location',
                            )
                            ->when($this->role, function ($query) {
                                return $query->where('job_posts.role', $this->role);
                            })
                            ->when(!empty($this->type), function ($query) {
                                return $query->whereIn('job_posts.type', $this->type);
                            })
                            ->when(!empty($this->level), function ($query) {
                                return $query->whereIn('job_posts.level', $this->level);
                            })
                            ->orderBy('job_posts.created_at', 'desc');

        $results = $searchQuery->paginate(4)->withQueryString();
        $results->getCollection()->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });

        $resultsCount = $results->total();

        return view('livewire.search-role-form', [
            'results' => $results,
            'resultsCount' => $resultsCount
        ]);
    }
}
