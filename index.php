<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKHSS Hyderabad Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        header {
            padding: 1rem;
            text-align: center;
            position: relative;
        }

        .profile-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            cursor: pointer;
        }

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.9);
            overflow-x: hidden;
            transition: 0.5s;
        }

        .overlay-content {
            position: relative;
            top: 25%;
            width: 100%;
            text-align: center;
        }

        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .overlay a:hover {
            color: #f1f1f1;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
            color: #fff;
        }

        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 20%;
        }

        .tablink:hover {
            background-color: #777;
        }

        .tabcontent {
            color: white;
            display: none;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        #Home,
        #Upload,
        #Announcements,
        #Messages,
        #VideoCall {
            background-color: grey;
        }

        #loading-spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
        }

        #username::placeholder,
        #password::placeholder,
        #username,
        #password {
            color: black;
            opacity: 1;
        }

        .hidden {
            display: none;
        }

        .login-section {
            background-color: #343a40;
            color: white;
            padding: 2rem;
            border-radius: 15px;
        }

        .modal-content {
            background-color: #343a40;
            color: white;
        }

        .modal-header,
        .modal-footer {
            border: none;
        }

        /* Adjust text size inside the tabs on smaller screens */
        @media (max-width: 768px) {
            .tablink {
                font-size: 14px;
                /* Reduce font size inside the tabs */
            }

            #VideoCall {
                font-size: 1.2rem;
                font-weight: bold;
            }

            .profile-icon {
                top: 10px;
                right: 10px;
                transform: none;
            }

            header {
                text-align: center;
                padding: 1rem 0.5rem;
            }
        }
        textarea{
            resize: none;
        }
    </style>
</head>

