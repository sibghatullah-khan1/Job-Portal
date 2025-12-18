@extends('layouts.header')
@section('title', 'Dashboard')
@section('content')
<div class="dashboard">
    <!-- Welcome Section with Profile -->
    <div class="welcome-card mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-muted mb-3">Here's your job search dashboard. Track applications, find new opportunities, and manage your profile.</p>
                <div class="user-stats">
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Total Applied</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">85%</span>
                        <span class="stat-label">Profile Score</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">3</span>
                        <span class="stat-label">Active Alerts</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="profile-completion">
                    <div class="completion-circle">
                        <svg width="100" height="100">
                            <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"></circle>
                            <circle cx="50" cy="50" r="40" stroke="var(--primary-color)" stroke-width="8" fill="none" stroke-dasharray="251" stroke-dashoffset="38" stroke-linecap="round"></circle>
                        </svg>
                        <span class="completion-percent">85%</span>
                    </div>
                    <p class="mt-2">Profile Complete</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card bg-gradient-1">
                <div class="stats-icon">
                    <i class="fa fa-paper-plane"></i>
                </div>
                <div class="stats-content">
                    <h3>12</h3>
                    <p>Jobs Applied</p>
                    <span class="stats-trend text-success">↑ 3 this week</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card bg-gradient-2">
                <div class="stats-icon">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <div class="stats-content">
                    <h3>3</h3>
                    <p>Interviews</p>
                    <span class="stats-trend text-warning">↑ 1 upcoming</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card bg-gradient-3">
                <div class="stats-icon">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="stats-content">
                    <h3>48</h3>
                    <p>Profile Views</p>
                    <span class="stats-trend text-success">↑ 12 this month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card bg-gradient-4">
                <div class="stats-icon">
                    <i class="fa fa-star"></i>
                </div>
                <div class="stats-content">
                    <h3>8</h3>
                    <p>Saved Jobs</p>
                    <span class="stats-trend text-info">↑ 2 new</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Status Chart & Quick Actions -->
    <div class="row mb-4">
        <!-- Application Status -->
        <div class="col-lg-8 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Application Status</h5>
                    <a href="{{ route('user.yaj') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-list me-1"></i> View All
                    </a>
                </div>
                <div class="card-body">
                    <div class="status-chart mb-4">
                        <div class="chart-bars">
                            <div class="chart-bar bg-success" style="height: 80%;" data-tooltip="20 Applied">
                                <span>20</span>
                            </div>
                            <div class="chart-bar bg-primary" style="height: 60%;" data-tooltip="12 In Review">
                                <span>12</span>
                            </div>
                            <div class="chart-bar bg-warning" style="height: 40%;" data-tooltip="3 Interviews">
                                <span>3</span>
                            </div>
                            <div class="chart-bar bg-danger" style="height: 20%;" data-tooltip="5 Rejected">
                                <span>5</span>
                            </div>
                        </div>
                        <div class="chart-labels">
                            <span>Applied</span>
                            <span>Review</span>
                            <span>Interview</span>
                            <span>Rejected</span>
                        </div>
                    </div>
                    <div class="status-legend">
                        <div class="legend-item">
                            <span class="legend-color bg-success"></span>
                            <span>Applied (20)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color bg-primary"></span>
                            <span>In Review (12)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color bg-warning"></span>
                            <span>Interview (3)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color bg-danger"></span>
                            <span>Rejected (5)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="quick-actions-grid">
                        <a href="{{ route('client.jobs') }}" class="quick-action-btn bg-primary-light">
                            <i class="fa fa-search"></i>
                            <span>Search Jobs</span>
                        </a>
                        <a href="{{ route('jobs.create') }}" class="quick-action-btn bg-success-light">
                            <i class="fa fa-plus-circle"></i>
                            <span>Post a Job</span>
                        </a>
                        <a href="{{ route('user.profile') }}" class="quick-action-btn bg-warning-light">
                            <i class="fa fa-user-edit"></i>
                            <span>Update Profile</span>
                        </a>
                        <a href="{{ route('user.yaj') }}" class="quick-action-btn bg-info-light">
                            <i class="fa fa-list-alt"></i>
                            <span>Applications</span>
                        </a>
                        <a href="#" class="quick-action-btn bg-purple-light">
                            <i class="fa fa-file-text"></i>
                            <span>Resume Builder</span>
                        </a>
                        <a href="#" class="quick-action-btn bg-pink-light">
                            <i class="fa fa-bell"></i>
                            <span>Job Alerts</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Upcoming Interviews -->
    <div class="row mb-4">
        <!-- Recent Activity -->
        <div class="col-lg-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Recent Activity</h5>
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-history me-1"></i> Timeline
                    </button>
                </div>
                <div class="card-body">
                    <div class="activity-timeline">
                        <div class="timeline-item success">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h6>Application Submitted</h6>
                                <p class="text-muted mb-1">Senior Developer at TechCorp Inc.</p>
                                <small class="text-muted">Just now • <span class="badge bg-success">Submitted</span></small>
                            </div>
                        </div>
                        <div class="timeline-item primary">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h6>Profile Viewed</h6>
                                <p class="text-muted mb-1">Recruiter from Google viewed your profile</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item warning">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h6>Interview Scheduled</h6>
                                <p class="text-muted mb-1">Project Manager at Global Solutions</p>
                                <small class="text-muted">Yesterday • <span class="badge bg-warning">Scheduled</span></small>
                            </div>
                        </div>
                        <div class="timeline-item info">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h6>New Job Alert</h6>
                                <p class="text-muted mb-1">Data Analyst position matches your skills</p>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Interviews -->
        <div class="col-lg-6 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Upcoming Interviews</h5>
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-calendar me-1"></i> Calendar
                    </button>
                </div>
                <div class="card-body">
                    <div class="interviews-list">
                        <div class="interview-item upcoming">
                            <div class="interview-time">
                                <div class="date">15</div>
                                <div class="month">DEC</div>
                            </div>
                            <div class="interview-details">
                                <h6>Technical Interview</h6>
                                <p class="text-muted mb-1">Senior Frontend Developer at TechCorp</p>
                                <small class="text-muted"><i class="fa fa-clock-o me-1"></i> 10:00 AM - 11:30 AM • Zoom Meeting</small>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Join</button>
                        </div>
                        <div class="interview-item">
                            <div class="interview-time">
                                <div class="date">18</div>
                                <div class="month">DEC</div>
                            </div>
                            <div class="interview-details">
                                <h6>HR Interview</h6>
                                <p class="text-muted mb-1">Product Manager at Global Solutions</p>
                                <small class="text-muted"><i class="fa fa-clock-o me-1"></i> 2:00 PM - 3:00 PM • Phone Call</small>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary">Details</button>
                        </div>
                        <div class="interview-item">
                            <div class="interview-time">
                                <div class="date">20</div>
                                <div class="month">DEC</div>
                            </div>
                            <div class="interview-details">
                                <h6>Final Round</h6>
                                <p class="text-muted mb-1">Data Scientist at AnalyticsPro</p>
                                <small class="text-muted"><i class="fa fa-clock-o me-1"></i> 11:00 AM - 12:30 PM • On-site</small>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommended Jobs -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Recommended For You</h5>
                    <a href="{{ route('client.jobs') }}" class="btn btn-primary">
                        <i class="fa fa-briefcase me-1"></i> Browse All Jobs
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="job-card featured">
                                <div class="job-badge">Featured</div>
                                <div class="job-header">
                                    <div class="company-logo">
                                        <img src="https://via.placeholder.com/50" alt="TechCorp">
                                    </div>
                                    <div class="job-info">
                                        <h6>Senior Frontend Developer</h6>
                                        <p class="text-muted mb-1">TechCorp Inc.</p>
                                        <div class="job-tags">
                                            <span class="tag remote">Remote</span>
                                            <span class="tag salary">$120k - $150k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-skills">
                                    <span class="skill">React</span>
                                    <span class="skill">TypeScript</span>
                                    <span class="skill">Next.js</span>
                                </div>
                                <div class="job-footer">
                                    <span class="time-posted"><i class="fa fa-clock-o"></i> 2 days ago</span>
                                    <button class="btn btn-primary btn-apply">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="job-card">
                                <div class="job-header">
                                    <div class="company-logo">
                                        <img src="https://via.placeholder.com/50" alt="Global Solutions">
                                    </div>
                                    <div class="job-info">
                                        <h6>Product Manager</h6>
                                        <p class="text-muted mb-1">Global Solutions</p>
                                        <div class="job-tags">
                                            <span class="tag fulltime">Full-time</span>
                                            <span class="tag salary">$140k - $180k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-skills">
                                    <span class="skill">Product Strategy</span>
                                    <span class="skill">Agile</span>
                                    <span class="skill">UX</span>
                                </div>
                                <div class="job-footer">
                                    <span class="time-posted"><i class="fa fa-clock-o"></i> 5 days ago</span>
                                    <button class="btn btn-primary btn-apply">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="job-card urgent">
                                <div class="job-badge">Urgent</div>
                                <div class="job-header">
                                    <div class="company-logo">
                                        <img src="https://via.placeholder.com/50" alt="AnalyticsPro">
                                    </div>
                                    <div class="job-info">
                                        <h6>Data Scientist</h6>
                                        <p class="text-muted mb-1">AnalyticsPro</p>
                                        <div class="job-tags">
                                            <span class="tag contract">Contract</span>
                                            <span class="tag salary">$100k - $130k</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-skills">
                                    <span class="skill">Python</span>
                                    <span class="skill">ML</span>
                                    <span class="skill">SQL</span>
                                </div>
                                <div class="job-footer">
                                    <span class="time-posted"><i class="fa fa-clock-o"></i> 1 week ago</span>
                                    <button class="btn btn-primary btn-apply">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-light: rgba(252, 0, 2, 0.1);
        --success-light: rgba(40, 167, 69, 0.1);
        --warning-light: rgba(255, 193, 7, 0.1);
        --info-light: rgba(23, 162, 184, 0.1);
        --purple-light: rgba(111, 66, 193, 0.1);
        --pink-light: rgba(232, 62, 140, 0.1);
    }
    
    .dashboard {
        padding: 20px 0;
    }
    
    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, #ea6666 0%, #ce3c3c 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .welcome-card h1 {
        color: white;
        font-weight: 700;
    }
    
    .welcome-card .text-muted {
        color: rgba(255,255,255,0.8) !important;
    }
    
    .user-stats {
        display: flex;
        gap: 30px;
        margin-top: 20px;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        display: block;
        font-size: 1.8rem;
        font-weight: 700;
    }
    
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .profile-completion {
        text-align: center;
    }
    
    .completion-circle {
        position: relative;
        display: inline-block;
    }
    
    .completion-percent {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.2rem;
        font-weight: 700;
        color: white;
    }
    
    /* Stats Cards with Gradients */
    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }
    
    .bg-gradient-1::before { background: linear-gradient(90deg, var(--primary-color), #FF6B6B); }
    .bg-gradient-2::before { background: linear-gradient(90deg, #28a745, #20c997); }
    .bg-gradient-3::before { background: linear-gradient(90deg, #17a2b8, #6f42c1); }
    .bg-gradient-4::before { background: linear-gradient(90deg, #ffc107, #fd7e14); }
    
    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 1.8rem;
    }
    
    .bg-gradient-1 .stats-icon { background: var(--primary-light); color: var(--primary-color); }
    .bg-gradient-2 .stats-icon { background: var(--success-light); color: #28a745; }
    .bg-gradient-3 .stats-icon { background: var(--info-light); color: #17a2b8; }
    .bg-gradient-4 .stats-icon { background: var(--warning-light); color: #ffc107; }
    
    .stats-content h3 {
        margin: 0;
        font-weight: 800;
        color: var(--text-dark);
        font-size: 2rem;
    }
    
    .stats-content p {
        margin: 5px 0;
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    .stats-trend {
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    /* Application Status Chart */
    .status-chart {
        padding: 20px 0;
    }
    
    .chart-bars {
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
        height: 200px;
        padding: 0 20px;
    }
    
    .chart-bar {
        width: 40px;
        border-radius: 8px 8px 0 0;
        position: relative;
        transition: height 0.3s ease;
    }
    
    .chart-bar:hover {
        opacity: 0.9;
    }
    
    .chart-bar span {
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .chart-labels {
        display: flex;
        justify-content: space-around;
        padding: 10px 20px;
        margin-top: 10px;
    }
    
    .chart-labels span {
        font-size: 0.85rem;
        color: var(--text-light);
        text-align: center;
    }
    
    .status-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    
    /* Quick Actions Grid */
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .quick-action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 10px;
        border-radius: 12px;
        text-decoration: none;
        color: var(--text-dark);
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .quick-action-btn:hover {
        transform: translateY(-5px);
        color: var(--primary-color);
    }
    
    .quick-action-btn i {
        font-size: 1.8rem;
        margin-bottom: 10px;
    }
    
    .quick-action-btn span {
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .bg-primary-light { background: var(--primary-light); }
    .bg-success-light { background: var(--success-light); }
    .bg-warning-light { background: var(--warning-light); }
    .bg-info-light { background: var(--info-light); }
    .bg-purple-light { background: var(--purple-light); }
    .bg-pink-light { background: var(--pink-light); }
    
    /* Timeline */
    .activity-timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .activity-timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }
    
    .timeline-marker {
        position: absolute;
        left: -30px;
        top: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .timeline-item.success .timeline-marker { background: #28a745; }
    .timeline-item.primary .timeline-marker { background: var(--primary-color); }
    .timeline-item.warning .timeline-marker { background: #ffc107; }
    .timeline-item.info .timeline-marker { background: #17a2b8; }
    
    .timeline-content h6 {
        margin: 0 0 5px 0;
        font-weight: 600;
        color: var(--text-dark);
    }
    
    /* Interviews */
    .interviews-list {
        padding: 0;
    }
    
    .interview-item {
        display: flex;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .interview-item:hover {
        background: #f9fafb;
    }
    
    .interview-item:last-child {
        border-bottom: none;
    }
    
    .interview-item.upcoming {
        background: var(--primary-light);
        border-radius: 10px;
        margin-bottom: 15px;
    }
    
    .interview-time {
        text-align: center;
        margin-right: 20px;
        min-width: 60px;
    }
    
    .interview-time .date {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .interview-time .month {
        font-size: 0.9rem;
        color: var(--text-light);
        text-transform: uppercase;
    }
    
    .interview-details {
        flex: 1;
    }
    
    .interview-details h6 {
        margin: 0 0 5px 0;
        font-weight: 600;
        color: var(--text-dark);
    }
    
    /* Job Cards */
    .job-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
    }
    
    .job-card.featured {
        border: 2px solid var(--primary-color);
    }
    
    .job-card.urgent {
        border: 2px solid #dc3545;
    }
    
    .job-card:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }
    
    .job-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--primary-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .job-card.urgent .job-badge {
        background: #dc3545;
    }
    
    .job-header {
        display: flex;
        margin-bottom: 20px;
    }
    
    .company-logo {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        background: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        flex-shrink: 0;
        overflow: hidden;
    }
    
    .company-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .job-info h6 {
        margin: 0 0 5px 0;
        font-weight: 700;
        color: var(--text-dark);
        font-size: 1.1rem;
    }
    
    .job-tags {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    
    .tag {
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .tag.remote { background: var(--primary-light); color: var(--primary-color); }
    .tag.fulltime { background: var(--success-light); color: #28a745; }
    .tag.contract { background: var(--warning-light); color: #ffc107; }
    .tag.salary { background: #e9ecef; color: var(--text-dark); }
    
    .job-skills {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    
    .skill {
        padding: 6px 15px;
        background: #f8f9fa;
        border-radius: 20px;
        font-size: 0.85rem;
        color: var(--text-light);
    }
    
    .job-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .time-posted {
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    /* Buttons - FIXED */
    .btn {
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .btn-sm {
        padding: 6px 15px;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: white !important;
    }
    
    .btn-primary:hover {
        background-color: var(--primary-dark) !important;
        border-color: var(--primary-dark) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(252, 0, 2, 0.2);
    }
    
    .btn-outline-primary {
        background-color: transparent !important;
        color: var(--primary-color) !important;
        border: 2px solid var(--primary-color) !important;
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color) !important;
        color: white !important;
        border-color: var(--primary-color) !important;
    }
    
    .btn-outline-secondary {
        background-color: transparent !important;
        color: var(--text-light) !important;
        border: 2px solid #e5e7eb !important;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fa !important;
        color: var(--text-dark) !important;
    }
    
    .btn-apply {
        padding: 8px 25px;
        font-weight: 600;
    }
    
    /* Card Styles */
    .card {
        border: none;
        border-radius: 15px;
    }
    
    .card-header {
        border-bottom: 1px solid #e5e7eb;
        padding: 20px 25px;
        background: white;
    }
    
    .card-body {
        padding: 25px;
    }
    
    .fw-bold {
        font-weight: 700 !important;
    }
    
    /* Badges */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .user-stats {
            flex-direction: column;
            gap: 15px;
        }
        
        .quick-actions-grid {
            grid-template-columns: 1fr;
        }
        
        .status-legend {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .job-footer {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }
        
        .btn-apply {
            width: 100%;
        }
    }
</style>
@endsection