@extends('layouts.header')
@section('title', 'Settings')
@section('content')
<div class="settings-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="page-title">
                        <i class="fa fa-cog"></i>
                        Settings
                    </h1>
                    <p class="page-subtitle">Manage your account preferences</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="settings-container">
            <!-- Change Password Card -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <div class="settings-icon">
                        <i class="fa fa-key"></i>
                    </div>
                    <div class="settings-title">
                        <h3>Change Password</h3>
                        <p>Update your account password</p>
                    </div>
                </div>
                
                <div class="settings-card-body">
                    <form id="passwordForm">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <div class="password-input">
                                <input type="password" id="currentPassword" class="form-control" placeholder="Enter current password">
                                <button type="button" class="toggle-password" data-target="currentPassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <div class="password-input">
                                <input type="password" id="newPassword" class="form-control" placeholder="Enter new password">
                                <button type="button" class="toggle-password" data-target="newPassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="passwordStrength"></div>
                                </div>
                                <span class="strength-text" id="strengthText">Weak</span>
                            </div>
                            <div class="password-requirements">
                                <p class="requirements-title">Password must contain:</p>
                                <ul>
                                    <li id="reqLength">At least 8 characters</li>
                                    <li id="reqUppercase">One uppercase letter</li>
                                    <li id="reqLowercase">One lowercase letter</li>
                                    <li id="reqNumber">One number</li>
                                    <li id="reqSpecial">One special character</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <div class="password-input">
                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm new password">
                                <button type="button" class="toggle-password" data-target="confirmPassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-match" id="passwordMatch">
                                <i class="fa fa-check"></i>
                                <span>Passwords match</span>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary" onclick="changePassword()">
                            <i class="fa fa-save"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- Deactivate Account Card -->
            <div class="settings-card danger-card">
                <div class="settings-card-header">
                    <div class="settings-icon danger">
                        <i class="fa fa-user-times"></i>
                    </div>
                    <div class="settings-title">
                        <h3>Deactivate Account</h3>
                        <p>Permanently delete your account and all data</p>
                    </div>
                </div>
                
                <div class="settings-card-body">
                    <div class="danger-warning">
                        <i class="fa fa-exclamation-triangle"></i>
                        <p><strong>Warning:</strong> This action cannot be undone. All your data, including job applications and profile information, will be permanently deleted.</p>
                    </div>
                    
                    <div class="confirmation-box">
                        <label class="checkbox-label">
                            <input type="checkbox" id="confirmDelete">
                            <span class="checkmark"></span>
                            <span>I understand that this action is permanent and cannot be reversed</span>
                        </label>
                        
                        <label class="checkbox-label">
                            <input type="checkbox" id="confirmDataLoss">
                            <span class="checkmark"></span>
                            <span>I understand that all my data will be permanently deleted</span>
                        </label>
                        
                        <label class="checkbox-label">
                            <input type="checkbox" id="confirmNoRefund">
                            <span class="checkmark"></span>
                            <span>I understand that any active subscriptions will not be refunded</span>
                        </label>
                    </div>
                    
                    <div class="danger-actions">
                        <button type="button" class="btn btn-outline" onclick="cancelDeactivation()">
                            <i class="fa fa-times"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-danger" id="deactivateBtn" disabled onclick="deactivateAccount()">
                            <i class="fa fa-trash"></i> Deactivate Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f8fafc;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Color Variables */
    :root {
        --primary-color: #FC0002;
        --primary-light: rgba(252, 0, 2, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
        --text-dark: #333333;
        --text-light: #666666;
        --border-color: #e5e7eb;
        --background-light: #f9fafb;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Page Header */
    .page-header {
        background: var(--primary-color);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
    }

    .header-content {
        text-align: center;
    }

    .header-text h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .header-text p {
        margin: 0;
        opacity: 0.9;
    }

    /* Settings Container */
    .settings-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    /* Settings Card */
    .settings-card {
        background: white;
        border-radius: 15px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    .settings-card.danger-card {
        border: 2px solid var(--danger-color);
    }

    .settings-card-header {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        background: var(--background-light);
        border-bottom: 1px solid var(--border-color);
    }

    .settings-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 24px;
    }

    .settings-icon.danger {
        background: rgba(220, 53, 69, 0.1);
        color: var(--danger-color);
    }

    .settings-title h3 {
        margin: 0 0 5px 0;
        font-size: 20px;
        color: var(--text-dark);
    }

    .settings-title p {
        margin: 0;
        color: var(--text-light);
        font-size: 14px;
    }

    .settings-card-body {
        padding: 25px;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .password-input {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-light);
        cursor: pointer;
        font-size: 16px;
    }

    /* Password Strength */
    .password-strength {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 10px;
    }

    .strength-bar {
        flex: 1;
        height: 6px;
        background: #e9ecef;
        border-radius: 3px;
        overflow: hidden;
    }

    .strength-fill {
        height: 100%;
        background: var(--danger-color);
        border-radius: 3px;
        width: 0%;
        transition: width 0.3s ease, background-color 0.3s ease;
    }

    .strength-text {
        font-size: 12px;
        font-weight: 600;
        min-width: 60px;
        text-align: right;
    }

    /* Password Requirements */
    .password-requirements {
        margin-top: 15px;
        padding: 15px;
        background: var(--background-light);
        border-radius: 8px;
        font-size: 13px;
    }

    .requirements-title {
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .password-requirements ul {
        list-style: none;
        padding-left: 20px;
        margin: 0;
    }

    .password-requirements li {
        margin-bottom: 5px;
        color: var(--text-light);
        position: relative;
    }

    .password-requirements li:before {
        content: '✗';
        position: absolute;
        left: -20px;
        color: var(--danger-color);
    }

    .password-requirements li.valid:before {
        content: '✓';
        color: var(--success-color);
    }

    /* Password Match */
    .password-match {
        display: none;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        color: var(--success-color);
        font-size: 14px;
        font-weight: 500;
    }

    .password-match.show {
        display: flex;
    }

    /* Buttons */
    .btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 2px solid transparent;
        text-decoration: none;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white !important;
        border: none;
    }

    .btn-primary:hover:not(:disabled) {
        background: #e00002;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(252, 0, 2, 0.2);
    }

    .btn-primary:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .btn-outline {
        background: transparent;
        color: var(--text-dark) !important;
        border: 2px solid var(--border-color);
    }

    .btn-outline:hover {
        border-color: var(--primary-color);
        color: var(--primary-color) !important;
    }

    .btn-danger {
        background: var(--danger-color);
        color: white !important;
        border: none;
    }

    .btn-danger:hover:not(:disabled) {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
    }

    .btn-danger:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Danger Warning */
    .danger-warning {
        display: flex;
        gap: 15px;
        padding: 15px;
        background: rgba(220, 53, 69, 0.1);
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid var(--danger-color);
    }

    .danger-warning i {
        color: var(--danger-color);
        font-size: 20px;
        flex-shrink: 0;
    }

    .danger-warning p {
        margin: 0;
        color: var(--text-dark);
        font-size: 14px;
        line-height: 1.5;
    }

    /* Confirmation Box */
    .confirmation-box {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 25px;
    }

    .checkbox-label {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        cursor: pointer;
        font-size: 14px;
        color: var(--text-dark);
    }

    .checkbox-label input {
        display: none;
    }

    .checkmark {
        width: 20px;
        height: 20px;
        border: 2px solid var(--border-color);
        border-radius: 4px;
        position: relative;
        flex-shrink: 0;
        margin-top: 2px;
        transition: all 0.3s ease;
    }

    .checkbox-label input:checked + .checkmark {
        background: var(--danger-color);
        border-color: var(--danger-color);
    }

    .checkbox-label input:checked + .checkmark:after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    /* Danger Actions */
    .danger-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }
        
        .settings-card-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .danger-actions {
            flex-direction: column;
        }
        
        .danger-actions .btn {
            width: 100%;
        }
        
        .password-strength {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        
        .strength-bar {
            width: 100%;
        }
        
        .strength-text {
            text-align: left;
        }
    }

    @media (max-width: 480px) {
        .header-text h1 {
            font-size: 24px;
        }
        
        .settings-card-body {
            padding: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize password strength checker
    const newPasswordInput = document.getElementById('newPassword');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    
    if (newPasswordInput) {
        newPasswordInput.addEventListener('input', checkPasswordStrength);
    }
    
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    }
    
    // Toggle password visibility
    const toggleButtons = document.querySelectorAll('.toggle-password');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const targetInput = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                icon.className = 'fa fa-eye-slash';
            } else {
                targetInput.type = 'password';
                icon.className = 'fa fa-eye';
            }
        });
    });
    
    // Enable/disable deactivate button based on checkboxes
    const checkboxes = document.querySelectorAll('#confirmDelete, #confirmDataLoss, #confirmNoRefund');
    const deactivateBtn = document.getElementById('deactivateBtn');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            deactivateBtn.disabled = !allChecked;
        });
    });
});

