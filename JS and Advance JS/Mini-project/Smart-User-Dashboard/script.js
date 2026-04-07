console.log("Smart User Dashboard Started");

// --------------------
// Variables, Date, Timing
// --------------------
const clock = document.getElementById("clock");

function updateClock() {
  const now = new Date();
  clock.innerText = now.toLocaleString();
}

updateClock();
setInterval(updateClock, 1000);

// --------------------
// Cookies
// --------------------
function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  const expires = "expires=" + date.toUTCString();
  document.cookie = `${name}=${value};${expires};path=/`;
}

function getCookie(name) {
  const cookieName = name + "=";
  const cookies = document.cookie.split(";");

  for (let i = 0; i < cookies.length; i++) {
    let c = cookies[i].trim();
    if (c.indexOf(cookieName) === 0) {
      return c.substring(cookieName.length);
    }
  }
  return "";
}

// --------------------
// Form Validation + Objects + Regex + Boolean
// --------------------
const userForm = document.getElementById("userForm");
const formMessage = document.getElementById("formMessage");
const welcomeMessage = document.getElementById("welcomeMessage");

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

userForm.addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const age = Number(document.getElementById("age").value);

  let isValid = true;

  if (name.length < 3) {
    formMessage.innerText = "Name must be at least 3 characters";
    formMessage.style.color = "red";
    isValid = false;
  } else if (!emailPattern.test(email)) {
    formMessage.innerText = "Enter a valid email";
    formMessage.style.color = "red";
    isValid = false;
  } else if (age < 18 || age > 60) {
    formMessage.innerText = "Age must be between 18 and 60";
    formMessage.style.color = "red";
    isValid = false;
  }

  if (!isValid) return;

  const user = {
    name: name,
    email: email,
    age: age,
    registeredAt: new Date().toLocaleString(),
    isAdult: age >= 18,
  };

  setCookie("username", user.name, 7);

  formMessage.innerText = "Registration successful";
  formMessage.style.color = "green";
  welcomeMessage.innerText = `Welcome, ${user.name}! Registered on ${user.registeredAt}`;

  updateSummary();
});

const savedUser = getCookie("username");
if (savedUser) {
  welcomeMessage.innerText = `Welcome back, ${savedUser}!`;
}

// --------------------
// Arrays + Loops + DOM
// --------------------
const taskInput = document.getElementById("taskInput");
const addTaskBtn = document.getElementById("addTaskBtn");
const taskList = document.getElementById("taskList");

let tasks = [];

addTaskBtn.addEventListener("click", function () {
  const taskValue = taskInput.value.trim();

  if (taskValue === "") {
    alert("Task cannot be empty");
    return;
  }

  const taskObj = {
    id: Math.floor(Math.random() * 100000),
    title: taskValue,
    completed: false,
  };

  tasks.push(taskObj);
  taskInput.value = "";
  renderTasks();
  updateSummary();
});

function renderTasks() {
  taskList.innerHTML = "";

  for (let i = 0; i < tasks.length; i++) {
    const li = document.createElement("li");
    li.innerText = `${i + 1}. ${tasks[i].title}`;
    taskList.appendChild(li);
  }
}

// --------------------
// AJAX / Fetch API
// --------------------
const loadUsersBtn = document.getElementById("loadUsersBtn");
const userList = document.getElementById("userList");
const searchInput = document.getElementById("searchInput");
let fetchedUsers = [];

loadUsersBtn.addEventListener("click", loadUsers);
searchInput.addEventListener("input", filterUsers);

async function loadUsers() {
  try {
    userList.innerHTML = "<li>Loading users...</li>";

    const response = await fetch("https://jsonplaceholder.typicode.com/users");
    const data = await response.json();

    fetchedUsers = data;
    displayUsers(fetchedUsers);
    updateSummary();
  } catch (error) {
    userList.innerHTML = "<li>Failed to load users</li>";
    console.log("Error:", error);
  }
}

function displayUsers(users) {
  userList.innerHTML = "";

  users.forEach(function (user) {
    const li = document.createElement("li");
    li.innerText = `${user.name} - ${user.email}`;
    userList.appendChild(li);
  });
}

function filterUsers() {
  const keyword = searchInput.value.toLowerCase();

  const filtered = fetchedUsers.filter(function (user) {
    return user.name.toLowerCase().includes(keyword);
  });

  displayUsers(filtered);
}

// --------------------
// Summary using Arrays, Objects, Math, String
// --------------------
const summary = document.getElementById("summary");

function updateSummary() {
  const totalTasks = tasks.length;
  const totalUsers = fetchedUsers.length;
  const longestTaskLength =
    tasks.length > 0 ? Math.max(...tasks.map((task) => task.title.length)) : 0;

  summary.innerText = `Tasks Added: ${totalTasks} | API Users Loaded: ${totalUsers} | Longest Task Length: ${longestTaskLength}`;
}

updateSummary();
