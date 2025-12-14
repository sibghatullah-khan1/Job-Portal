 @extends('layouts.header')
 @section('content')
 @section('title','Welcome to JobSphere')
  
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* Landing Page Styles */
        .hero-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 6rem 0 4rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-title {
            color: var(--text-dark);
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            color: var(--text-light);
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .hero-highlight {
            color: var(--primary-color);
        }
        
        .search-box {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .search-input {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-transparent);
            outline: none;
        }
        
        .search-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .search-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .stats-section {
            padding: 4rem 0;
            background: white;
        }
        
        .stat-card {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: var(--text-dark);
            font-weight: 500;
            font-size: 1rem;
        }
        
        /* Categories Section */
        .categories-section {
            padding: 4rem 0;
            background-color: #f8fafc;
        }
        
        .section-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .section-subtitle {
            color: var(--text-light);
            text-align: center;
            max-width: 700px;
            margin: 0 auto 3rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .category-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }
        
        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-transparent);
        }
        
        .category-icon {
            width: 70px;
            height: 70px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--primary-color);
            font-size: 1.8rem;
        }
        
        .category-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .category-count {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        /* Featured Jobs */
        .jobs-section {
            padding: 4rem 0;
            background: white;
        }
        
        .job-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border-left-color: var(--primary-color);
        }
        
        .job-card.featured {
            border-left-color: var(--primary-color);
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
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .job-company {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }
        
        .job-location {
            color: var(--text-light);
            font-size: 0.9rem;
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
        
        .job-salary {
            background-color: #f0fdf4;
            color: #166534;
        }
        
        .view-all-btn {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: inline-block;
        }
        
        .view-all-btn:hover {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        /* How It Works */
        .how-it-works-section {
            padding: 4rem 0;
            background-color: #f8fafc;
        }
        
        .step-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            text-align: center;
            position: relative;
            height: 100%;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .step-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        
        .step-description {
            color: var(--text-light);
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        /* Testimonials */
        .testimonials-section {
            padding: 4rem 0;
            background: white;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            height: 100%;
            position: relative;
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 3rem;
            color: var(--primary-transparent);
            font-family: Georgia, serif;
            line-height: 1;
        }
        
        .testimonial-text {
            color: var(--text-dark);
            font-style: italic;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .author-info h5 {
            color: var(--text-dark);
            margin: 0;
            font-size: 1rem;
        }
        
        .author-info p {
            color: var(--text-light);
            margin: 0;
            font-size: 0.9rem;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        
        .cta-title {
            color: white;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .cta-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-btn {
            background-color: white;
            border-color: white;
            color: var(--primary-color) !important;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: inline-block;
            margin: 0 0.5rem;
        }
        
        .cta-btn:hover {
            background-color: #f8fafc;
            border-color: #f8fafc;
            transform: translateY(-2px);
        }
        
        .cta-btn-outline {
            background-color: transparent;
            border: 2px solid white;
            color: white !important;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: inline-block;
            margin: 0 0.5rem;
        }
        
        .cta-btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Companies Section */
        .companies-section {
            padding: 4rem 0;
            background-color: #f8fafc;
        }
        
        .company-logo {
            width: 150px;
            height: 80px;
            background-color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            font-weight: bold;
            color: var(--text-dark);
            font-size: 1.2rem;
        }
        
        .company-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .search-box {
                padding: 1rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .cta-btn, .cta-btn-outline {
                display: block;
                width: 100%;
                margin: 0.5rem 0;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section {
                padding: 4rem 0 2rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        Find Your <span class="hero-highlight">Dream Job</span> 
                        <br>With JobSphere
                    </h1>
                    <p class="hero-subtitle">
                        Connect with thousands of job opportunities from top companies. 
                        Whether you're starting your career or looking for a change, 
                        we've got the perfect match for you.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="{{route('register')}}" class="btn search-btn">
                            <i class="fa fa-user-plus"></i> Get Started Free
                        </a>
                        <a href="{{route('jobs')}}" class="btn view-all-btn">
                            <i class="fa fa-search"></i> Browse Jobs
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="search-box">
                        <h3 style="color: var(--text-dark); margin-bottom: 1.5rem; font-weight: 600;">
                            <i class="fa fa-search" style="color: var(--primary-color);"></i> 
                            Search Your Next Career Move
                        </h3>
                        <div class="row g-2">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="search-input" placeholder="Job title, keyword, or company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="search-input" placeholder="City, state, or remote">
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="search-input">
                                    <option value="">Job Category</option>
                                    <option value="tech">Technology</option>
                                    <option value="finance">Finance</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="design">Design</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn search-btn">
                                    <i class="fa fa-search"></i> Search Jobs
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number" id="stat1">50,000+</div>
                        <div class="stat-label">Jobs Available</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number" id="stat2">15,000+</div>
                        <div class="stat-label">Companies Hiring</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number" id="stat3">25,000+</div>
                        <div class="stat-label">Successful Hires</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number" id="stat4">95%</div>
                        <div class="stat-label">User Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="categories-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Browse Popular Categories</h2>
                    <p class="section-subtitle">
                        Explore jobs in the most in-demand categories across industries
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h4 class="category-title">Technology</h4>
                        <div class="category-count">8,500+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <h4 class="category-title">Finance</h4>
                        <div class="category-count">6,200+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <h4 class="category-title">Healthcare</h4>
                        <div class="category-count">7,800+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <h4 class="category-title">Marketing</h4>
                        <div class="category-count">5,400+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <h4 class="category-title">Education</h4>
                        <div class="category-count">4,100+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-wrench"></i>
                        </div>
                        <h4 class="category-title">Engineering</h4>
                        <div class="category-count">9,200+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <h4 class="category-title">Design</h4>
                        <div class="category-count">3,800+ Jobs</div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h4 class="category-title">Business</h4>
                        <div class="category-count">5,600+ Jobs</div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="{{route('jobs')}}" class="btn view-all-btn">
                    <i class="fa fa-eye"></i> View All Categories
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Jobs -->
    <section class="jobs-section">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="section-title" style="text-align: left; margin-bottom: 0;">Featured Jobs</h2>
                    <p class="section-subtitle" style="text-align: left; margin-bottom: 0;">Hand-picked opportunities from top companies</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{route('jobs')}}" class="btn view-all-btn">
                        <i class="fa fa-briefcase"></i> View All Jobs
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="job-card featured">
                        <div class="job-header">
                            <div>
                                <h4 class="job-title">Senior Frontend Developer</h4>
                                <p class="job-company">TechCorp Solutions</p>
                                <p class="job-location">
                                    <i class="fa fa-map-marker"></i> Remote • New York, NY
                                </p>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/50x50/FC0002/FFFFFF?text=TC" alt="TechCorp" style="width: 50px; height: 50px; border-radius: 8px;">
                            </div>
                        </div>
                        <div>
                            <span class="job-badge">Full Time</span>
                            <span class="job-badge job-salary">$120K - $150K</span>
                            <span class="job-badge">Urgent</span>
                        </div>
                        <div class="text-end mt-3">
                            <a href="#" class="btn search-btn" style="padding: 0.4rem 1rem; font-size: 0.9rem;">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h4 class="job-title">Product Manager</h4>
                                <p class="job-company">Innovate Inc.</p>
                                <p class="job-location">
                                    <i class="fa fa-map-marker"></i> San Francisco, CA
                                </p>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/50x50/2563eb/FFFFFF?text=II" alt="Innovate Inc" style="width: 50px; height: 50px; border-radius: 8px;">
                            </div>
                        </div>
                        <div>
                            <span class="job-badge">Full Time</span>
                            <span class="job-badge job-salary">$140K - $180K</span>
                            <span class="job-badge">Equity</span>
                        </div>
                        <div class="text-end mt-3">
                            <a href="#" class="btn search-btn" style="padding: 0.4rem 1rem; font-size: 0.9rem;">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h4 class="job-title">Data Scientist</h4>
                                <p class="job-company">DataWorks Analytics</p>
                                <p class="job-location">
                                    <i class="fa fa-map-marker"></i> Remote • Chicago, IL
                                </p>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/50x50/10b981/FFFFFF?text=DW" alt="DataWorks" style="width: 50px; height: 50px; border-radius: 8px;">
                            </div>
                        </div>
                        <div>
                            <span class="job-badge">Full Time</span>
                            <span class="job-badge job-salary">$110K - $140K</span>
                            <span class="job-badge">Python</span>
                        </div>
                        <div class="text-end mt-3">
                            <a href="#" class="btn search-btn" style="padding: 0.4rem 1rem; font-size: 0.9rem;">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">How JobSphere Works</h2>
                    <p class="section-subtitle">
                        Your journey to a new career starts here. Follow these simple steps to land your dream job.
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h4 class="step-title">Create Profile</h4>
                        <p class="step-description">
                            Sign up and build your professional profile with skills, experience, and career preferences.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h4 class="step-title">Search Jobs</h4>
                        <p class="step-description">
                            Use our smart search to find jobs that match your skills, location, and salary expectations.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h4 class="step-title">Apply Easily</h4>
                        <p class="step-description">
                            Submit applications with one click. Many employers offer quick apply with your profile.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h4 class="step-title">Get Hired</h4>
                        <p class="step-description">
                            Track your applications, prepare for interviews, and accept your dream job offer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Companies -->
    <section class="companies-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Trusted by Leading Companies</h2>
                    <p class="section-subtitle">
                        Join thousands of professionals who found their dream jobs through JobSphere
                    </p>
                </div>
            </div>
            
            <div class="row align-items-center g-4">
                <div class="col-md-3 col-6">
                    <div class="company-logo">TechCorp</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="company-logo">Innovate Inc</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="company-logo">DataWorks</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="company-logo">CloudSystems</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Success Stories</h2>
                    <p class="section-subtitle">
                        Hear from professionals who transformed their careers with JobSphere
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "JobSphere helped me land my dream remote job in just 2 weeks! 
                            The platform made it so easy to find opportunities that matched 
                            my skills and preferences."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">SJ</div>
                            <div class="author-info">
                                <h5>Sarah Johnson</h5>
                                <p>Senior Developer at TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "As a recent graduate, I was struggling to find entry-level positions. 
                            JobSphere's career counseling and resume builder gave me the edge I needed."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">MR</div>
                            <div class="author-info">
                                <h5>Michael Rodriguez</h5>
                                <p>Marketing Associate</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "We found 3 perfect candidates for our startup within a week using JobSphere. 
                            The quality of applicants was exceptional compared to other platforms."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">AE</div>
                            <div class="author-info">
                                <h5>Alexandra Evans</h5>
                                <p>CEO, StartupX</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Transform Your Career?</h2>
            <p class="cta-subtitle">
                Join thousands of successful professionals and companies who trust JobSphere 
                for their career and hiring needs.
            </p>
            <div class="mt-4">
                <a href="{{route('register')}}" class="btn cta-btn">
                    <i class="fa fa-user-plus"></i> Start Your Journey
                </a>
                <a href="{{route('about')}}" class="btn cta-btn-outline">
                    <i class="fa fa-info-circle"></i> Learn More
                </a>
            </div>
        </div>
    </section>

 @endsection