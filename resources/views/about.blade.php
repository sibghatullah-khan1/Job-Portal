 @extends('layouts.header')
 @section('content')
 @section('title','About Us')
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* About Page Styles */
        .about-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .about-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .about-subtitle {
            color: var(--text-light);
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }
        
        .about-section {
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
            line-height: 1.6;
        }
        
        /* Mission & Vision Cards */
        .mission-card, .vision-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .mission-card:hover, .vision-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            border-color: var(--primary-transparent);
        }
        
        .mission-icon, .vision-icon {
            width: 80px;
            height: 80px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-color);
            font-size: 2rem;
        }
        
        .mission-title, .vision-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
        
        .mission-text, .vision-text {
            color: var(--text-light);
            line-height: 1.7;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 4rem 0;
            border-radius: 12px;
            margin: 2rem 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        .stat-label {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }
        
        /* Team Section */
        .team-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }
        
        .team-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-weight: bold;
            font-size: 2.5rem;
            box-shadow: 0 4px 12px rgba(252, 0, 2, 0.2);
        }
        
        .team-name {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .team-position {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .team-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .team-social {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
        }
        
        .social-link {
            width: 36px;
            height: 36px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        /* Values Section */
        .values-section {
            background-color: #f8fafc;
            padding: 4rem 0;
        }
        
        .value-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .value-icon {
            width: 60px;
            height: 60px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .value-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }
        
        .value-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        /* Timeline Section */
        .timeline-section {
            padding: 4rem 0;
        }
        
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background-color: var(--primary-color);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            width: 100%;
        }
        
        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: auto;
            text-align: right;
            padding-right: 3rem;
        }
        
        .timeline-item:nth-child(even) .timeline-content {
            margin-right: auto;
            text-align: left;
            padding-left: 3rem;
        }
        
        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background-color: white;
            border: 3px solid var(--primary-color);
            border-radius: 50%;
            z-index: 1;
        }
        
        .timeline-content {
            width: 45%;
        }
        
        .timeline-year {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .timeline-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }
        
        .timeline-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        /* CTA Section */
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
            text-align: center;
        }
        
        .cta-subtitle {
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
            max-width: 600px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
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
            margin-left: 1rem;
        }
        
        .cta-btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        @media (max-width: 768px) {
            .timeline::before {
                left: 20px;
            }
            
            .timeline-item:nth-child(odd) .timeline-content,
            .timeline-item:nth-child(even) .timeline-content {
                width: 100%;
                text-align: left;
                padding-left: 3rem;
                padding-right: 1rem;
                margin: 0;
            }
            
            .timeline-dot {
                left: 20px;
            }
            
            .stat-item {
                margin-bottom: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .about-hero {
                padding: 3rem 0 2rem;
            }
            
            .about-section {
                padding: 2rem 0;
            }
            
            .cta-btn, .cta-btn-outline {
                width: 100%;
                margin: 0.5rem 0;
                text-align: center;
            }
        }
    </style>

    <!-- Content Section -->
    <section class="about-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="about-title">About JobSphere</h1>
                    <p class="about-subtitle">
                        We're revolutionizing the way people find jobs and companies find talent. 
                        Our mission is to create meaningful connections that transform careers and businesses.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="about-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        <h3 class="mission-title">Our Mission</h3>
                        <p class="mission-text">
                            To empower individuals by connecting them with career opportunities that match 
                            their skills and aspirations, while helping businesses find exceptional talent 
                            that drives growth and innovation. We believe everyone deserves a job they love.
                        </p>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="vision-card">
                        <div class="vision-icon">
                            <i class="fa fa-eye"></i>
                        </div>
                        <h3 class="vision-title">Our Vision</h3>
                        <p class="vision-text">
                            To become the world's most trusted career platform, breaking down barriers 
                            in employment and creating a global community where talent meets opportunity 
                            seamlessly. We envision a future where finding the perfect job or candidate 
                            takes minutes, not months.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="about-section">
        <div class="container">
            <div class="stats-section">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">50,000+</div>
                            <div class="stat-label">Jobs Posted</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">25,000+</div>
                            <div class="stat-label">Successful Hires</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">5,000+</div>
                            <div class="stat-label">Companies</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Our Story</h2>
                    <p class="section-subtitle">
                        Founded in 2018 by a group of HR professionals and tech entrepreneurs, 
                        JobSphere began with a simple idea: make job searching and hiring more 
                        human, more efficient, and more effective.
                    </p>
                </div>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="p-4" style="background-color: var(--primary-transparent); border-radius: 12px;">
                        <h3 style="color: var(--text-dark); margin-bottom: 1rem;">Why We Started</h3>
                        <p style="color: var(--text-light); line-height: 1.7; margin-bottom: 1.5rem;">
                            We noticed that traditional job boards were frustrating for both job seekers 
                            and employers. Candidates would apply to hundreds of jobs with no response, 
                            while companies would sift through thousands of resumes to find a few qualified 
                            candidates.
                        </p>
                        <p style="color: var(--text-light); line-height: 1.7;">
                            Our founders decided to build a better solution - a platform that uses smart 
                            technology to match the right people with the right opportunities, while 
                            maintaining the human touch that's essential in career decisions.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4" style="background-color: #f8fafc; border-radius: 12px;">
                        <h3 style="color: var(--text-dark); margin-bottom: 1rem;">Where We Are Now</h3>
                        <p style="color: var(--text-light); line-height: 1.7; margin-bottom: 1.5rem;">
                            Today, JobSphere has grown into a comprehensive career platform serving 
                            professionals and companies across multiple industries and countries. 
                            We've expanded our services to include career counseling, resume building, 
                            interview preparation, and employer branding.
                        </p>
                        <p style="color: var(--text-light); line-height: 1.7;">
                            Despite our growth, we remain committed to our core values: transparency, 
                            fairness, and putting people first in everything we do.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="timeline-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Our Journey</h2>
                    <p class="section-subtitle">
                        From humble beginnings to industry leader - our timeline of growth and achievement
                    </p>
                </div>
            </div>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2018</div>
                        <h4 class="timeline-title">JobSphere Founded</h4>
                        <p class="timeline-description">
                            Launched our beta platform with 50 companies and 1,000 job seekers
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2019</div>
                        <h4 class="timeline-title">Series A Funding</h4>
                        <p class="timeline-description">
                            Raised $5M to expand our team and enhance our matching algorithms
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h4 class="timeline-title">Global Expansion</h4>
                        <p class="timeline-description">
                            Expanded to 10 countries and launched remote work features
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2021</div>
                        <h4 class="timeline-title">Mobile App Launch</h4>
                        <p class="timeline-description">
                            Released our iOS and Android apps with 100K+ downloads in first month
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2022</div>
                        <h4 class="timeline-title">AI Integration</h4>
                        <p class="timeline-description">
                            Implemented AI-powered resume screening and job matching
                        </p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2023</div>
                        <h4 class="timeline-title">Industry Recognition</h4>
                        <p class="timeline-description">
                            Awarded "Best Job Platform" by Tech Innovation Awards
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="values-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Our Core Values</h2>
                    <p class="section-subtitle">
                        The principles that guide everything we do at JobSphere
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h4 class="value-title">People First</h4>
                        <p class="value-description">
                            We prioritize the needs of job seekers and employers above all else, 
                            creating experiences that are human-centered and empathetic.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h4 class="value-title">Trust & Transparency</h4>
                        <p class="value-description">
                            We believe in open communication, honest practices, and building 
                            relationships based on mutual trust and respect.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <h4 class="value-title">Innovation</h4>
                        <p class="value-description">
                            We continuously seek better ways to solve problems, using technology 
                            to create smarter, more efficient career solutions.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h4 class="value-title">Inclusion</h4>
                        <p class="value-description">
                            We're committed to creating opportunities for everyone, regardless 
                            of background, and fostering diverse, inclusive workplaces.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <h4 class="value-title">Excellence</h4>
                        <p class="value-description">
                            We strive for excellence in everything we do, from our technology 
                            to our customer support and community engagement.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <h4 class="value-title">Partnership</h4>
                        <p class="value-description">
                            We view our users as partners in success, working collaboratively 
                            to achieve career and business goals together.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title">Meet Our Leadership Team</h2>
                    <p class="section-subtitle">
                        The passionate professionals behind JobSphere's success
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-avatar">SJ</div>
                        <h4 class="team-name">Sarah Johnson</h4>
                        <p class="team-position">CEO & Co-Founder</p>
                        <p class="team-description">
                            15+ years in HR technology. Former VP at a Fortune 500 company.
                        </p>
                        <div class="team-social">
                            <a href="#" class="social-link">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-avatar">MR</div>
                        <h4 class="team-name">Michael Roberts</h4>
                        <p class="team-position">CTO & Co-Founder</p>
                        <p class="team-description">
                            AI and machine learning expert. PhD in Computer Science from MIT.
                        </p>
                        <div class="team-social">
                            <a href="#" class="social-link">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fa fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-avatar">AE</div>
                        <h4 class="team-name">Alexandra Evans</h4>
                        <p class="team-position">Chief Product Officer</p>
                        <p class="team-description">
                            Product strategist with experience at top tech companies.
                        </p>
                        <div class="team-social">
                            <a href="#" class="social-link">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fa fa-medium"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-avatar">DK</div>
                        <h4 class="team-name">David Kim</h4>
                        <p class="team-position">Head of Growth</p>
                        <p class="team-description">
                            Marketing expert who has scaled multiple startups to success.
                        </p>
                        <div class="team-social">
                            <a href="#" class="social-link">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-section">
        <div class="container">
            <div class="cta-section">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h2 class="cta-title">Join Our Growing Community</h2>
                        <p class="cta-subtitle">
                            Whether you're looking for your next career opportunity or seeking exceptional 
                            talent for your company, JobSphere is here to help you succeed.
                        </p>
                        <div>
                            <a href="{{route('register')}}" class="btn cta-btn">
                                <i class="fa fa-user-plus"></i> Join Now
                            </a>
                            <a href="{{route('contact')}}" class="btn cta-btn-outline">
                                <i class="fa fa-envelope"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
 @endsection