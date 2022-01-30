@php
    isset($administrator) ? $name = $administrator->name : $name = old('name');
    isset($administrator) ? $email = $administrator->email : $email = old('email');
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
