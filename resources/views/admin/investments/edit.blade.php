@include('admin.header')

<style>
.main-container { margin-left: 250px; padding: 40px 20px; }
@media(max-width: 992px){ .main-container { margin-left: 0; } }
</style>

<div class="main-container">

    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.investments.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h2 class="fw-bold mb-0">Edit: {{ $investment->name }}</h2>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.investments.update', $investment) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- CORE --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Listing Type</label>
                        <select name="listing_type" id="listing_type" class="form-select">
                            <option value="investment" {{ old('listing_type', $investment->listing_type)==='investment'?'selected':'' }}>Investment</option>
                            <option value="for_sale"   {{ old('listing_type', $investment->listing_type)==='for_sale'?'selected':'' }}>For Sale</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Property Type</label>
                        <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                               value="{{ old('type', $investment->type) }}" placeholder="e.g., Residential, Commercial">
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Property Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $investment->name) }}" placeholder="e.g., Sunset Villas">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="available" {{ old('status', $investment->status)==='available'?'selected':'' }}>Available</option>
                            <option value="closed"    {{ old('status', $investment->status)==='closed'?'selected':'' }}>Closed</option>
                        </select>
                    </div>

                    {{-- FINANCIAL --}}
                    <div class="col-12 mt-2"><h6 class="fw-bold text-muted text-uppercase" style="font-size:.8rem;letter-spacing:.08em;">Financial Details</h6><hr class="mt-1 mb-0"></div>

                    <div class="col-md-4" id="field_historic_yield">
                        <label class="form-label fw-semibold">Yield (%)</label>
                        <input type="number" step="0.01" name="historic_yield"
                               class="form-control @error('historic_yield') is-invalid @enderror"
                               value="{{ old('historic_yield', $investment->historic_yield) }}" placeholder="e.g., 8.5">
                        @error('historic_yield')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4" id="field_total_assets">
                        <label class="form-label fw-semibold">Total Value ($)</label>
                        <input type="number" name="total_assets"
                               class="form-control @error('total_assets') is-invalid @enderror"
                               value="{{ old('total_assets', $investment->total_assets) }}" placeholder="e.g., 5000000">
                        @error('total_assets')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4" id="field_sale_price">
                        <label class="form-label fw-semibold">Sale Price ($)</label>
                        <input type="number" name="sale_price"
                               class="form-control @error('sale_price') is-invalid @enderror"
                               value="{{ old('sale_price', $investment->sale_price) }}" placeholder="e.g., 1250000">
                        @error('sale_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4" id="field_min_investment">
                        <label class="form-label fw-semibold">Min Investment ($)</label>
                        <input type="number" name="min_investment"
                               class="form-control @error('min_investment') is-invalid @enderror"
                               value="{{ old('min_investment', $investment->min_investment) }}" placeholder="e.g., 10000">
                        @error('min_investment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4" id="field_share_price">
                        <label class="form-label fw-semibold">Share Price ($)</label>
                        <input type="number" name="share_price"
                               class="form-control @error('share_price') is-invalid @enderror"
                               value="{{ old('share_price', $investment->share_price) }}" placeholder="e.g., 100">
                        @error('share_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4" id="field_investors">
                        <label class="form-label fw-semibold">Investors</label>
                        <input type="number" name="investors"
                               class="form-control @error('investors') is-invalid @enderror"
                               value="{{ old('investors', $investment->investors) }}" placeholder="e.g., 120">
                        @error('investors')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- LOCATION & DESCRIPTION --}}
                    <div class="col-12 mt-2"><h6 class="fw-bold text-muted text-uppercase" style="font-size:.8rem;letter-spacing:.08em;">Location & Description</h6><hr class="mt-1 mb-0"></div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" name="location" class="form-control"
                               value="{{ old('location', $investment->location) }}" placeholder="e.g., Downtown, New York">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" rows="4" class="form-control"
                                  placeholder="Provide a brief description of the property">{{ old('description', $investment->description) }}</textarea>
                    </div>

                    {{-- IMAGES --}}
                    <div class="col-12 mt-2"><h6 class="fw-bold text-muted text-uppercase" style="font-size:.8rem;letter-spacing:.08em;">Images</h6><hr class="mt-1 mb-0"></div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Main Image</label>
                        @if($investment->image)
                            <div class="mb-2">
                                <img src="{{ $investment->image }}" style="height:120px; object-fit:cover; border-radius:8px; display:block;">
                                <small class="text-muted">Current image — upload a new one to replace it.</small>
                            </div>
                        @endif
                        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                        <img id="previewImage" src="" style="height:120px; object-fit:cover; border-radius:8px; margin-top:8px; display:none;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Gallery Images</label>
                        @if($investment->gallery)
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                @foreach($investment->gallery as $img)
                                    <img src="{{ $img }}" style="height:70px;width:70px;object-fit:cover;border-radius:6px;">
                                @endforeach
                            </div>
                            <small class="text-muted d-block mb-1">Select new files to replace the entire gallery.</small>
                        @endif
                        <input type="file" name="gallery[]" class="form-control" multiple accept="image/*">
                    </div>

                    {{-- PROPERTY FACTS --}}
                    <div class="col-12 mt-2"><h6 class="fw-bold text-muted text-uppercase" style="font-size:.8rem;letter-spacing:.08em;">Property Facts</h6><hr class="mt-1 mb-0"></div>

                    <div class="col-md-4">
                        <label class="form-label">Size (sqft)</label>
                        <input type="number" name="size" class="form-control" value="{{ old('size', $investment->size) }}" placeholder="e.g., 2400">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Bedrooms</label>
                        <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $investment->bedrooms) }}" placeholder="e.g., 4">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Bathrooms</label>
                        <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $investment->bathrooms) }}" placeholder="e.g., 3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Parking</label>
                        <input type="number" name="parking" class="form-control" value="{{ old('parking', $investment->parking) }}" placeholder="e.g., 2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Year Built</label>
                        <input type="number" name="year_built" class="form-control" value="{{ old('year_built', $investment->year_built) }}" placeholder="e.g., 2022">
                    </div>

                    {{-- AMENITIES --}}
                    <div class="col-12 mt-2"><h6 class="fw-bold text-muted text-uppercase" style="font-size:.8rem;letter-spacing:.08em;">Amenities</h6><hr class="mt-1 mb-0"></div>

                    @php
                        $amenities        = ['Swimming Pool','Gym','24/7 Security','Smart Home','Elevator','Power Backup','Parking Lot','High-Speed Internet'];
                        $savedAmenities   = old('amenities', $investment->amenities ?? []);
                    @endphp

                    @foreach($amenities as $amenity)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   name="amenities[]" value="{{ $amenity }}"
                                   id="amenity_{{ Str::slug($amenity) }}"
                                   {{ in_array($amenity, $savedAmenities) ? 'checked' : '' }}>
                            <label class="form-check-label" for="amenity_{{ Str::slug($amenity) }}">{{ $amenity }}</label>
                        </div>
                    </div>
                    @endforeach

                    {{-- ACTIONS --}}
                    <div class="col-12 d-flex gap-2 mt-3 pt-2 border-top">
                        <button type="submit" class="btn btn-primary px-5">Update Property</button>
                        <a href="{{ route('admin.investments.index') }}" class="btn btn-secondary px-4">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
const listingType = document.getElementById('listing_type');

function toggleFields() {
    const isForSale = listingType.value === 'for_sale';
    document.getElementById('field_historic_yield').style.display = isForSale ? 'none' : '';
    document.getElementById('field_total_assets').style.display   = isForSale ? 'none' : '';
    document.getElementById('field_min_investment').style.display = isForSale ? 'none' : '';
    document.getElementById('field_share_price').style.display    = isForSale ? 'none' : '';
    document.getElementById('field_investors').style.display      = isForSale ? 'none' : '';
    document.getElementById('field_sale_price').style.display     = isForSale ? '' : 'none';
}

listingType.addEventListener('change', toggleFields);
toggleFields();

document.getElementById('imageInput').addEventListener('change', e => {
    const [file] = e.target.files;
    if (file) {
        const preview = document.getElementById('previewImage');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
});
</script>

@include('admin.footer')
