document.addEventListener('DOMContentLoaded', function() {
    console.log('signup.js loaded');
    const signUpForm = document.querySelector('.sign-up-htm');
    
    if (!signUpForm) {
        console.error('Signup form not found. Check if the form has class "sign-up-htm".');
        return;
    }
    
    console.log('Signup form found, attaching submit event listener');
    signUpForm.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Signup form submission intercepted');
        
        const username = document.querySelector('.sign-up-htm input[name="username"]').value;
        const password = document.querySelector('.sign-up-htm input[name="password"]').value;
        const confirmPassword = document.querySelector('.sign-up-htm input[name="confirm_password"]').value;
        
        if (!username || !password || !confirmPassword) {
            alert('Please fill in all fields');
            console.log('Missing form fields');
            return;
        }
        
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            console.log('Password mismatch');
            return;
        }
        
        const encodedPassword = btoa(password); // Enkripsi kata sandi dengan btoa
        console.log('Encoded Password:', encodedPassword); // Log untuk debugging
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'api/user/signup.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function() {
            console.log('AJAX Status:', xhr.status, 'Response:', xhr.responseText);
            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    console.log('Parsed Response:', response);
                    if (response.status) {
                        console.log('Signup successful, redirecting to home.php');
                        window.location.href = 'home.php';
                    } else {
                        alert(response.message);
                        console.log('Signup failed:', response.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e, 'Response:', xhr.responseText);
                    alert('An error occurred during signup.');
                }
            } else {
                alert('Server error: ' + xhr.status + ' - ' + xhr.responseText);
                console.log('Server error:', xhr.status, xhr.responseText);
            }
        };
        
        xhr.onerror = function() {
            console.log('AJAX request failed');
            alert('Request failed. Please try again.');
        };
        
        const data = `username=${encodeURIComponent(username)}&password=${encodeURIComponent(encodedPassword)}`;
        console.log('Sending data:', data);
        xhr.send(data);
    });
});