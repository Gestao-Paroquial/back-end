@component('mail::message')
# Pedido Aprovado

Olá {{ $nome }},
<br>
<br>
Seu pedido foi aprovado pelo Padre!
<br>
<br>
Por favor, efetue o pagamento para confirmarmos o pedido.
<br>

@component('mail::button', ['url' => $link])
Clique aqui para efetuar o pagamento
@endcomponent

Obrigado,<br>
Paroquia São Lucas Evangelista
@endcomponent
