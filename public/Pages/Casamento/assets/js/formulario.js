function sendMail(form) {
    if (form) {
        $('.casamento__form').submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: 'post',
                url: '/api/registrarPedidoDeCasamento',
                data: JSON.stringify($(form).serializeArray()),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function (res) {
                    console.log(res);
                    if (res.success) alert('sucesso')
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