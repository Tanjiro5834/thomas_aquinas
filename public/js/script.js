const programs = {
  preschool: {
    title: "Pre-School",
    image:
      "https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=80",
    strands: [
      {
        name: "Nursery",
        desc: "Introduction to social skills and motor development through sensory play.",
      },
      {
        name: "Kindergarten",
        desc: "Preparing young learners with foundational literacy and numeracy skills.",
      },
    ],
  },
  elementary: {
    title: "Elementary",
    image:
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80",
    strands: [
      {
        name: "Primary (Grades 1-3)",
        desc: "Mastering reading, writing, and basic mathematics.",
      },
      {
        name: "Intermediate (Grades 4-6)",
        desc: "In-depth exploration of Science, Social Studies, and Creative Arts.",
      },
    ],
  },
  jhs: {
    title: "Junior High School",
    image:
      "https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80",
    strands: [
      {
        name: "General Curriculum",
        desc: "Robust academic training covering standard K-12 requirements with heavy values integration.",
      },
    ],
  },
  shs: {
    title: "Senior High School",
    image:
      "https://images.unsplash.com/photo-1525921429624-479b6a26d84d?auto=format&fit=crop&w=800&q=80",
    strands: [
      {
        name: "STEM",
        desc: "Science, Technology, Engineering, and Mathematics. Focus on research and technical skills.",
      },
      {
        name: "ABM",
        desc: "Accountancy, Business, and Management. Training for future entrepreneurs and corporate leaders.",
      },
      {
        name: "HUMSS",
        desc: "Humanities and Social Sciences. For students pursuing Law, Communication, or Teaching.",
      },
      {
        name: "GAS",
        desc: "General Academic Strand. A flexible path for undecided college majors.",
      },
    ],
  },
};

// Sidebar Logic
const sidebar = document.getElementById("programSidebar");
const overlay = document.getElementById("sidebarOverlay");
const content = document.getElementById("sidebarContent");

function openProgram(key) {
  const data = programs[key];
  content.innerHTML = `
                <img src="${data.image}" alt="${data.title}" class="w-full h-48 object-cover rounded-2xl mb-8 shadow-md">
                <h3 class="text-3xl font-bold text-[#0a1d37] mb-2 serif-font">${data.title}</h3>
                <div class="w-12 h-1 bg-yellow-400 mb-8"></div>
                <div class="space-y-6">
                    ${data.strands
                      .map(
                        (s) => `
                        <div class="p-4 bg-gray-50 rounded-xl border-l-4 border-blue-900">
                            <h5 class="font-bold text-[#0a1d37]">${s.name}</h5>
                            <p class="text-sm text-gray-500 mt-1">${s.desc}</p>
                        </div>
                    `,
                      )
                      .join("")}
                </div>
                <div class="mt-12 p-6 bg-blue-50 rounded-2xl">
                    <p class="text-sm font-bold text-blue-900">Interested in this program?</p>
                    <a href="enrollment_page.html" class="mt-4 block text-center py-3 bg-[#0a1d37] text-white rounded-lg font-bold">Apply Now</a>
                </div>
            `;
  sidebar.classList.remove("translate-x-full");
  overlay.classList.add("active");
  document.body.style.overflow = "hidden";
}

function close() {
  sidebar.classList.add("translate-x-full");
  overlay.classList.remove("active");
  document.body.style.overflow = "";
}

document.getElementById("closeSidebar").addEventListener("click", close);
overlay.addEventListener("click", close);

// Scroll Animations
function reveal() {
  var reveals = document.querySelectorAll(".reveal");
  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    if (elementTop < windowHeight - 100) {
      reveals[i].classList.add("active");
    }
  }
}
window.addEventListener("scroll", reveal);
window.onload = reveal;
