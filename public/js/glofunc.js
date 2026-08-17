function allowNumbersAndDot(event) {
  // 1. Allow functional keys for navigation and editing
  const allowedFunctionalKeys = [
    'Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 
    'Tab', 'Escape', 'Enter', 'Home', 'End'
  ];

  if (allowedFunctionalKeys.includes(event.key)) {
    return;
  }

  // 2. Allow Control/Command combinations
  if (event.ctrlKey || event.metaKey) {
    return; 
  }

  // 3. Handle the decimal point safely
  if (event.key === '.') {
    // Safely get the existing text from an input (.value) OR a div/td (.textContent)
    const currentText = event.target.value !== undefined ? event.target.value : event.target.textContent;

    if (currentText.includes('.')) {
      event.preventDefault(); // Stop if a dot already exists
    }
    return;
  }

  // 4. Match digits 0-9
  const isNumber = /^[0-9]$/.test(event.key);

  if (!isNumber) {
    event.preventDefault();
  }
}