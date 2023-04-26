class CreneauSelectionnable {
    constructor(element) {
      this.element = element;
      this.bindEvents();
    }
  
    bindEvents() {
      this.element.addEventListener('click', (event) => {
        const myModal = document.getElementById('myModal');
        myModal.showModal();
        console.log(event.target.getAttribute('data-jour'));
      });
    }
  }
  
  class Creneau {
    constructor(element) {
      this.element = element;
      this.bindEvents();
    }
  
    bindEvents() {
      this.element.addEventListener('click', (event) => {
        event.preventDefault();
        const creneauSelectionne = document.querySelector('.creneau-selectionne');
        if (creneauSelectionne) {
          creneauSelectionne.classList.remove('creneau-selectionne');
        }
        this.element.classList.add('creneau-selectionne');
        selectCreneau(this.element.getAttribute('data-creneau'));
      });
    }
  }
  
  function selectCreneau(creneau) {
    const creneaux = document.querySelectorAll('.creneau');
    for (let i = 0; i < creneaux.length; i++) {
      creneaux[i].classList.remove('selected');
    }
  
    const creneauSelectionne = document.querySelector('.creneau:nth-of-type(' + (Array.from(creneaux).indexOf(event.currentTarget)+1) + ')');
    creneauSelectionne.classList.add('selected');
    document.querySelector('#creneau-selectionne').value = creneau;
  }
  
  class Modal {
    constructor(openBtnSelector, closeBtnSelector, modalSelector) {
      this.openBtn = document.querySelector(openBtnSelector);
      this.closeBtn = document.querySelector(closeBtnSelector);
      this.modal = document.querySelector(modalSelector);
      this.bindEvents();
    }
  
    bindEvents() {
      this.openBtn.addEventListener('click', () => {
        this.modal.showModal();
      });
  
      this.closeBtn.addEventListener('click', () => {
        this.modal.close();
      });
  
      this.modal.addEventListener('click', (event) => {
        if (event.target === this.modal) {
          this.modal.close();
        }
      });
    }
  }
  
  document.addEventListener('DOMContentLoaded', () => {
    const creneauSelectionnables = document.querySelectorAll('.creneau-selectionnable');
    creneauSelectionnables.forEach((element) => {
      new CreneauSelectionnable(element);
    });
  
    const creneaux = document.querySelectorAll('.creneau');
    creneaux.forEach((element) => {
      new Creneau(element);
    });
  
    const modal = new Modal('#open-modal-btn', '#close-modal-btn', '#myModal');
  });
  