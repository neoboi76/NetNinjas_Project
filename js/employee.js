document.querySelectorAll('.nav-link, .dropdown-item').forEach(item => {
    item.addEventListener('click', function () {
        document.getElementById('pageTitle').innerText = this.innerText;
    });
});``