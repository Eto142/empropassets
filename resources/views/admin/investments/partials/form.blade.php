<div>
    <label style="font-weight:bold;">Investment Type</label>
    <input type="text" name="type" value="{{ old('type', $investment->type ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Investment Name</label>
    <input type="text" name="name" value="{{ old('name', $investment->name ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Historic Yield (%)</label>
    <input type="number" step="0.01" name="historic_yield"
           value="{{ old('historic_yield', $investment->historic_yield ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Total Assets ($)</label>
    <input type="number" name="total_assets"
           value="{{ old('total_assets', $investment->total_assets ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Minimum Investment ($)</label>
    <input type="number" name="min_investment"
           value="{{ old('min_investment', $investment->min_investment ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Investors</label>
    <input type="number" name="investors"
           value="{{ old('investors', $investment->investors ?? '') }}" required
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

<div>
    <label style="font-weight:bold;">Status</label>
    <select name="status"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
        <option value="available" {{ old('status', $investment->status ?? '')=='available'?'selected':'' }}>
            Available
        </option>
        <option value="closed" {{ old('status', $investment->status ?? '')=='closed'?'selected':'' }}>
            Closed
        </option>
    </select>
</div>

<div>
    <label style="font-weight:bold;">Investment Image</label>
    <input type="file" name="image"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
</div>

@isset($investment->image)
    <div>
        <img src="{{ asset('storage/'.$investment->image) }}" width="120" style="border-radius:6px;">
    </div>
@endisset
