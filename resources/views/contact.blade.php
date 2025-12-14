@extends('layouts.header')
@section('content')
@section('title','Contact Us')
    <style>
        :root {
            --primary-color: #FC0002;
            --primary-dark: #D40000;
            --primary-light: #FF3333;
            --primary-transparent: rgba(252, 0, 2, 0.1);
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --accent-color: #FF6B6B;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
        }
        
        /* Navbar Styles */
        .job-navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .navbar-brand i {
            margin-right: 8px;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            padding: 0.5rem 1rem !important;
            margin: 0 3px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: var(--primary-transparent);
            color: var(--primary-color) !important;
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        .nav-icon {
            margin-right: 6px;
            font-size: 0.9rem;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-transparent);
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            margin-right: 8px;
            width: 16px;
        }
        
        .dropdown-divider {
            margin: 0.3rem 0;
        }
        
        /* Contact Page Styles */
        .contact-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 4rem 0 2rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .contact-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .contact-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .contact-section {
            padding: 4rem 0;
        }
        
        .contact-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            background-color: var(--primary-transparent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .contact-info h4 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .contact-info p {
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }
        
        .contact-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            margin-top: 0.5rem;
        }
        
        .contact-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .form-label {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-transparent);
        }
        
        .contact-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .contact-btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-top: 3rem;
        }
        
        .map-placeholder {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }
        
        .faq-item {
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem 0;
        }
        
        .faq-question {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            cursor: pointer;
        }
        
        .faq-answer {
            color: var(--text-light);
            display: none;
        }
        
        .faq-item.active .faq-answer {
            display: block;
        }
        
        /* Footer Styles */
        .job-footer {
            background-color: white;
            border-top: 1px solid #e5e7eb;
            margin-top: 4rem;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        .footer-bottom {
            border-top: 1px solid #e5e7eb;
            margin-top: 2rem;
            padding-top: 1.5rem;
            text-align: center;
            color: var(--text-light);
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Button styling with the new primary color */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Links */
        a:not(.nav-link):not(.dropdown-item):not(.social-icon) {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        a:not(.nav-link):not(.dropdown-item):not(.social-icon):hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .navbar-nav {
                padding-top: 1rem;
            }
            
            .nav-link {
                margin: 2px 0;
                padding: 0.7rem 1rem !important;
            }
            
            .contact-section {
                padding: 2rem 0;
            }
            
            .contact-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="contact-title">Contact Us</h1>
                    <p class="contact-subtitle">
                        Have questions or need assistance? We're here to help! Reach out to our team 
                        and we'll get back to you as soon as possible.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info">
                            <h4>Visit Our Office</h4>
                            <p>123 Job Street, Suite 100</p>
                            <p>Career City, CC 10101</p>
                            <a href="#" class="contact-link">Get Directions →</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info">
                            <h4>Call Us</h4>
                            <p>+1 (555) 123-4567</p>
                            <p>Mon-Fri, 9AM-6PM EST</p>
                            <a href="tel:+15551234567" class="contact-link">Call Now →</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-info">
                            <h4>Email Us</h4>
                            <p>info@jobsphere.com</p>
                            <p>support@jobsphere.com</p>
                            <a href="mailto:info@jobsphere.com" class="contact-link">Send Email →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section" style="background-color: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-card">
                        <h2 class="contact-title text-center mb-4">Send Us a Message</h2>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-select" id="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="job">Job Application</option>
                                    <option value="support">Technical Support</option>
                                    <option value="billing">Billing Question</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn contact-btn">
                                    <i class="fa fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title text-center mb-4">Find Our Office</h2>
                    <div class="map-container">
                        <div class="map-placeholder">
                            <div class="text-center">
                                <i class="fa fa-map" style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);"></i>
                                <h4 style="color: var(--text-dark);">Interactive Map Location</h4>
                                <p>123 Job Street, Career City</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-section" style="background-color: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="contact-title text-center mb-4">Frequently Asked Questions</h2>
                    <div class="faq-list">
                        <div class="faq-item active">
                            <div class="faq-question">
                                <i class="fa fa-question-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
                                How long does it take to get a response?
                            </div>
                            <div class="faq-answer">
                                We typically respond to all inquiries within 24-48 hours during business days. For urgent matters, please call our support line.
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <i class="fa fa-question-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
                                Do you offer career counseling services?
                            </div>
                            <div class="faq-answer">
                                Yes, we offer free career counseling sessions for registered members. Contact us to schedule an appointment with one of our career experts.
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <i class="fa fa-question-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
                                Can employers post job listings directly?
                            </div>
                            <div class="faq-answer">
                                Absolutely! Employers can create an account and post job listings. Contact our sales team for corporate packages and bulk posting discounts.
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <i class="fa fa-question-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
                                How do I reset my account password?
                            </div>
                            <div class="faq-answer">
                                Click on "Forgot Password" on the login page, or contact our support team for assistance with account recovery.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection