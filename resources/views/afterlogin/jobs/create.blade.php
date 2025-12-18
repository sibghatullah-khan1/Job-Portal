@extends('layouts.header')
@section('title', 'Create New Job')
@section('content')
<div class="create-job-page">
    <!-- Hero Section -->
    <div class="create-job-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <i class="fa fa-briefcase"></i>
                    Create New Job Post
                </h1>
                <p class="hero-subtitle">
                    Attract the best talent by creating an engaging job post
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Company Creation Section (Only show if user doesn't have a company) -->
        <div class="company-required-section" id="companyRequiredSection">
            <div class="alert-card">
                <div class="alert-icon">
                    <i class="fa fa-building"></i>
                </div>
                <div class="alert-content">
                    <h3>Company Profile Required</h3>
                    <p>You need to create a company profile before posting jobs. This helps candidates learn about your organization.</p>
                </div>
            </div>

            <!-- Company Creation Form -->
            <div class="form-card" id="companyForm">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="header-content">
                        <h3>Create Company Profile</h3>
                        <p>Fill in your company details</p>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-university"></i>
                                Company Name *
                            </label>
                            <input type="text" class="form-control" placeholder="Enter company name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-globe"></i>
                                Website
                            </label>
                            <input type="url" class="form-control" placeholder="https://example.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa fa-industry"></i>
                            Industry *
                        </label>
                        <select class="form-control" required>
                            <option value="">Select industry</option>
                            <option value="tech">Technology</option>
                            <option value="finance">Finance</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="education">Education</option>
                            <option value="retail">Retail</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa fa-users"></i>
                            Company Size *
                        </label>
                        <select class="form-control" required>
                            <option value="">Select company size</option>
                            <option value="1-10">1-10 employees</option>
                            <option value="11-50">11-50 employees</option>
                            <option value="51-200">51-200 employees</option>
                            <option value="201-500">201-500 employees</option>
                            <option value="501-1000">501-1000 employees</option>
                            <option value="1000+">1000+ employees</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa fa-map-marker"></i>
                            Headquarters Location *
                        </label>
                        <input type="text" class="form-control" placeholder="City, Country" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa fa-file-text"></i>
                            Company Description *
                        </label>
                        <textarea class="form-control" rows="4" placeholder="Describe your company..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa fa-picture-o"></i>
                            Company Logo
                        </label>
                        <div class="file-upload">
                            <input type="file" class="file-input" id="companyLogo" accept="image/*">
                            <label for="companyLogo" class="file-label">
                                <i class="fa fa-cloud-upload"></i>
                                <span>Upload Logo</span>
                                <span class="file-hint">PNG, JPG up to 2MB</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-primary" id="createCompanyBtn">
                            <i class="fa fa-check"></i> Create Company Profile
                        </button>
                        <button type="button" class="btn btn-outline">
                            <i class="fa fa-times"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Creation Section (Initially hidden) -->
        <div class="job-creation-section" id="jobCreationSection" style="display: none;">
            <!-- Job Creation Form -->
            <div class="form-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fa fa-pencil-square"></i>
                    </div>
                    <div class="header-content">
                        <h3>Create New Job Post</h3>
                        <p>Fill in the job details to attract qualified candidates</p>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Job Basic Info -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fa fa-info-circle"></i>
                            <h4>Basic Information</h4>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-tag"></i>
                                    Job Title *
                                </label>
                                <input type="text" class="form-control" placeholder="e.g., Senior Frontend Developer" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-sitemap"></i>
                                    Department
                                </label>
                                <select class="form-control">
                                    <option value="">Select department</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="design">Design</option>
                                    <option value="product">Product</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="sales">Sales</option>
                                    <option value="hr">Human Resources</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-briefcase"></i>
                                    Job Type *
                                </label>
                                <select class="form-control" required>
                                    <option value="">Select job type</option>
                                    <option value="full_time">Full Time</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="contract">Contract</option>
                                    <option value="remote">Remote</option>
                                    <option value="internship">Internship</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-user"></i>
                                    Experience Level *
                                </label>
                                <select class="form-control" required>
                                    <option value="">Select experience</option>
                                    <option value="entry">Entry Level</option>
                                    <option value="mid">Mid Level</option>
                                    <option value="senior">Senior Level</option>
                                    <option value="lead">Lead</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-money"></i>
                                Salary Range *
                            </label>
                            <div class="salary-inputs">
                                <div class="input-group">
                                    <span class="input-icon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control" placeholder="Min" min="0" required>
                                </div>
                                <span class="salary-separator">to</span>
                                <div class="input-group">
                                    <span class="input-icon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" class="form-control" placeholder="Max" min="0" required>
                                </div>
                                <select class="form-control salary-period">
                                    <option value="year">per year</option>
                                    <option value="month">per month</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fa fa-file-text"></i>
                            <h4>Job Description</h4>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-align-left"></i>
                                Description *
                            </label>
                            <textarea class="form-control" rows="6" placeholder="Describe the role, responsibilities, and requirements..." required></textarea>
                            <div class="form-hint">Minimum 150 characters</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-tasks"></i>
                                Key Responsibilities
                            </label>
                            <div class="responsibilities">
                                <div class="responsibility-input">
                                    <input type="text" class="form-control" placeholder="Add a responsibility">
                                    <button type="button" class="btn-add">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="responsibilities-list" id="responsibilitiesList"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fa fa-map-marker"></i>
                            <h4>Location</h4>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-location-arrow"></i>
                                Work Location Type *
                            </label>
                            <div class="location-options">
                                <label class="location-option">
                                    <input type="radio" name="work_location" value="remote" checked>
                                    <div class="option-content">
                                        <i class="fa fa-home"></i>
                                        <span>Remote</span>
                                    </div>
                                </label>
                                <label class="location-option">
                                    <input type="radio" name="work_location" value="hybrid">
                                    <div class="option-content">
                                        <i class="fa fa-random"></i>
                                        <span>Hybrid</span>
                                    </div>
                                </label>
                                <label class="location-option">
                                    <input type="radio" name="work_location" value="onsite">
                                    <div class="option-content">
                                        <i class="fa fa-building"></i>
                                        <span>On-site</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="location-details" id="locationDetails">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fa fa-globe"></i>
                                        Country
                                    </label>
                                    <select class="form-control">
                                        <option value="">Select country</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="CA">Canada</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fa fa-map"></i>
                                        City
                                    </label>
                                    <input type="text" class="form-control" placeholder="Enter city">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Requirements -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fa fa-graduation-cap"></i>
                            <h4>Requirements & Skills</h4>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-cogs"></i>
                                Required Skills *
                            </label>
                            <div class="skills-input">
                                <div class="skills-tags" id="skillsContainer"></div>
                                <input type="text" class="form-control" id="skillsInput" placeholder="Type skill and press Enter">
                            </div>
                            <div class="skills-suggestions">
                                <span>Suggestions:</span>
                                <button type="button" class="skill-suggestion" data-skill="JavaScript">JavaScript</button>
                                <button type="button" class="skill-suggestion" data-skill="Python">Python</button>
                                <button type="button" class="skill-suggestion" data-skill="React">React</button>
                                <button type="button" class="skill-suggestion" data-skill="Node.js">Node.js</button>
                                <button type="button" class="skill-suggestion" data-skill="SQL">SQL</button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-graduation-cap"></i>
                                    Education
                                </label>
                                <select class="form-control">
                                    <option value="">Select education</option>
                                    <option value="high_school">High School</option>
                                    <option value="associate">Associate Degree</option>
                                    <option value="bachelor">Bachelor's Degree</option>
                                    <option value="master">Master's Degree</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-clock-o"></i>
                                    Experience Required
                                </label>
                                <select class="form-control">
                                    <option value="">Select years</option>
                                    <option value="0">No experience</option>
                                    <option value="1">1+ years</option>
                                    <option value="2">2+ years</option>
                                    <option value="3">3+ years</option>
                                    <option value="5">5+ years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Application Details -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fa fa-paper-plane"></i>
                            <h4>Application Details</h4>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-calendar"></i>
                                    Application Deadline
                                </label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fa fa-users"></i>
                                    Vacancies
                                </label>
                                <input type="number" class="form-control" min="1" value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fa fa-list-alt"></i>
                                Application Instructions
                            </label>
                            <textarea class="form-control" rows="3" placeholder="Any specific instructions for applicants..."></textarea>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-paper-plane"></i> Post Job
                        </button>
                        <button type="button" class="btn btn-outline btn-lg">
                            <i class="fa fa-eye"></i> Preview
                        </button>
                        <button type="button" class="btn btn-secondary btn-lg">
                            <i class="fa fa-save"></i> Save Draft
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Tips -->
            <div class="sidebar-tips">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fa fa-lightbulb-o"></i>
                        <h4>Tips for Better Job Posts</h4>
                    </div>
                    <ul class="tip-list">
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Be specific with job titles</span>
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Include salary range to attract more applicants</span>
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>List clear responsibilities</span>
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Highlight key skills required</span>
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Describe company culture</span>
                        </li>
                    </ul>
                </div>

                <div class="stats-card">
                    <div class="stats-header">
                        <i class="fa fa-bar-chart"></i>
                        <h4>Quick Stats</h4>
                    </div>
                    <div class="stats-content">
                        <div class="stat-item">
                            <div class="stat-value">85%</div>
                            <div class="stat-label">More applicants when salary is listed</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">60%</div>
                            <div class="stat-label">Faster hiring with clear requirements</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #FC0002;
        --primary-light: rgba(252, 0, 2, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --info-color: #17a2b8;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --border-color: #e5e7eb;
        --background-light: #f9fafb;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .create-job-page {
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding-bottom: 50px;
    }

    .create-job-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, #FF6B6B 100%);
        color: white;
        padding: 40px 0;
        margin-bottom: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    .hero-title i {
        font-size: 2.2rem;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Alert Card */
    .alert-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 25px;
        box-shadow: var(--card-shadow);
    }

    .alert-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .alert-content h3 {
        margin: 0 0 10px 0;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .alert-content p {
        margin: 0;
        opacity: 0.9;
        font-size: 1.1rem;
        line-height: 1.5;
    }

    /* Form Card */
    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 30px;
        display: flex;
        align-items: center;
        gap: 20px;
        border-bottom: 2px solid var(--border-color);
    }

    .header-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-color);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .header-content h3 {
        margin: 0 0 8px 0;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
    }

    .header-content p {
        margin: 0;
        color: var(--text-light);
        font-size: 1rem;
    }

    .card-body {
        padding: 40px;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 40px;
        padding-bottom: 40px;
        border-bottom: 2px solid var(--border-color);
    }

    .form-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .section-title i {
        width: 45px;
        height: 45px;
        background: var(--primary-light);
        color: var(--primary-color);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .section-title h4 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    /* Form Elements */
    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 25px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1rem;
    }

    .form-label i {
        color: var(--primary-color);
        width: 20px;
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .form-hint {
        margin-top: 8px;
        font-size: 0.85rem;
        color: var(--text-light);
        font-style: italic;
    }

    /* Salary Inputs */
    .salary-inputs {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .input-group {
        position: relative;
        flex: 1;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
    }

    .input-group .form-control {
        padding-left: 40px;
    }

    .salary-separator {
        color: var(--text-light);
        font-weight: 600;
    }

    .salary-period {
        min-width: 120px;
    }

    /* File Upload */
    .file-upload {
        margin-top: 10px;
    }

    .file-input {
        display: none;
    }

    .file-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        background: var(--background-light);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-label:hover {
        border-color: var(--primary-color);
        background: var(--primary-light);
    }

    .file-label i {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .file-label span {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .file-hint {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    /* Location Options */
    .location-options {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .location-option input[type="radio"] {
        display: none;
    }

    .option-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .location-option input[type="radio"]:checked + .option-content {
        border-color: var(--primary-color);
        background: var(--primary-light);
    }

    .option-content i {
        font-size: 1.5rem;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .option-content span {
        font-weight: 600;
        color: var(--text-dark);
    }

    /* Responsibilities */
    .responsibilities {
        margin-top: 10px;
    }

    .responsibility-input {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .btn-add {
        width: 46px;
        height: 46px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .btn-add:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    .responsibilities-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .responsibility-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 18px;
        background: var(--background-light);
        border-radius: 10px;
        border-left: 4px solid var(--primary-color);
    }

    .responsibility-text {
        font-weight: 500;
        color: var(--text-dark);
    }

    .remove-responsibility {
        background: none;
        border: none;
        color: var(--danger-color);
        cursor: pointer;
        font-size: 1.1rem;
        padding: 5px;
    }

    /* Skills Input */
    .skills-input {
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 15px;
        min-height: 60px;
        margin-bottom: 10px;
    }

    .skills-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }

    .skill-tag {
        background: var(--primary-light);
        color: var(--primary-color);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .skill-tag .remove {
        cursor: pointer;
        font-size: 0.8rem;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #skillsInput {
        border: none;
        padding: 0;
        background: transparent;
        font-size: 1rem;
    }

    #skillsInput:focus {
        outline: none;
        box-shadow: none;
    }

    .skills-suggestions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .skills-suggestions span {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-right: 5px;
    }

    .skill-suggestion {
        background: var(--background-light);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 6px 15px;
        font-size: 0.85rem;
        color: var(--text-dark);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .skill-suggestion:hover {
        background: var(--primary-light);
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    /* Buttons */
    .btn {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 2px solid transparent;
    }

    .btn-lg {
        padding: 16px 32px;
        font-size: 1.1rem;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(252, 0, 2, 0.2);
    }

    .btn-success {
        background: var(--success-color);
        color: white;
        border: none;
    }

    .btn-success:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
    }

    .btn-outline {
        background: transparent;
        color: var(--text-dark);
        border: 2px solid var(--border-color);
    }

    .btn-outline:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid var(--border-color);
    }

    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column;
        }
    }

    /* Job Creation Section Layout */
    .job-creation-section {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }

    @media (max-width: 992px) {
        .job-creation-section {
            grid-template-columns: 1fr;
        }
    }

    /* Sidebar Tips */
    .sidebar-tips {
        display: flex;
        flex-direction: column;
        gap: 25px;
        position: sticky;
        top: 30px;
        height: fit-content;
    }

    .tip-card, .stats-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--card-shadow);
    }

    .tip-header, .stats-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .tip-header i, .stats-header i {
        width: 45px;
        height: 45px;
        background: var(--primary-light);
        color: var(--primary-color);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .tip-header h4, .stats-header h4 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    .tip-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tip-list li {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .tip-list li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .tip-list i {
        color: var(--success-color);
        font-size: 1rem;
        margin-top: 3px;
        flex-shrink: 0;
    }

    .tip-list span {
        color: var(--text-dark);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Stats Card */
    .stats-content {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.95rem;
        color: var(--text-light);
        line-height: 1.4;
    }

    /* Location Details Animation */
    .location-details {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid var(--border-color);
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if user has company (static check - you'll replace this with dynamic check)
        const userHasCompany = false; // Change to true to test job creation form
        
        const companyRequiredSection = document.getElementById('companyRequiredSection');
        const jobCreationSection = document.getElementById('jobCreationSection');
        
        if (userHasCompany) {
            companyRequiredSection.style.display = 'none';
            jobCreationSection.style.display = 'grid';
        }

        // Company Creation
        document.getElementById('createCompanyBtn').addEventListener('click', function() {
            // Validate company form
            const companyForm = document.getElementById('companyForm');
            const requiredFields = companyForm.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });
            
            if (isValid) {
                // Simulate company creation
                alert('Company profile created successfully!');
                
                // Hide company form, show job creation form
                companyRequiredSection.style.display = 'none';
                jobCreationSection.style.display = 'grid';
                
                // Smooth scroll to job form
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        // Location Type Toggle
        const locationOptions = document.querySelectorAll('input[name="work_location"]');
        const locationDetails = document.getElementById('locationDetails');
        
        locationOptions.forEach(option => {
            option.addEventListener('change', function() {
                if (this.value === 'onsite' || this.value === 'hybrid') {
                    locationDetails.style.display = 'block';
                } else {
                    locationDetails.style.display = 'none';
                }
            });
        });

        // Skills Management
        const skillsInput = document.getElementById('skillsInput');
        const skillsContainer = document.getElementById('skillsContainer');
        let skills = [];

        skillsInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const skill = this.value.trim();
                if (skill && !skills.includes(skill)) {
                    addSkill(skill);
                    this.value = '';
                }
            }
        });

        // Skill suggestions
        document.querySelectorAll('.skill-suggestion').forEach(btn => {
            btn.addEventListener('click', function() {
                const skill = this.dataset.skill;
                if (!skills.includes(skill)) {
                    addSkill(skill);
                }
            });
        });

        function addSkill(skill) {
            skills.push(skill);
            updateSkillsDisplay();
        }

        function removeSkill(skill) {
            skills = skills.filter(s => s !== skill);
            updateSkillsDisplay();
        }

        function updateSkillsDisplay() {
            skillsContainer.innerHTML = '';
            skills.forEach(skill => {
                const tag = document.createElement('div');
                tag.className = 'skill-tag';
                tag.innerHTML = `
                    ${skill}
                    <span class="remove" onclick="removeSkillTag('${skill}')">×</span>
                `;
                skillsContainer.appendChild(tag);
            });
        }

        // Responsibilities
        const addBtn = document.querySelector('.btn-add');
        const responsibilitiesList = document.getElementById('responsibilitiesList');
        const responsibilityInput = document.querySelector('.responsibility-input input');
        let responsibilities = [];

        addBtn.addEventListener('click', function() {
            const responsibility = responsibilityInput.value.trim();
            if (responsibility) {
                addResponsibility(responsibility);
                responsibilityInput.value = '';
            }
        });

        responsibilityInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const responsibility = this.value.trim();
                if (responsibility) {
                    addResponsibility(responsibility);
                    this.value = '';
                }
            }
        });

        function addResponsibility(responsibility) {
            responsibilities.push(responsibility);
            updateResponsibilitiesDisplay();
        }

        function removeResponsibility(index) {
            responsibilities.splice(index, 1);
            updateResponsibilitiesDisplay();
        }

        function updateResponsibilitiesDisplay() {
            responsibilitiesList.innerHTML = '';
            responsibilities.forEach((responsibility, index) => {
                const item = document.createElement('div');
                item.className = 'responsibility-item';
                item.innerHTML = `
                    <div class="responsibility-text">${responsibility}</div>
                    <button type="button" class="remove-responsibility" onclick="removeResponsibilityItem(${index})">
                        <i class="fa fa-times"></i>
                    </button>
                `;
                responsibilitiesList.appendChild(item);
            });
        }

        // Form Validation
        const jobForm = document.querySelector('.job-creation-section form');
        if (jobForm) {
            jobForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                const requiredFields = this.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('error');
                        isValid = false;
                        
                        // Scroll to first error
                        if (isValid === false) {
                            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            field.focus();
                        }
                    } else {
                        field.classList.remove('error');
                    }
                });
                
                if (isValid) {
                    alert('Job posted successfully!');
                    // Here you would typically submit the form via AJAX
                }
            });
        }

        // Add error styling
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
            });
        });
    });

    // Global functions for skills and responsibilities
    window.removeSkillTag = function(skill) {
        const event = new Event('skillRemoved');
        document.dispatchEvent(event);
        
        // Find and remove skill
        const index = window.skills.indexOf(skill);
        if (index > -1) {
            window.skills.splice(index, 1);
            
            // Update display
            const skillsContainer = document.getElementById('skillsContainer');
            skillsContainer.innerHTML = '';
            window.skills.forEach(skill => {
                const tag = document.createElement('div');
                tag.className = 'skill-tag';
                tag.innerHTML = `
                    ${skill}
                    <span class="remove" onclick="removeSkillTag('${skill}')">×</span>
                `;
                skillsContainer.appendChild(tag);
            });
        }
    };

    window.removeResponsibilityItem = function(index) {
        window.responsibilities.splice(index, 1);
        
        const responsibilitiesList = document.getElementById('responsibilitiesList');
        responsibilitiesList.innerHTML = '';
        window.responsibilities.forEach((responsibility, i) => {
            const item = document.createElement('div');
            item.className = 'responsibility-item';
            item.innerHTML = `
                <div class="responsibility-text">${responsibility}</div>
                <button type="button" class="remove-responsibility" onclick="removeResponsibilityItem(${i})">
                    <i class="fa fa-times"></i>
                </button>
            `;
            responsibilitiesList.appendChild(item);
        });
    };

    // Initialize global arrays
    window.skills = [];
    window.responsibilities = [];
</script>
@endsection