// Password strength checker
function checkPasswordStrength() {
    const password = document.getElementById('newPassword').value;
    const strengthBar = document.getElementById('passwordStrength');
    const strengthText = document.getElementById('strengthText');
    const requirements = {
        length: document.getElementById('reqLength'),
        uppercase: document.getElementById('reqUppercase'),
        lowercase: document.getElementById('reqLowercase'),
        number: document.getElementById('reqNumber'),
        special: document.getElementById('reqSpecial')
    };
    
    let strength = 0;
    let color = '#dc3545'; // Red - weak
    let text = 'Weak';
    
    // Check requirements
    const hasLength = password.length >= 8;
    const hasUppercase = /[A-Z]/.test(password);
    const hasLowercase = /[a-z]/.test(password);
    const hasNumber = /[0-9]/.test(password);
    const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    
    // Update requirement indicators
    requirements.length.className = hasLength ? 'valid' : '';
    requirements.uppercase.className = hasUppercase ? 'valid' : '';
    requirements.lowercase.className = hasLowercase ? 'valid' : '';
    requirements.number.className = hasNumber ? 'valid' : '';
    requirements.special.className = hasSpecial ? 'valid' : '';
    
    // Calculate strength
    if (hasLength) strength += 20;
    if (hasUppercase) strength += 20;
    if (hasLowercase) strength += 20;
    if (hasNumber) strength += 20;
    if (hasSpecial) strength += 20;
    
    // Determine color and text
    if (strength >= 80) {
        color = '#28a745'; // Green - strong
        text = 'Strong';
    } else if (strength >= 60) {
        color = '#ffc107'; // Yellow - medium
        text = 'Medium';
    } else if (strength >= 40) {
        color = '#fd7e14'; // Orange - fair
        text = 'Fair';
    } else {
        color = '#dc3545'; // Red - weak
        text = 'Weak';
    }
    
    // Update UI
    strengthBar.style.width = strength + '%';
    strengthBar.style.backgroundColor = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
}

