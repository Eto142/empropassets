<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - EMAAR Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    @include('user.partials.navbar-styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .profile-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 900;
            color: #000;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #666;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #000;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control:disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
        }

        .submit-btn {
            padding: 12px 30px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #047857;
            border: 1px solid #10b981;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e5e7eb;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 36px;
            font-weight: 900;
        }

        .profile-info h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .profile-info p {
            color: #666;
            font-size: 14px;
        }

        .account-status {
            display: inline-block;
            padding: 6px 12px;
            background-color: #d1fae5;
            color: #047857;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }

        .nav-tabs {
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 30px;
        }

        .nav-tabs .nav-link {
            color: #666;
            border: none;
            border-bottom: 3px solid transparent;
            font-weight: 600;
            padding: 12px 20px;
            transition: all 0.3s;
        }

        .nav-tabs .nav-link:hover {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .nav-tabs .nav-link.active {
            color: #2563eb;
            background-color: transparent;
            border-bottom-color: #2563eb;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-pane {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .status-badge.pending {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-badge.verified {
            background-color: #d1fae5;
            color: #047857;
            border: 1px solid #10b981;
        }

        .status-badge.rejected {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 24px;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 28px;
            }

            .nav-tabs .nav-link {
                padding: 10px 15px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <div class="profile-container">
        <div class="page-header">
            <h1 class="page-title">Profile Settings</h1>
            <p class="page-subtitle">Manage your account information and preferences</p>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="profile-info">
                    <h3>{{ auth()->user()->name ?? 'User' }}</h3>
                    <p>{{ auth()->user()->email ?? '' }}</p>
                    <span class="account-status">✓ Verified Account</span>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Nav Tabs -->
            <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="manage-tab" data-bs-toggle="tab" data-bs-target="#manage" type="button" role="tab" aria-controls="manage" aria-selected="true">Manage Account</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="identity-tab" data-bs-toggle="tab" data-bs-target="#identity" type="button" role="tab" aria-controls="identity" aria-selected="false">Identity</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="profileTabsContent">
                <!-- Manage Account Tab -->
                <div class="tab-pane fade show active" id="manage" role="tabpanel" aria-labelledby="manage-tab">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="section-title">Manage Account</div>

                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" disabled>
                            <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Email cannot be changed</small>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" value="{{ auth()->user()->phone ?? '' }}" placeholder="Enter phone number">
                        </div>

                        <button type="submit" class="submit-btn">Update Profile</button>
                    </form>

              
                </div>

                <!-- Identity Tab -->
                <div class="tab-pane fade" id="identity" role="tabpanel" aria-labelledby="identity-tab">
                    <div class="section-title">Identity Information</div>
                    
                    @php
                        $kycStatus = auth()->user()->kyc_status ?? 'pending';
                    @endphp

                    <div style="margin-bottom: 30px;">
                        <span class="status-badge {{ $kycStatus }}">
                            Status: <strong>{{ ucfirst($kycStatus) }}</strong>
                        </span>
                        @if($kycStatus === 'rejected')
                            <p style="color: #991b1b; font-size: 13px; margin-top: 10px;">
                                <strong>Rejection Reason:</strong> {{ auth()->user()->kyc_rejection_reason ?? 'Not specified' }}
                            </p>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Identity Type</label>
                            <select name="identity_type" class="form-control">
                                <option value="">-- Select Identity Type --</option>
                                <option value="passport" {{ auth()->user()->identity_type === 'passport' ? 'selected' : '' }}>Passport</option>
                                <option value="driver_license" {{ auth()->user()->identity_type === 'driver_license' ? 'selected' : '' }}>Driver License</option>
                                <option value="national_id" {{ auth()->user()->identity_type === 'national_id' ? 'selected' : '' }}>National ID</option>
                                <option value="other" {{ auth()->user()->identity_type === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Front of Document</label>
                            <input type="file" name="identity_document_front" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                            <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Accepted formats: PDF, JPG, PNG (Max 5MB)</small>
                            @if(auth()->user()->identity_document)
                                <div style="margin-top: 10px;">
                                    <small style="color: #2563eb;">Current front document: <a href="{{ asset('storage/' . auth()->user()->identity_document) }}" target="_blank" rel="noopener noreferrer">View</a></small>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Back of Document</label>
                            <input type="file" name="identity_document_back" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                            <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Accepted formats: PDF, JPG, PNG (Max 5MB)</small>
                            @if(auth()->user()->identity_document_back)
                                <div style="margin-top: 10px;">
                                    <small style="color: #2563eb;">Current back document: <a href="{{ asset('storage/' . auth()->user()->identity_document_back) }}" target="_blank" rel="noopener noreferrer">View</a></small>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="submit-btn">Update Identity Information</button>
                    </form>
                </div>

                <!-- Security Tab -->
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <div style="margin-bottom: 30px;">
                        <div class="section-title">Change Password</div>

                        @if($errors->any())
                            <div class="alert" style="background-color: #fee2e2; color: #991b1b; border: 1px solid #ef4444;">
                                <ul style="margin: 0; padding-left: 20px;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" required minlength="8">
                                <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Must be at least 8 characters</small>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="submit-btn">Change Password</button>
                        </form>
                    </div>

                    <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #e5e7eb;">
                        <div class="section-title">Two-Factor Authentication</div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px 0;">
                            <div>
                                <div style="font-weight: 600; margin-bottom: 5px;">2FA Security</div>
                                <div style="font-size: 13px; color: #666;">Add an extra layer of security to your account</div>
                            </div>
                            <button type="button" class="submit-btn" style="padding: 10px 20px; font-size: 13px;">Enable 2FA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



