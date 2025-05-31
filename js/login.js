document.addEventListener('DOMContentLoaded', function() {
    const signInButton = document.querySelector('.sign-in-htm .button');
    
    signInButton.addEventListener('click', function(e) {
        e.preventDefault();
        
        const username = document.querySelector('.sign-in-htm .group input[name="username"]').value;
        const password = document.querySelector('.sign-in-htm .group input[name="password"]').value;
        
        // Base64 encode the password to match backend
        const encodedPassword = btoa(password);
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'api/user/login.php', true);
        
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log('Status:', xhr.status, 'Response:', xhr.responseText); // Debug status and response
            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status) {
                        window.location.href = 'home.php';
                    } else {
                        alert(response.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e, 'Response:', xhr.responseText);
                    alert('An error occurred during login.');
                }
            } else {
                alert('Server error: ' + xhr.status + ' Response: ' + xhr.responseText);
            }
        };
        
        xhr.onerror = function() {
            console.log('Request failed');
            alert('Request failed. Please try again.');
        };
        
        xhr.send(`username=${encodeURIComponent(username)}&password=${encodeURIComponent(encodedPassword)}`);
    });
});