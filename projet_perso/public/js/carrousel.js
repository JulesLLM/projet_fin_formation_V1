class Carousel {
  constructor(containerSelector, carouselSelector) {
    this.carouselContainer = $(containerSelector);
    this.carousel = $(carouselSelector);
    this.initializeCarousel();
  }

  initializeCarousel() {
    this.carousel.on('init', () => {
      const carouselHeight = this.carousel.outerHeight();
      this.carouselContainer.css('height', carouselHeight);
    });

    this.carousel.slick({
      autoplay: true,
      arrows: false,
      dots: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  }
}

$(document).ready(() => {
  const myCarousel = new Carousel('.carousel-container', '.carousel');
});
