const mentees = [
  {
    username: 'gowri_shankar',
    name: 'Gowri Shankar'
  },
  {
    username: 'indhuja',
    name: 'Indhuja'
  },
  {
    username: 'jayaraj',
    name: 'Jayaraj'
  },
  {
    username: 'karisni',
    name: 'Karisni'
  },
  {
    username: 'kishore',
    name: 'Kishore'
  }
];


function displayMentees(mentees) {
  const menteeList = document.getElementById('menteeList');
  menteeList.innerHTML = '';

  mentees.forEach(mentee => {
      const row = document.createElement('tr');
      row.innerHTML = `
          <td>${mentee.username}</td>
          <td>${mentee.name}</td>
          <td class="actions">
              <button class="action-btn"><a href="remark.html">Remarks</a></button>
              <button class="action-btn"><a href="report.html">Report</a></button>
              <button class="action-btn"><a href="preview.html">Resource Preview</a></button>
              <button class="action-btn"><a href="menteeprofile.html">Mentee Profile</a></button>
              <button class="action-btn"><a href="academic.html">Academic Details</a></button>
              <button class="action-btn remove-btn" onclick="removeMentee('${mentee.username}')">Remove Mentee</button>
          </td>
      `;
      menteeList.appendChild(row);
  });
}


document.getElementById('searchInput').addEventListener('input', function () {
  const searchTerm = this.value.toLowerCase();
  const filteredMentees = mentees.filter(mentee =>
      mentee.name.toLowerCase().includes(searchTerm)
  );
  displayMentees(filteredMentees);
});


function removeMentee(username) {
  const updatedMentees = mentees.filter(mentee => mentee.username !== username);
  displayMentees(updatedMentees);
}


document.addEventListener('DOMContentLoaded', function () {
  displayMentees(mentees);
});
