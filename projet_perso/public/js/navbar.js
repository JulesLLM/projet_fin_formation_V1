
class YinYang {
  constructor(id) {
    this.svg = document.getElementById(id);
    this.svg.addEventListener("mouseenter", this.startRotation.bind(this));
    this.svg.addEventListener("mouseleave", this.stopRotation.bind(this));
  }

  startRotation() {
    this.svg.classList.add("rotate");
  }

  stopRotation() {
    this.svg.classList.remove("rotate");
  }
}

window.addEventListener("DOMContentLoaded", (event) => {
  const yinYang = new YinYang("yin-yang");
});
