@include('admin.header')

<style>
    .main-container { 
        margin-left: 250px; 
        padding: 40px 20px; 
    }
    @media(max-width: 992px){ 
        .main-container { 
            margin-left: 0; 
        } 
    }
</style>

<div class="main-container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Investments History</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Property</th>
                            <th>Amount</th>
                            <th>Shares</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($investments as $investment)
                            <tr>
                                <td>#{{ $investment->id }}</td>
                                <td>
                                    <strong>{{ $investment->user->name }}</strong><br>
                                    <small class="text-muted">{{ $investment->user->email }}</small>
                                </td>
                                <td>
                                    <strong>{{ $investment->name }}</strong><br>
                                    <small class="text-muted">{{ $investment->type }}</small>
                                </td>
                                <td><strong class="text-primary">${{ number_format($investment->amount, 2) }}</strong></td>
                                <td>{{ number_format($investment->shares) }}</td>
                                <td>
                                    @if($investment->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $investment->created_at->format('M d, Y') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $investment->id }}">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewModal{{ $investment->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Investment Details #{{ $investment->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold">User Information</h6>
                                                    <p><strong>Name:</strong> {{ $investment->user->name }}</p>
                                                    <p><strong>Email:</strong> {{ $investment->user->email }}</p>
                                                    <p><strong>Phone:</strong> {{ $investment->user->phone ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold">Investment Information</h6>
                                                    <p><strong>Amount:</strong> ${{ number_format($investment->amount, 2) }}</p>
                                                    <p><strong>Shares:</strong> {{ number_format($investment->shares) }}</p>
                                                    <p><strong>Price per Share:</strong> ${{ number_format($investment->share_price, 2) }}</p>
                                                    <p><strong>Status:</strong> 
                                                        @if($investment->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6 class="fw-bold">Property Details</h6>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($investment->image)
                                                        <img src="{{ asset('images/investments/'.$investment->image) }}" 
                                                             alt="{{ $investment->name }}" 
                                                             class="img-fluid rounded mb-3"
                                                             style="max-height: 200px; object-fit: cover;">
                                                    @endif
                                                    <p><strong>Property Name:</strong> {{ $investment->name }}</p>
                                                    <p><strong>Type:</strong> {{ $investment->type }}</p>
                                                    <p><strong>Location:</strong> {{ $investment->location ?? 'N/A' }}</p>
                                                    <p><strong>Historic Yield:</strong> {{ $investment->historic_yield }}%</p>
                                                    <p><strong>Total Assets:</strong> ${{ number_format($investment->total_assets, 2) }}</p>
                                                    <p><strong>Min Investment:</strong> ${{ number_format($investment->min_investment, 2) }}</p>
                                                </div>
                                            </div>
                                            @if($investment->description)
                                                <hr>
                                                <h6 class="fw-bold">Description</h6>
                                                <p class="bg-light p-3 rounded">{{ $investment->description }}</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                    <p class="text-muted mt-2">No investments yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $investments->links() }}
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('admin.footer')
