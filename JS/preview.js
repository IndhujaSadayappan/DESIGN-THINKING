
const mentee = {
    username: 'gowri_shankar',
    name: 'Gowri Shankar',
    resources: [
      { title: 'JavaScript Basics', link: 'https://www.example.com/js-basics' },
      { title: 'CSS Flexbox Guide', link: 'https://www.example.com/css-flexbox' }
    ]
  };
  

  function displayMenteeProfile() {
    document.getElementById('menteeName').textContent = mentee.name;
    document.getElementById('menteeUsername').textContent = mentee.username;
    document.getElementById('menteeFullName').textContent = mentee.name;
  
    const resourceList = document.getElementById('resourceList');
    resourceList.innerHTML = '';
    mentee.resources.forEach(resource => {
      const resourceItem = document.createElement('div');
      resourceItem.classList.add('resource-item');
      resourceItem.innerHTML = `
        <a href="${resource.link}" target="_blank">${resource.title}</a>
      `;
      resourceList.appendChild(resourceItem);
    });
  }

  document.getElementById('submitResource').addEventListener('click', function() {
    const newResource = document.getElementById('resourceInput').value;
    if (newResource.trim() !== '') {
      const newResourceObj = { title: 'New Resource', link: newResource };
      mentee.resources.push(newResourceObj);
      displayMenteeProfile();
      document.getElementById('resourceInput').value = '';
    }
  });

  document.addEventListener('DOMContentLoaded', displayMenteeProfile);
  