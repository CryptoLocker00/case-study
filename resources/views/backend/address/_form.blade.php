@php
    isset($address) ? $lineOne = $address->line_one : $lineOne = old('line_one');
    isset($address) ? $lineTwo = $address->line_two : $lineTwo = old('line_two');
    isset($address) ? $postcode = $address->postcode : $postcode = old('postcode');
    isset($address) ? $district = $address->district : $district = old('district');
    isset($address) ? $state = $address->state : $state = old('state');
    isset($address) ? $country = $address->country : $country = old('country');
@endphp

<div class="row mb-3">
    <div class="col-md-12">
        <label for="line-one" class="col-form-label mandatory">Address line 1</label>
        <input type="text" name="line_one" class="form-control" id="line-one" value="{{ $lineOne }}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="line-two" class="col-form-label">Address line 2</label>
        <input type="text" name="line_two" class="form-control" id="line-two" value="{{ $lineTwo }}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="postcode" class="col-form-label">Postcode</label>
        <input type="text" name="postcode" class="form-control" id="postcode" value="{{ $postcode }}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="district" class="col-form-label">District</label>
        <input type="text" name="district" class="form-control" id="district" value="{{ $district }}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="state" class="col-form-label">State</label>
        <input type="text" name="state" class="form-control" id="state" value="{{ $state }}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="country" class="col-form-label">Country</label>
        <input type="text" name="country" class="form-control" id="country" value="{{ $country }}">
    </div>
</div>
