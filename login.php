<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Creator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; text-align: center; }
        .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input, button { width: 100%; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <div id="loginPage" class="container">
        <h2>Login</h2>
        <form method="post" onsubmit="return login(event)">
            <input type="email" id="email" placeholder="Enter email" required>
            <input type="password" id="password" placeholder="Enter password" required>
            <button type="submit">Login</button>
        </form>
        <p id="loginError" style="color: red;"></p>
    </div>

    <div id="formPage" class="container" style="display: none;">
        <h2>Input CV Data</h2>
        <input type="text" id="name" placeholder="Enter full name" required>
        <input type="text" id="birth" placeholder="Place & Date of Birth" required>
        <textarea id="education" placeholder="Enter Education History" required></textarea>
        <button onclick="submitCV()">Submit</button>
    </div>

    <div id="cvPage" class="container" style="display: none;">
        <h2>CV Sederhana</h2>
        <p><strong>Name:</strong> <span id="cvName"></span></p>
        <p><strong>Birth:</strong> <span id="cvBirth"></span></p>
        <p><strong>Education:</strong> <span id="cvEducation"></span></p>
        <p><strong>Email:</strong> <span id="cvEmail"></span></p>
        <button onclick="logout()">Logout</button>
    </div>

    <script>
        function login(event) {
            event.preventDefault();
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            if (email.includes("@")) {
                let domain = email.split('@')[1];

                if (password === domain) {
                    localStorage.setItem('userEmail', email);
                    document.getElementById('loginPage').style.display = 'none';
                    document.getElementById('formPage').style.display = 'block';
                } else {
                    document.getElementById('loginError').innerText = 'Invalid email or password!';
                }
            } else {
                document.getElementById('loginError').innerText = 'Please enter a valid email!';
            }
        }

        function submitCV() {
            let name = document.getElementById('name').value;
            let birth = document.getElementById('birth').value;
            let education = document.getElementById('education').value;
            let email = localStorage.getItem('userEmail');

            if (name && birth && education) {
                document.getElementById('cvName').innerText = name;
                document.getElementById('cvBirth').innerText = birth;
                document.getElementById('cvEducation').innerText = education;
                document.getElementById('cvEmail').innerText = email;
                
                document.getElementById('formPage').style.display = 'none';
                document.getElementById('cvPage').style.display = 'block';
            } else {
                alert('Please fill all fields!');
            }
        }

        function logout() {
            localStorage.removeItem('userEmail');
            document.getElementById('cvPage').style.display = 'none';
            document.getElementById('loginPage').style.display = 'block';
        }
    </script>
</body>
</html>
