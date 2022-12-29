const toggleButton = document.getElementById('darkModeToggle');
const toggleButtonLabel = document.getElementById('darkModeToggleLabel');

  // Add an event listener for clicks on the button
  toggleButton.addEventListener('click', function() {
    // Check if dark mode is enabled
    if (localStorage.getItem('darkMode') === 'enabled') {
      // If dark mode is enabled, disable it and update the button text
      localStorage.setItem('darkMode', 'disabled');
      toggleButton.innerHTML = 'Dark Mode';
    } else {
      // If dark mode is disabled, enable it and update the button text
      localStorage.setItem('darkMode', 'enabled');
      toggleButton.innerHTML = 'Light Mode';
    }
    // Update the page to reflect the current dark mode setting
    updateDarkMode();
  });

  // Add a function to update the page based on the dark mode setting
  function updateDarkMode() {
    // Check if dark mode is enabled
    if (localStorage.getItem('darkMode') === 'enabled') {
      // If dark mode is enabled, add the "dark-mode" class to the body element
      document.body.classList.add('dark-mode');
    } else {
      // If dark mode is disabled, remove the "dark-mode" class from the body element
      document.body.classList.remove('dark-mode');
      
    }
  }

  // Update the page when the script is first loaded
  updateDarkMode();