@include('admin.header')

<style>

    {{-- Add this CSS to your admin styles --}}

.collapse-icon {
    transition: transform 0.3s ease;
}
.collapse.show + .collapse-icon,
button[aria-expanded="true"] .collapse-icon {
    transform: rotate(180deg);
}
.investment-card:hover {
    transform: translateY(-5px);
    transition: all 0.3s;
}

.main-container { margin-left: 250px; padding: 40px 20px; }
@media(max-width: 992px){ .main-container { margin-left: 0; } }

.investment-card:hover { transform: translateY(-5px); transition: all 0.3s; }
.investment-card img { height: 180px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem; }
.badge-status { position: absolute; top: 10px; right: 10px; font-size: .8rem; padding: 5px 10px; }

#previewImage { max-height: 140px; width: 100%; object-fit: cover; margin-top: 10px; border-radius: 8px; }
.modal-dialog-scrollable .modal-body { max-height: 75vh; overflow-y: auto; }
</style>

<div class="main-container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Investment Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#investmentModal"
                onclick="openCreateModal()">
            + Add Property Investment
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($investments as $investment)
        <div class="col">
            <div class="card h-100 shadow-sm investment-card position-relative border-0">
                {{-- MAIN IMAGE --}}
                <div class="position-relative">
                    <img src="{{ $investment->image ? asset('images/investments/'.$investment->image) : asset('assets/images/placeholder.png') }}"
                         class="card-img-top rounded-top" style="height:220px; object-fit:cover;">
                    
                    {{-- LISTING TYPE BADGE --}}
                    <span class="badge bg-dark badge-status px-3 py-2"
                          style="position:absolute; top:12px; left:12px; font-weight:600; font-size:0.8rem;">
                        {{ ($investment->listing_type ?? 'investment') === 'for_sale' ? 'For Sale' : 'Investment' }}
                    </span>

                    {{-- STATUS BADGE --}}
                    <span class="badge {{ $investment->status == 'available' ? 'bg-success' : 'bg-secondary' }} badge-status px-3 py-2"
                          style="position:absolute; top:12px; right:12px; font-weight:600; font-size:0.85rem;">
                        {{ ucfirst($investment->status) }}
                    </span>
                </div>

                <div class="card-body d-flex flex-column p-3">

                    {{-- MAIN INFO --}}
                    <h5 class="fw-bold mb-1">{{ $investment->name }}</h5>
                    <div class="text-muted small mb-2">{{ $investment->location ?? 'N/A' }}</div>

                    <div class="mb-2 d-flex flex-wrap gap-3">
                        @if(($investment->listing_type ?? 'investment') === 'for_sale')
                            <span><strong>Sale Price:</strong> ${{ number_format($investment->sale_price ?? 0) }}</span>
                        @else
                            <span><strong>Yield:</strong> {{ $investment->historic_yield }}%</span>
                            <span><strong>Total Assets:</strong> ${{ number_format($investment->total_assets) }}</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        {{-- COLLAPSE TOGGLE --}}
                        <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#details-{{ $investment->id }}"
                                aria-expanded="false"
                                aria-controls="details-{{ $investment->id }}">
                            <span>View Full Details</span>
                            <i class="bi bi-chevron-down collapse-icon"></i>
                        </button>

                        {{-- EDIT / DELETE --}}
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#investmentModal"
                                    onclick='openEditModal(@json($investment))'>
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </button>

                            <form action="{{ route('admin.investments.destroy',$investment) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this investment?')">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- COLLAPSIBLE DETAILS --}}
                    <div class="collapse mt-3 border-top pt-3" id="details-{{ $investment->id }}">
                        {{-- FINANCIAL --}}
                        <div class="mb-2 d-flex flex-wrap gap-3">
                            <span><strong>Min Investment:</strong> ${{ number_format($investment->min_investment) }}</span>
                            <span><strong>Share Price:</strong> ${{ number_format($investment->share_price) }}</span>
                            <span><strong>Investors:</strong> {{ number_format($investment->investors) }}</span>
                        </div>

                        {{-- PROPERTY FACTS --}}
                        <div class="mb-2 d-flex flex-wrap gap-3">
                            <span><strong>Size:</strong> {{ $investment->size }} sqft</span>
                            <span><strong>Bedrooms:</strong> {{ $investment->bedrooms }}</span>
                            <span><strong>Bathrooms:</strong> {{ $investment->bathrooms }}</span>
                            <span><strong>Parking:</strong> {{ $investment->parking }}</span>
                            <span><strong>Year Built:</strong> {{ $investment->year_built }}</span>
                        </div>

                        {{-- AMENITIES --}}
                        @if($investment->amenities)
                        <div class="mb-2">
                            <strong>Amenities:</strong>
                            @foreach(json_decode($investment->amenities) as $amenity)
                                <span class="badge bg-light text-dark border px-2 py-1">{{ $amenity }}</span>
                            @endforeach
                        </div>
                        @endif

                        {{-- DESCRIPTION --}}
                        <div class="mb-2 text-muted" style="font-size:0.9rem;">
                            <strong>Description:</strong> {{ $investment->description ?? 'N/A' }}
                        </div>

                        {{-- GALLERY --}}
                        @if($investment->gallery)
                        <div class="mb-2">
                            <strong>Gallery:</strong>
                            <div class="d-flex flex-wrap gap-2 mt-1">
                                @foreach(json_decode($investment->gallery) as $img)
                                    <img src="{{ asset('images/investments/gallery/'.$img) }}"
                                         style="height:70px;width:70px;object-fit:cover;border-radius:5px;">
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- TIMESTAMP --}}
                        <div class="text-end text-muted small mt-2">
                            Created: {{ $investment->created_at->format('d M Y, h:i A') }} |
                            Updated: {{ $investment->updated_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                No investments found. Please add new investments.
            </div>
        </div>
    @endforelse
</div>


    <div class="mt-4">{{ $investments->links() }}</div>
</div>

{{-- FULL ADD / EDIT MODAL --}}
<div class="modal fade" id="investmentModal" tabindex="-1">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<form id="investmentForm" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="_method" id="methodField">

<div class="modal-header">
    <h5 class="modal-title fw-bold" id="modalTitle">Add Property Investment</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body row g-3">

    {{-- CORE --}}
    <div class="col-md-4">
        <label class="form-label fw-semibold">Listing Type</label>
        <select name="listing_type" id="listing_type" class="form-select">
            <option value="investment" selected>Investment</option>
            <option value="for_sale">For Sale</option>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Property Type</label>
        <input type="text" name="type" id="type" class="form-control" placeholder="e.g., Residential, Commercial">
    </div>

    <div class="col-md-8">
        <label class="form-label fw-semibold">Property Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Sunset Villas, Downtown Office">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Yield (%)</label>
        <input type="number" step="0.01" name="historic_yield" id="historic_yield" class="form-control" placeholder="e.g., 8.5">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Total Value ($)</label>
        <input type="number" name="total_assets" id="total_assets" class="form-control" placeholder="e.g., 5000000">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Sale Price ($)</label>
        <input type="number" name="sale_price" id="sale_price" class="form-control" placeholder="e.g., 1250000">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Min Investment ($)</label>
        <input type="number" name="min_investment" id="min_investment" class="form-control" placeholder="e.g., 10000">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Share Price ($)</label>
        <input type="number" name="share_price" id="share_price" class="form-control" placeholder="e.g., 100">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Investors</label>
        <input type="number" name="investors" id="investors" class="form-control" placeholder="e.g., 120">
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="available" selected>Available</option>
            <option value="closed">Closed</option>
        </select>
    </div>

    {{-- LOCATION + DESC --}}
    <div class="col-12">
        <label class="form-label fw-semibold">Location</label>
        <input type="text" name="location" id="location" class="form-control" placeholder="e.g., Downtown, New York">
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Description</label>
        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Provide a brief description of the property"></textarea>
    </div>

    {{-- IMAGES --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">Main Image</label>
        <input type="file" name="image" id="imageInput" class="form-control">
        <img id="previewImage" src="{{ asset('assets/images/placeholder.png') }}" class="mt-2" style="height:80px; object-fit:cover;">
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Gallery Images</label>
        <input type="file" name="gallery[]" class="form-control" multiple>
    </div>

    {{-- PROPERTY FACTS --}}
    <div class="col-12 mt-3"><h6 class="fw-bold">Property Facts</h6></div>

    <div class="col-md-4">
        <label class="form-label">Size (sqft)</label>
        <input type="number" name="size" id="size" class="form-control" placeholder="e.g., 2400">
    </div>

    <div class="col-md-4">
        <label class="form-label">Bedrooms</label>
        <input type="number" name="bedrooms" id="bedrooms" class="form-control" placeholder="e.g., 4">
    </div>

    <div class="col-md-4">
        <label class="form-label">Bathrooms</label>
        <input type="number" name="bathrooms" id="bathrooms" class="form-control" placeholder="e.g., 3">
    </div>

    <div class="col-md-6">
        <label class="form-label">Parking</label>
        <input type="number" name="parking" id="parking" class="form-control" placeholder="e.g., 2">
    </div>

    <div class="col-md-6">
        <label class="form-label">Year Built</label>
        <input type="number" name="year_built" id="year_built" class="form-control" placeholder="e.g., 2022">
    </div>

    {{-- AMENITIES --}}
    <div class="col-12 mt-3"><h6 class="fw-bold">Amenities</h6></div>

    @php
        $amenities = ['Swimming Pool','Gym','24/7 Security','Smart Home','Elevator','Power Backup','Parking Lot','High-Speed Internet'];
    @endphp

    @foreach($amenities as $amenity)
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="amenities[]"
                   value="{{ $amenity }}"
                   id="amenity_{{ Str::slug($amenity) }}">
            <label class="form-check-label">{{ $amenity }}</label>
        </div>
    </div>
    @endforeach

</div>

<div class="modal-footer">
    <button class="btn btn-primary px-4">Save Property</button>
    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
</div>

</form>

</div>
</div>
</div>

<script>
function openCreateModal(){
    document.getElementById('modalTitle').innerText = 'Add Property Investment';
    document.getElementById('investmentForm').action = "{{ route('admin.investments.store') }}";
    document.getElementById('methodField').value = '';
    document.getElementById('investmentForm').reset();
    document.getElementById('previewImage').src = "{{ asset('assets/images/placeholder.png') }}";
}

function openEditModal(data){
    document.getElementById('modalTitle').innerText = 'Edit Property Investment';
    document.getElementById('investmentForm').action = "/admin/investments/" + data.id;
    document.getElementById('methodField').value = 'PUT';

    Object.keys(data).forEach(key => {
        if(document.getElementById(key)){
            document.getElementById(key).value = data[key];
        }
    });

    if(data.amenities){
        document.querySelectorAll('input[name="amenities[]"]').forEach(cb => {
            cb.checked = data.amenities.includes(cb.value);
        });
    }

    document.getElementById('previewImage').src =
        data.image ? "/storage/" + data.image : "{{ asset('assets/images/placeholder.png') }}";
}

document.getElementById('imageInput').addEventListener('change', e => {
    const [file] = e.target.files;
    if(file) document.getElementById('previewImage').src = URL.createObjectURL(file);
});
</script>

@include('admin.footer')
