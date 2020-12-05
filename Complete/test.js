function send() {
  setTimeout(function() {
    window.open("mailto:" + document.getElementById('mail').value + document.getElementById('message').value);
  }, 320);
}