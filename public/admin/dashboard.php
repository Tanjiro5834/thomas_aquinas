<?php
require_once __DIR__ . '/../../app/Controller/EnrollmentController.php';

$controller = new EnrollmentController();
$enrollments = $controller->getPending();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Thomas Aquinas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; }
        .sidebar-item.active { background: rgba(255, 255, 255, 0.1); border-left: 4px solid #fbbf24; }
        .status-pill-pending { background-color: #fef9c3; color: #854d0e; }
        .status-pill-approved { background-color: #dcfce7; color: #166534; }
        .status-pill-rejected { background-color: #fee2e2; color: #991b1b; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="min-h-screen flex overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0a1d37] text-white hidden lg:flex flex-col flex-shrink-0">
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2940/2940651.png" alt="Logo" class="w-8 h-8 bg-white rounded-full p-1">
                <span class="font-bold tracking-widest text-sm uppercase">ST. Thomas Aquinas</span>
            </div>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <button onclick="showSection('dashboard', event)" class="sidebar-item active w-full flex items-center space-x-3 p-3 rounded-lg transition-all text-sm font-medium">
                <i class="fas fa-th-large w-5"></i><span>Overview</span>
            </button>
            <button onclick="showSection('enrollments', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100 text-sm font-medium">
                <i class="fas fa-user-plus w-5"></i><span>Enrollments</span>
            </button>
            <button onclick="showSection('announcements', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100 text-sm font-medium">
                <i class="fas fa-bullhorn w-5"></i><span>Announcements</span>
            </button>
            <button onclick="showSection('calendar', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100 text-sm font-medium">
                <i class="fas fa-calendar-alt w-5"></i><span>School Calendar</span>
            </button>
        </nav>
        <div class="p-6 border-t border-white/10">
            <a href="#" class="flex items-center space-x-3 text-red-400 hover:text-red-300 text-sm font-bold">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Content -->
    <main class="flex-grow flex flex-col h-screen overflow-hidden">
        <header class="bg-white border-b h-16 flex items-center justify-between px-8 flex-shrink-0">
            <h2 id="sectionTitle" class="font-bold text-lg text-gray-800">Dashboard Overview</h2>
            <div class="flex items-center space-x-4">
                <span class="text-xs font-bold text-green-500 bg-green-50 px-3 py-1 rounded-full border border-green-100">System Online</span>
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold text-xs shadow-sm">AD</div>
            </div>
        </header>

        <div class="flex-grow overflow-y-auto p-8" id="mainView">
            
            <!-- Dashboard Section -->
            <div id="section-dashboard" class="space-y-8 animate-in fade-in duration-300">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl border shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-blue-100 text-blue-600 rounded-xl"><i class="fas fa-users text-xl"></i></div>
                            <span class="text-xs font-bold text-blue-600">+12%</span>
                        </div>
                        <h4 class="text-2xl font-bold">1,248</h4>
                        <p class="text-gray-400 text-sm">Total Students</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-yellow-100 text-yellow-600 rounded-xl"><i class="fas fa-clock text-xl"></i></div>
                            <span class="text-xs font-bold text-yellow-600">Pending</span>
                        </div>
                        <h4 class="text-2xl font-bold">42</h4>
                        <p class="text-gray-400 text-sm">New Enrollments</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-green-100 text-green-600 rounded-xl"><i class="fas fa-check-circle text-xl"></i></div>
                            <span class="text-xs font-bold text-green-600">Active</span>
                        </div>
                        <h4 class="text-2xl font-bold">98.2%</h4>
                        <p class="text-gray-400 text-sm">Attendance Rate</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border shadow-sm p-6">
                    <h3 class="font-bold mb-6 flex items-center space-x-2">
                        <i class="fas fa-history text-gray-400"></i>
                        <span>Recent Activity</span>
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between py-2 border-b last:border-0">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center font-bold text-xs uppercase">JD</div>
                                <div>
                                    <p class="text-sm font-bold">John Doe submitted an enrollment</p>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Grade 11 - STEM • 2 mins ago</p>
                                </div>
                            </div>
                            <button class="text-blue-500 text-xs font-bold hover:underline">View Details</button>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b last:border-0">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-xs uppercase">MS</div>
                                <div>
                                    <p class="text-sm font-bold">New Announcement Published</p>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Academic Calendar Update • 1 hour ago</p>
                                </div>
                            </div>
                            <button class="text-blue-500 text-xs font-bold hover:underline">View</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enrollments Section -->
            <div id="section-enrollments" class="hidden space-y-6 animate-in fade-in duration-300">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Search students by name or ID..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                    </div>
                    <div class="flex items-center space-x-3">
                        <select class="bg-white border border-gray-200 px-4 py-2.5 rounded-xl text-sm focus:outline-none">
                            <option>All Statuses</option>
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Rejected</option>
                        </select>
                        <button class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all flex items-center space-x-2">
                            <i class="fas fa-download"></i>
                            <span>Export CSV</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Student Name</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Grade Level</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Submission Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        <?php if (!empty($enrollments)): ?>
                            <?php foreach ($enrollments as $row): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">

                                    <!-- STUDENT NAME -->
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-gray-800">
                                            <?= htmlspecialchars($row['firstName'] . ' ' . $row['lastName']) ?>
                                        </p>
                                    </td>

                                    <!-- GRADE LEVEL -->
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">
                                            <?= htmlspecialchars($row['gradeLevel']) ?>
                                        </span>
                                    </td>

                                    <!-- SUBMISSION DATE -->
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">
                                            <?= date("M d, Y h:i A", strtotime($row['created_at'])) ?>
                                        </span>
                                    </td>

                                    <!-- STATUS -->
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                            <?= $row['status'] === 'pending' ? 'status-pill-pending' :
                                                ($row['status'] === 'approved' ? 'status-pill-approved' :
                                                'status-pill-rejected') ?>">
                                            <?= htmlspecialchars($row['status']) ?>
                                        </span>
                                    </td>

                                    <!-- ACTIONS -->
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-blue-500">View</button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-400">
                                    No enrollments found.
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Announcements Section -->
            <div id="section-announcements" class="hidden space-y-6 animate-in fade-in duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Recent Announcements</h3>
                        <p class="text-sm text-gray-500">Manage what appears on the school news board</p>
                    </div>
                    <button class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>New Announcement</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Announcement Card -->
                    <div class="bg-white border rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-full uppercase tracking-widest">Academic</span>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-500"><i class="fas fa-edit"></i></button>
                                    <button class="text-gray-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Midterm Examination Schedule</h4>
                            <p class="text-sm text-gray-600 line-clamp-2">The examination for the first semester will start on November 15th. Please ensure all student clearances are settled.</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between border-t pt-4">
                            <span class="text-[10px] text-gray-400 uppercase font-medium">Published Oct 20, 2023</span>
                            <div class="flex items-center space-x-2">
                                <span class="text-[10px] font-bold text-green-600">Live</span>
                                <div class="w-8 h-4 bg-green-500 rounded-full relative cursor-pointer">
                                    <div class="absolute right-0.5 top-0.5 w-3 h-3 bg-white rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Announcement Card 2 -->
                    <div class="bg-white border rounded-2xl p-6 shadow-sm flex flex-col justify-between opacity-70">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <span class="px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-bold rounded-full uppercase tracking-widest">Holiday</span>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-500"><i class="fas fa-edit"></i></button>
                                    <button class="text-gray-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Semestral Break Notice</h4>
                            <p class="text-sm text-gray-600 line-clamp-2">Classes will be suspended from Oct 30 to Nov 3 for the semestral break and All Saints Day.</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between border-t pt-4">
                            <span class="text-[10px] text-gray-400 uppercase font-medium">Draft • Oct 15, 2023</span>
                            <div class="flex items-center space-x-2">
                                <span class="text-[10px] font-bold text-gray-400">Offline</span>
                                <div class="w-8 h-4 bg-gray-200 rounded-full relative cursor-pointer">
                                    <div class="absolute left-0.5 top-0.5 w-3 h-3 bg-white rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar Section -->
            <div id="section-calendar" class="hidden space-y-6 animate-in fade-in duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">School Calendar 2023-2024</h3>
                        <p class="text-sm text-gray-500">Scheduled events, holidays, and school activities</p>
                    </div>
                    <button class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all flex items-center space-x-2">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Add Event</span>
                    </button>
                </div>

                <div class="bg-white rounded-2xl border shadow-sm p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Date Picker / Mini Cal Placeholder -->
                        <div class="lg:col-span-4 border-r pr-8">
                            <div class="text-center mb-6">
                                <p class="text-blue-600 font-bold text-sm uppercase">October 2023</p>
                                <h1 class="text-4xl font-black text-gray-800">24</h1>
                                <p class="text-gray-400 text-sm">Tuesday</p>
                            </div>
                            <div class="space-y-4">
                                <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                    <p class="text-xs font-bold text-blue-600 uppercase mb-1 tracking-widest">Today's Event</p>
                                    <p class="text-sm font-bold text-gray-800">Faculty Meeting</p>
                                    <p class="text-xs text-gray-500">2:00 PM - Conference Hall</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Event List -->
                        <div class="lg:col-span-8">
                            <h4 class="font-bold text-sm text-gray-400 uppercase tracking-widest mb-6">Upcoming Events</h4>
                            <div class="space-y-4">
                                <!-- Event Item -->
                                <div class="flex items-center p-4 hover:bg-gray-50 rounded-xl transition-all border border-transparent hover:border-gray-100 group">
                                    <div class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex flex-col items-center justify-center font-bold mr-4">
                                        <span class="text-xs leading-none">OCT</span>
                                        <span class="text-lg leading-none">30</span>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="text-sm font-bold text-gray-800">Semestral Break Starts</h5>
                                        <p class="text-xs text-gray-500">No classes for all levels</p>
                                    </div>
                                    <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-blue-600"><i class="fas fa-edit text-xs"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600"><i class="fas fa-trash text-xs"></i></button>
                                    </div>
                                </div>
                                <!-- Event Item -->
                                <div class="flex items-center p-4 hover:bg-gray-50 rounded-xl transition-all border border-transparent hover:border-gray-100 group">
                                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-lg flex flex-col items-center justify-center font-bold mr-4">
                                        <span class="text-xs leading-none">NOV</span>
                                        <span class="text-lg leading-none">06</span>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="text-sm font-bold text-gray-800">Resumption of Classes</h5>
                                        <p class="text-xs text-gray-500">Second Quarter Kick-off</p>
                                    </div>
                                    <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-blue-600"><i class="fas fa-edit text-xs"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600"><i class="fas fa-trash text-xs"></i></button>
                                    </div>
                                </div>
                                <!-- Event Item -->
                                <div class="flex items-center p-4 hover:bg-gray-50 rounded-xl transition-all border border-transparent hover:border-gray-100 group">
                                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-lg flex flex-col items-center justify-center font-bold mr-4">
                                        <span class="text-xs leading-none">NOV</span>
                                        <span class="text-lg leading-none">15</span>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="text-sm font-bold text-gray-800">Midterm Exams</h5>
                                        <p class="text-xs text-gray-500">3-day evaluation period</p>
                                    </div>
                                    <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-blue-600"><i class="fas fa-edit text-xs"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600"><i class="fas fa-trash text-xs"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showSection(sectionId, event) {
            const titles = {
                'dashboard': 'Dashboard Overview',
                'enrollments': 'Manage Enrollments',
                'announcements': 'Manage Announcements',
                'calendar': 'School Events Calendar'
            };
            
            document.getElementById('sectionTitle').innerText = titles[sectionId];

            const sections = ['dashboard', 'enrollments', 'announcements', 'calendar'];
            sections.forEach(id => {
                const el = document.getElementById(`section-${id}`);
                if (el) el.classList.add('hidden');
            });
            
            const target = document.getElementById(`section-${sectionId}`);
            if (target) {
                target.classList.remove('hidden');
            }

            // Update sidebar active states
            document.querySelectorAll('.sidebar-item').forEach(btn => {
                btn.classList.remove('active', 'opacity-100');
                btn.classList.add('opacity-60');
            });
            
            if (event && event.currentTarget) {
                event.currentTarget.classList.add('active', 'opacity-100');
                event.currentTarget.classList.remove('opacity-60');
            }
        }
    </script>
</body>
</html>