
document.getElementById('edit-profile-btn').addEventListener('click', function() {
    const name = document.getElementById('mentee-name');
    const username = document.getElementById('mentee-username');
    const age = document.getElementById('mentee-age');
    const gender = document.getElementById('mentee-gender');
    const email = document.getElementById('mentee-email');
    const phone = document.getElementById('mentee-phone');
    const address = document.getElementById('mentee-address');
    const university = document.getElementById('mentee-university');
    const course = document.getElementById('mentee-course');
    const year = document.getElementById('mentee-year');
    const cgpa = document.getElementById('mentee-cgpa');

    
    name.innerHTML = `<input type="text" value="${name.innerHTML}">`;
    username.innerHTML = `<input type="text" value="${username.innerHTML}">`;
    age.innerHTML = `<input type="number" value="${age.innerHTML}">`;
    gender.innerHTML = `<input type="text" value="${gender.innerHTML}">`;
    email.innerHTML = `<input type="email" value="${email.innerHTML}">`;
    phone.innerHTML = `<input type="tel" value="${phone.innerHTML}">`;
    address.innerHTML = `<input type="text" value="${address.innerHTML}">`;
    university.innerHTML = `<input type="text" value="${university.innerHTML}">`;
    course.innerHTML = `<input type="text" value="${course.innerHTML}">`;
    year.innerHTML = `<input type="text" value="${year.innerHTML}">`;
    cgpa.innerHTML = `<input type="text" value="${cgpa.innerHTML}">`;

  
    this.textContent = 'Save Profile';
    this.addEventListener('click', saveProfile);
});

function saveProfile() {
    const name = document.getElementById('mentee-name').querySelector('input').value;
    const username = document.getElementById('mentee-username').querySelector('input').value;
    const age = document.getElementById('mentee-age').querySelector('input').value;
    const gender = document.getElementById('mentee-gender').querySelector('input').value;
    const email = document.getElementById('mentee-email').querySelector('input').value;
    const phone = document.getElementById('mentee-phone').querySelector('input').value;
    const address = document.getElementById('mentee-address').querySelector('input').value;
    const university = document.getElementById('mentee-university').querySelector('input').value;
    const course = document.getElementById('mentee-course').querySelector('input').value;
    const year = document.getElementById('mentee-year').querySelector('input').value;
    const cgpa = document.getElementById('mentee-cgpa').querySelector('input').value;


    document.getElementById('mentee-name').innerText = name;
    document.getElementById('mentee-username').innerText = username;
    document.getElementById('mentee-age').innerText = age;
    document.getElementById('mentee-gender').innerText = gender;
    document.getElementById('mentee-email').innerText = email;
    document.getElementById('mentee-phone').innerText = phone;
    document.getElementById('mentee-address').innerText = address;
    document.getElementById('mentee-university').innerText = university;
    document.getElementById('mentee-course').innerText = course;
    document.getElementById('mentee-year').innerText = year;
    document.getElementById('mentee-cgpa').innerText = cgpa;
}
