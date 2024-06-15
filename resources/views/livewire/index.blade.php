<div>
    <div class="col-md-12">
        <div class="row d-flex justify-content-center p-3 g-0">
            <div class="col-xl-3">
                <div class="container w-100 shadow-sm p-2 rounded">
                    <div class="form-group mb-1 fw-bold fs-3 d-flex justify-content-center align-items-center">
                        <span class="bi bi-journal-plus d-flex justify-content-center align-content-center me-2"></span>
                        <span>Log Book</span>
                    </div>
                    <div class="form-group mb-2 fs-5 text-center">Make new transaction.</div>
                    <div class="px-2">
                        <form wire:submit.prevent="submitTransaction">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="id_number">ID Number</label>
                                <input type="text" id="id_number" wire:model="id_number" class="w-100 p-2 form-control @error('id_number') is-invalid @enderror">
                                @error('id_number')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" wire:model="first_name" class="w-100 p-2 form-control @error('first_name') is-invalid @enderror">
                                @error('first_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" wire:model="last_name" class="w-100 p-2 form-control @error('last_name') is-invalid @enderror">
                                @error('last_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="purpose">Purpose</label>
                                <select id="purpose" wire:model="purpose" class="form-control w-100 p-2 @error('purpose') is-invalid @enderror">
                                    <option>Select a purpose</option>
                                    @foreach ($transactions as $transaction)
                                        <option value="{{$transaction->transaction}}">{{$transaction->transaction}}</option>
                                    @endforeach
                                    <option value="">Others</option>
                                </select>
                                <div wire:ignore class="form-group d-none" id="other_purpose">
                                    <input type="text" class="form-control w-100 p-2 mt-2" wire:model="other_purpose" placeholder="Specify Here..">
                                </div>
                                @error('purpose')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-dark w-100">Submit</button>
                            </div>
                        </form>
                        <div class="form-group mb-2">
                            <a href="{{ route('logs') }}" class="btn btn-outline-dark w-100">View Logs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.alert-dialog')

    <script>
        window.addEventListener('success', function(){
            $('#successAlertDialog').modal('show');
        });

        window.addEventListener('error', function(){
            $('#errorAlertDialog').modal('show');
        });

        $(document).ready(function(){
            $('#purpose').change(function(){
                var selected = $('option:selected', this).text();
                
                if (selected == "Others"){
                    $('#other_purpose').removeClass('d-none');
                }else{
                    $('#other_purpose').addClass('d-none');
                }
        
            });
 
        });
    </script>
</div>
