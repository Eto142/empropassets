@include('admin.header')

<style>
.main-container { margin-left: 250px; padding: 40px 20px; }
@media(max-width: 992px){ .main-container { margin-left: 0; } }

.investment-card:hover { transform: translateY(-5px); transition: all 0.3s; }
.investment-card img { height: 180px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem; }
.badge-status { position: absolute; top: 10px; right: 10px; font-size: .8rem; padding: 5px 10px; }

#previewImage { max-height: 150px; width: 100%; object-fit: cover; margin-top: 10px; border-radius: 5px; }
.modal-dialog-scrollable .modal-body { max-height: calc(70vh); overflow-y: auto; }
</style>

<div class="main-container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Investment Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#investmentModal" onclick="openCreateModal()">
            + Add Investment
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($investments as $investment)
            <div class="col">
                <div class="card h-100 shadow-sm investment-card position-relative">
                   <img src="{{ $investment->image ? asset('images/investments/'.$investment->image) : asset('assets/images/placeholder.png') }}" 
     class="card-img-top" 
     alt="{{ $investment->name }}" 
     style="height:200px; object-fit:cover;">

                    <span class="badge {{ $investment->status == 'available' ? 'bg-success' : 'bg-secondary' }} badge-status">
                        {{ ucfirst($investment->status) }}
                    </span>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $investment->name ?? 'N/A' }}</h5>
                        <div class="text-muted mb-1" style="font-size: 0.85rem;">{{ $investment->type ?? 'N/A' }}</div>
                        <p class="card-text mb-2">
                            <strong>{{ $investment->historic_yield ?? 0 }}% Historic Yield</strong> 
                            <span class="text-muted">| ${{ number_format($investment->total_assets ?? 0) }} Total Assets</span>
                        </p>

                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <div class="text-muted" style="font-size:0.75rem;">Min Investment</div>
                                <div>${{ number_format($investment->min_investment ?? 0) }}</div>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size:0.75rem;">Investors</div>
                                <div>{{ number_format($investment->investors ?? 0) }}</div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-auto">
                            <button class="btn btn-sm btn-warning flex-fill" data-bs-toggle="modal" data-bs-target="#investmentModal"
                                    onclick='openEditModal(@json($investment))'>
                                Edit
                            </button>

                            <form action="{{ route('admin.investments.destroy',$investment) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100" onclick="return confirm('Delete this investment?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info text-center">No investments found.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $investments->links() }}</div>
</div>

{{-- Modal Add/Edit Investment --}}
<div class="modal fade" id="investmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <form id="investmentForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="methodField">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalTitle">Add Investment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Type</label>
                        <input type="text" name="type" id="type" class="form-control" placeholder="e.g. Real Estate Debt, Fund">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Private Credit Fund">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Yield (%)</label>
                        <input type="number" step="0.01" name="historic_yield" id="historic_yield" class="form-control" placeholder="e.g. 8.3">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Total Assets ($)</label>
                        <input type="number" name="total_assets" id="total_assets" class="form-control" placeholder="e.g. 73000000">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Min Investment ($)</label>
                        <input type="number" name="min_investment" id="min_investment" class="form-control" placeholder="e.g. 100">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Investors</label>
                        <input type="number" name="investors" id="investors" class="form-control" placeholder="e.g. 1277">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="available">Available</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Investment Image</label>
                        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                        <img id="previewImage" src="{{ asset('assets/images/placeholder.png') }}" class="rounded mt-2">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Investment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openCreateModal(){
    document.getElementById('modalTitle').innerText = 'Add Investment';
    document.getElementById('investmentForm').action = "{{ route('admin.investments.store') }}";
    document.getElementById('methodField').value = '';
    document.getElementById('investmentForm').reset();
    document.getElementById('previewImage').src = "{{ asset('assets/images/placeholder.png') }}";
}

function openEditModal(data){
    document.getElementById('modalTitle').innerText = 'Update Investment';
    document.getElementById('investmentForm').action = "/admin/investments/" + data.id;
    document.getElementById('methodField').value = 'PUT';

    // Pre-fill values
    document.getElementById('type').value = data.type || '';
    document.getElementById('name').value = data.name || '';
    document.getElementById('historic_yield').value = data.historic_yield || '';
    document.getElementById('total_assets').value = data.total_assets || '';
    document.getElementById('min_investment').value = data.min_investment || '';
    document.getElementById('investors').value = data.investors || '';
    document.getElementById('status').value = data.status || 'available';

    // Image preview
    document.getElementById('previewImage').src = data.image ? "/storage/" + data.image : "{{ asset('assets/images/placeholder.png') }}";
}

// Preview image on upload
document.getElementById('imageInput').addEventListener('change', function(e){
    const [file] = e.target.files;
    if(file){
        document.getElementById('previewImage').src = URL.createObjectURL(file);
    }
});
</script>

@include('admin.footer')
