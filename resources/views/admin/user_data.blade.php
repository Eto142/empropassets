@include('admin.header')

<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .stats-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }
    
    .icon-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .icon-success {
        background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        color: white;
    }
    
    .icon-warning {
        background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
        color: white;
    }
    
    .icon-info {
        background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        color: white;
    }
    
    .action-btn {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        font-weight: bold;
        color: white;
        margin: 0 auto 20px;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        position: relative;
    }
    
    .profile-avatar::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: #10b981;
        border: 3px solid white;
        border-radius: 50%;
        bottom: 5px;
        right: 5px;
    }
    
    .info-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    
    .info-label {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    
    .info-value {
        font-size: 16px;
        color: #111827;
        font-weight: 600;
    }
    
    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .section-title i {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .custom-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    
    .custom-card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 20px;
        font-weight: 700;
    }
    
    .badge-custom {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
    }
    
    .table-custom {
        border-radius: 8px;
        overflow: hidden;
    }
    
    .table-custom thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .table-custom tbody tr {
        transition: background 0.3s ease;
    }
    
    .table-custom tbody tr:hover {
        background: #f9fafb;
    }
    
    /* Nav Pills Styling */
    .nav-pills .nav-link {
        color: #6b7280;
        background: #f3f4f6;
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link:hover {
        background: #e5e7eb;
        color: #374151;
    }
    
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .nav-pills .nav-link.active .badge {
        background: white !important;
        color: #667eea !important;
    }
</style>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Profile Header -->
    <div class="profile-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div>
                <h1 class="h2 mb-2">{{ $userProfile->name }}</h1>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <span><i class="fas fa-envelope me-2"></i>{{ $userProfile->email }}</span>
                    <span><i class="fas fa-phone me-2"></i>{{ $userProfile->phone }}</span>
                    <span class="badge bg-light text-dark">ID: {{ $userProfile->id }}</span>
                    @php
                        $accountStatus = $userProfile->account_status ?? 'approved';
                    @endphp
                    @if($accountStatus === 'pending')
                        <span class="badge" style="background-color: #fef3c7; color: #92400e; border: 1px solid #fcd34d;">⏳ Registration Pending</span>
                    @elseif($accountStatus === 'approved')
                        <span class="badge" style="background-color: #d1fae5; color: #047857; border: 1px solid #10b981;">✅ Account Approved</span>
                    @elseif($accountStatus === 'rejected')
                        <span class="badge" style="background-color: #fee2e2; color: #991b1b; border: 1px solid #ef4444;">❌ Registration Rejected</span>
                    @endif
                </div>
            </div>
            <div class="mt-3 mt-md-0">
                <button class="btn btn-light action-btn" onclick="window.history.back()">
                    <i class="fas fa-arrow-left me-2"></i>Back to Users
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-4">
        <h6 class="text-muted mb-3"><i class="fas fa-bolt me-2"></i>QUICK ACTIONS</h6>
        <div class="d-flex flex-wrap gap-2">
            @php
                $accountStatus = $userProfile->account_status ?? 'approved';
            @endphp
            
            @if($accountStatus === 'pending')
                <form action="{{ route('admin.account.approve', $userProfile->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success action-btn" onclick="return confirm('Approve this user registration?')">
                        <i class="fas fa-check me-1"></i> Approve Account
                    </button>
                </form>
                <button class="btn btn-danger action-btn" data-bs-toggle="modal" data-bs-target="#rejectAccountModal">
                    <i class="fas fa-times me-1"></i> Reject Account
                </button>
            @elseif($accountStatus === 'approved')
                <form action="{{ route('admin.account.revoke', $userProfile->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-warning action-btn" onclick="return confirm('Revoke approval for this user? They will not be able to login.')">
                        <i class="fas fa-undo me-1"></i> Revoke Approval
                    </button>
                </form>
                <button class="btn btn-danger action-btn" data-bs-toggle="modal" data-bs-target="#rejectApprovedAccountModal">
                    <i class="fas fa-times me-1"></i> Reject Account
                </button>
            @elseif($accountStatus === 'rejected')
                <form action="{{ route('admin.account.restore', $userProfile->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-info action-btn" onclick="return confirm('Restore this user account? They will be able to login again.')">
                        <i class="fas fa-check-circle me-1"></i> Restore Account
                    </button>
                </form>
                <button class="btn btn-success action-btn" data-bs-toggle="modal" data-bs-target="#approveRejectedAccountModal">
                    <i class="fas fa-check me-1"></i> Approve Account
                </button>
            @endif

            <button class="btn btn-primary action-btn" data-bs-toggle="modal" data-bs-target="#updateConversionModal">
                <i class="fas fa-coins me-1"></i> Update Deposit
            </button>
            <button class="btn btn-success action-btn" data-bs-toggle="modal" data-bs-target="#updateCashBalanceModal">
                <i class="fas fa-wallet me-1"></i> Update Cash Balance
            </button>
            <button class="btn btn-info action-btn" data-bs-toggle="modal" data-bs-target="#updateTotalReturnsModal">
                <i class="fas fa-chart-line me-1"></i> Update Returns
            </button>
            <button class="btn btn-secondary action-btn" data-bs-toggle="modal" data-bs-target="#updateTotalInvestedModal">
                <i class="fas fa-piggy-bank me-1"></i> Update Invested
            </button>
            <button class="btn btn-warning action-btn" data-bs-toggle="modal" data-bs-target="#updateSuspendStatusModal">
                <i class="fas fa-user-lock me-1"></i> Suspend User
            </button>
            <button class="btn btn-dark action-btn" data-bs-toggle="modal" data-bs-target="#updateBankDetailsModal">
                <i class="fas fa-university me-1"></i> Bank Details
            </button>
        </div>
    </div>

    <!-- Alert Container -->
    <div class="alert-container">
        @if(session('success') || session('error'))
            <div class="alert alert-dismissible fade show custom-alert 
                {{ session('success') ? 'alert-success' : 'alert-danger' }}" 
                role="alert" id="flashAlert">
                
                @if(session('success'))
                    <strong>✅ Success!</strong> {{ session('success') }}
                @else
                    <strong>❌ Error!</strong> {{ session('error') }}
                @endif
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <style>
                .custom-alert {
                    border-radius: 10px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    font-size: 0.95rem;
                    font-weight: 500;
                    padding: 12px 16px;
                }
                .custom-alert.fade-out {
                    opacity: 0;
                    transition: opacity 0.6s ease;
                }
            </style>

            <script>
                setTimeout(function () {
                    let alertEl = document.getElementById('flashAlert');
                    if (alertEl) {
                        alertEl.classList.add('fade-out');
                        setTimeout(() => {
                            let alert = new bootstrap.Alert(alertEl);
                            alert.close();
                        }, 600);
                    }
                }, 3500);
            </script>
        @endif
    </div>

    <!-- Stats Overview -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="stats-card">
                <div class="card-body">
                    <div class="stats-icon icon-primary mx-auto">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="info-label text-center">Total Balance</div>
                    <div class="info-value text-center">${{ number_format($total_balance, 2) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card">
                <div class="card-body">
                    <div class="stats-icon icon-success mx-auto">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="info-label text-center">Cash Balance</div>
                    <div class="info-value text-center">${{ number_format($cash_balance, 2) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card">
                <div class="card-body">
                    <div class="stats-icon icon-info mx-auto">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="info-label text-center">Total Returns</div>
                    <div class="info-value text-center">${{ number_format($total_returns, 2) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card">
                <div class="card-body">
                    <div class="stats-icon icon-warning mx-auto">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div class="info-label text-center">Total Invested</div>
                    <div class="info-value text-center">${{ number_format($total_invested, 2) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column - Profile & Personal Info -->
        <div class="col-lg-4 mb-4">
            <!-- Profile Card -->
            <div class="info-card text-center">
                <div class="profile-avatar">
                    {{ strtoupper(substr($userProfile->name, 0, 2)) }}
                </div>
                <h3 class="mb-2">{{ $userProfile->name }}</h3>
                <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                    {{-- @if($userProfile->is_suspended)
                        <span class="badge badge-custom bg-danger">
                            <i class="fas fa-ban me-1"></i>Suspended
                        </span>
                    @else
                        <span class="badge badge-custom bg-success">
                            <i class="fas fa-check-circle me-1"></i>Active
                        </span>
                    @endif --}}
                    <span class="badge badge-custom bg-primary">ID: {{ $userProfile->id }}</span>
                </div>
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <a href="mailto:{{ $userProfile->email }}" class="btn btn-sm btn-primary action-btn">
                        <i class="fas fa-envelope me-1"></i> Email
                    </a>
                    <a href="tel:+{{ $userProfile->phone }}" class="btn btn-sm btn-info action-btn">
                        <i class="fas fa-phone me-1"></i> Call
                    </a>
                </div>
                <div class="text-start">
                    <div class="info-label">Email</div>
                    <div class="info-value mb-3">{{ $userProfile->email }}</div>
                    
                    <div class="info-label">Phone</div>
                    <div class="info-value mb-3">{{ $userProfile->phone }}</div>
                    
                    <div class="info-label">Joined</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($userProfile->created_at)->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Details -->
        <div class="col-lg-8">
            <!-- Personal Information -->
            <div class="section-title">
                <i class="fas fa-user"></i>
                <span>Personal Information</span>
            </div>
            <div class="info-card mb-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $userProfile->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Country</div>
                        <div class="info-value">{{ $userProfile->country }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value">{{ $userProfile->dob ?? 'Not provided' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Address</div>
                        <div class="info-value">{{ $userProfile->address ?? 'Not provided' }}</div>
                    </div>
                </div>
            </div>

            <!-- KYC Verification Section -->
            <div class="section-title">
                <i class="fas fa-id-card"></i>
                <span>KYC Verification</span>
            </div>
            <div class="custom-card">
                <div class="custom-card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-shield-alt me-2"></i>Identity Verification</span>
                    @if($userProfile->kyc_status === 'pending')
                        <span class="badge bg-warning text-dark">
                            <i class="fas fa-clock me-1"></i>Pending Review
                        </span>
                    @elseif($userProfile->kyc_status === 'verified')
                        <span class="badge bg-success">
                            <i class="fas fa-check-circle me-1"></i>Verified
                        </span>
                    @else
                        <span class="badge bg-danger">
                            <i class="fas fa-times-circle me-1"></i>Rejected
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="info-label">Status</div>
                            <div class="info-value">
                                @if($userProfile->kyc_status === 'pending')
                                    <span class="badge badge-custom bg-warning text-dark">Pending</span>
                                @elseif($userProfile->kyc_status === 'verified')
                                    <span class="badge badge-custom bg-success">Verified</span>
                                @else
                                    <span class="badge badge-custom bg-danger">Rejected</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-label">Identity Type</div>
                            <div class="info-value">{{ $userProfile->identity_type ?? 'Not provided' }}</div>
                        </div>
                        @if($userProfile->kyc_verified_at)
                        <div class="col-md-4">
                            <div class="info-label">Verified At</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($userProfile->kyc_verified_at)->format('M d, Y H:i') }}</div>
                        </div>
                        @endif
                        
                        @if($userProfile->kyc_rejection_reason)
                        <div class="col-12">
                            <div class="alert alert-danger mb-0" style="border-radius: 10px;">
                                <strong><i class="fas fa-exclamation-triangle me-2"></i>Rejection Reason:</strong>
                                <p class="mb-0 mt-2">{{ $userProfile->kyc_rejection_reason }}</p>
                            </div>
                        </div>
                        @endif

                        @if($userProfile->identity_document || $userProfile->identity_document_back)
                        <div class="col-12">
                            <div class="info-label mb-3">Identity Documents</div>
                            <div class="row g-3">
                                @if($userProfile->identity_document)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <strong>Front of ID</strong>
                                        </div>
                                        <div class="card-body text-center p-2">
                                            <img src="{{ asset('storage/' . $userProfile->identity_document) }}" 
                                                 alt="Front ID" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 250px; cursor: pointer;"
                                                 onclick="window.open('{{ asset('storage/' . $userProfile->identity_document) }}', '_blank')">
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ asset('storage/' . $userProfile->identity_document) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt me-1"></i>View Full Size
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($userProfile->identity_document_back)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <strong>Back of ID</strong>
                                        </div>
                                        <div class="card-body text-center p-2">
                                            <img src="{{ asset('storage/' . $userProfile->identity_document_back) }}" 
                                                 alt="Back ID" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 250px; cursor: pointer;"
                                                 onclick="window.open('{{ asset('storage/' . $userProfile->identity_document_back) }}', '_blank')">
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ asset('storage/' . $userProfile->identity_document_back) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt me-1"></i>View Full Size
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="col-12">
                            <div class="alert alert-info mb-0" style="border-radius: 10px;">
                                <i class="fas fa-info-circle me-2"></i>
                                No identity documents uploaded yet.
                            </div>
                        </div>
                        @endif

                        @if($userProfile->kyc_status === 'pending' || $userProfile->kyc_status === 'rejected')
                        <div class="col-12">
                            <hr>
                            <div class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('admin.kyc.approve', $userProfile->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success action-btn">
                                        <i class="fas fa-check-circle me-2"></i>Approve KYC
                                    </button>
                                </form>
                                <button type="button" class="btn btn-danger action-btn" data-bs-toggle="modal" data-bs-target="#declineKycModal">
                                    <i class="fas fa-times-circle me-2"></i>Decline KYC
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Transaction History with Tabs -->
            <div class="section-title">
                <i class="fas fa-history"></i>
                <span>Transaction History</span>
            </div>

            <div class="custom-card">
                <div class="card-header" style="background: white; border-bottom: 2px solid #f3f4f6; padding: 0;">
                    <ul class="nav nav-pills mb-0" id="historyTabs" role="tablist" style="gap: 5px; padding: 10px;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="deposits-tab" data-bs-toggle="pill" data-bs-target="#deposits-content" type="button" role="tab" style="border-radius: 10px; padding: 12px 24px; font-weight: 600;">
                                <i class="fas fa-arrow-down me-2"></i>Deposits
                                <span class="badge bg-success ms-2">{{ $user_deposit->count() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="withdrawals-tab" data-bs-toggle="pill" data-bs-target="#withdrawals-content" type="button" role="tab" style="border-radius: 10px; padding: 12px 24px; font-weight: 600;">
                                <i class="fas fa-arrow-up me-2"></i>Withdrawals
                                <span class="badge bg-danger ms-2">{{ $user_withdrawal->count() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="investments-tab" data-bs-toggle="pill" data-bs-target="#investments-content" type="button" role="tab" style="border-radius: 10px; padding: 12px 24px; font-weight: 600;">
                                <i class="fas fa-chart-pie me-2"></i>Investments
                                <span class="badge bg-info ms-2">{{ $user_investments->count() }}</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-0">
                    <div class="tab-content" id="historyTabsContent">
                        <!-- Deposits Tab -->
                        <div class="tab-pane fade show active" id="deposits-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-custom mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Crypto Type</th>
                                            <th>Proof</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user_deposit as $deposit)
                                            <tr>
                                                <td>{{ $deposit->created_at->format('M d, Y') }}</td>
                                                <td class="fw-bold text-success">${{ number_format($deposit->amount, 2) }}</td>
                                                <td>{{ ucfirst($deposit->payment_method) }}</td>
                                                <td>{{ $deposit->crypto_type ?? '—' }}</td>
                                                <td>
                                                    @if($deposit->proof)
                                                        <a href="{{ asset('storage/' . $deposit->proof) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-eye me-1"></i>View
                                                        </a>
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($deposit->status == 1)
                                                        <span class="badge badge-custom bg-success">Completed</span>
                                                    @elseif($deposit->status == 0)
                                                        <span class="badge badge-custom bg-warning">Pending</span>
                                                    @else
                                                        <span class="badge badge-custom bg-danger">Failed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <form action="{{ route('admin.deposit.approve', $deposit->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success action-btn">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.deposit.decline', $deposit->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger action-btn">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                    <p>No deposits found</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Withdrawals Tab -->
                        <div class="tab-pane fade" id="withdrawals-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-custom mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Bank Name</th>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                            <th>SWIFT Code</th>
                                            <th>Crypto Network</th>
                                            <th>Wallet Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user_withdrawal as $withdrawal)
                                            <tr>
                                                <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
                                                <td class="fw-bold text-danger">${{ number_format($withdrawal->amount, 2) }}</td>
                                                <td>{{ $withdrawal->bank_name ?? '—' }}</td>
                                                <td>{{ $withdrawal->account_name ?? '—' }}</td>
                                                <td>{{ $withdrawal->account_number ?? '—' }}</td>
                                                <td>{{ $withdrawal->swift_code ?? '—' }}</td>
                                                <td>{{ $withdrawal->crypto_network ?? '—' }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $withdrawal->wallet_address ?? '—'}}</td>
                                                <td>
                                                    @if($withdrawal->status == 1)
                                                        <span class="badge badge-custom bg-success">Completed</span>
                                                    @elseif($withdrawal->status == 0)
                                                        <span class="badge badge-custom bg-warning">Pending</span>
                                                    @else
                                                        <span class="badge badge-custom bg-danger">Failed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success action-btn">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.withdrawal.decline', $withdrawal->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger action-btn">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted py-4">
                                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                    <p>No withdrawals found</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Investments Tab -->
                        <div class="tab-pane fade" id="investments-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-custom mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Property Name</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Shares</th>
                                            <th>Share Price</th>
                                            <th>Amount</th>
                                            <th>Historic Yield</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user_investments as $investment)
                                            <tr>
                                                <td>{{ $investment->created_at->format('M d, Y') }}</td>
                                                <td class="fw-bold">{{ $investment->name ?? '—' }}</td>
                                                <td>
                                                    <span class="badge badge-custom" style="background: #667eea;">
                                                        {{ ucfirst($investment->type ?? 'Property') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                    {{ $investment->location ?? '—' }}
                                                </td>
                                                <td>{{ $investment->shares ?? 0 }}</td>
                                                <td class="fw-bold text-info">${{ number_format($investment->share_price ?? 0, 2) }}</td>
                                                <td class="fw-bold text-primary">${{ number_format($investment->amount, 2) }}</td>
                                                <td class="fw-bold text-success">{{ $investment->historic_yield ?? 0 }}%</td>
                                                <td>
                                                    @if($investment->status == 1)
                                                        <span class="badge badge-custom bg-success">
                                                            <i class="fas fa-check-circle me-1"></i>Active
                                                        </span>
                                                    @elseif($investment->status == 0)
                                                        <span class="badge badge-custom bg-warning">
                                                            <i class="fas fa-clock me-1"></i>Pending
                                                        </span>
                                                    @else
                                                        <span class="badge badge-custom bg-danger">
                                                            <i class="fas fa-times-circle me-1"></i>Declined
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        @if($investment->status != 1)
                                                        <form action="{{ route('admin.investment.approve', $investment->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success action-btn" title="Approve">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                        @endif
                                                        @if($investment->status != 2)
                                                        <form action="{{ route('admin.investment.decline', $investment->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger action-btn" title="Decline">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                        @endif
                                                        <button class="btn btn-sm btn-info action-btn" data-bs-toggle="modal" data-bs-target="#investmentDetailsModal{{ $investment->id }}" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Investment Details Modal -->
                                            <div class="modal fade" id="investmentDetailsModal{{ $investment->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-building me-2"></i>Investment Details
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Property Name</div>
                                                                    <div class="info-value">{{ $investment->name ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Property Type</div>
                                                                    <div class="info-value">{{ ucfirst($investment->type ?? '—') }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Location</div>
                                                                    <div class="info-value">{{ $investment->location ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Size</div>
                                                                    <div class="info-value">{{ $investment->size ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="info-label">Bedrooms</div>
                                                                    <div class="info-value">{{ $investment->bedrooms ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="info-label">Bathrooms</div>
                                                                    <div class="info-value">{{ $investment->bathrooms ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="info-label">Parking</div>
                                                                    <div class="info-value">{{ $investment->parking ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="info-label">Year Built</div>
                                                                    <div class="info-value">{{ $investment->year_built ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="info-label">Shares Purchased</div>
                                                                    <div class="info-value">{{ $investment->shares ?? 0 }}</div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="info-label">Share Price</div>
                                                                    <div class="info-value">${{ number_format($investment->share_price ?? 0, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="info-label">Total Amount</div>
                                                                    <div class="info-value">${{ number_format($investment->amount, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Historic Yield</div>
                                                                    <div class="info-value">{{ $investment->historic_yield ?? 0 }}%</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-label">Total Assets</div>
                                                                    <div class="info-value">${{ number_format($investment->total_assets ?? 0, 2) }}</div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="info-label">Amenities</div>
                                                                    <div class="info-value">{{ $investment->amenities ?? '—' }}</div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="info-label">Description</div>
                                                                    <div class="info-value">{{ $investment->description ?? '—' }}</div>
                                                                </div>
                                                                @if($investment->image)
                                                                <div class="col-12">
                                                                    <div class="info-label">Property Image</div>
                                                                    <img src="{{ asset('storage/' . $investment->image) }}" alt="Property" class="img-fluid rounded" style="max-height: 300px;">
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted py-4">
                                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                    <p>No investments found</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Details Section -->
            <div class="section-title mt-4">
                <i class="fas fa-university"></i>
                <span>Bank Details</span>
            </div>
            <div class="custom-card">
                <div class="custom-card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-university me-2"></i>Banking Information</span>
                    <button class="btn btn-sm btn-light action-btn" data-bs-toggle="modal" data-bs-target="#updateBankDetailsModal">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                </div>
                <div class="card-body">
                    @if($userProfile->bank_name || $userProfile->account_name || $userProfile->account_number)
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="info-label">Bank Name</div>
                                <div class="info-value">{{ $userProfile->bank_name ?? 'Not set' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-label">Account Name</div>
                                <div class="info-value">{{ $userProfile->account_name ?? 'Not set' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-label">Account Number</div>
                                <div class="info-value">{{ $userProfile->account_number ?? 'Not set' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-label">Swift Code</div>
                                <div class="info-value">{{ $userProfile->swift_code ?? 'Not set' }}</div>
                            </div>
                            @if($userProfile->bank_description)
                            <div class="col-12">
                                <div class="info-label">Description</div>
                                <div class="info-value">{{ $userProfile->bank_description }}</div>
                            </div>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-info mb-0" style="border-radius: 10px;">
                            <i class="fas fa-info-circle me-2"></i>
                            No bank details configured yet. <a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#updateBankDetailsModal">Add bank details</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->

<!-- Reject Account Modal -->
<div class="modal fade" id="rejectAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-user-times me-2"></i>Reject Account Registration
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.account.reject', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This will reject the user's registration. They will not be able to login.
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rejection Reason (Optional)</label>
                        <textarea class="form-control" name="reason" rows="4" placeholder="Enter reason for rejection (e.g., Invalid information, Duplicate account, etc.)"></textarea>
                        <small class="text-muted">This reason will be shown to the user when they try to login.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-user-times me-2"></i>Reject Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Approved Account Modal -->
<div class="modal fade" id="rejectApprovedAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-user-times me-2"></i>Reject Account
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.account.reject', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This will reject the approved account. The user will see the rejection reason when attempting to login.
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rejection Reason (Required)</label>
                        <textarea class="form-control" name="reason" rows="4" placeholder="Enter reason for rejection..." required></textarea>
                        <small class="text-muted">This reason will be displayed to the user.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-user-times me-2"></i>Reject Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Approve Rejected Account Modal -->
<div class="modal fade" id="approveRejectedAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle me-2"></i>Approve Account
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.account.approve', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> This will approve the previously rejected account. The user will be able to login.
                    </div>
                    <p class="text-muted">Are you sure you want to approve this account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle me-2"></i>Approve Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Decline KYC Modal -->
<div class="modal fade" id="declineKycModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-times-circle me-2"></i>Decline KYC Verification
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.kyc.decline', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This will reject the user's KYC verification.
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rejection Reason (Optional)</label>
                        <textarea class="form-control" name="reason" rows="4" placeholder="Enter reason for rejection..."></textarea>
                        <small class="text-muted">This reason will be visible to the user.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times-circle me-2"></i>Decline KYC
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Account Modal -->
<div class="modal fade" id="rejectAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-user-times me-2"></i>Reject Account Registration
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.account.reject', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This will reject the user's account registration. They will not be able to access the platform.
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rejection Reason (Required)</label>
                        <textarea class="form-control" name="reason" rows="4" placeholder="Enter reason for rejection..." required></textarea>
                        <small class="text-muted">This reason will be displayed to the user when they attempt to login.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-user-times me-2"></i>Reject Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateTotalInvestedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.total.invested.update', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
            <label class="form-label fw-bold">Amount</label>
            <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter Amount" required>
        </div>

         <div class="mb-3">
            <label class="form-label fw-bold">Transaction Type</label>
            <select class="form-select" name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>
        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Total Invested</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateCashBalanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update Cash Balance</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
<form action="{{ route('admin.cash.balance.update', $userProfile->id) }}" method="POST">
    @csrf
    <div class="modal-body">



        <div class="mb-3">
            <label class="form-label fw-bold">Amount</label>
            <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter Amount" required>
        </div>

         <div class="mb-3">
            <label class="form-label fw-bold">Transaction Type</label>
            <select class="form-select" name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Cash Balance</button>
    </div>
</form>


        </div>
    </div>
</div>



<div class="modal fade" id="updateTotalReturnsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update Total Returns</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.total.returns.update', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
            <label class="form-label fw-bold">Amount</label>
            <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter Amount" required>
        </div>

         <div class="mb-3">
            <label class="form-label fw-bold">Transaction Type</label>
            <select class="form-select" name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>
        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Total Returns</button>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="updateSuspendStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update suspend user Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.suspend.user', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Suspension Status</label>
                        <select class="form-select" name="suspended" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal fade" id="updateConversionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Crypto Deposit Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.add.deposit')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$userProfile->id}}"/>
                	
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Deposit Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter Deposit Amount" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Deposit Amount</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateBankDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update Bank Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.bank-details.update', $userProfile->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Bank Name</label>
                        <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name" value="{{ $userProfile->bank_name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Account Name</label>
                        <input type="text" class="form-control" name="account_name" placeholder="Enter Account Name" value="{{ $userProfile->account_name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Account Number</label>
                        <input type="text" class="form-control" name="account_number" placeholder="Enter Account Number" value="{{ $userProfile->account_number ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Swift Code</label>
                        <input type="text" class="form-control" name="swift_code" placeholder="Enter Swift Code (optional)" value="{{ $userProfile->swift_code ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea class="form-control" name="description" rows="2" placeholder="Additional details">{{ $userProfile->bank_description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Bank Details</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>

<style>
    /* Alert Styles */
    .alert-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        width: 100%;
        max-width: 400px;
        padding: 0 15px;
    }

    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .alert-content {
        display: flex;
        align-items: center;
        padding: 15px;
        position: relative;
    }

    .alert-icon {
        margin-right: 12px;
        display: flex;
        align-items: center;
    }

    .alert-icon svg {
        width: 20px;
        height: 20px;
    }

    .alert-text {
        flex: 1;
        font-size: 14px;
        line-height: 1.4;
    }

    .btn-close {
        background: none;
        border: none;
        padding: 0;
        margin-left: 12px;
        opacity: 0.7;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .btn-close:hover {
        opacity: 1;
    }

    .btn-close svg {
        width: 16px;
        height: 16px;
    }

    .alert-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.3);
        animation: progressBar 5s linear forwards;
    }

    @keyframes progressBar {
        0% { width: 100%; }
        100% { width: 0%; }
    }

    /* Enhanced Styles */
    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #6c757d;
    }
    
    .nav-tabs .nav-link.active {
        color: #4e73df;
        border-bottom-color: #4e73df;
        background: transparent;
    }
    
    .card-header {
        padding: 1rem 1.25rem;
    }
    
    .table-sm td, .table-sm th {
        padding: 0.75rem;
    }
</style>

@include('admin.footer')