// Check if passwords match
function checkPasswordMatch() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const matchIndicator = document.getElementById('passwordMatch');
    
    if (newPassword && confirmPassword) {
        if (newPassword === confirmPassword) {
            matchIndicator.classList.add('show');
        } else {
            matchIndicator.classList.remove('show');
        }
    } else {
        matchIndicator.classList.remove('show');
    }
}

// Change password function
function changePassword() {
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    // Validation
    if (!currentPassword) {
        alert('Please enter your current password');
        return;
    }
    
    if (!newPassword) {
        alert('Please enter a new password');
        return;
    }
    
    if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
    }
    
    if (!/[A-Z]/.test(newPassword)) {
        alert('Password must contain at least one uppercase letter');
        return;
    }
    
    if (!/[a-z]/.test(newPassword)) {
        alert('Password must contain at least one lowercase letter');
        return;
    }
    
    if (!/[0-9]/.test(newPassword)) {
        alert('Password must contain at least one number');
        return;
    }
    
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
        alert('Password must contain at least one special character');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }
    
    // Simulate password change
    const form = document.getElementById('passwordForm');
    form.reset();
    document.getElementById('passwordMatch').classList.remove('show');
    document.getElementById('passwordStrength').style.width = '0%';
    document.getElementById('strengthText').textContent = 'Weak';
    
    // Reset requirements
    const requirements = ['reqLength', 'reqUppercase', 'reqLowercase', 'reqNumber', 'reqSpecial'];
    requirements.forEach(id => {
        document.getElementById(id).className = '';
    });
    
    alert('Password changed successfully!');
}

// Cancel deactivation
function cancelDeactivation() {
    const checkboxes = document.querySelectorAll('#confirmDelete, #confirmDataLoss, #confirmNoRefund');
    checkboxes.forEach(cb => cb.checked = false);
    document.getElementById('deactivateBtn').disabled = true;
}

// Deactivate account
function deactivateAccount() {
    if (confirm('Are you absolutely sure you want to deactivate your account? This action cannot be undone.')) {
        const finalConfirm = prompt('Type "DEACTIVATE" to confirm permanent account deletion:');
        if (finalConfirm === 'DEACTIVATE') {
            // Simulate account deactivation
            setTimeout(() => {
                alert('Account has been deactivated. You will be logged out.');
                // Here you would typically redirect to logout
                // window.location.href = '/logout';
            }, 1000);
        } else {
            alert('Account deactivation cancelled.');
        }
    }
}
</script>
@endsection