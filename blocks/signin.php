<div class="container">
    <form id="signinForm" method='post'>
            <h2>Sign In</h2>
            
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"> <span id="emailError" class="error"></span>
                <label for="password">Password:</label> 
                <input type="password" id="password" name="password"> <span id="passwordError" class="error"></span>
                <button type="submit" name="signin">Sign In</button> 
        </form>
</div>
<script>
         document.getElementById('signinForm').addEventListener('submit', function(event) {
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            
            let isValid = true;
            
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                isValid = false;
            }
            
            const password = document.getElementById('password').value;
            if (password.trim() === '') {
                document.getElementById('passwordError').textContent = 'Password is required.';
                isValid = false;
            }
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>