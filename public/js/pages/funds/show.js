function ShareFunds(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/funds/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano do schowka!',
      },{
          // settings
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  };