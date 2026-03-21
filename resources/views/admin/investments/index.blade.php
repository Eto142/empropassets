@include('admin.header')

<style>
.main-container { margin-left: 250px; padding: 40px 20px; }
@media(max-width: 992px){ .main-container { margin-left: 0; } }

.investment-card:hover { transform: translateY(-5px); transition: all 0.3s; }
.investment-card img { height: 180px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem; }
.badge-status { position: absolute; top: 10px; right: 10px; font-size: .8rem; padding: 5px 10px; }
.collapse-icon { transition: transform 0.3s ease; }
button[aria-expanded="true"] .collapse-icon { transform: rotate(180deg); }
</style>

<div class="main-container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Investment Management</h2>
        <a href="{{ route('admin.investments.create') }}" class="btn btn-primary">
            + Add Property Investment
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

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

   <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($investments as $investment)
        <div class="col">
            <div class="card h-100 shadow-sm investment-card position-relative border-0">
                {{-- MAIN IMAGE --}}
                <div class="position-relative">
                    <img src="{{ $investment->image ?? asset('assets/images/placeholder.png') }}"
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
                            <a href="{{ route('admin.investments.edit', $investment) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>

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
                            @foreach($investment->amenities as $amenity)
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
                                @foreach($investment->gallery as $img)
                                    <img src="{{ $img }}"
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

@include('admin.footer')
