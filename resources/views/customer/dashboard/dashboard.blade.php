<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-replied {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-closed {
            background-color: #E5E7EB;
            color: #4B5563;
        }

        .status-verified {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .hamburger {
            display: none;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
                background-color: white;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .overlay.open {
                display: block;
            }
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            padding: 1rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
        }

        /* Message styles */
        .message-container {
            height: 400px;
            overflow-y: auto;
        }

        .message-received {
            background-color: #f3f4f6;
            border-radius: 1rem 1rem 1rem 0;
        }

        .message-sent {
            background-color: #3b82f6;
            color: white;
            border-radius: 1rem 1rem 0 1rem;
        }

        /* Additional content styles */
        .additional-content {
            display: none;
        }

        .additional-content.visible {
            display: block;
            animation: fadeIn 0.5s;
        }

        /* Styles for the new Profile + Logout container */
        .profile-container {
            display: flex;
            align-items: center;
        }


        /* Styles for the Logout Button */
        .logout-btn {
            /* CHANGED THIS LINE - Increased the margin for more space */
            margin-left: 25px;
            color: var(--text-light);
            /* Sets the initial icon color */
            cursor: pointer;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            color: var(--primary-color);
            /* Changes color on hover */
        }

        /* Make sure the original user-profile cursor is default */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: default;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
       @include('customer.layouts.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation Bar -->
           @include('customer.layouts.navbar')

            <!-- Main Content Sections -->
            <main class="p-6">
                <!-- Dashboard Section -->
                <section id="dashboard" class="content-section active">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>

                    <!-- User Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-center mb-4 md:mb-0">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                    class="w-16 h-16 rounded-full mr-4">
                                <div>
                                    <h3 class="text-xl font-bold">Dr. John Smith</h3>
                                    <p class="text-gray-600">john.smith@example.com</p>
                                </div>
                            </div>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200"
                                onclick="document.querySelector('nav a[data-section=\"profile\"]').click()">
                                Edit Profile
                            </button>
                        </div>
                    </div>

                    <!-- Key Metrics -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Saved Businesses</p>
                                    <p class="text-2xl font-bold">24</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Active Inquiries</p>
                                    <p class="text-2xl font-bold">12</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Total Reviews</p>
                                    <p class="text-2xl font-bold">38</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                                    <i class="fas fa-reply"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Response Rate</p>
                                    <p class="text-2xl font-bold">92%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Saved Businesses -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Saved Businesses</h3>
                            <button id="viewAllBusinesses" class="text-blue-600 hover:text-blue-800">View All</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Business Card 1 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">MediPharm Solutions</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Manufacturer</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="MediPharm Solutions" data-type="Manufacturer"
                                        data-description="A leading pharmaceutical manufacturer specializing in oncology drugs and innovative treatments. With over 20 years of experience in the industry, we provide high-quality medications and research partnerships."
                                        data-contact="contact@medipharm.com | +1 (800) 123-4567">
                                        Quick View
                                    </button>
                                </div>
                            </div>

                            <!-- Business Card 2 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">Global Pharma Supply</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Supplier</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="Global Pharma Supply" data-type="Supplier"
                                        data-description="International pharmaceutical supplier with a network of over 50 countries. We specialize in bulk orders, rare medications, and time-sensitive deliveries with a 98% on-time delivery rate."
                                        data-contact="sales@globalpharmasupply.com | +1 (800) 987-6543">
                                        Quick View
                                    </button>
                                </div>
                            </div>

                            <!-- Business Card 3 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">BioTech Labs</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Research Partner</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="BioTech Labs" data-type="Research Partner"
                                        data-description="Cutting-edge biotechnology research facility specializing in oncology, immunology, and rare diseases. We offer clinical trial partnerships, research collaborations, and innovative treatment solutions."
                                        data-contact="research@biotechlabs.com | +1 (800) 555-7890">
                                        Quick View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Business Cards (hidden by default) -->
                        <div id="additionalBusinesses"
                            class="additional-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                            <!-- Business Card 4 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">PharmaPlus Distributors</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Distributor</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="PharmaPlus Distributors" data-type="Distributor"
                                        data-description="Regional pharmaceutical distributor serving the Northeast US with same-day delivery options. We carry over 5,000 SKUs including generics, brand names, and specialty medications."
                                        data-contact="orders@pharmaplus.com | +1 (800) 222-3333">
                                        Quick View
                                    </button>
                                </div>
                            </div>

                            <!-- Business Card 5 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">Clinical Research Partners</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Research Organization</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="Clinical Research Partners" data-type="Research Organization"
                                        data-description="Full-service clinical research organization (CRO) providing Phase I-IV clinical trial management, regulatory consulting, and data management services to pharmaceutical and biotechnology companies."
                                        data-contact="info@clinicalresearchpartners.com | +1 (800) 444-5555">
                                        Quick View
                                    </button>
                                </div>
                            </div>

                            <!-- Business Card 6 -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-lg">VitalCare Pharmaceuticals</h4>
                                        <span class="status-badge status-verified">Verified</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">Manufacturer</p>
                                    <button
                                        class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 py-2 rounded-lg transition duration-200 quick-view-btn"
                                        data-title="VitalCare Pharmaceuticals" data-type="Manufacturer"
                                        data-description="Specialty pharmaceutical manufacturer focused on cardiovascular, diabetes, and CNS medications. Our state-of-the-art facilities are FDA-approved and cGMP compliant."
                                        data-contact="sales@vitalcarepharma.com | +1 (800) 777-8888">
                                        Quick View
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Inquiries -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Recent Inquiries</h3>
                            <button id="viewAllInquiries" class="text-blue-600 hover:text-blue-800">View All</button>
                        </div>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Business Name</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Inquiry Date</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">MediPharm Solutions</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-06-15</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="status-badge status-pending">Pending</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-blue-600 hover:text-blue-800 view-details-btn"
                                                    data-title="Oncology Drug Inquiry" data-date="2023-06-15"
                                                    data-status="Pending"
                                                    data-content="Inquiry about availability and pricing for new oncology drug XZ-450 for clinical trials. Need information on bulk pricing, stability data, and regulatory documentation. Also interested in potential research collaboration opportunities.">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Global Pharma Supply</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-06-10</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="status-badge status-replied">Replied</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-blue-600 hover:text-blue-800 view-details-btn"
                                                    data-title="Order Status Inquiry" data-date="2023-06-10"
                                                    data-status="Replied"
                                                    data-content="Following up on order #GPS-2023-1234 for 500 units of Medication Y. Originally placed on 2023-06-05 with estimated delivery date of 2023-06-15. Requesting tracking information and confirmation of shipment.">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">BioTech Labs</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-05-28</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="status-badge status-closed">Closed</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-blue-600 hover:text-blue-800 view-details-btn"
                                                    data-title="Research Collaboration Proposal"
                                                    data-date="2023-05-28" data-status="Closed"
                                                    data-content="Proposal for joint research study on new immunotherapy approach for pancreatic cancer. Our institution would provide clinical expertise and patient access, seeking partner for drug supply and additional funding. Timeline would be 18-24 months with estimated 200 participants across 5 sites.">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Additional Inquiries (hidden by default) -->
                        <div id="additionalInquiries"
                            class="additional-content bg-white rounded-lg shadow-md overflow-hidden mt-4">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">PharmaPlus Distributors</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-05-20</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="status-badge status-closed">Closed</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-blue-600 hover:text-blue-800 view-details-btn"
                                                    data-title="Urgent Medication Request" data-date="2023-05-20"
                                                    data-status="Closed"
                                                    data-content="Urgent request for 100 units of Medication Z for emergency use at our facility. Need confirmation of availability and expedited shipping options. This is time-sensitive as our current stock will be depleted within 48 hours.">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Clinical Research Partners</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-05-15</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="status-badge status-replied">Replied</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-blue-600 hover:text-blue-800 view-details-btn"
                                                    data-title="Regulatory Documentation Request"
                                                    data-date="2023-05-15" data-status="Replied"
                                                    data-content="Request for complete regulatory documentation package for Medication A to submit to FDA for new indication approval. Need Certificate of Analysis, Stability Data, and Manufacturing Process details by 2023-06-01 to meet submission deadline.">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Posted Reviews -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">Posted Reviews</h3>
                            <button id="viewAllReviews" class="text-blue-600 hover:text-blue-800">View All</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Review Card 1 -->
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold">MediPharm Solutions</h4>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">"Excellent quality products and reliable delivery. Highly
                                    recommended for pharmaceutical needs."</p>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button class="text-[#1544da] hover:text-blue-800">Delete</button>
                                </div>
                            </div>

                            <!-- Review Card 2 -->
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold">Global Pharma Supply</h4>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">"Great customer service and competitive pricing. Will
                                    definitely order again."</p>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button class="text-[#1544da] hover:text-blue-800">Delete</button>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Reviews (hidden by default) -->
                        <div id="additionalReviews"
                            class="additional-content grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <!-- Review Card 3 -->
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold">BioTech Labs</h4>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">"Outstanding research partnership. Their team is
                                    knowledgeable, responsive, and truly collaborative."</p>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button class="text-[#1544da] hover:text-blue-800">Delete</button>
                                </div>
                            </div>

                            <!-- Review Card 4 -->
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold">PharmaPlus Distributors</h4>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">"Good selection and fast delivery, but had one incorrect
                                    item in our last order which took time to resolve."</p>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button class="text-[#1544da] hover:text-blue-800">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ad Banner -->
                    <div class="container mx-auto px-4 py-6">
                        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                            class="w-full h-auto mx-auto">
                    </div>
                </section>


            </main>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="overlay"></div>

    <!-- Modal for Business Details -->
    <div id="businessModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalBusinessTitle" class="text-xl font-bold"></h3>
                <button class="text-gray-400 hover:text-gray-600 close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <span id="modalBusinessType" class="status-badge status-verified"></span>
                </div>
                <div class="mb-4">
                    <h4 class="font-bold mb-2">Description</h4>
                    <p id="modalBusinessDescription" class="text-gray-700"></p>
                </div>
                <div>
                    <h4 class="font-bold mb-2">Contact Information</h4>
                    <p id="modalBusinessContact" class="text-gray-700"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 close-modal">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Inquiry Details -->
    <div id="inquiryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalInquiryTitle" class="text-xl font-bold"></h3>
                <button class="text-gray-400 hover:text-gray-600 close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <h4 class="font-bold mb-1">Date</h4>
                        <p id="modalInquiryDate" class="text-gray-700"></p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Status</h4>
                        <p id="modalInquiryStatus" class="text-gray-700"></p>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-2">Details</h4>
                    <p id="modalInquiryContent" class="text-gray-700"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 close-modal">
                    Close
                </button>
                <button
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200 ml-2">
                    Reply
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Account Confirmation -->
    <div id="deleteAccountModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-xl font-bold text-[#1544da]">Confirm Account Deletion</h3>
                <button class="text-gray-400 hover:text-gray-600 close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-gray-700 mb-4">Are you sure you want to delete your account? This action cannot be
                    undone. All your data will be permanently removed from our systems.</p>
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="confirmDelete" class="mr-2">
                    <label for="confirmDelete">I understand that this action is irreversible</label>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200 close-modal">
                    Cancel
                </button>
                <button
                    class="bg-[#1544da] hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition duration-200 ml-2"
                    id="confirmDeleteBtn" disabled>
                    Delete Account
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Hamburger menu for mobile
            const hamburger = document.querySelector('.hamburger');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');

            hamburger.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                this.classList.remove('open');
            });

            // Notification toggle functionality
            const toggleSwitches = document.querySelectorAll('.notification-toggle');
            toggleSwitches.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const isChecked = this.checked;
                    // You would typically save this preference to a database here
                    console.log(`Toggle ${this.id} is now ${isChecked ? 'on' : 'off'}`);

                    // Visual feedback
                    const toggleContainer = this.nextElementSibling;
                    if (isChecked) {
                        toggleContainer.classList.remove('bg-gray-200');
                        toggleContainer.classList.add('bg-blue-600');
                    } else {
                        toggleContainer.classList.remove('bg-blue-600');
                        toggleContainer.classList.add('bg-gray-200');
                    }
                });
            });


            // Business Quick View Modal
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const businessModal = document.getElementById('businessModal');

            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('modalBusinessTitle').textContent = this.getAttribute(
                        'data-title');
                    document.getElementById('modalBusinessType').textContent = this.getAttribute(
                        'data-type');
                    document.getElementById('modalBusinessDescription').textContent = this
                        .getAttribute('data-description');
                    document.getElementById('modalBusinessContact').textContent = this.getAttribute(
                        'data-contact');

                    businessModal.style.display = 'flex';
                });
            });

            // Inquiry Details Modal
            const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
            const inquiryModal = document.getElementById('inquiryModal');

            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('modalInquiryTitle').textContent = this.getAttribute(
                        'data-title');
                    document.getElementById('modalInquiryDate').textContent = this.getAttribute(
                        'data-date');

                    const status = this.getAttribute('data-status');
                    const statusElement = document.getElementById('modalInquiryStatus');
                    statusElement.textContent = status;
                    statusElement.className = '';

                    if (status === 'Pending') {
                        statusElement.classList.add('status-badge', 'status-pending');
                    } else if (status === 'Replied') {
                        statusElement.classList.add('status-badge', 'status-replied');
                    } else if (status === 'Closed') {
                        statusElement.classList.add('status-badge', 'status-closed');
                    }

                    document.getElementById('modalInquiryContent').textContent = this.getAttribute(
                        'data-content');

                    inquiryModal.style.display = 'flex';
                });
            });

            // Close Modal
            const closeModalButtons = document.querySelectorAll('.close-modal');

            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    businessModal.style.display = 'none';
                    inquiryModal.style.display = 'none';
                    deleteAccountModal.style.display = 'none';
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === businessModal) {
                    businessModal.style.display = 'none';
                }
                if (e.target === inquiryModal) {
                    inquiryModal.style.display = 'none';
                }
                if (e.target === deleteAccountModal) {
                    deleteAccountModal.style.display = 'none';
                }
            });

            // View All Buttons Functionality
            document.getElementById('viewAllBusinesses').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalBusinesses');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            document.getElementById('viewAllInquiries').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalInquiries');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            document.getElementById('viewAllReviews').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalReviews');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            // Messaging Functionality
            const messageInput = document.getElementById('messageInput');
            const sendMessageBtn = document.getElementById('sendMessageBtn');
            const messageContainer = document.getElementById('messageContainer');

            sendMessageBtn.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            function sendMessage() {
                const messageText = messageInput.value.trim();
                if (messageText) {
                    const now = new Date();
                    const hours = now.getHours();
                    const minutes = now.getMinutes();
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    const formattedHours = hours % 12 || 12;
                    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
                    const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'flex justify-end mb-4';
                    messageDiv.innerHTML = `
                        <div class="text-right">
                            <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
                                <p>${messageText}</p>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">${timeString}</p>
                        </div>
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full ml-3">
                    `;

                    messageContainer.appendChild(messageDiv);
                    messageInput.value = '';
                    messageContainer.scrollTop = messageContainer.scrollHeight;

                    // Simulate reply after 1-3 seconds
                    setTimeout(simulateReply, 1000 + Math.random() * 2000);
                }
            }

            function simulateReply() {
                const replies = [
                    "We'll check on that and get back to you shortly.",
                    "Thanks for your message. Our team is looking into your request.",
                    "Can you provide more details about what you need?",
                    "We've noted your request and will update you soon.",
                    "Your message has been forwarded to the relevant department."
                ];

                const randomReply = replies[Math.floor(Math.random() * replies.length)];
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = hours % 12 || 12;
                const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
                const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

                const messageDiv = document.createElement('div');
                messageDiv.className = 'flex mb-4';
                messageDiv.innerHTML = `
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="User" class="w-8 h-8 rounded-full mr-3">
                    <div>
                        <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
                            <p>${randomReply}</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">${timeString}</p>
                    </div>
                `;

                messageContainer.appendChild(messageDiv);
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }

            // Conversation switching
            const conversationItems = document.querySelectorAll('.conversation-item');
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversationItems.forEach(conv => {
                        conv.classList.remove('bg-blue-50');
                    });

                    // Add active class to clicked conversation
                    this.classList.add('bg-blue-50');

                    // Here you would typically load the conversation messages from your backend
                    // For demo purposes, we'll just show a loading message and then simulate loading
                    messageContainer.innerHTML = `
                        <div class="flex justify-center items-center h-full">
                            <div class="text-gray-500">Loading conversation...</div>
                        </div>
                    `;

                    setTimeout(() => {
                        const conversationId = this.getAttribute('data-conversation');
                        loadConversation(conversationId);
                    }, 800);
                });
            });

            function loadConversation(conversationId) {
                // In a real app, you would fetch the conversation from your backend
                // For demo purposes, we'll just show some sample messages
                const conversations = {
                    '1': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
                            text: 'Hello Dr. Smith, thank you for your inquiry about our new oncology drugs. How can we assist you today?',
                            time: '9:15 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: "I'm interested in learning more about your XZ-450 drug for our clinical trials. Can you send me the trial data and pricing information?",
                            time: '9:20 AM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
                            text: 'Certainly! I\'ve attached the Phase II trial data and our pricing sheet. Let me know if you need any additional information.',
                            time: '9:25 AM'
                        }
                    ],
                    '2': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
                            text: 'Hello Dr. Smith, your order #12345 has been shipped and will arrive on June 20th.',
                            time: '10:30 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'Thank you for the update. Could you provide the tracking number?',
                            time: '10:35 AM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
                            text: 'Of course! The tracking number is GPS123456789. You can track it on our website.',
                            time: '10:38 AM'
                        }
                    ],
                    '3': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
                            text: 'Thank you for your recent review of our clinical trial services and research facilities.',
                            time: '2:15 PM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'You\'re welcome. Your team did an excellent job on the recent study. I especially appreciated Dr. Johnson\'s attention to detail.',
                            time: '2:30 PM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
                            text: 'We appreciate your feedback! Would you be interested in collaborating on our upcoming pancreatic cancer study?',
                            time: '3:45 PM'
                        }
                    ],
                    '4': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/55.jpg',
                            text: 'Your recent order has been processed and is ready for pickup at our warehouse.',
                            time: '11:05 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'Great! What are your warehouse hours this week?',
                            time: '11:15 AM'
                        }
                    ],
                    '5': [{
                        sender: 'them',
                        avatar: 'https://randomuser.me/api/portraits/women/66.jpg',
                        text: 'We\'ve reviewed your proposal and would like to schedule a meeting to discuss next steps.',
                        time: '1:20 PM'
                    }]
                };

                const messages = conversations[conversationId] || [];

                let messagesHTML = '';
                messages.forEach(msg => {
                    if (msg.sender === 'me') {
                        messagesHTML += `
                            <div class="flex justify-end mb-4">
                                <div class="text-right">
                                    <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
                                        <p>${msg.text}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
                                </div>
                                <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full ml-3">
                            </div>
                        `;
                    } else {
                        messagesHTML += `
                            <div class="flex mb-4">
                                <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <div>
                                    <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
                                        <p>${msg.text}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
                                </div>
                            </div>
                        `;
                    }
                });

                messageContainer.innerHTML = messagesHTML;
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }

            // Load more conversations
            document.getElementById('loadMoreConversations').addEventListener('click', function() {
                const additionalConversations = document.querySelectorAll('.additional-conversation');
                additionalConversations.forEach(conv => {
                    conv.style.display = 'flex';
                });
                this.style.display = 'none';
            });

            // Notification functionality
            document.getElementById('clearAllNotifications').addEventListener('click', function() {
                const notificationItems = document.querySelectorAll('.notification-item');
                notificationItems.forEach(item => {
                    item.remove();
                });
            });

            document.querySelectorAll('.remove-notification').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    this.closest('.notification-item').remove();
                });
            });

            // Load more notifications
            document.getElementById('loadMoreNotifications').addEventListener('click', function() {
                const additionalNotifications = document.querySelectorAll('.additional-notification');
                additionalNotifications.forEach(notif => {
                    notif.style.display = 'flex';
                });
                this.style.display = 'none';
            });

            // Delete account functionality
            const deleteAccountBtn = document.getElementById('deleteAccountBtn');
            const deleteAccountModal = document.getElementById('deleteAccountModal');
            const confirmDelete = document.getElementById('confirmDelete');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            deleteAccountBtn.addEventListener('click', function() {
                deleteAccountModal.style.display = 'flex';
            });

            confirmDelete.addEventListener('change', function() {
                confirmDeleteBtn.disabled = !this.checked;
            });

            confirmDeleteBtn.addEventListener('click', function() {
                if (confirmDelete.checked) {
                    alert(
                        'Account deletion requested. In a real application, this would delete your account.');
                    deleteAccountModal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
