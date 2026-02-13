<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Thomas Aquinas Institute of Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="design/index.css">
    
</head>
<body class="bg-gray-50 text-slate-800">

    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 opacity-0 z-[90]"></div>

    <!-- Program Details Sidebar -->
    <div id="programSidebar" class="fixed top-0 right-0 h-full w-full md:w-[450px] bg-white shadow-2xl translate-x-full overflow-y-auto">
        <div class="relative p-8">
            <button id="closeSidebar" class="absolute top-6 right-6 text-2xl hover:text-red-500 transition-colors">
                <i class="fas fa-times"></i>
            </button>
            
            <div id="sidebarContent">
                <!-- Content injected via JS -->
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-[#0a1d37] text-white shadow-xl py-4" id="mainNav">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="./images/thomas_aquinas_logo.jpg" alt="Logo" class="w-10 h-10 bg-white rounded-full p-1">
                <div>
                    <h1 class="font-bold text-sm tracking-widest uppercase leading-none">The Thomas Aquinas</h1>
                    <p class="text-[10px] text-yellow-400">INSTITUTE OF LEARNING</p>
                </div>
            </div>
            
            <div class="hidden md:flex space-x-8 font-medium text-sm items-center">
                <a href="#home" class="hover:text-yellow-400 transition-colors">Home</a>
                <a href="#about" class="hover:text-yellow-400 transition-colors">About Us</a>
                <a href="#programs" class="hover:text-yellow-400 transition-colors">Programs</a>
                <a href="#updates" class="hover:text-yellow-400 transition-colors">News</a>
                <a href="enrollment_page.html" class="bg-yellow-400 text-[#0a1d37] px-6 py-2 rounded-full font-bold hover:bg-white transition-colors">Enroll Now</a>
            </div>

            <button class="md:hidden text-2xl" id="menuBtn"><i class="fas fa-bars"></i></button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="text-white space-y-6 reveal active">
                <span class="inline-block px-4 py-1 bg-yellow-400 text-[#0a1d37] rounded-full text-xs font-bold tracking-widest uppercase">Admission S.Y. 2025-2026</span>
                <h2 class="text-5xl md:text-7xl serif-font leading-tight">Preparing Tomorrow's Leaders Today.</h2>
                <p class="text-lg opacity-90 max-w-lg leading-relaxed font-light">
                    Diverse, Defined, Distinctive, Dedicated, and Dynamic. Join a community where excellence is a habit.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 pt-4">
                    <a href="enrollment_page.html" class="bg-yellow-400 text-[#0a1d37] px-8 py-4 rounded-lg font-bold text-center hover:scale-105 transition-transform">Start Enrollment</a>
                    <a href="#programs" class="border border-white/30 hover:bg-white/10 px-8 py-4 rounded-lg font-bold text-center transition-all">Academic Tracks</a>
                </div>
            </div>
            <div class="hidden md:block reveal active">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="Students" class="rounded-2xl shadow-2xl border-4 border-white/10">
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section id="about" class="py-24 bg-white">
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-16">
            <div class="reveal">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-blue-100 text-blue-900 rounded-full flex items-center justify-center text-xl">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-3xl serif-font text-[#0a1d37]">Our Vision</h3>
                </div>
                <p class="text-gray-600 leading-relaxed text-lg">
                    The Thomas Aquinas Institute of Learning aims to be a premium learning institution which builds a culture of excellence and dynamism today and leaders of tomorrow.
                </p>
            </div>
            <div class="reveal" style="transition-delay: 200ms;">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-yellow-100 text-yellow-700 rounded-full flex items-center justify-center text-xl">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-3xl serif-font text-[#0a1d37]">Our Mission</h3>
                </div>
                <p class="text-gray-600 leading-relaxed text-lg">
                    Strength and confidence through truthfulness and excellence in education.
                </p>
            </div>
        </div>
    </section>

    <!-- Programs Grid -->
    <section id="programs" class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <h3 class="text-[#0a1d37] text-4xl serif-font mb-4">Our Academic Programs</h3>
                <p class="text-gray-500">Click a program to see specialized tracks and strands</p>
                <div class="w-20 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div onclick="openProgram('preschool')" class="program-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl reveal">
                    <div class="w-14 h-14 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center mb-6 text-2xl"><i class="fas fa-child"></i></div>
                    <h4 class="text-xl font-bold mb-3">Pre-School</h4>
                    <p class="text-gray-600 text-sm">Nurturing young minds through play and discovery.</p>
                </div>
                <div onclick="openProgram('elementary')" class="program-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl reveal" style="transition-delay: 100ms;">
                    <div class="w-14 h-14 bg-green-100 text-green-700 rounded-xl flex items-center justify-center mb-6 text-2xl"><i class="fas fa-book-reader"></i></div>
                    <h4 class="text-xl font-bold mb-3">Elementary</h4>
                    <p class="text-gray-600 text-sm">Building strong foundations in core disciplines.</p>
                </div>
                <div onclick="openProgram('jhs')" class="program-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl reveal" style="transition-delay: 200ms;">
                    <div class="w-14 h-14 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-6 text-2xl"><i class="fas fa-user-graduate"></i></div>
                    <h4 class="text-xl font-bold mb-3">Junior High</h4>
                    <p class="text-gray-600 text-sm">Preparing for the challenges of higher education.</p>
                </div>
                <div onclick="openProgram('shs')" class="program-card bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl reveal" style="transition-delay: 300ms;">
                    <div class="w-14 h-14 bg-orange-100 text-orange-700 rounded-xl flex items-center justify-center mb-6 text-2xl"><i class="fas fa-microscope"></i></div>
                    <h4 class="text-xl font-bold mb-3">Senior High</h4>
                    <p class="text-gray-600 text-sm">Specialized strands for professional pathways.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Calendar Section -->
    <section id="updates" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Latest News -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="flex justify-between items-end">
                        <h3 class="text-3xl serif-font text-[#0a1d37]">School News</h3>
                        <a href="#" class="text-blue-600 text-sm font-bold">View All <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                    <div id="newsContainer" class="grid md:grid-cols-2 gap-6">
                        <!-- Dynamic Placeholder -->
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100 group">
                            <div class="h-48 bg-gray-200 animate-pulse"></div>
                            <div class="p-6">
                                <span class="text-[10px] font-bold text-blue-600 uppercase">Announcement</span>
                                <h4 class="font-bold mt-2 text-lg">Foundation Day 2025: "Aquinas at 20"</h4>
                                <p class="text-sm text-gray-500 mt-2">Join us for a week-long celebration of our rich history and future...</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100 group">
                            <div class="h-48 bg-gray-200 animate-pulse"></div>
                            <div class="p-6">
                                <span class="text-[10px] font-bold text-green-600 uppercase">Academic</span>
                                <h4 class="font-bold mt-2 text-lg">Top Performers of Q1 Revealed</h4>
                                <p class="text-sm text-gray-500 mt-2">Recognizing the hard work and dedication of our top-ranking students...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- School Calendar -->
                <div class="bg-[#0a1d37] rounded-3xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-6 flex items-center">
                        <i class="far fa-calendar-alt mr-3 text-yellow-400"></i>
                        Upcoming Events
                    </h3>
                    <div class="space-y-6" id="calendarContainer">
                        <div class="flex space-x-4 items-start pb-4 border-b border-white/10">
                            <div class="bg-yellow-400 text-[#0a1d37] rounded-lg p-2 text-center min-w-[50px]">
                                <span class="block text-lg font-bold">15</span>
                                <span class="text-[10px] uppercase font-bold">Oct</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm">Parent-Teacher Conference</h5>
                                <p class="text-xs text-blue-100/60 mt-1">8:00 AM - 12:00 PM | School Hall</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 items-start pb-4 border-b border-white/10">
                            <div class="bg-white/10 text-white rounded-lg p-2 text-center min-w-[50px]">
                                <span class="block text-lg font-bold">28</span>
                                <span class="text-[10px] uppercase font-bold">Oct</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm">Intramural Games 2025</h5>
                                <p class="text-xs text-blue-100/60 mt-1">Multi-purpose Sports Complex</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 items-start">
                            <div class="bg-white/10 text-white rounded-lg p-2 text-center min-w-[50px]">
                                <span class="block text-lg font-bold">01</span>
                                <span class="text-[10px] uppercase font-bold">Nov</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm">All Saints' Day (No Classes)</h5>
                                <p class="text-xs text-blue-100/60 mt-1">Public Holiday</p>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-8 py-3 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition-colors text-xs font-bold">Full Calendar View</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-24 bg-slate-100">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-3xl overflow-hidden shadow-xl grid md:grid-cols-3">
                <div class="p-10 md:col-span-1 bg-[#0a1d37] text-white">
                    <h3 class="text-3xl serif-font mb-6">Visit Us</h3>
                    <div class="space-y-6 opacity-80">
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-map-marker-alt mt-1 text-yellow-400"></i>
                            <p>Buhay na Tubig, Imus City,<br>Cavite, Philippines 4103</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-phone-alt text-yellow-400"></i>
                            <p>0999-881-2530</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-envelope text-yellow-400"></i>
                            <p>info@thomasaquinas.edu</p>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 h-[400px] relative bg-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.3547745761084!2d120.95477907441135!3d14.406700686057016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3b337369d73%3A0x182a48c2d51a9771!2sThe%20Thomas%20Aquinas%20Institute%20of%20Learning!5e0!3m2!1sen!2sph!4v1770949073923!5m2!1sen!2sph"
                        class="w-full h-full"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0a1d37] text-white py-16">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-12">
            <div class="col-span-2 space-y-6">
                <div class="flex items-center space-x-3">
                    <img src="./images/thomas_aquinas_logo.jpg" alt="Logo" class="w-10 h-10 bg-white rounded-full p-1">
                    <span class="font-bold tracking-widest text-lg">THE THOMAS AQUINAS</span>
                </div>
                <p class="text-blue-100/60 max-w-sm font-light">The Official Page of The Thomas Aquinas Institute of Learning.</p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1d37] transition-all"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1d37] transition-all"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div>
                <h5 class="font-bold mb-6 text-yellow-400 uppercase tracking-widest text-xs">Navigation</h5>
                <ul class="space-y-4 text-sm text-blue-100/60">
                    <li><a href="enrollment_page.html" class="hover:text-white">Enrollment Portal</a></li>
                    <li><a href="#" class="hover:text-white">Student Life</a></li>
                    <li><a href="#" class="hover:text-white">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto px-6 pt-16 mt-16 border-t border-white/10 text-center text-xs text-blue-100/40">
            <p>&copy; 2025 The Thomas Aquinas Institute of Learning. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>