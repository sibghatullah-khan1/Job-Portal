@extends('layouts.header')
@section('title', 'Your Applied Jobs')
@section('content')
<div class="applied-jobs-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="page-title">
                        <i class="fa fa-file-text"></i>
                        Your Applied Jobs
                    </h1>
                    <p class="page-subtitle">Track all your job applications and their status</p>
                </div>
                <div class="header-actions">
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline">
                        <i class="fa fa-briefcase"></i> Browse Jobs
                    </a>
                    <button class="btn btn-primary" id="exportApplications">
                        <i class="fa fa-download"></i> Export CSV
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
                    <div class="stat-icon submitted">
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="totalApplications">0</h3>
                        <p>Total Applied</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon reviewed">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="underReview">0</h3>
                        <p>Under Review</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon shortlisted">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="shortlisted">0</h3>
                        <p>Shortlisted</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon interviews">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="interviews">0</h3>
                        <p>Interviews</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section" id="filtersSection">
            <div class="filters-card">
                <div class="filters-header">
                    <h4><i class="fa fa-filter"></i> Filter Applications</h4>
                    <button type="button" class="btn-clear-filters">
                        <i class="fa fa-times"></i> Clear All
                    </button>
                </div>
                <div class="filters-body">
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fa fa-tag"></i>
                            Application Status
                        </label>
                        <div class="filter-options">
                            <label class="filter-checkbox">
                                <input type="checkbox" value="submitted" checked>
                                <span class="checkmark"></span>
                                <span class="filter-text">Submitted</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox" value="reviewed" checked>
                                <span class="checkmark"></span>
                                <span class="filter-text">Under Review</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox" value="shortlisted" checked>
                                <span class="checkmark"></span>
                                <span class="filter-text">Shortlisted</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox" value="interview" checked>
                                <span class="checkmark"></span>
                                <span class="filter-text">Interview</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox" value="rejected">
                                <span class="checkmark"></span>
                                <span class="filter-text">Rejected</span>
                            </label>
                            <label class="filter-checkbox">
                                <input type="checkbox" value="accepted">
                                <span class="checkmark"></span>
                                <span class="filter-text">Accepted</span>
                            </label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fa fa-clock-o"></i>
                            Application Date
                        </label>
                        <div class="filter-options">
                            <label class="filter-radio">
                                <input type="radio" name="date_range" value="7" checked>
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 7 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date_range" value="30">
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 30 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date_range" value="90">
                                <span class="radiomark"></span>
                                <span class="filter-text">Last 90 days</span>
                            </label>
                            <label class="filter-radio">
                                <input type="radio" name="date_range" value="all">
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
                        <select class="form-control" id="sortBy">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="status">Application Status</option>
                            <option value="company">Company Name</option>
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

        <!-- Applications List -->
        <div class="applications-container">
            <!-- Search and Actions -->
            <div class="actions-bar">
                <div class="search-box">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search by job title, company, or location..." 
                           id="applicationSearch">
                </div>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="card">
                        <i class="fa fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fa fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Applications Cards View -->
            <div class="applications-list view-card" id="applicationsList">
                <!-- Application Card 1 -->
                <div class="application-card status-submitted">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Submitted</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 2 days ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">Senior Frontend Developer</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">TechCorp Inc.</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            Remote
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="application-details">
                            <div class="detail-item">
                                <i class="fa fa-calendar"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Applied On</span>
                                    <span class="detail-value">Dec 15, 2024</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-file-text"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Resume</span>
                                    <span class="detail-value">john_doe_resume.pdf</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-comment"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Cover Letter</span>
                                    <span class="detail-value">Submitted</span>
                                </div>
                            </div>
                        </div>

                        <div class="application-progress">
                            <div class="progress-track">
                                <div class="progress-step active">
                                    <div class="step-icon">1</div>
                                    <div class="step-label">Applied</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">2</div>
                                    <div class="step-label">Review</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">3</div>
                                    <div class="step-label">Interview</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">4</div>
                                    <div class="step-label">Decision</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-outline view-job-btn">
                            <i class="fa fa-eye"></i> View Job
                        </button>
                        <button class="btn btn-outline withdraw-btn">
                            <i class="fa fa-times"></i> Withdraw
                        </button>
                        <button class="btn btn-primary track-btn">
                            <i class="fa fa-line-chart"></i> Track Status
                        </button>
                    </div>
                </div>

                <!-- Application Card 2 -->
                <div class="application-card status-reviewed">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Under Review</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 1 week ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">Product Manager</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">Innovate Solutions</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            San Francisco, CA
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="application-details">
                            <div class="detail-item">
                                <i class="fa fa-calendar"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Applied On</span>
                                    <span class="detail-value">Dec 10, 2024</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-eye"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Last Viewed</span>
                                    <span class="detail-value">Yesterday</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-history"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Expected Update</span>
                                    <span class="detail-value">Within 3 days</span>
                                </div>
                            </div>
                        </div>

                        <div class="application-progress">
                            <div class="progress-track">
                                <div class="progress-step completed">
                                    <div class="step-icon"><i class="fa fa-check"></i></div>
                                    <div class="step-label">Applied</div>
                                </div>
                                <div class="progress-step active">
                                    <div class="step-icon">2</div>
                                    <div class="step-label">Review</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">3</div>
                                    <div class="step-label">Interview</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">4</div>
                                    <div class="step-label">Decision</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-outline view-job-btn">
                            <i class="fa fa-eye"></i> View Job
                        </button>
                        <button class="btn btn-primary update-resume-btn">
                            <i class="fa fa-upload"></i> Update Resume
                        </button>
                    </div>
                </div>

                <!-- Application Card 3 -->
                <div class="application-card status-shortlisted">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Shortlisted</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 2 weeks ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">Data Scientist</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">DataWorks LLC</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            New York, NY
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="application-details">
                            <div class="detail-item">
                                <i class="fa fa-calendar"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Shortlisted On</span>
                                    <span class="detail-value">Dec 12, 2024</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-star"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Match Score</span>
                                    <span class="detail-value">85%</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <i class="fa fa-comments"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Recruiter Note</span>
                                    <span class="detail-value">"Strong profile"</span>
                                </div>
                            </div>
                        </div>

                        <div class="application-progress">
                            <div class="progress-track">
                                <div class="progress-step completed">
                                    <div class="step-icon"><i class="fa fa-check"></i></div>
                                    <div class="step-label">Applied</div>
                                </div>
                                <div class="progress-step completed">
                                    <div class="step-icon"><i class="fa fa-check"></i></div>
                                    <div class="step-label">Review</div>
                                </div>
                                <div class="progress-step active">
                                    <div class="step-icon">3</div>
                                    <div class="step-label">Interview</div>
                                </div>
                                <div class="progress-step">
                                    <div class="step-icon">4</div>
                                    <div class="step-label">Decision</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-outline view-job-btn">
                            <i class="fa fa-eye"></i> View Job
                        </button>
                        <button class="btn btn-success schedule-btn">
                            <i class="fa fa-calendar"></i> Schedule Interview
                        </button>
                    </div>
                </div>

                <!-- Application Card 4 -->
                <div class="application-card status-interview">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Interview Scheduled</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 3 weeks ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">UX Designer</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">Creative Minds</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            Austin, TX
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Contract
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="interview-details">
                            <div class="interview-card">
                                <div class="interview-header">
                                    <i class="fa fa-video-camera"></i>
                                    <h4>Virtual Interview</h4>
                                </div>
                                <div class="interview-body">
                                    <div class="interview-item">
                                        <i class="fa fa-calendar"></i>
                                        <span>Dec 20, 2024</span>
                                    </div>
                                    <div class="interview-item">
                                        <i class="fa fa-clock-o"></i>
                                        <span>2:00 PM - 3:00 PM</span>
                                    </div>
                                    <div class="interview-item">
                                        <i class="fa fa-user"></i>
                                        <span>Sarah Johnson (HR Manager)</span>
                                    </div>
                                    <div class="interview-item">
                                        <i class="fa fa-link"></i>
                                        <a href="#">Join Zoom Meeting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-outline reschedule-btn">
                            <i class="fa fa-calendar-times-o"></i> Reschedule
                        </button>
                        <button class="btn btn-success prepare-btn">
                            <i class="fa fa-graduation-cap"></i> Prepare
                        </button>
                        <button class="btn btn-primary join-btn">
                            <i class="fa fa-video-camera"></i> Join Interview
                        </button>
                    </div>
                </div>

                <!-- Application Card 5 -->
                <div class="application-card status-rejected">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Not Selected</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 1 month ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">DevOps Engineer</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">CloudTech Inc.</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            Remote
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rejection-details">
                            <div class="rejection-card">
                                <div class="rejection-header">
                                    <i class="fa fa-times-circle"></i>
                                    <h4>Application Update</h4>
                                </div>
                                <div class="rejection-body">
                                    <p>Thank you for your interest. We've decided to move forward with other candidates.</p>
                                    <div class="rejection-feedback">
                                        <i class="fa fa-comment"></i>
                                        <span><strong>Feedback:</strong> Experience level didn't match requirements.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-outline view-job-btn">
                            <i class="fa fa-eye"></i> View Job
                        </button>
                        <button class="btn btn-outline feedback-btn">
                            <i class="fa fa-comment"></i> Request Feedback
                        </button>
                        <button class="btn btn-primary find-similar-btn">
                            <i class="fa fa-search"></i> Find Similar Jobs
                        </button>
                    </div>
                </div>

                <!-- Application Card 6 -->
                <div class="application-card status-accepted">
                    <div class="application-card-header">
                        <div class="application-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Offer Received</span>
                        </div>
                        <div class="application-date">
                            <i class="fa fa-clock-o"></i>
                            Applied 2 months ago
                        </div>
                    </div>

                    <div class="application-card-body">
                        <div class="job-info">
                            <h3 class="job-title">Backend Developer</h3>
                            <div class="company-info">
                                <div class="company-logo">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="company-details">
                                    <h4 class="company-name">StartupXYZ</h4>
                                    <div class="company-meta">
                                        <span class="meta-item">
                                            <i class="fa fa-map-marker"></i>
                                            Boston, MA
                                        </span>
                                        <span class="meta-item">
                                            <i class="fa fa-briefcase"></i>
                                            Full-time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offer-details">
                            <div class="offer-card">
                                <div class="offer-header">
                                    <i class="fa fa-trophy"></i>
                                    <h4>Congratulations!</h4>
                                </div>
                                <div class="offer-body">
                                    <div class="offer-item">
                                        <i class="fa fa-money"></i>
                                        <span><strong>Salary:</strong> $120,000/year</span>
                                    </div>
                                    <div class="offer-item">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <span><strong>Start Date:</strong> Jan 15, 2025</span>
                                    </div>
                                    <div class="offer-item">
                                        <i class="fa fa-file-text"></i>
                                        <span><strong>Offer Letter:</strong> <a href="#">Download PDF</a></span>
                                    </div>
                                    <div class="offer-item">
                                        <i class="fa fa-clock-o"></i>
                                        <span><strong>Response Deadline:</strong> Dec 25, 2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="application-card-footer">
                        <button class="btn btn-success accept-offer-btn">
                            <i class="fa fa-check-circle"></i> Accept Offer
                        </button>
                        <button class="btn btn-outline negotiate-btn">
                            <i class="fa fa-comments"></i> Negotiate
                        </button>
                        <button class="btn btn-danger decline-offer-btn">
                            <i class="fa fa-times-circle"></i> Decline
                        </button>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <div class="empty-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                <h3>No Applications Found</h3>
                <p>You haven't applied to any jobs yet. Start your job search today!</p>
                <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                    <i class="fa fa-search"></i> Browse Jobs
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

    .btn-success {
        background: var(--success-color);
        color: white !important;
        border: none;
    }

    .btn-success:hover {
        opacity: 0.9;
    }

    .btn-danger {
        background: var(--danger-color);
        color: white !important;
        border: none;
    }

    .btn-danger:hover {
        opacity: 0.9;
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
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card.active {
        border: 2px solid var(--primary-color);
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

    .stat-icon.submitted { background: var(--info-color); }
    .stat-icon.reviewed { background: #6c757d; }
    .stat-icon.shortlisted { background: var(--warning-color); }
    .stat-icon.interviews { background: var(--primary-color); }

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

    .view-toggle {
        display: flex;
        gap: 5px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        overflow: hidden;
    }

    .view-btn {
        padding: 8px 12px;
        background: white;
        border: none;
        cursor: pointer;
        color: var(--text-light);
    }

    .view-btn.active {
        background: var(--primary-color);
        color: white;
    }

    /* Applications List */
    .applications-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 20px;
    }

    /* Application Card */
    .application-card {
        background: white;
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
        border-left: 4px solid var(--info-color);
    }

    .application-card.status-submitted {
        border-left-color: var(--info-color);
    }

    .application-card.status-reviewed {
        border-left-color: #6c757d;
    }

    .application-card.status-shortlisted {
        border-left-color: var(--warning-color);
    }

    .application-card.status-interview {
        border-left-color: var(--primary-color);
    }

    .application-card.status-rejected {
        border-left-color: var(--danger-color);
    }

    .application-card.status-accepted {
        border-left-color: var(--success-color);
    }

    .application-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: var(--background-light);
        border-bottom: 1px solid var(--border-color);
    }

    .application-status {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .application-card.status-submitted .status-dot {
        background: var(--info-color);
    }

    .application-card.status-reviewed .status-dot {
        background: #6c757d;
    }

    .application-card.status-shortlisted .status-dot {
        background: var(--warning-color);
    }

    .application-card.status-interview .status-dot {
        background: var(--primary-color);
    }

    .application-card.status-rejected .status-dot {
        background: var(--danger-color);
    }

    .application-card.status-accepted .status-dot {
        background: var(--success-color);
    }

    .application-date {
        display: flex;
        align-items: center;
        gap: 5px;
        color: var(--text-light);
        font-size: 13px;
    }

    .application-card-body {
        padding: 20px;
    }

    .job-info {
        margin-bottom: 20px;
    }

    .job-title {
        margin: 0 0 15px 0;
        font-size: 18px;
        color: var(--text-dark);
    }

    .company-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .company-logo {
        width: 40px;
        height: 40px;
        background: var(--primary-light);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 18px;
    }

    .company-details {
        flex: 1;
    }

    .company-name {
        margin: 0 0 5px 0;
        font-size: 16px;
        color: var(--text-dark);
    }

    .company-meta {
        display: flex;
        gap: 15px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        color: var(--text-light);
        font-size: 13px;
    }

    /* Application Details */
    .application-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
        padding: 15px;
        background: var(--background-light);
        border-radius: 8px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .detail-item i {
        color: var(--primary-color);
        width: 20px;
        text-align: center;
    }

    .detail-content {
        flex: 1;
    }

    .detail-label {
        display: block;
        font-size: 12px;
        color: var(--text-light);
        margin-bottom: 2px;
    }

    .detail-value {
        display: block;
        font-size: 14px;
        color: var(--text-dark);
        font-weight: 500;
    }

    /* Interview Details */
    .interview-card, .rejection-card, .offer-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .interview-header, .rejection-header, .offer-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .interview-body, .rejection-body, .offer-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .interview-item, .offer-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-dark);
    }

    .rejection-body p {
        margin-bottom: 10px;
        color: var(--text-dark);
    }

    .rejection-feedback {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background: #fff3cd;
        border-radius: 6px;
        border-left: 4px solid var(--warning-color);
    }

    /* Progress Track */
    .application-progress {
        margin: 20px 0;
    }

    .progress-track {
        display: flex;
        justify-content: space-between;
        position: relative;
    }

    .progress-track:before {
        content: '';
        position: absolute;
        top: 15px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e9ecef;
        z-index: 1;
    }

    .progress-step {
        position: relative;
        z-index: 2;
        text-align: center;
        flex: 1;
    }

    .step-icon {
        width: 30px;
        height: 30px;
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 5px;
        font-size: 12px;
        font-weight: 600;
    }

    .progress-step.active .step-icon {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .progress-step.completed .step-icon {
        background: var(--success-color);
        border-color: var(--success-color);
        color: white;
    }

    .step-label {
        font-size: 11px;
        color: var(--text-light);
        white-space: nowrap;
    }

    /* Application Card Footer */
    .application-card-footer {
        padding: 15px 20px;
        background: var(--background-light);
        border-top: 1px solid var(--border-color);
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .application-card-footer .btn {
        padding: 8px 16px;
        font-size: 13px;
    }

    .application-card-footer .btn-outline {
        color: var(--primary-color) !important;
        border-color: #ddd;
    }

    .application-card-footer .btn-outline:hover {
        border-color: var(--primary-color);
        background: var(--primary-light);
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
        
        .application-card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .application-details {
            grid-template-columns: 1fr;
        }
        
        .progress-track {
            flex-wrap: wrap;
        }
        
        .progress-step {
            margin-bottom: 15px;
        }
        
        .application-card-footer {
            flex-direction: column;
        }
        
        .application-card-footer .btn {
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize stats
    updateStats();

    // Export applications
    const exportBtn = document.getElementById('exportApplications');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            alert('Exporting applications to CSV...');
            // Here you would typically make an API call to export data
            // For now, we'll just show a success message
            setTimeout(() => {
                alert('Applications exported successfully!');
            }, 1000);
        });
    }

    // Toggle filters
    const filterToggle = document.createElement('button');
    filterToggle.className = 'btn btn-outline';
    filterToggle.innerHTML = '<i class="fa fa-filter"></i> Filter';
    filterToggle.style.marginBottom = '20px';
    filterToggle.style.display = 'block';
    filterToggle.style.marginLeft = 'auto';
    filterToggle.style.marginRight = 'auto';
    
    const filtersSection = document.getElementById('filtersSection');
    if (filtersSection) {
        // Insert toggle button before filters section
        filtersSection.parentNode.insertBefore(filterToggle, filtersSection);
        
        filterToggle.addEventListener('click', function() {
            if (filtersSection.style.display === 'none' || filtersSection.style.display === '') {
                filtersSection.style.display = 'block';
                this.innerHTML = '<i class="fa fa-times"></i> Close';
            } else {
                filtersSection.style.display = 'none';
                this.innerHTML = '<i class="fa fa-filter"></i> Filter';
            }
        });
        
        filtersSection.style.display = 'none';
    }

    // Clear filters
    const clearFiltersBtn = document.querySelector('.btn-clear-filters');
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            // Uncheck all checkboxes
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                if (['submitted', 'reviewed', 'shortlisted', 'interview'].includes(cb.value)) {
                    cb.checked = true;
                } else {
                    cb.checked = false;
                }
            });
            
            // Reset radio to first option
            document.querySelectorAll('input[type="radio"]').forEach((rb, index) => {
                rb.checked = index === 0;
            });
            
            // Reset sort select
            document.getElementById('sortBy').value = 'newest';
            
            // Update applications
            filterApplications();
        });
    }

    // Apply filters
    const applyFiltersBtn = document.getElementById('applyFilters');
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            filterApplications();
            if (filtersSection) {
                filtersSection.style.display = 'none';
                filterToggle.innerHTML = '<i class="fa fa-filter"></i> Filter';
            }
        });
    }

    // Search functionality
    const searchInput = document.getElementById('applicationSearch');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterApplications();
            }, 500);
        });
    }

    // View toggle
    const viewButtons = document.querySelectorAll('.view-btn');
    const applicationsList = document.getElementById('applicationsList');
    
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Change view mode
            applicationsList.className = 'applications-list view-' + this.dataset.view;
        });
    });

    // Application actions
    setupApplicationActions();

    // Initialize
    filterApplications();

    // Update stats based on visible applications
    function updateStats() {
        const applications = document.querySelectorAll('.application-card');
        let submitted = 0, reviewed = 0, shortlisted = 0, interviews = 0;
        
        applications.forEach(card => {
            if (card.style.display !== 'none') {
                if (card.classList.contains('status-submitted')) submitted++;
                if (card.classList.contains('status-reviewed')) reviewed++;
                if (card.classList.contains('status-shortlisted')) shortlisted++;
                if (card.classList.contains('status-interview')) interviews++;
            }
        });
        
        document.getElementById('totalApplications').textContent = applications.length;
        document.getElementById('underReview').textContent = reviewed;
        document.getElementById('shortlisted').textContent = shortlisted;
        document.getElementById('interviews').textContent = interviews;
    }

    // Filter applications based on search and filters
    function filterApplications() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const applications = document.querySelectorAll('.application-card');
        const emptyState = document.getElementById('emptyState');
        
        // Get selected status filters
        const selectedStatuses = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'))
            .map(cb => cb.value);
        
        let visibleCount = 0;
        
        applications.forEach(card => {
            const jobTitle = card.querySelector('.job-title').textContent.toLowerCase();
            const companyName = card.querySelector('.company-name').textContent.toLowerCase();
            const status = card.classList[1].replace('status-', '');
            
            // Check search term
            const matchesSearch = searchTerm === '' || 
                jobTitle.includes(searchTerm) || 
                companyName.includes(searchTerm);
            
            // Check status filter
            const matchesStatus = selectedStatuses.length === 0 || selectedStatuses.includes(status);
            
            if (matchesSearch && matchesStatus) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Show/hide empty state
        if (visibleCount === 0) {
            emptyState.style.display = 'block';
            applicationsList.style.display = 'none';
        } else {
            emptyState.style.display = 'none';
            applicationsList.style.display = 'block';
        }
        
        updateStats();
    }

    // Setup application action buttons
    function setupApplicationActions() {
        // View Job buttons
        document.querySelectorAll('.view-job-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const jobTitle = this.closest('.application-card').querySelector('.job-title').textContent;
                alert(`Viewing job: ${jobTitle}`);
            });
        });

        // Withdraw buttons
        document.querySelectorAll('.withdraw-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.application-card');
                const jobTitle = card.querySelector('.job-title').textContent;
                
                if (confirm(`Are you sure you want to withdraw your application for "${jobTitle}"?`)) {
                    card.style.opacity = '0.5';
                    setTimeout(() => {
                        card.remove();
                        filterApplications();
                    }, 300);
                }
            });
        });

        // Track Status buttons
        document.querySelectorAll('.track-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const jobTitle = this.closest('.application-card').querySelector('.job-title').textContent;
                alert(`Tracking status for: ${jobTitle}`);
            });
        });

        // Schedule Interview buttons
        document.querySelectorAll('.schedule-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Opening interview scheduler...');
            });
        });

        // Join Interview buttons
        document.querySelectorAll('.join-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Joining interview meeting...');
            });
        });

        // Accept Offer buttons
        document.querySelectorAll('.accept-offer-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const jobTitle = this.closest('.application-card').querySelector('.job-title').textContent;
                if (confirm(`Accept offer for "${jobTitle}"?`)) {
                    alert('Congratulations! Offer accepted successfully!');
                }
            });
        });

        // Decline Offer buttons
        document.querySelectorAll('.decline-offer-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const jobTitle = this.closest('.application-card').querySelector('.job-title').textContent;
                if (confirm(`Decline offer for "${jobTitle}"?`)) {
                    alert('Offer declined.');
                }
            });
        });
    }
});
</script>
@endsection