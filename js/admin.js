document.addEventListener('DOMContentLoaded', function() {
    // Edit Content
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Edit button clicked');
            try {
                const content = JSON.parse(this.getAttribute('data-content'));
                console.log('Content data:', content);

                const contentIdField = document.getElementById('content_id');
                const titleField = document.getElementById('title');
                const descriptionField = document.getElementById('description');
                const categoryField = document.getElementById('category');
                const currentImageDiv = document.getElementById('current_image');

                if (!contentIdField || !titleField || !descriptionField || !categoryField || !currentImageDiv) {
                    console.error('Form field(s) not found:', {
                        contentIdField: !!contentIdField,
                        titleField: !!titleField,
                        descriptionField: !!descriptionField,
                        categoryField: !!categoryField,
                        currentImageDiv: !!currentImageDiv
                    });
                    alert('Form fields not found. Please try again.');
                    return;
                }

                contentIdField.value = content.id;
                titleField.value = content.title;
                descriptionField.value = content.description;
                categoryField.value = content.category;

                if (content.image_path) {
                    currentImageDiv.style.display = 'block';
                    currentImageDiv.innerHTML = `Current image: <a href="${content.image_path}" target="_blank">${content.image_path}</a>`;
                } else {
                    currentImageDiv.style.display = 'none';
                    currentImageDiv.innerHTML = '';
                }

                console.log('Form fields populated successfully');
            } catch (e) {
                console.error('Error in editContent:', e);
                alert('Error loading content for edit.');
            }
        });
    });

    // Save Content
    const contentForm = document.getElementById('content_form');
    if (contentForm) {
        contentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Content form submission intercepted');

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'api/content/save.php', true);
            
            xhr.onload = function() {
                console.log('Save content response:', xhr.status, xhr.responseText);
                const notification = document.getElementById('notification');
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        notification.style.display = 'block';
                        notification.className = response.status ? 'success' : 'error';
                        notification.textContent = response.message;
                        if (response.status) {
                            document.getElementById('content_form').reset();
                            document.getElementById('content_id').value = '';
                            document.getElementById('current_image').style.display = 'none';
                            console.log('Content saved successfully, reloading page');
                            setTimeout(() => location.reload(), 1500);
                        }
                    } catch (e) {
                        console.error('Error parsing JSON:', e, 'Response:', xhr.responseText);
                        notification.style.display = 'block';
                        notification.className = 'error';
                        notification.textContent = 'Error processing request';
                    }
                } else {
                    notification.style.display = 'block';
                    notification.className = 'error';
                    notification.textContent = 'Server error: ' + xhr.status;
                    console.error('Server error:', xhr.status, xhr.responseText);
                }
            };
            
            xhr.onerror = function() {
                console.error('Save content request failed');
                const notification = document.getElementById('notification');
                notification.style.display = 'block';
                notification.className = 'error';
                notification.textContent = 'Request failed. Please try again.';
            };
            
            xhr.send(formData);
        });
    } else {
        console.error('Content form not found');
    }
});

// Delete Content
function deleteContent(id) {
    if (!confirm('Are you sure you want to delete this content?')) return;
    console.log('Attempting to delete content with ID:', id);
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'api/content/delete.php?id=' + id, true);
    xhr.onload = function() {
        console.log('Delete content response:', xhr.status, xhr.responseText);
        const notification = document.getElementById('notification');
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                notification.style.display = 'block';
                notification.className = response.status ? 'success' : 'error';
                notification.textContent = response.message;
                if (response.status) {
                    console.log('Content deleted successfully, reloading page');
                    setTimeout(() => location.reload(), 1500);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e, 'Response:', xhr.responseText);
                notification.style.display = 'block';
                notification.className = 'error';
                notification.textContent = 'Error processing request';
            }
        } else {
            notification.style.display = 'block';
            notification.className = 'error';
            notification.textContent = 'Server error: ' + xhr.status;
            console.error('Server error:', xhr.status, xhr.responseText);
        }
    };
    xhr.onerror = function() {
        console.error('Delete content request failed');
        const notification = document.getElementById('notification');
        notification.style.display = 'block';
        notification.className = 'error';
        notification.textContent = 'Request failed. Please try again.';
    };
    xhr.send();
}

// Delete User
function deleteUser(id) {
    if (!confirm('Are you sure you want to delete this user?')) return;
    console.log('Attempting to delete user with ID:', id);
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'api/user/delete.php?id=' + id, true);
    xhr.onload = function() {
        console.log('Delete user response:', xhr.status, xhr.responseText);
        const notification = document.getElementById('notification');
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                notification.style.display = 'block';
                notification.className = response.status ? 'success' : 'error';
                notification.textContent = response.message;
                if (response.status) {
                    console.log('User deleted successfully, reloading page');
                    setTimeout(() => location.reload(), 1500);
                }
            } catch (e) {
                console.error('Error parsing JSON:', e, 'Response:', xhr.responseText);
                notification.style.display = 'block';
                notification.className = 'error';
                notification.textContent = 'Error processing request';
            }
        } else {
            notification.style.display = 'block';
            notification.className = 'error';
            notification.textContent = 'Server error: ' + xhr.status;
            console.error('Server error:', xhr.status, xhr.responseText);
        }
    };
    xhr.onerror = function() {
        console.error('Delete user request failed');
        const notification = document.getElementById('notification');
        notification.style.display = 'block';
        notification.className = 'error';
        notification.textContent = 'Request failed. Please try again.';
    };
    xhr.send();
}