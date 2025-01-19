const academicData = [
  { subject: 'DM', iaMarks: 18, semesterMarks: 48, totalMarks: 66 },
  { subject: 'DPD', iaMarks: 15, semesterMarks: 38, totalMarks: 53 },
  { subject: 'CO', iaMarks: 17, semesterMarks: 50, totalMarks: 67 },
  { subject: 'DS', iaMarks: 19, semesterMarks: 54, totalMarks: 73 },
  { subject: 'DT', iaMarks: 16, semesterMarks: 42, totalMarks: 58 },
  { subject: 'UHV', iaMarks: 14, semesterMarks: 40, totalMarks: 54 }
];

function populateAcademicDetails() {
  const tableBody = document.getElementById('academicTable').getElementsByTagName('tbody')[0];
  
  tableBody.innerHTML = '';

  academicData.forEach(data => {
    const row = tableBody.insertRow();
    row.innerHTML = `
      <td>${data.subject}</td>
      <td>${data.iaMarks}</td>
      <td>${data.semesterMarks}</td>
      <td>${data.totalMarks}</td>
    `;
  });
}
function openModal() {
  const modal = document.getElementById('academicDetailsModal');
  modal.style.display = 'block';
}
function closeModal() {
  const modal = document.getElementById('academicDetailsModal');
  modal.style.display = 'none';
}
document.getElementById('viewAcademicDetailsBtn').addEventListener('click', openModal);
document.getElementById('closeModalBtn').addEventListener('click', closeModal);
document.getElementById('closeBtn').addEventListener('click', closeModal);

document.addEventListener('DOMContentLoaded', function () {
  populateAcademicDetails();
});
