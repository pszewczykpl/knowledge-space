function ShareBancassurances(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/bancassurances/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano link do schowka!',
      },{
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  };