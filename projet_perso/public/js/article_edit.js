class ArticleModal {
  constructor() {
    this.modal = document.getElementById('modifier-modal');
    this.editBtn = document.getElementById('edit_article');
    this.closeBtn = document.getElementById('close-modal-btn');
    this.closeBtn2 = document.getElementById('close-modal-btn2');
    this.closeBtn3 = document.getElementById('close-modal-btn');
    this.addEventListeners();
  }

  addEventListeners() {
    this.editBtn.addEventListener('click', () => {
      this.modal.showModal();
    });

    this.closeBtn.addEventListener('click', () => {
      this.modal.close();
    });
    
    this.closeBtn2.addEventListener('click', () => {
      this.modal.close();
    });

    this.closeBtn3.addEventListener('click', () => {
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
  const articleModal = new ArticleModal();
});
