
 @extends('layouts.header')
 @section('content')
 @section('title','Our services')
    
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* Services Page Specific Styles */
        .services-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 4rem 0 3rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .services-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .services-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }
        
        .services-section {
            padding: 4rem 0;
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
        }
        
        .service-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-transparent);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.8rem;
        }
        
        .service-card h3 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
        
        .service-card p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .service-features {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0 0 0;
        }
        
        .service-features li {
            color: var(--text-light);
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }
        
        .service-features li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }
        
        /* FIXED BUTTON STYLES - Added explicit color properties */
        .service-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important; /* Force white text */
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
            margin-top: 1rem;
            display: inline-block;
            text-decoration: none !important;
        }
        
        .service-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white !important; /* Force white text on hover */
            transform: translateY(-2px);
        }
        
        .service-btn-outline {
            background-color: transparent;
            border-color: var(--primary-color);
            color: var(--primary-color) !important; /* Force primary color text */
        }
        
        .service-btn-outline:hover {
            background-color: var(--primary-color);
            color: white !important; /* Force white text on hover */
        }
        
        .pricing-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .pricing-card.popular {
            border-color: var(--primary-color);
        }
        
        .popular-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1.5rem;
            font-size: 0.8rem;
            font-weight: 600;
            transform: rotate(45deg) translate(30%, -50%);
            transform-origin: top right;
            width: 150px;
            text-align: center;
        }
        
        .pricing-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 1.5rem 0;
        }
        
        .price span {
            font-size: 1rem;
            color: var(--text-light);
        }
        
        .testimonial-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin: 1rem 0;
        }
        
        .testimonial-text {
            color: var(--text-dark);
            font-style: italic;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
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
        
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 4rem 0;
            border-radius: 12px;
            margin: 3rem 0;
        }
        
        .cta-title {
            color: white;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-subtitle {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        
        .cta-btn {
            background-color: white;
            border-color: white;
            color: var(--primary-color) !important; /* Force primary color text */
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none !important;
        }
        
        .cta-btn:hover {
            background-color: #f8fafc;
            border-color: #f8fafc;
            color: var(--primary-color) !important; /* Keep primary color on hover */
            transform: translateY(-2px);
        }
        
        /* Override Bootstrap button styles */
        .btn {
            color: inherit;
        }
        
        a.btn, button.btn {
            text-decoration: none !important;
        }
        
        @media (max-width: 992px) {
            .services-section {
                padding: 2rem 0;
            }
            
            .service-card, .pricing-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <!-- Content Section -->
    <section class="services-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="services-title">Our Services</h1>
                    <p class="services-subtitle">
                        Empowering job seekers and employers with comprehensive solutions for career growth 
                        and talent acquisition. Discover how JobSphere can transform your career or hiring process.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services for Job Seekers -->
    <section class="services-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Services for Job Seekers</h2>
                    <p class="section-subtitle">
                        Take control of your career with our suite of tools designed to help you find, 
                        apply for, and secure your dream job.
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <h3>Smart Job Search</h3>
                        <p>
                            Advanced job matching algorithm that connects you with relevant opportunities 
                            based on your skills, experience, and preferences.
                        </p>
                        <ul class="service-features">
                            <li>Personalized job recommendations</li>
                            <li>Advanced filtering options</li>
                            <li>Salary range indicators</li>
                            <li>Remote work opportunities</li>
                        </ul>
                        <a href="{{route('jobs')}}" class="btn service-btn">Find Jobs</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <h3>Professional Resume Builder</h3>
                        <p>
                            Create stunning, ATS-friendly resumes with our easy-to-use builder. 
                            Templates designed to get you noticed by employers.
                        </p>
                        <ul class="service-features">
                            <li>Professional templates</li>
                            <li>ATS optimization</li>
                            <li>Export to PDF/Word</li>
                            <li>Resume analysis</li>
                        </ul>
                        <a href="#" class="btn service-btn">Build Resume</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-video-camera"></i>
                        </div>
                        <h3>Interview Preparation</h3>
                        <p>
                            Comprehensive interview preparation resources including mock interviews, 
                            common questions, and expert tips.
                        </p>
                        <ul class="service-features">
                            <li>Mock interview simulator</li>
                            <li>Industry-specific questions</li>
                            <li>Video interview practice</li>
                            <li>Expert feedback</li>
                        </ul>
                        <a href="#" class="btn service-btn">Prepare Now</a>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-bell"></i>
                        </div>
                        <h3>Job Alerts</h3>
                        <p>
                            Never miss an opportunity with customized job alerts sent directly 
                            to your email or mobile device.
                        </p>
                        <ul class="service-features">
                            <li>Customizable alert frequency</li>
                            <li>Mobile notifications</li>
                            <li>Email digest options</li>
                            <li>Priority job alerts</li>
                        </ul>
                        <a href="#" class="btn service-btn">Set Alerts</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <h3>Career Counseling</h3>
                        <p>
                            One-on-one career guidance sessions with industry experts to help 
                            you navigate your career path.
                        </p>
                        <ul class="service-features">
                            <li>Personalized career roadmap</li>
                            <li>Skill gap analysis</li>
                            <li>Industry insights</li>
                            <li>Goal setting</li>
                        </ul>
                        <a href="#" class="btn service-btn">Book Session</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3>Networking Opportunities</h3>
                        <p>
                            Connect with industry professionals, recruiters, and fellow job seekers 
                            through our networking platform.
                        </p>
                        <ul class="service-features">
                            <li>Industry-specific groups</li>
                            <li>Virtual networking events</li>
                            <li>Direct messaging</li>
                            <li>Professional community</li>
                        </ul>
                        <a href="#" class="btn service-btn">Join Network</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services for Employers -->
    <section class="services-section" style="background-color: #f8fafc;">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Services for Employers</h2>
                    <p class="section-subtitle">
                        Streamline your hiring process and find the perfect candidates with our 
                        comprehensive employer solutions.
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h3>Job Posting & Management</h3>
                        <p>
                            Post unlimited job openings with detailed descriptions and 
                            manage applications through our intuitive dashboard.
                        </p>
                        <ul class="service-features">
                            <li>Unlimited job postings</li>
                            <li>Application tracking system</li>
                            <li>Candidate screening tools</li>
                            <li>Bulk posting options</li>
                        </ul>
                        <a href="{{route('register')}}" class="btn service-btn">Post a Job</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <h3>Company Profile Builder</h3>
                        <p>
                            Create an impressive company profile to attract top talent and 
                            showcase your company culture and values.
                        </p>
                        <ul class="service-features">
                            <li>Customizable profile pages</li>
                            <li>Employee testimonials</li>
                            <li>Company culture showcase</li>
                            <li>Brand promotion</li>
                        </ul>
                        <a href="#" class="btn service-btn">Create Profile</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-filter"></i>
                        </div>
                        <h3>Advanced Candidate Search</h3>
                        <p>
                            Access our database of qualified candidates with powerful search 
                            and filtering tools to find the perfect match.
                        </p>
                        <ul class="service-features">
                            <li>Advanced filtering options</li>
                            <li>Resume database access</li>
                            <li>Skill-based search</li>
                            <li>Saved search alerts</li>
                        </ul>
                        <a href="#" class="btn service-btn">Search Candidates</a>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-star"></i>
                        </div>
                        <h3>Employer Branding</h3>
                        <p>
                            Enhance your employer brand and attract better candidates with 
                            our employer branding solutions.
                        </p>
                        <ul class="service-features">
                            <li>Featured employer status</li>
                            <li>Branded career pages</li>
                            <li>Social media integration</li>
                            <li>Employer spotlight features</li>
                        </ul>
                        <a href="#" class="btn service-btn">Enhance Brand</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-video-camera"></i>
                        </div>
                        <h3>Video Interview Platform</h3>
                        <p>
                            Conduct remote interviews through our integrated video platform 
                            with scheduling and recording capabilities.
                        </p>
                        <ul class="service-features">
                            <li>One-way video interviews</li>
                            <li>Live video interviews</li>
                            <li>Interview scheduling</li>
                            <li>Candidate evaluation tools</li>
                        </ul>
                        <a href="#" class="btn service-btn">Try Platform</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <h3>Analytics & Reporting</h3>
                        <p>
                            Gain insights into your hiring process with detailed analytics 
                            and performance reports.
                        </p>
                        <ul class="service-features">
                            <li>Hiring funnel analytics</li>
                            <li>Time-to-hire metrics</li>
                            <li>Source effectiveness</li>
                            <li>Custom reports</li>
                        </ul>
                        <a href="#" class="btn service-btn">View Analytics</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="services-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Simple, Transparent Pricing</h2>
                    <p class="section-subtitle">
                        Choose the plan that's right for you. All plans include core features 
                        with additional benefits for premium members.
                    </p>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h3 class="pricing-title">Basic</h3>
                        <p>For individual job seekers</p>
                        <div class="price">$0<span>/month</span></div>
                        <ul class="service-features text-start">
                            <li>Create job seeker profile</li>
                            <li>Apply for up to 10 jobs/month</li>
                            <li>Basic resume builder</li>
                            <li>Email job alerts</li>
                            <li>Access to job listings</li>
                        </ul>
                        <a href="{{route('register')}}" class="btn service-btn service-btn-outline w-100 mt-3">Get Started Free</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card popular">
                        <div class="popular-badge">MOST POPULAR</div>
                        <h3 class="pricing-title">Premium</h3>
                        <p>For serious job seekers</p>
                        <div class="price">$19.99<span>/month</span></div>
                        <ul class="service-features text-start">
                            <li>Unlimited job applications</li>
                            <li>Advanced resume builder</li>
                            <li>Priority application status</li>
                            <li>Interview preparation tools</li>
                            <li>Career counseling sessions</li>
                            <li>No ads experience</li>
                        </ul>
                        <a href="{{route('register')}}" class="btn service-btn w-100 mt-3">Upgrade to Premium</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h3 class="pricing-title">Business</h3>
                        <p>For companies & recruiters</p>
                        <div class="price">$99.99<span>/month</span></div>
                        <ul class="service-features text-start">
                            <li>Unlimited job postings</li>
                            <li>Advanced candidate search</li>
                            <li>Company profile builder</li>
                            <li>Video interview platform</li>
                            <li>Analytics dashboard</li>
                            <li>Dedicated support</li>
                        </ul>
                        <a href="{{route('register')}}" class="btn service-btn service-btn-outline w-100 mt-3">Start Hiring</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="services-section" style="background-color: #f8fafc;">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Success Stories</h2>
                    <p class="section-subtitle">
                        Hear from job seekers and employers who have transformed their careers 
                        and hiring processes with JobSphere.
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "JobSphere helped me land my dream job in just 2 weeks! The resume builder 
                            and interview preparation tools were game-changers."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">SJ</div>
                            <div class="author-info">
                                <h5>Sarah Johnson</h5>
                                <p>Software Developer at TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "As an employer, the candidate search feature saved us countless hours. 
                            We found 3 perfect candidates for our open positions within a week!"
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">MR</div>
                            <div class="author-info">
                                <h5>Michael Roberts</h5>
                                <p>HR Director at Innovate Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "The career counseling sessions helped me pivot to a new industry. 
                            My counselor provided invaluable guidance throughout the transition."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">AE</div>
                            <div class="author-info">
                                <h5>Alexandra Evans</h5>
                                <p>Marketing Manager at BrandWorks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="services-section">
        <div class="container">
            <div class="cta-section">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h2 class="cta-title">Ready to Transform Your Career or Hiring Process?</h2>
                        <p class="cta-subtitle">
                            Join thousands of successful job seekers and employers who have found 
                            their perfect match through JobSphere.
                        </p>
                        <div class="row justify-content-center g-3">
                            <div class="col-auto">
                                <a href="{{route('register')}}" class="btn cta-btn">
                                    <i class="fa fa-user-plus"></i> Get Started Free
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('contact')}}" class="btn service-btn service-btn-outline">
                                    <i class="fa fa-envelope"></i> Contact Sales
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 @endsection