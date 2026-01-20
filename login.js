Pi.authenticate(['username'], onIncomplete, onReady);

function onReady(auth) {
  fetch('/login.php', {
    method: 'POST',
    body: new URLSearchParams({
      pi_signed_jwt: auth.pi_signed_jwt
    })
  })
  .then(r => r.text())
  .then(console.log);
}
