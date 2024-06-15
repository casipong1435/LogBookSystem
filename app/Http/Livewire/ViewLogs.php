<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log;

class ViewLogs extends Component
{
    public function render()
    {
        $logs = Log::leftJoin('profiles', 'logs.id_number', '=', 'profiles.id_number')->orderBy('created_at', 'asc')
        ->paginate(2, ['first_name', 'last_name', 'logs.id', 'logs.created_at', 'logs.transaction']);
        return view('livewire.view-logs', ['logs' => $logs]);
    }
}
