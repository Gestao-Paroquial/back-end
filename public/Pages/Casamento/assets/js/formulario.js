function sendMail(form) {
    if (form) {
        $('.casamento__form').submit(function (event) {
            var data = JSON.stringify($(form).serializeArray()); 

            console.log(data);
            $.get('/api/registrarPedidoDeCasamento', data, (res) => {
                if (res.success) {
                    alert('Pedindo de casamento enviado com sucesso');
                }
            });
        });
    } else {
        setTimeout(function () {
            sendMail(document.querySelector('.casamento__form'));
        }, 0);
    }
}

sendMail(document.querySelector('.casamento__form'));