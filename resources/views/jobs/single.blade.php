 @extends('layouts.header')
 @section('content')
 @section('title','Jobs')
  
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* Job Detail Page Styles */
        .job-detail-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 3rem 0 2rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .job-detail-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .job-company-badge {
            display: inline-flex;
            align-items: center;
            background-color: var(--primary-transparent);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            color: var(--text-light);
        }
        
        .meta-icon {
            color: var(--primary-color);
            margin-right: 0.5rem;
            width: 20px;
        }
        
        .job-badge {
            background-color: var(--primary-transparent);
            color: var(--primary-color);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .job-badge-type {
            background-color: #f0f9ff;
            color: #0369a1;
        }
        
        .job-badge-salary {
            background-color: #f0fdf4;
            color: #166534;
        }
        
        .job-badge-urgent {
            background-color: #fef2f2;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .job-detail-section {
            padding: 3rem 0;
        }
        
        /* Job Content */
        .job-content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .section-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary-transparent);
        }
        
        .job-description {
            color: var(--text-dark);
            line-height: 1.8;
            margin-bottom: 2rem;
        }
        
        .job-description p {
            margin-bottom: 1rem;
        }
        
        .job-requirements, .job-responsibilities {
            margin: 2rem 0;
        }
        
        .job-list {
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        
        .job-list li {
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            line-height: 1.6;
        }
        
        .job-list li strong {
            color: var(--primary-color);
        }
        
        /* Company Info */
        .company-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }
        
        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .company-logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-weight: bold;
            font-size: 2rem;
            box-shadow: 0 4px 12px rgba(252, 0, 2, 0.2);
        }
        
        .company-name {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }
        
        .company-description {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .company-stats {
            display: flex;
            justify-content: space-around;
            margin: 1.5rem 0;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 0.85rem;
        }
        
        .company-link {
            display: block;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-top: 1rem;
        }
        
        .company-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Apply Card */
        .apply-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            position: sticky;
            top: 2rem;
        }
        
        .apply-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .apply-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none !important;
        }
        
        .apply-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .save-btn {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none !important;
        }
        
        .save-btn:hover {
            background-color: var(--primary-transparent);
        }
        
        .save-btn.saved {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        .job-details-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }
        
        .job-details-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .job-details-list li:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: var(--text-light);
            font-weight: 500;
        }
        
        .detail-value {
            color: var(--text-dark);
            font-weight: 600;
        }
        
        /* Similar Jobs */
        .similar-jobs-section {
            background-color: #f8fafc;
            padding: 3rem 0;
        }
        
        .similar-job-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .similar-job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border-left: 4px solid var(--primary-color);
        }
        
        .similar-job-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .similar-job-company {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .similar-job-meta {
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }
        
        .quick-apply-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: inline-block;
        }
        
        .quick-apply-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        /* Alert */
        .application-alert {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 2rem;
            display: none;
        }
        
        .application-alert.show {
            display: block;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 992px) {
            .job-detail-section {
                padding: 2rem 0;
            }
            
            .apply-card {
                position: static;
                margin-top: 2rem;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 0.75rem;
            }
        }
    </style>

    <!-- Content Section -->
    <section class="job-detail-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h1 class="job-detail-title">Senior Frontend Developer</h1>
                            <div class="job-company-badge">
                                <i class="fa fa-building" style="margin-right: 8px;"></i>
                                TechCorp Solutions
                            </div>
                        </div>
                        <div class="d-none d-lg-block">
                            <div class="company-logo">TC</div>
                        </div>
                    </div>
                    
                    <div class="job-meta">
                        <div class="meta-item">
                            <i class="fa fa-map-marker meta-icon"></i>
                            <span>Remote • New York, NY</span>
                        </div>
                        <div class="meta-item">
                            <i class="fa fa-clock-o meta-icon"></i>
                            <span>Posted 2 days ago • 35 applicants</span>
                        </div>
                        <div class="meta-item">
                            <i class="fa fa-eye meta-icon"></i>
                            <span>245 views</span>
                        </div>
                    </div>
                    
                    <div>
                        <span class="job-badge job-badge-urgent">Urgent Hiring</span>
                        <span class="job-badge">Full Time</span>
                        <span class="job-badge job-badge-salary">$120,000 - $150,000</span>
                        <span class="job-badge">5+ Years Experience</span>
                        <span class="job-badge job-badge-type">Remote Available</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Detail Section -->
    <section class="job-detail-section">
        <div class="container">
            <!-- Application Alert -->
            <div class="application-alert" id="applicationAlert">
                <div class="d-flex align-items-center">
                    <i class="fa fa-check-circle" style="color: #10b981; font-size: 1.5rem; margin-right: 1rem;"></i>
                    <div>
                        <h5 class="mb-1" style="color: #166534;">Application Submitted Successfully!</h5>
                        <p class="mb-0" style="color: #065f46;">Your application has been sent to the employer. 
                        You can track your application status from your dashboard.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Job Description -->
                    <div class="job-content-card">
                        <h3 class="section-title">Job Description</h3>
                        <div class="job-description">
                            <p>TechCorp Solutions is seeking an experienced Senior Frontend Developer to join our 
                            innovative product team. We're building cutting-edge SaaS solutions that are transforming 
                            how businesses operate in the digital age.</p>
                            
                            <p>As a Senior Frontend Developer, you will be responsible for building and maintaining 
                            user-facing features, ensuring the technical feasibility of UI/UX designs, and optimizing 
                            applications for maximum speed and scalability. You will collaborate with backend 
                            developers, designers, and product managers to create exceptional user experiences.</p>
                            
                            <p>This is a remote-friendly position with occasional team meetups in our New York office. 
                            We offer competitive compensation, comprehensive benefits, and opportunities for 
                            professional growth.</p>
                        </div>
                        
                        <!-- Responsibilities -->
                        <div class="job-responsibilities">
                            <h4 class="section-title" style="font-size: 1.2rem;">Key Responsibilities</h4>
                            <ul class="job-list">
                                <li>Develop new user-facing features using React, TypeScript, and modern web technologies</li>
                                <li>Build reusable components and front-end libraries for future use</li>
                                <li>Translate designs and wireframes into high-quality code</li>
                                <li>Optimize components for maximum performance across a vast array of web-capable devices and browsers</li>
                                <li>Collaborate with UX/UI designers to implement design systems</li>
                                <li>Mentor junior developers and conduct code reviews</li>
                                <li>Stay up-to-date with emerging frontend technologies and best practices</li>
                                <li>Participate in agile development processes including sprint planning and retrospectives</li>
                            </ul>
                        </div>
                        
                        <!-- Requirements -->
                        <div class="job-requirements">
                            <h4 class="section-title" style="font-size: 1.2rem;">Requirements</h4>
                            <ul class="job-list">
                                <li><strong>5+ years</strong> of professional frontend development experience</li>
                                <li><strong>Expert knowledge</strong> of React, TypeScript, and modern JavaScript (ES6+)</li>
                                <li><strong>Proficient understanding</strong> of web markup, including HTML5 and CSS3</li>
                                <li>Experience with state management libraries (<strong>Redux</strong>, Zustand, or similar)</li>
                                <li>Familiarity with modern frontend build pipelines and tools (Webpack, Babel, npm/yarn)</li>
                                <li>Experience with testing frameworks (Jest, React Testing Library, Cypress)</li>
                                <li>Knowledge of RESTful APIs and GraphQL</li>
                                <li>Experience with version control systems (Git)</li>
                                <li>Excellent problem-solving skills and attention to detail</li>
                                <li>Strong communication and teamwork skills</li>
                            </ul>
                        </div>
                        
                        <!-- Nice to Have -->
                        <div class="job-requirements">
                            <h4 class="section-title" style="font-size: 1.2rem;">Nice to Have</h4>
                            <ul class="job-list">
                                <li>Experience with Next.js or similar React frameworks</li>
                                <li>Knowledge of UI/UX design principles</li>
                                <li>Experience with micro-frontend architecture</li>
                                <li>Contributions to open-source projects</li>
                                <li>Experience in a SaaS product environment</li>
                                <li>Familiarity with CI/CD pipelines</li>
                            </ul>
                        </div>
                        
                        <!-- Benefits -->
                        <div class="job-requirements">
                            <h4 class="section-title" style="font-size: 1.2rem;">What We Offer</h4>
                            <ul class="job-list">
                                <li>Competitive salary range: <strong>$120,000 - $150,000</strong> per year</li>
                                <li><strong>Comprehensive health insurance</strong> (medical, dental, vision)</li>
                                <li><strong>401(k) matching</strong> up to 4%</li>
                                <li><strong>Unlimited PTO</strong> and flexible work hours</li>
                                <li><strong>Remote work</strong> flexibility with home office stipend</li>
                                <li><strong>Professional development</strong> budget and learning opportunities</li>
                                <li><strong>Annual performance bonus</strong> and equity options</li>
                                <li><strong>Team building</strong> events and company retreats</li>
                                <li><strong>Parental leave</strong> and family-friendly policies</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Application Process -->
                    <div class="job-content-card">
                        <h3 class="section-title">Application Process</h3>
                        <div class="job-description">
                            <p>Our hiring process is designed to be transparent and respectful of your time:</p>
                            <ol class="job-list">
                                <li><strong>Submit Application:</strong> Complete the application form with your resume and cover letter</li>
                                <li><strong>Initial Screening:</strong> Phone interview with our HR team (30 minutes)</li>
                                <li><strong>Technical Assessment:</strong> Take-home coding challenge (2-3 hours)</li>
                                <li><strong>Technical Interview:</strong> Pair programming session with our engineering team (1 hour)</li>
                                <li><strong>Team Interview:</strong> Meet with potential team members and product managers (1 hour)</li>
                                <li><strong>Final Interview:</strong> Chat with our engineering leadership (45 minutes)</li>
                                <li><strong>Offer:</strong> Decision and offer letter within 48 hours</li>
                            </ol>
                            <p>We strive to complete the entire process within <strong>2-3 weeks</strong> from application submission.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Apply Card -->
                    <div class="apply-card">
                        <div class="apply-actions">
                            <button class="btn apply-btn" id="applyNowBtn">
                                <i class="fa fa-paper-plane"></i> Apply Now
                            </button>
                            <button class="btn save-btn" id="saveJobBtn">
                                <i class="fa fa-bookmark"></i> Save Job
                            </button>
                        </div>
                        
                        <h5 class="section-title" style="font-size: 1.1rem;">Job Details</h5>
                        <ul class="job-details-list">
                            <li>
                                <span class="detail-label">Job Type</span>
                                <span class="detail-value">Full-time</span>
                            </li>
                            <li>
                                <span class="detail-label">Experience Level</span>
                                <span class="detail-value">Senior (5+ years)</span>
                            </li>
                            <li>
                                <span class="detail-label">Salary Range</span>
                                <span class="detail-value">$120K - $150K</span>
                            </li>
                            <li>
                                <span class="detail-label">Location</span>
                                <span class="detail-value">Remote (US)</span>
                            </li>
                            <li>
                                <span class="detail-label">Work Schedule</span>
                                <span class="detail-value">Flexible Hours</span>
                            </li>
                            <li>
                                <span class="detail-label">Visa Sponsorship</span>
                                <span class="detail-value">Available</span>
                            </li>
                            <li>
                                <span class="detail-label">Relocation Assistance</span>
                                <span class="detail-value">Not Provided</span>
                            </li>
                        </ul>
                        
                        <div class="text-center mt-3">
                            <a href="#" class="company-link">
                                <i class="fa fa-share-alt"></i> Share this job
                            </a>
                            <a href="#" class="company-link" style="margin-left: 1rem;">
                                <i class="fa fa-flag"></i> Report job
                            </a>
                        </div>
                    </div>
                    
                    <!-- Company Card -->
                    <div class="company-card">
                        <div class="company-logo">TC</div>
                        <h4 class="company-name">TechCorp Solutions</h4>
                        <p class="company-description">
                            We build innovative SaaS solutions that help businesses thrive in the digital era. 
                            Our team of 200+ professionals is dedicated to creating exceptional software products.
                        </p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <div class="stat-number">200+</div>
                                <div class="stat-label">Employees</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">8</div>
                                <div class="stat-label">Open Jobs</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">4.8</div>
                                <div class="stat-label">Rating</div>
                            </div>
                        </div>
                        
                        <a href="#" class="btn apply-btn" style="width: 100%;">
                            <i class="fa fa-building"></i> View Company Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Jobs Section -->
    <section class="similar-jobs-section">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="section-title" style="text-align: left; margin-bottom: 0;">Similar Jobs You Might Like</h2>
                    <p class="section-subtitle" style="text-align: left; margin-bottom: 0;">Explore other opportunities that match your skills</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{route('jobs')}}" class="btn save-btn">
                        <i class="fa fa-search"></i> View All Jobs
                    </a>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="similar-job-card">
                        <h5 class="similar-job-title">Frontend Engineer</h5>
                        <p class="similar-job-company">Innovate Inc.</p>
                        <p class="similar-job-meta">
                            <i class="fa fa-map-marker"></i> Remote • 
                            <i class="fa fa-money"></i> $110K - $140K
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="job-badge" style="font-size: 0.8rem;">Full Time</span>
                            <a href="#" class="quick-apply-btn">Quick Apply</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="similar-job-card">
                        <h5 class="similar-job-title">React Developer</h5>
                        <p class="similar-job-company">Digital Solutions Co.</p>
                        <p class="similar-job-meta">
                            <i class="fa fa-map-marker"></i> New York, NY • 
                            <i class="fa fa-money"></i> $100K - $130K
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="job-badge" style="font-size: 0.8rem;">Full Time</span>
                            <a href="#" class="quick-apply-btn">Quick Apply</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="similar-job-card">
                        <h5 class="similar-job-title">UI/UX Developer</h5>
                        <p class="similar-job-company">Creative Tech</p>
                        <p class="similar-job-meta">
                            <i class="fa fa-map-marker"></i> Remote • 
                            <i class="fa fa-money"></i> $95K - $125K
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="job-badge" style="font-size: 0.8rem;">Contract</span>
                            <a href="#" class="quick-apply-btn">Quick Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    

 @endsection