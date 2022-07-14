<div class="login-button">
  <a title="Logout" id="blaize-logout-button" href="javascript:;">Logout</a>
</div>
<script>
  (function() {
    let logoutButton = document.getElementById('blaize-logout-button');

    logoutButton.onclick = function(event) {
      event.preventDefault();

      var xhr = new(XMLHttpRequest || ActiveXObject)('MSXML2.XMLHTTP.3.0');
      xhr.open('POST', '/blaize/logout', true);
      xhr.setRequestHeader('Content-type', 'application/json');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          location.reload(true);
        }
      };
      xhr.send('');
    };
  })();
</script> 