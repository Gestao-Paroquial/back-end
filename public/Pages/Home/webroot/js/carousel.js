$(document).ready(() => {
    $.get("http://192.168.123.87/api/eventosHome", {}, (carousel) => {

        if (carousel) {
            let carousel_inner = document.querySelector('.carousel-inner');

            carousel.forEach((item) => {
                let carouse_item = carouselItemView(item);
                $(carousel_inner).append(carouse_item);
            });

            carousel_inner.firstChild.nextSibling.className = "carousel-item active";
        }
    });
});

function carouselItemView(item) {
    const imagem = `http://192.168.123.87${item.imagem}`;
    return `
    <div class="carousel-item">
        <a href="${item.destino}" target="_blank">
            <img class="d-block carousel__img" src="${imagem}" alt="${item.descricao}">
        </a>
    </div>`
}