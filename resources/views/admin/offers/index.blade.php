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
        <h1 class="h2">Property Offers</h1>
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
                                        <th>Property</th>
                                        <th>User</th>
                                        <th>Offer Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($offers as $offer)
                                        <tr>
                                            <td>#{{ $offer->id }}</td>
                                            <td>
                                                <strong>{{ $offer->property_name }}</strong><br>
                                                <small class="text-muted">Property ID: {{ $offer->investment_id }}</small>
                                            </td>
                                            <td>
                                                {{ $offer->user->name }}<br>
                                                <small class="text-muted">{{ $offer->user->email }}</small>
                                            </td>
                                            <td><strong class="text-primary">${{ number_format($offer->offer_amount, 2) }}</strong></td>
                                            <td>
                                                @if($offer->status === 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($offer->status === 'accepted')
                                                    <span class="badge bg-success">Accepted</span>
                                                @else
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>{{ $offer->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $offer->id }}">
                                                    <i class="bi bi-eye"></i> View
                                                </button>
                                                @if($offer->status === 'pending')
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $offer->id }}">
                                                        <i class="bi bi-check-circle"></i> Accept
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $offer->id }}">
                                                        <i class="bi bi-x-circle"></i> Reject
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{ $offer->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Offer Details #{{ $offer->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Property:</strong> {{ $offer->property_name }}</p>
                                                        <p><strong>Offer Amount:</strong> ${{ number_format($offer->offer_amount, 2) }}</p>
                                                        <p><strong>User:</strong> {{ $offer->user->name }}</p>
                                                        <p><strong>Email:</strong> {{ $offer->user->email }}</p>
                                                        <p><strong>Phone:</strong> {{ $offer->user->phone ?? 'N/A' }}</p>
                                                        <p><strong>Status:</strong> {{ ucfirst($offer->status) }}</p>
                                                        <p><strong>Message:</strong></p>
                                                        <p class="bg-light p-3 rounded">{{ $offer->message ?? 'No message provided' }}</p>
                                                        @if($offer->admin_response)
                                                            <p><strong>Admin Response:</strong></p>
                                                            <p class="bg-light p-3 rounded">{{ $offer->admin_response }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accept Modal -->
                                        <div class="modal fade" id="acceptModal{{ $offer->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.offers.accept', $offer->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title">Accept Offer #{{ $offer->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Accept offer of <strong>${{ number_format($offer->offer_amount, 2) }}</strong> from {{ $offer->user->name }}?</p>
                                                            <div class="mb-3">
                                                                <label class="form-label">Response Message (Optional)</label>
                                                                <textarea name="response" class="form-control" rows="3" placeholder="Add a message to the user..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Accept Offer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Reject Modal -->
                                        <div class="modal fade" id="rejectModal{{ $offer->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.offers.reject', $offer->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title">Reject Offer #{{ $offer->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Reject offer of <strong>${{ number_format($offer->offer_amount, 2) }}</strong> from {{ $offer->user->name }}?</p>
                                                            <div class="mb-3">
                                                                <label class="form-label">Rejection Reason* (will be sent to user)</label>
                                                                <textarea name="response" class="form-control" rows="3" placeholder="Explain why the offer is being rejected..." required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Reject Offer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                                <p class="text-muted mt-2">No offers yet</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $offers->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
