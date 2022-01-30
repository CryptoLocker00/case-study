@php
    isset($user) ? $name = $user->name : $name = old('name');
    isset($user) ? $email = $user->email : $email = old('email');
    isset($user) ? $addressId = $user->address_id : $addressId = old('address_id');
@endphp

<div class="row mb-3">
    <div class="col-md-12">
        <label for="name" class="col-form-label mandatory">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $name }}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="email" class="col-form-label mandatory">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{ $email }}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="address-id">Address</label>
        <select id="address-id" name="address_id" class="form-control">
            <option disabled selected>Select an address</option>
            @foreach($addresses as $address)
                <option value="{{$address->id}}"
                        @if($addressId == $address->id) selected @endif>
                    {{ $address->line_one }}, {{ $address->line_two }}
                </option>
            @endforeach
        </select>
    </div>
</div>
