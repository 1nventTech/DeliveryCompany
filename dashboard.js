function qs(i) { return document.querySelector(i); }



qs(".close-btn").addEventListener('click', function () {
     qs('.settings').style.display = 'none';
})