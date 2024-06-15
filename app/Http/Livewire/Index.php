<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log;
use App\Models\TransactionType;
use App\Models\Profile;

class Index extends Component
{

    public $id_number;
    public $first_name;
    public $last_name;
    public $purpose = null;
    public $other_purpose;

    public function render()
    {
        $transactions = TransactionType::get();

        return view('livewire.index', ['transactions' => $transactions]);
    }

    public function resetFields(){
        $this->id_number = "";
        $this->first_name = "";
        $this->last_name = "";
        $this->purpose = null;
        $this->other_purpose = "";
    }

    public function submitTransaction(){

        $this->specifyPurpose();

        $this->validate([
            'id_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'purpose' => 'required',
        ]);

        try{
            $existingID = Profile::where('id_number', $this->id_number)->first();
            
            if (!$existingID){
                $new_profile = [
                    'id_number' => $this->id_number,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                ];

                Profile::create($new_profile);
            }
            
            $new_log = [
                'id_number' => $this->id_number,
                'transaction' => $this->purpose,
            ];

            Log::create($new_log);
                $this->dispatchBrowserEvent('success');
                $this->resetFields();

        }catch(\Exception $e){
            $this->dispatchBrowserEvent('error');
        }
    }

    public function specifyPurpose(){
        if ($this->purpose == ''){
            $this->purpose = $this->other_purpose;
        }
    }
}
