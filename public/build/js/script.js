document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var email = form.querySelector('input[name="email"]').value;
        var password = form.querySelector('input[name="password"]').value;

        // Efface les messages d'erreur précédents
        clearErrorMessages();

        if (!validateEmail(email)) {
            displayError('email', 'Please enter a valid email address with the following format: email@example.com');
        } else if (!validatePassword(password)) {
            displayError('password', 'Please enter a valid password (only letters and numbers allowed)');
        } else {
            form.submit();
        }
    });

    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validatePassword(password) {
        var regex = /^[\w@!#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/;

        return regex.test(password);
    }

    function displayError(fieldName, message) {
        var errorMessages = document.getElementById('error-messages');

        // If DIV NOT exists then create IT
        if (!errorMessages) {
            errorMessages = document.createElement('div');
            errorMessages.id = 'error-messages';
            errorMessages.classList.add('error-messages');
            document.querySelector('form').appendChild(errorMessages);
        }

        // Append the error message to the error messages div
        var errorElement = document.createElement('div');
        errorElement.classList.add('error-message');
        errorElement.textContent = fieldName + ': ' + message;
        errorMessages.appendChild(errorElement);
    }

    function clearErrorMessages() {
        var errorMessages = document.getElementById('error-messages');

        // If error messages div exists, remove it
        if (errorMessages) {
            errorMessages.parentNode.removeChild(errorMessages);
        }
    }
});


//SEARCH PART
const search = document.getElementById('searchInput');
			const container = document.getElementsByClassName('article');

			fetchSearch();

			search.addEventListener("keyup", function() {
				fetchSearch();
			});

			function fetchSearch() {
				console.log(search.value);
				fetch(`/search?search=${search.value}`).then(res => {
					return res.text();
				}).then(data => {
					// console.log(data);
					container[0].innerHTML = data;
				});
			}

          


           
            