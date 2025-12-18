@extends('layouts.header')
@section('title', 'Your All Jobs')
@section('content')
<div class="all-jobs-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="page-title">
                        <i class="fa fa-briefcase"></i>
                        Your Posted Jobs
                    </h1>
                    <p class="page-subtitle">Manage all your job posts and track applications</p>
                </div>
                <div class="header-actions">
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Post New Job
                    </a>
                    <button class="btn btn-outline" id="filterToggle">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Stats Overview -->
        <div class="stats-overview">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon active">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <div class="stat-content">
                        <h3>0</h3>
                        <p>Active Jobs</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon applications">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3>0</h3>
                        <p>Total Applications</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon interviews">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                    <div class="stat-content">
                        <h3>0</h3>
                        <p>Interviews Scheduled</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon views">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="stat-content">
                        <h3>0</h3>
                        <p>Total Views</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section (Hidden by default) -->
        <div class="filters-section" id="filtersSection">
            <div class="filters-card">
                <div class="filters-header">
                    <h4><i class="fa fa-filter"></i> Filter Jobs</h4>
                    <button type="button" class="btn-clear-filters">
                        <i class="fa fa-times"></i> Clear All
                    </button>
                </div>
                <div class="filters-body">
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fa fa-briefcase"></i>
                            Job Status
                        </label>
                        <div class="filter-options">
                            <label class="filter-checkbox">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                <span class="filter-text">Active</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="filter-text">Draft</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="filter-text">Closed</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="filter-text">Expired</span>
                            </label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fa fa-clock-o"></i>
                            Date Posted
                        </label>
                        <div class="filter-options">
                            <label class="filter-radio">
                                <input type="radio" name="date" checked>
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 7 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date">
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 30 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date">
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 90 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date">
                                <span class="radiomark"></span>
                                <span class="filter-text">All time</span>
                            </label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fa fa-sort-amount-asc"></i>
                            Sort By
                        </label>
                        <select class="form-control">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="applications">Most Applications</option>
                            <option value="views">Most Views</option>
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="btn btn-primary" id="applyFilters">
                            <i class="fa fa-check"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Bulk Actions -->
        <div class="actions-bar">
            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search jobs by title, department, or location..." 
                       id="jobSearch">
            </div>
            <div class="bulk-actions">
                <select class="form-control bulk-select" id="bulkActionSelect">
                    <option value="">Bulk Actions</option>
                    <option value="activate">Activate Selected</option>
                    <option value="close">Close Selected</option>
                    <option value="delete">Delete Selected</option>
                    <option value="duplicate">Duplicate Selected</option>
                </select>
                <button class="btn btn-outline" id="applyBulkAction">
                    <i class="fa fa-play"></i> Apply
                </button>
            </div>
        </div>

        <!-- Jobs List -->
        <div class="jobs-container">
            <div class="jobs-list" id="jobsList">
                <!-- Sample Job Cards -->
                <div class="job-card active">
                    <div class="job-card-header">
                        <div class="job-status active">
                            <span class="status-dot"></span>
                            Active
                        </div>
                        <div class="job-actions">
                            <button class="btn-action" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn-action" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="job-card-body">
                        <div class="job-main-info">
                            <h3 class="job-title">Senior Frontend Developer</h3>
                            <div class="job-meta">
                                <span class="meta-item">
                                    <i class="fa fa-building"></i>
                                    Engineering
                                </span>
                                <span class="meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    Remote
                                </span>
                                <span class="meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Posted 2 days ago
                                </span>
                            </div>
                        </div>

                        <div class="job-stats">
                            <div class="stat">
                                <div class="stat-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">48</div>
                                    <div class="stat-label">Applications</div>
                                </div>
                            </div>
                            <div class="stat">
                                <div class="stat-icon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">324</div>
                                    <div class="stat-label">Views</div>
                                </div>
                            </div>
                        </div>

                        <div class="job-description">
                            We're looking for an experienced Frontend Developer to join our team.
                        </div>

                        <div class="job-tags">
                            <span class="tag">React</span>
                            <span class="tag">TypeScript</span>
                            <span class="tag">Next.js</span>
                        </div>
                    </div>

                    <div class="job-card-footer">
                        <div class="job-actions-footer">
                            <a href="#" class="btn btn-outline">
                                <i class="fa fa-eye"></i> View Applicants
                            </a>
                            <a href="#" class="btn btn-primary">
                                <i class="fa fa-pencil"></i> Edit Job
                            </a>
                        </div>
                    </div>
                </div>

                <div class="job-card draft">
                    <div class="job-card-header">
                        <div class="job-status draft">
                            <span class="status-dot"></span>
                            Draft
                        </div>
                        <div class="job-actions">
                            <button class="btn-action" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn-action" title="Publish">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="job-card-body">
                        <div class="job-main-info">
                            <h3 class="job-title">Backend Developer</h3>
                            <div class="job-meta">
                                <span class="meta-item">
                                    <i class="fa fa-building"></i>
                                    Engineering
                                </span>
                                <span class="meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    New York
                                </span>
                                <span class="meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Saved 5 days ago
                                </span>
                            </div>
                        </div>

                        <div class="job-stats">
                            <div class="stat">
                                <div class="stat-icon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">0</div>
                                    <div class="stat-label">Views</div>
                                </div>
                            </div>
                        </div>

                        <div class="job-description">
                            Looking for a Backend Developer with Node.js experience.
                        </div>

                        <div class="job-tags">
                            <span class="tag">Node.js</span>
                            <span class="tag">Express</span>
                            <span class="tag">MongoDB</span>
                        </div>
                    </div>

                    <div class="job-card-footer">
                        <div class="job-actions-footer">
                            <button class="btn btn-outline">
                                <i class="fa fa-edit"></i> Continue Editing
                            </button>
                            <button class="btn btn-success">
                                <i class="fa fa-paper-plane"></i> Publish Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State (Initially hidden) -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <div class="empty-icon">
                    <i class="fa fa-briefcase"></i>
                </div>
                <h3>No Jobs Found</h3>
                <p>You haven't posted any jobs yet.</p>
                <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Post Your First Job
                </a>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn disabled">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">
                    <i class="fa fa-chevron-right"></i>
                </button>
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
        max-width: 1200px;
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
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .header-text h1 {
        margin: 0 0 10px 0;
        font-size: 28px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header-text p {
        margin: 0;
        opacity: 0.9;
    }

    /* Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 2px solid transparent;
        text-decoration: none;
    }

    .btn-primary {
        background: white;
        color: var(--primary-color) !important;
        border-color: white;
    }

    .btn-primary:hover {
        background: transparent;
        color: white !important;
    }

    .btn-outline {
        background: transparent;
        color: white !important;
        border-color: white;
    }

    .btn-outline:hover {
        background: white;
        color: var(--primary-color) !important;
    }

    /* Stats */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: var(--card-shadow);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }

    .stat-icon.active { background: var(--primary-color); }
    .stat-icon.applications { background: var(--success-color); }
    .stat-icon.interviews { background: var(--warning-color); }
    .stat-icon.views { background: var(--info-color); }

    .stat-content h3 {
        margin: 0 0 5px 0;
        font-size: 24px;
        color: var(--text-dark);
    }

    .stat-content p {
        margin: 0;
        color: var(--text-light);
        font-size: 14px;
    }

    /* Filters */
    .filters-section {
        display: none;
        margin-bottom: 20px;
    }

    .filters-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: var(--card-shadow);
    }

    .filters-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .filters-header h4 {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-clear-filters {
        background: transparent;
        border: none;
        color: var(--danger-color);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .filters-body {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .filter-group {
        margin-bottom: 15px;
    }

    .filter-label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .filter-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .filter-checkbox, .filter-radio {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .filter-checkbox input, .filter-radio input {
        display: none;
    }

    .checkmark, .radiomark {
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        position: relative;
    }

    .radiomark {
        border-radius: 50%;
    }

    .filter-checkbox input:checked + .checkmark {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    .filter-checkbox input:checked + .checkmark:after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 12px;
    }

    .filter-radio input:checked + .radiomark:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 8px;
        height: 8px;
        background: var(--primary-color);
        border-radius: 50%;
    }

    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-size: 14px;
    }

    .filter-actions {
        display: flex;
        justify-content: flex-end;
    }

    /* Actions Bar */
    .actions-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .search-box {
        position: relative;
        flex: 1;
        min-width: 300px;
    }

    .search-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }

    .search-box input {
        width: 100%;
        padding: 10px 15px 10px 35px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-size: 14px;
    }

    .bulk-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    /* Jobs List */
    .jobs-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 20px;
    }

    /* Job Card */
    .job-card {
        background: white;
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    .job-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: var(--background-light);
        border-bottom: 1px solid var(--border-color);
    }

    .job-status {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        background: white;
    }

    .job-status.active {
        color: var(--success-color);
        border: 1px solid var(--success-color);
    }

    .job-status.draft {
        color: var(--info-color);
        border: 1px solid var(--info-color);
    }

    .job-status.closed {
        color: var(--text-light);
        border: 1px solid var(--text-light);
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .job-status.active .status-dot {
        background: var(--success-color);
    }

    .job-status.draft .status-dot {
        background: var(--info-color);
    }

    .job-actions {
        display: flex;
        gap: 5px;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border: 1px solid #ddd;
        background: white;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #666;
    }

    .btn-action:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .job-card-body {
        padding: 20px;
    }

    .job-main-info {
        margin-bottom: 15px;
    }

    .job-title {
        margin: 0 0 10px 0;
        font-size: 18px;
        color: var(--text-dark);
    }

    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        color: var(--text-light);
        font-size: 13px;
    }

    .meta-item i {
        color: var(--primary-color);
    }

    .job-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
        padding: 15px;
        background: var(--background-light);
        border-radius: 8px;
    }

    .stat {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .stat-icon {
        width: 36px;
        height: 36px;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 16px;
    }

    .stat-content {
        flex: 1;
    }

    .stat-number {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .stat-label {
        font-size: 12px;
        color: var(--text-light);
    }

    .job-description {
        color: var(--text-dark);
        line-height: 1.5;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .job-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        padding: 4px 12px;
        background: var(--primary-light);
        color: var(--primary-color);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .job-card-footer {
        padding: 15px 20px;
        background: var(--background-light);
        border-top: 1px solid var(--border-color);
    }

    .job-actions-footer {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .job-actions-footer .btn {
        padding: 8px 16px;
        font-size: 13px;
    }

    .job-actions-footer .btn-outline {
        color: var(--primary-color) !important;
        border-color: #ddd;
    }

    .job-actions-footer .btn-outline:hover {
        border-color: var(--primary-color);
        background: var(--primary-light);
    }

    .job-actions-footer .btn-primary {
        background: var(--primary-color);
        color: white !important;
    }

    .job-actions-footer .btn-primary:hover {
        opacity: 0.9;
    }

    .job-actions-footer .btn-success {
        background: var(--success-color);
        color: white !important;
        border: none;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        background: white;
        border-radius: 10px;
        box-shadow: var(--card-shadow);
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-light);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto 20px;
    }

    .empty-state h3 {
        margin: 0 0 10px 0;
        font-size: 20px;
        color: var(--text-dark);
    }

    .empty-state p {
        margin: 0 0 20px 0;
        color: var(--text-light);
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        margin-top: 30px;
    }

    .pagination-btn {
        width: 36px;
        height: 36px;
        border: 1px solid #ddd;
        background: white;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
    }

    .pagination-btn:hover:not(.disabled):not(.active) {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .pagination-btn.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            text-align: center;
        }
        
        .header-text h1 {
            justify-content: center;
        }
        
        .actions-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            min-width: 100%;
        }
        
        .job-meta {
            flex-direction: column;
            gap: 8px;
        }
        
        .job-actions-footer {
            flex-direction: column;
        }
        
        .job-actions-footer .btn {
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle filters
    const filterToggle = document.getElementById('filterToggle');
    const filtersSection = document.getElementById('filtersSection');
    
    if (filterToggle && filtersSection) {
        filterToggle.addEventListener('click', function() {
            if (filtersSection.style.display === 'none' || filtersSection.style.display === '') {
                filtersSection.style.display = 'block';
                this.innerHTML = '<i class="fa fa-times"></i> Close';
            } else {
                filtersSection.style.display = 'none';
                this.innerHTML = '<i class="fa fa-filter"></i> Filter';
            }
        });
    }

    // Clear filters
    const clearFiltersBtn = document.querySelector('.btn-clear-filters');
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            // Uncheck all checkboxes
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
            });
            
            // Uncheck all radios except first
            document.querySelectorAll('input[type="radio"]').forEach((rb, index) => {
                rb.checked = index === 0;
            });
            
            // Reset sort select
            const sortSelect = document.querySelector('.filters-body select');
            if (sortSelect) {
                sortSelect.value = 'newest';
            }
            
            alert('Filters cleared!');
        });
    }

    // Apply filters
    const applyFiltersBtn = document.getElementById('applyFilters');
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            alert('Filters applied!');
            filtersSection.style.display = 'none';
            filterToggle.innerHTML = '<i class="fa fa-filter"></i> Filter';
        });
    }

    // Search functionality
    const jobSearch = document.getElementById('jobSearch');
    const jobsList = document.getElementById('jobsList');
    const emptyState = document.getElementById('emptyState');
    
    if (jobSearch) {
        jobSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const jobCards = jobsList.querySelectorAll('.job-card');
            let hasVisibleJobs = false;
            
            jobCards.forEach(card => {
                const title = card.querySelector('.job-title').textContent.toLowerCase();
                const description = card.querySelector('.job-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                    hasVisibleJobs = true;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show/hide empty state
            if (!hasVisibleJobs && searchTerm !== '') {
                emptyState.style.display = 'block';
                jobsList.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                jobsList.style.display = 'block';
            }
        });
    }

    // Bulk actions
    const applyBulkAction = document.getElementById('applyBulkAction');
    const bulkActionSelect = document.getElementById('bulkActionSelect');
    
    if (applyBulkAction && bulkActionSelect) {
        applyBulkAction.addEventListener('click', function() {
            const action = bulkActionSelect.value;
            if (!action) {
                alert('Please select a bulk action first.');
                return;
            }
            
            if (confirm(`Are you sure you want to ${action} the selected jobs?`)) {
                alert(`Bulk action "${action}" will be processed.`);
                bulkActionSelect.value = '';
            }
        });
    }

    // Job action buttons
    document.querySelectorAll('.btn-action[title="Edit"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const jobTitle = this.closest('.job-card').querySelector('.job-title').textContent;
            alert(`Editing job: ${jobTitle}`);
        });
    });

    document.querySelectorAll('.btn-action[title="Delete"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const jobCard = this.closest('.job-card');
            const jobTitle = jobCard.querySelector('.job-title').textContent;
            
            if (confirm(`Are you sure you want to delete "${jobTitle}"?`)) {
                jobCard.style.opacity = '0.5';
                setTimeout(() => {
                    jobCard.remove();
                    checkEmptyState();
                }, 300);
            }
        });
    });

    document.querySelectorAll('.btn-action[title="Publish"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const jobCard = this.closest('.job-card');
            const statusElement = jobCard.querySelector('.job-status');
            
            if (confirm('Publish this job?')) {
                statusElement.innerHTML = '<span class="status-dot"></span> Active';
                statusElement.className = 'job-status active';
                jobCard.classList.remove('draft');
                jobCard.classList.add('active');
                
                // Hide publish button
                this.style.display = 'none';
                
                alert('Job published successfully!');
            }
        });
    });

    // Check empty state
    function checkEmptyState() {
        const jobCards = jobsList.querySelectorAll('.job-card');
        if (jobCards.length === 0) {
            emptyState.style.display = 'block';
            jobsList.style.display = 'none';
        }
    }

    // Initialize
    filtersSection.style.display = 'none';
});
</script>
@endsection