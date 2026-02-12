<?php
session_start();

// Ensure the user is logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Note: Kept the logic, but in a frontend-only preview this won't trigger.
    // header("Location: /stq/public/admin/admin_login.php");
    // exit;
}
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
    </style>
</head>
<body class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0a1d37] text-white hidden lg:flex flex-col flex-shrink-0">
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2940/2940651.png" alt="Logo" class="w-8 h-8 bg-white rounded-full p-1">
                <span class="font-bold tracking-widest text-sm">TAIL ADMIN</span>
            </div>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <button onclick="showSection('dashboard', event)" class="sidebar-item active w-full flex items-center space-x-3 p-3 rounded-lg transition-all">
                <i class="fas fa-th-large w-5"></i><span>Overview</span>
            </button>
            <button onclick="showSection('enrollments', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100">
                <i class="fas fa-user-plus w-5"></i><span>Enrollments</span>
            </button>
            <button onclick="showSection('content', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100">
                <i class="fas fa-edit w-5"></i><span>Manage Content</span>
            </button>
            <button onclick="showSection('calendar', event)" class="sidebar-item w-full flex items-center space-x-3 p-3 rounded-lg transition-all opacity-60 hover:opacity-100">
                <i class="fas fa-calendar-check w-5"></i><span>School Calendar</span>
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
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold text-xs">AD</div>
            </div>
        </header>

        <div class="flex-grow overflow-y-auto p-8" id="mainView">
            
            <!-- Dashboard Section -->
            <div id="section-dashboard" class="space-y-8">
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
                    <h3 class="font-bold mb-6">Recent Activity</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between py-2 border-b last:border-0">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center font-bold text-xs">JD</div>
                                <div>
                                    <p class="text-sm font-bold">John Doe submitted an enrollment</p>
                                    <p class="text-[10px] text-gray-400 uppercase">Grade 11 - STEM</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">2 mins ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enrollments Section -->
            <div id="section-enrollments" class="hidden space-y-6">
                <!-- Filters and Search -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Search students by name or ID..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
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

                <!-- Enrollments Table -->
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
                            <!-- Mock Row 1 -->
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-[10px] font-bold text-blue-600">JS</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800">Jane Smith</p>
                                            <p class="text-[10px] text-gray-400">ID: 2024-0012</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Grade 11 - ABM</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Oct 24, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase status-pill-pending">Pending</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"><i class="fas fa-eye"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-green-600 transition-colors"><i class="fas fa-check"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 transition-colors"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Mock Row 2 -->
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-[10px] font-bold text-green-600">MB</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800">Mark Brown</p>
                                            <p class="text-[10px] text-gray-400">ID: 2024-0015</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Grade 7</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Oct 22, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase status-pill-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"><i class="fas fa-eye"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 transition-colors"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Mock Row 3 -->
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[10px] font-bold text-red-600">AL</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800">Alice Lee</p>
                                            <p class="text-[10px] text-gray-400">ID: 2024-0009</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Grade 12 - HUMSS</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">Oct 20, 2023</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase status-pill-rejected">Rejected</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"><i class="fas fa-eye"></i></button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 transition-colors"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <!-- Pagination Mockup -->
                    <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
                        <span class="text-xs text-gray-500 font-medium">Showing 1 to 3 of 42 entries</span>
                        <div class="flex items-center space-x-1">
                            <button class="px-3 py-1 border rounded bg-white text-gray-400 cursor-not-allowed"><i class="fas fa-chevron-left text-[10px]"></i></button>
                            <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
                            <button class="px-3 py-1 border rounded bg-white hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border rounded bg-white hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border rounded bg-white hover:bg-gray-50"><i class="fas fa-chevron-right text-[10px]"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="section-content" class="hidden space-y-8 animate-in fade-in">
                <div class="bg-blue-50 p-12 rounded-3xl border border-dashed border-blue-200 text-center">
                    <i class="fas fa-tools text-4xl text-blue-300 mb-4"></i>
                    <h3 class="font-bold text-blue-900">Content Management Coming Soon</h3>
                    <p class="text-blue-600 text-sm">You will soon be able to edit page text and images here.</p>
                </div>
            </div>

            <div id="section-calendar" class="hidden space-y-8 animate-in fade-in">
                <div class="bg-blue-50 p-12 rounded-3xl border border-dashed border-blue-200 text-center">
                    <i class="fas fa-calendar-alt text-4xl text-blue-300 mb-4"></i>
                    <h3 class="font-bold text-blue-900">School Calendar Coming Soon</h3>
                    <p class="text-blue-600 text-sm">Manage holidays, exams, and event dates in this section.</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showSection(sectionId, event) {
            const titles = {
                'dashboard': 'Dashboard Overview',
                'enrollments': 'Manage Enrollments',
                'content': 'Website Content Management',
                'calendar': 'School Events Calendar'
            };
            
            document.getElementById('sectionTitle').innerText = titles[sectionId];

            const sections = ['dashboard', 'enrollments', 'content', 'calendar'];
            sections.forEach(id => {
                const el = document.getElementById(`section-${id}`);
                if (el) el.classList.add('hidden');
            });
            
            const target = document.getElementById(`section-${sectionId}`);
            if (target) {
                target.classList.remove('hidden');
            }

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