<body>

    <header class="bg-primary text-light">
        <h1 class="display-4">AKHSS Classroom<a href="javascript:void(0)" class="profile-icon" id="profile-icon"
                onclick="openNav()">
                <img src="img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
            </a></h1>
    </header>
    <br>

    <main class="container">
        <div id="overlay"></div>
        <div id="loading-spinner">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div id="login" class="login-section bg-secondary p-4 rounded mx-auto" style="max-width: 400px;">
            <h2 class="fs-4 text-center">Login</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="email" id="username" class="form-control bg-light rounded-pill"
                    placeholder="Enter your username" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" class="form-control bg-light rounded-pill"
                    placeholder="Enter your password" />
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember-me" />
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>
            <button onclick="login()" class="btn btn-primary w-100 rounded-pill">Login</button>
        </div>

        <div id="content" class="hidden">
            <div class="tab-navigation">
                <button class="tablink" onclick="openPage('Home', this, 'grey')" id="defaultOpen">Home</button>
                <button class="tablink" onclick="openPage('Upload', this, 'grey')">Document</button>
                <button class="tablink" onclick="openPage('Announcements', this, 'grey')">Mail</button>
                <button class="tablink" onclick="openPage('Messages', this, 'grey')">Messages</button>
                <button class="tablink" onclick="openPage('VideoCall', this, 'grey')">Video Call</button>
            </div>

            <div id="Home" class="tabcontent">
                <br><br><br>
                <h2>Welcome to AKHSS Classroom</h2>
                <p>Navigate through the sections using the tabs above.
                <br>Learn more about us below.</p>
                <div id="accordion">

                    <div class="card" style="background-color: #696969;">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseOne">
                                About Us
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                Established in 1943, the Aga Khan Higher Secondary School,
                                Hyderabad started as a primary school for girls. Some years
                                later the School started admitting boys along with girls, and
                                grew to become a middle and secondary school, and recently a
                                higher secondary school as of 2016.
                                In 1997, Aga Khan School, Hyderabad moved to a new purpose-
                                built campus. It is here that the higher secondary section is
                                commencing its classes.
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background-color: #696969;">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                Subjects Offered
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                Subjects Offered in
                                Secondary School
                                Certificate
                                (Grade VIII to Grade X)
                                AKHSS, Hyderabad offers
                                cience Group in SSC.
                                <br>
                                <br>
                                Subjects Offered in
                                Higher Secondary
                                School Certificate
                                (Grades Xl and XII)
                                AKHSS, Hyderabad offers the
                                following streams in HSSC:
                                Pre-Medical
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background-color: #696969;">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Contact Us
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                Aga Khan Higher Secondary School, Hyderabad
                                Gulistan-e-Fatima, Near Mubarak Colony
                                PAKISTAN
                            </div>
                        </div>
                    </div>
                    <div class="card" style="background-color: #696969;">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                                Some Pictures
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                                    <!-- Indicators/dots -->
                                    <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                                    </div>
                                  
                                    <!-- The slideshow/carousel -->
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="school1.jpg" alt="Los Angeles" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="school2.jpg" alt="Chicago" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="school3.jpg" alt="New York" class="d-block w-100">
                                      </div>
                                    </div>
                                  
                                    <!-- Left and right controls/icons -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                      <span class="carousel-control-next-icon"></span>
                                    </button>
                                  </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="Upload" class="tabcontent hidden">
                <br>
                <br>
                <h2>Upload Documents</h2>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="file" class="form-label">Select file</label>
				<input type="file" class="form-control" name="file" id = "file">
			</div>
			<button type="submit" class="btn btn-primary">Upload file</button>
		</form>
            </div>
            <div id="Announcements" class="tabcontent hidden">
                <br>
                <br>
                <h2>Post Announcements</h2>
                <textarea id="announcement-text" rows="4" class="form-control"></textarea>
                <button onclick="postAnnouncement()" class="btn btn-info mt-2">Post</button>
                <p>Here are your announcements:</p>
                <ul id="announcement-list"></ul>
            </div>
            <div id="Messages" class="tabcontent hidden">
                <br><br><br>
                <h2>Send a Message</h2>
                <textarea id="message-text" rows="4" class="form-control"></textarea>
                <button onclick="sendMessage()" class="btn btn-info mt-2">Send</button>
                <p>Here are your messages:</p>
                <ul id="message-list"></ul>
            </div>
            <div id="VideoCall" class="tabcontent hidden">
                <br><br>
                <h2>Start a Video Call</h2>
                <a href="https://meet.google.com/new" target="_blank" class="btn btn-info mt-2">Start Video Call</a>
                <p>This is where the video call interface will appear.</p>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-light mt-5">
        <center>
            <p style="padding: 3vh;">© Made By Adyan And Fahad 2025</p>
        </center>
    </footer>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <h1 id="whichaccount" class="display-2">
                </h2>
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="javascript:void(0)" onclick="logout()">Logout</a> <!-- Logout button -->
        </div>
    </div>

    <!-- Modal for login failure -->
    <div class="modal fade" id="loginFailureModal" tabindex="-1" aria-labelledby="loginFailureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginFailureModalLabel">Login Failed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The username or password is incorrect. Please try again.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
            const userRole = localStorage.getItem("userRole");

            if (isLoggedIn) {
                document.getElementById("login").classList.add("hidden");
                document.getElementById("content").classList.remove("hidden");
                document.getElementById("profile-icon").style.display = "block";

                // Hide Admin-specific tabs for students
                if (userRole === "student") {
                    document.querySelector("button[onclick*='Upload']").style.display = "none";
                    document.querySelector("button[onclick*='Announcements']").style.display = "none";
                }
            } else {
                document.getElementById("profile-icon").style.display = "none"; // Hide profile icon on login page
            }
        });

        function login() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const rememberMe = document.getElementById("remember-me").checked;

            document.getElementById("loading-spinner").style.display = "block";
            document.getElementById("overlay").style.display = "block";

            // student and admin accounts

            setTimeout(() => {
                if (username === "admin@school.com" && password === "admin123" || username === "teacher@school.com" && password === "teacher123") {
                    if (rememberMe) {
                        localStorage.setItem("isLoggedIn", "true");
                        localStorage.setItem("userRole", "admin");
                    }
                    document.getElementById("login").classList.add("hidden");
                    document.getElementById("content").classList.remove("hidden");
                    document.getElementById("profile-icon").style.display = "block";
                    document.getElementById("whichaccount").innerHTML = ("Admin Account");
                } else if (username === "student1@school.com" && password === "student123" || username === "student2@school.com" && password === "student123") {
                    if (rememberMe) {
                        localStorage.setItem("isLoggedIn", "true");
                        localStorage.setItem("userRole", "student");
                    }
                    document.getElementById("login").classList.add("hidden");
                    document.getElementById("content").classList.remove("hidden");
                    document.getElementById("profile-icon").style.display = "block";
                    document.getElementById("whichaccount").innerHTML = ("Student Account");

                    // Hide Admin tabs for students
                    document.querySelector("button[onclick*='Upload']").style.display = "none";
                    document.querySelector("button[onclick*='Announcements']").style.display = "none";
                } else {
                    // Show the modal when login fails
                    var myModal = new bootstrap.Modal(document.getElementById('loginFailureModal'));
                    myModal.show();
                }
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("overlay").style.display = "none";
            }, 2000);
        }

        function logout() {
            localStorage.setItem("isLoggedIn", "false");
            localStorage.removeItem("userRole");
            location.reload(); // Reloads the page to show the login screen
        }

        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        function openPage(pageName, elmnt, color) {
            const tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            const tablinks = document.getElementsByClassName("tablink");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        document.getElementById("defaultOpen").click();

        function uploadFile() {
            const fileInput = document.getElementById("file-upload");
            const fileName = fileInput.value.split("\\").pop();
            if (fileName) {
                uploadedDocuments.push(fileName);
                updateList("uploaded-documents", uploadedDocuments);
            }
        }

        function postAnnouncement() {
            const announcementText = document.getElementById("announcement-text").value;
            if (announcementText) {
                announcements.push(announcementText);
                updateList("announcement-list", announcements);
                document.getElementById("announcement-text").value = "";
            }
        }

        function sendMessage() {
            const messageText = document.getElementById("message-text").value;
            if (messageText) {
                messages.push(messageText);
                updateList("message-list", messages);
                document.getElementById("message-text").value = "";
            }
        }

        function updateList(listId, data) {
            const list = document.getElementById(listId);
            list.innerHTML = "";
            data.forEach(item => {
                const li = document.createElement("li");
                li.textContent = item;
                list.appendChild(li);
            });
        }

        let uploadedDocuments = [];
        let announcements = [];
        let messages = [];
    </script>

</body>

</html>