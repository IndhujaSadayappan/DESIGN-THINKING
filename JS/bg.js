
const mentees = [
    { name: 'John Doe', goals: 'Become a software developer', progress: '75%' },
    { name: 'Jane Smith', goals: 'Start a successful business', progress: '50%' },
    { name: 'Michael Lee', goals: 'Pass the CPA exams', progress: '90%' },
  ];
  

  const menteeList = document.getElementById('mentee-list');
  const menteeSelect = document.getElementById('mentee-select');
  
  mentees.forEach((mentee, index) => {

    const listItem = document.createElement('li');
    listItem.textContent = `${mentee.name} - ${mentee.goals}`;
    menteeList.appendChild(listItem);
  

    const option = document.createElement('option');
    option.value = index;
    option.textContent = mentee.name;
    menteeSelect.appendChild(option);
  });
  
  const noteForm = document.getElementById('note-form');
  noteForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const selectedMenteeIndex = menteeSelect.value;
    const note = document.getElementById('note-input').value;
  
    if (note) {
      alert(`Note added for ${mentees[selectedMenteeIndex].name}: ${note}`);
      noteForm.reset();
    }
  });
  
  
  const progressDetails = document.getElementById('progress-details');
  menteeSelect.addEventListener('change', () => {
    const selectedMenteeIndex = menteeSelect.value;
    const mentee = mentees[selectedMenteeIndex];
    progressDetails.innerHTML = `
      <h3>${mentee.name}</h3>
      <p><strong>Goals:</strong> ${mentee.goals}</p>
      <p><strong>Progress:</strong> ${mentee.progress}</p>
    `;
  });
  