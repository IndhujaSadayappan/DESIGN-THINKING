
const mentee = {
    username: 'gowri_shankar',
    name: 'Gowri Shankar',
 
  };
  

  function displayMenteeProfile() {
    document.getElementById('menteeName').textContent = mentee.name;
    document.getElementById('menteeUsername').textContent = mentee.username;
    document.getElementById('menteeFullName').textContent = mentee.name;
  
    const reportList = document.getElementById('reportList');
    reportList.innerHTML = '';
    mentee.reports.forEach(report => {
      const reportItem = document.createElement('div');
      reportItem.classList.add('report-item');
      reportItem.textContent = report;
      reportList.appendChild(reportItem);
    });
  }
  

  document.getElementById('submitReport').addEventListener('click', function() {
    const newReport = document.getElementById('reportInput').value;
    if (newReport.trim() !== '') {
      mentee.reports.push(newReport);
      displayMenteeProfile();
      document.getElementById('reportInput').value = ''; 
    }
  });
  
  document.addEventListener('DOMContentLoaded', displayMenteeProfile);
  