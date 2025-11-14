document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('#contactForm') || document.querySelector('.contact-form');
    if (!contactForm) return;

    const form = contactForm;
    const submitButton = form.querySelector('.submit-button');
    const formFields = {
        fullName: form.querySelector('#fullName'),
        email: form.querySelector('#email'),
        phone: form.querySelector('#phone'),
        practiceArea: form.querySelector('#practiceArea'),
        description: form.querySelector('#description')
    };

    const errors = {};

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePhone(phone) {
        const phoneRegex = /^[\d\s\+\-\(\)]+$/;
        return phoneRegex.test(phone) && phone.replace(/\D/g, '').length >= 8;
    }

    function validateField(fieldName) {
        const field = formFields[fieldName];
        if (!field) return true;

        const value = field.value.trim();
        let isValid = true;
        const errorMessage = field.parentElement.querySelector('.error-message');

        // Remove existing error class
        field.classList.remove('error');
        if (errorMessage) {
            errorMessage.remove();
        }

        switch (fieldName) {
            case 'fullName':
                if (!value || value.length < 2) {
                    isValid = false;
                    showError(field, 'Full name must be at least 2 characters');
                }
                break;

            case 'email':
                if (!value || value.length === 0) {
                    isValid = false;
                    showError(field, 'Email is required');
                } else if (!validateEmail(value)) {
                    isValid = false;
                    showError(field, 'Please enter a valid email address');
                }
                break;

            case 'phone':
                if (!value || value.length === 0) {
                    isValid = false;
                    showError(field, 'Phone number is required');
                } else if (!validatePhone(value)) {
                    isValid = false;
                    showError(field, 'Please enter a valid phone number');
                }
                break;

            case 'practiceArea':
                if (!value || value.length === 0) {
                    isValid = false;
                    showError(field, 'Please select a practice area');
                }
                break;

            case 'description':
                if (!value || value.length < 10) {
                    isValid = false;
                    showError(field, 'Description must be at least 10 characters');
                }
                break;
        }

        return isValid;
    }

    function showError(field, message) {
        field.classList.add('error');
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.textContent = message;
        field.parentElement.appendChild(errorSpan);
    }

    function validateForm() {
        let isValid = true;
        Object.keys(formFields).forEach(fieldName => {
            if (!validateField(fieldName)) {
                isValid = false;
            }
        });
        return isValid;
    }

    // Add blur validation
    Object.keys(formFields).forEach(fieldName => {
        const field = formFields[fieldName];
        if (field) {
            field.addEventListener('blur', () => {
                validateField(fieldName);
            });
        }
    });

    // Handle form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (!validateForm()) {
            showToast('Please fix the errors in the form', 'error');
            return;
        }

        if (submitButton && submitButton.disabled) {
            return;
        }

        try {
            // Disable submit button
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'SUBMITTING...';
            }

            const formData = new FormData(form);
            const data = Object.fromEntries(formData);

            // Get CSRF token from meta tag or form
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                || form.querySelector('input[name="_token"]')?.value 
                || '';

            if (!csrfToken) {
                console.error('CSRF token not found');
                showToast('Security token missing. Please refresh the page and try again.', 'error');
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'BOOK A CONSULTATION';
                }
                return;
            }

            const response = await fetch('/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(data)
            });

            console.log('response', response);

            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            let result;
            
            if (contentType && contentType.includes('application/json')) {
                try {
                    result = await response.json();
                } catch (parseError) {
                    console.error('Failed to parse JSON response:', parseError);
                    throw new Error('Invalid response from server. Please try again.');
                }
            } else {
                // Server returned HTML (likely an error page, CSRF error, or redirect)
                const text = await response.text();
                console.error('Server returned HTML instead of JSON. Status:', response.status);
                
                // Provide specific error messages based on status code
                if (response.status === 419) {
                    throw new Error('Session expired. Please refresh the page and try again.');
                } else if (response.status === 403) {
                    throw new Error('Access denied. Please refresh the page and try again.');
                } else if (response.status >= 500) {
                    throw new Error('Server error. Please try again later.');
                } else {
                    throw new Error('An error occurred. Please refresh the page and try again.');
                }
            }

            if (response.ok && result.success) {
                // Reset form
                form.reset();
                Object.values(formFields).forEach(field => {
                    if (field) {
                        field.classList.remove('error');
                        const errorMsg = field.parentElement.querySelector('.error-message');
                        if (errorMsg) errorMsg.remove();
                    }
                });

                showToast(result.message || 'Thank you for your inquiry! We will get back to you soon.', 'success');
            } else {
                // Handle validation errors
                if (result.errors) {
                    Object.keys(result.errors).forEach(fieldName => {
                        const field = formFields[fieldName];
                        if (field && result.errors[fieldName]) {
                            showError(field, result.errors[fieldName][0]);
                        }
                    });
                    showToast(result.message || 'Please fix the errors in the form', 'error');
                } else {
                    const errorMessage = result.message || 'An error occurred. Please try again later.';
                    showToast(errorMessage, 'error');
                }
            }
        } catch (error) {
            console.error('Form submission error:', error);
            showToast('An error occurred. Please try again later.', 'error');
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = 'BOOK A CONSULTATION';
            }
        }
    });
});

function showToast(message, type = 'info') {
    // Create toast container if it doesn't exist
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; pointer-events: none;';
        document.body.appendChild(toastContainer);
    }

    // Create toast element
    const toastId = `toast-${Date.now()}`;
    const bgColor = type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8';
    
    const toastElement = document.createElement('div');
    toastElement.id = toastId;
    toastElement.style.cssText = `
        background-color: ${bgColor};
        color: white;
        padding: 16px 20px;
        border-radius: 4px;
        margin-bottom: 10px;
        min-width: 300px;
        max-width: 500px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        pointer-events: auto;
        animation: slideIn 0.3s ease-out;
    `;
    
    toastElement.setAttribute('role', 'alert');
    toastElement.setAttribute('aria-live', 'assertive');
    toastElement.setAttribute('aria-atomic', 'true');
    
    toastElement.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
            <div style="flex: 1;">
                <strong style="display: block; margin-bottom: 4px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                    ${type === 'success' ? 'Success' : type === 'error' ? 'Error' : 'Info'}
                </strong>
                <div style="font-size: 14px; line-height: 1.4;">${message}</div>
            </div>
            <button type="button" onclick="this.parentElement.parentElement.remove()" 
                    style="background: none; border: none; color: white; font-size: 20px; cursor: pointer; padding: 0; margin-left: 12px; opacity: 0.8; line-height: 1;"
                    aria-label="Close">
                &times;
            </button>
        </div>
    `;

    // Add animation styles if not already added
    if (!document.getElementById('toast-animations')) {
        const style = document.createElement('style');
        style.id = 'toast-animations';
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    toastContainer.appendChild(toastElement);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        toastElement.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => {
            if (toastElement.parentElement) {
                toastElement.remove();
            }
        }, 300);
    }, 5000);
}

