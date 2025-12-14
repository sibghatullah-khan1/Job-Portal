
 @extends('layouts.header')
 @section('content')
 @section('title','Available Jobs')
  
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* Jobs Page Specific Styles */
        .jobs-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 4rem 0 2rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .jobs-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .jobs-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }
        
        .jobs-section {
            padding: 3rem 0;
        }
        
        /* Job Filters */
        .filter-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .filter-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-transparent);
        }
        
        .filter-group {
            margin-bottom: 1.5rem;
        }
        
        .filter-label {
            color: var(--text-dark);
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .filter-select, .filter-input {
            width: 100%;
            padding: 0.6rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: white;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }
        
        .filter-select:focus, .filter-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-transparent);
            outline: none;
        }
        
        .filter-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 6px;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .clear-btn {
            background-color: transparent;
            border: 1px solid #d1d5db;
            color: var(--text-light) !important;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 6px;
            width: 100%;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .clear-btn:hover {
            background-color: #f3f4f6;
            border-color: var(--text-light);
        }
        
        /* Job Listings */
        .job-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border-color: var(--primary-transparent);
        }
        
        .job-card.featured {
            border-left: 4px solid var(--primary-color);
            background-color: #fef2f2;
        }
        
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .job-title {
            color: var(--text-dark);
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        
        .job-company {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .job-location {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .job-badge {
            background-color: var(--primary-transparent);
            color: var(--primary-color);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .job-type {
            background-color: #f0f9ff;
            color: #0369a1;
        }
        
        .job-salary {
            background-color: #f0fdf4;
            color: #166534;
        }
        
        .job-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .job-posted {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .apply-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .apply-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .save-btn {
            background-color: transparent;
            border: 1px solid #d1d5db;
            color: var(--text-light) !important;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            margin-left: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .save-btn:hover {
            background-color: #f3f4f6;
            border-color: var(--text-light);
        }
        
        .save-btn.saved {
            background-color: var(--primary-transparent);
            border-color: var(--primary-color);
            color: var(--primary-color) !important;
        }
        
        /* Job Stats */
        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .stats-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 3rem;
        }
        
        .page-link {
            color: var(--primary-color);
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .page-link:hover {
            background-color: var(--primary-transparent);
            border-color: var(--primary-color);
            color: var(--primary-dark);
        }
        
        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        /* Featured Companies */
        .companies-section {
            background-color: #f8fafc;
            padding: 3rem 0;
            margin-top: 3rem;
        }
        
        .company-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .company-logo {
            width: 80px;
            height: 80px;
            background-color: var(--primary-transparent);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .company-name {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .company-jobs {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .view-company-btn {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color) !important;
            padding: 0.4rem 1rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .view-company-btn:hover {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        @media (max-width: 992px) {
            .jobs-section {
                padding: 2rem 0;
            }
            
            .job-header {
                flex-direction: column;
            }
            
            .job-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .job-actions {
                width: 100%;
                display: flex;
                gap: 0.5rem;
            }
            
            .apply-btn, .save-btn {
                flex: 1;
            }
        }
    </style>

    <!-- Content Section -->
    <section class="jobs-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="jobs-title">Available Jobs</h1>
                    <p class="jobs-subtitle">
                        Discover thousands of job opportunities from top companies. 
                        Find your perfect match and take the next step in your career.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="jobs-section">
        <div class="container">
            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="filter-card">
                        <h4 class="filter-title">Filter Jobs</h4>
                        
                        <div class="filter-group">
                            <label class="filter-label">Job Title/Keyword</label>
                            <input type="text" class="filter-input" placeholder="e.g. Web Developer">
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Location</label>
                            <input type="text" class="filter-input" placeholder="City, State, or Remote">
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Job Type</label>
                            <select class="filter-select">
                                <option value="">All Types</option>
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                                <option value="remote">Remote</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Experience Level</label>
                            <select class="filter-select">
                                <option value="">All Levels</option>
                                <option value="entry">Entry Level</option>
                                <option value="mid">Mid Level</option>
                                <option value="senior">Senior Level</option>
                                <option value="executive">Executive</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Salary Range</label>
                            <select class="filter-select">
                                <option value="">All Salaries</option>
                                <option value="30">$30,000+</option>
                                <option value="50">$50,000+</option>
                                <option value="75">$75,000+</option>
                                <option value="100">$100,000+</option>
                                <option value="150">$150,000+</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Industry</label>
                            <select class="filter-select">
                                <option value="">All Industries</option>
                                <option value="tech">Technology</option>
                                <option value="finance">Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="education">Education</option>
                                <option value="marketing">Marketing</option>
                                <option value="manufacturing">Manufacturing</option>
                            </select>
                        </div>
                        
                        <button class="filter-btn">
                            <i class="fa fa-filter"></i> Apply Filters
                        </button>
                        
                        <button class="clear-btn">
                            Clear All Filters
                        </button>
                    </div>
                    
                    <!-- Job Stats -->
                    <div class="stats-card">
                        <div class="stats-number">1,245</div>
                        <div class="stats-label">Active Jobs</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stats-number">342</div>
                        <div class="stats-label">Remote Jobs</div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stats-number">89</div>
                        <div class="stats-label">Featured Companies</div>
                    </div>
                </div>
                
                <!-- Job Listings -->
                <div class="col-lg-9">
                    <!-- Search Bar -->
                    <div class="filter-card mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <input type="text" class="filter-input" placeholder="Search jobs by title, company, or keyword...">
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-2">
                                    <button class="filter-btn">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                    <button class="clear-btn">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Results Info -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-0" style="color: var(--text-dark);">Showing 12 of 1,245 jobs</h5>
                            <small class="text-muted">Sorted by: <strong>Most Recent</strong></small>
                        </div>
                        <div>
                            <select class="filter-select" style="width: auto;">
                                <option>Sort by: Most Recent</option>
                                <option>Sort by: Salary (High to Low)</option>
                                <option>Sort by: Salary (Low to High)</option>
                                <option>Sort by: Relevance</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Job Listings -->
                    <div class="job-card featured">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Senior Frontend Developer</h3>
                                <p class="job-company">TechCorp Solutions</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> Remote • New York, NY</p>
                                <div>
                                    <span class="job-badge">Full Time</span>
                                    <span class="job-badge job-salary">$120,000 - $150,000</span>
                                    <span class="job-badge">Urgent Hiring</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/FC0002/FFFFFF?text=TC" alt="TechCorp" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            We're looking for an experienced Frontend Developer to join our growing team. 
                            You'll be working with React, TypeScript, and modern web technologies to build 
                            amazing user experiences. 5+ years of experience required.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 2 days ago • 35 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn">
                                    <i class="fa fa-bookmark"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Product Manager</h3>
                                <p class="job-company">Innovate Inc.</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> San Francisco, CA</p>
                                <div>
                                    <span class="job-badge">Full Time</span>
                                    <span class="job-badge job-salary">$140,000 - $180,000</span>
                                    <span class="job-badge">Equity Available</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/2563eb/FFFFFF?text=II" alt="Innovate Inc" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            Lead product strategy and development for our flagship SaaS platform. 
                            Work closely with engineering, design, and marketing teams to deliver 
                            exceptional user experiences and drive business growth.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 1 week ago • 128 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn">
                                    <i class="fa fa-bookmark"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Data Scientist</h3>
                                <p class="job-company">DataWorks Analytics</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> Remote • Chicago, IL</p>
                                <div>
                                    <span class="job-badge">Full Time</span>
                                    <span class="job-badge job-salary">$110,000 - $140,000</span>
                                    <span class="job-badge">Python • SQL</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/10b981/FFFFFF?text=DW" alt="DataWorks" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            Join our data science team to build predictive models and extract insights 
                            from large datasets. Experience with machine learning, statistical analysis, 
                            and big data technologies required.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 3 days ago • 42 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn">
                                    <i class="fa fa-bookmark"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">UX/UI Designer</h3>
                                <p class="job-company">Creative Minds Agency</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> Austin, TX</p>
                                <div>
                                    <span class="job-badge">Contract</span>
                                    <span class="job-badge job-salary">$80 - $120/hour</span>
                                    <span class="job-badge">6 Month Contract</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/8b5cf6/FFFFFF?text=CM" alt="Creative Minds" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            Design beautiful and intuitive user interfaces for web and mobile applications. 
                            Proficiency in Figma, Sketch, and Adobe Creative Suite required. Portfolio review 
                            will be part of the interview process.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 5 days ago • 67 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn">
                                    <i class="fa fa-bookmark"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">DevOps Engineer</h3>
                                <p class="job-company">CloudSystems</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> Seattle, WA</p>
                                <div>
                                    <span class="job-badge">Full Time</span>
                                    <span class="job-badge job-salary">$130,000 - $160,000</span>
                                    <span class="job-badge">AWS • Kubernetes</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/f59e0b/FFFFFF?text=CS" alt="CloudSystems" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            Build and maintain our cloud infrastructure on AWS. Implement CI/CD pipelines, 
                        manage container orchestration with Kubernetes, and ensure system reliability 
                        and scalability.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 2 weeks ago • 89 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn">
                                    <i class="fa fa-bookmark"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Marketing Specialist</h3>
                                <p class="job-company">Growth Marketing Pro</p>
                                <p class="job-location"><i class="fa fa-map-marker"></i> Remote</p>
                                <div>
                                    <span class="job-badge">Part Time</span>
                                    <span class="job-badge job-salary">$60,000 - $75,000</span>
                                    <span class="job-badge">Social Media • SEO</span>
                                </div>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/60x60/ef4444/FFFFFF?text=GM" alt="Growth Marketing" style="width: 60px; height: 60px; border-radius: 8px;">
                            </div>
                        </div>
                        
                        <p class="job-description">
                            Develop and execute digital marketing campaigns across social media, 
                            email, and content platforms. Analyze campaign performance and optimize 
                            for maximum ROI. Experience with Google Analytics and marketing automation 
                            tools required.
                        </p>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fa fa-clock-o"></i> Posted 1 day ago • 23 applicants
                            </div>
                            <div class="job-actions">
                                <button class="apply-btn">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </button>
                                <button class="save-btn saved">
                                    <i class="fa fa-bookmark"></i> Saved
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Job listings pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Companies Section -->
    <section class="companies-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Featured Companies Hiring Now</h2>
                    <p class="section-subtitle">
                        Explore job opportunities from our trusted partner companies
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="company-card">
                        <div class="company-logo">TC</div>
                        <h5 class="company-name">TechCorp Solutions</h5>
                        <p class="company-jobs">24 Open Positions</p>
                        <a href="#" class="btn view-company-btn">View Jobs</a>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="company-card">
                        <div class="company-logo">II</div>
                        <h5 class="company-name">Innovate Inc.</h5>
                        <p class="company-jobs">18 Open Positions</p>
                        <a href="#" class="btn view-company-btn">View Jobs</a>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="company-card">
                        <div class="company-logo">DW</div>
                        <h5 class="company-name">DataWorks Analytics</h5>
                        <p class="company-jobs">12 Open Positions</p>
                        <a href="#" class="btn view-company-btn">View Jobs</a>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="company-card">
                        <div class="company-logo">CS</div>
                        <h5 class="company-name">CloudSystems</h5>
                        <p class="company-jobs">15 Open Positions</p>
                        <a href="#" class="btn view-company-btn">View Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 @endsection