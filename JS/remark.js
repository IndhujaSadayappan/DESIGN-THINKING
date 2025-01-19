
const mentee = {
    username: 'gowri_shankar',
    name: 'Gowri Shankar',
    remarks: [
      "Great progress on the recent tasks!",
      "Needs to work on time management skills."
    ]
  };
 
  function displayMenteeProfile() {
    document.getElementById('menteeName').textContent = mentee.name;
    document.getElementById('menteeUsername').textContent = mentee.username;
    document.getElementById('menteeFullName').textContent = mentee.name;
  
    const remarksList = document.getElementById('remarksList');
    remarksList.innerHTML = '';
    mentee.remarks.forEach(remark => {
      const remarkItem = document.createElement('div');
      remarkItem.classList.add('remark-item');
      remarkItem.textContent = remark;
      remarksList.appendChild(remarkItem);
    });
  }
  

  document.getElementById('submitRemark').addEventListener('click', function() {
    const newRemark = document.getElementById('remarkInput').value;
    if (newRemark.trim() !== '') {
      mentee.remarks.push(newRemark);
      displayMenteeProfile();
      document.getElementById('remarkInput').value = ''; 
    }
  });

  document.addEventListener('DOMContentLoaded', displayMenteeProfile);
  