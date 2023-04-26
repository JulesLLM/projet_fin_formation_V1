
class CommenterModal {
  constructor() {
    // Récupérer le bouton de commentaire et la modale de commentaire
    this.commenterBtn = document.getElementById('commenter-btn');
    this.commenterModal = document.getElementById('commenter-modal');
    
    // Récupérer le bouton de fermeture de la modale
    this.closeModalBtn = document.getElementById('close-modal-btn');
    
    // Ouvrir la modale quand le bouton de commentaire est cliqué
    this.commenterBtn.addEventListener('click', () => {
      this.commenterModal.showModal();
    });
    
    // Fermer la modale quand le bouton de fermeture est cliqué
    this.closeModalBtn.addEventListener('click', () => {
      this.commenterModal.close();
    });
    
    // Fermer la modale quand l'utilisateur clique en dehors de la modale
    this.commenterModal.addEventListener('click', (event) => {
      if (event.target === this.commenterModal) {
        this.commenterModal.close();
      }
    });
  }
}

document.addEventListener("DOMContentLoaded", function() {
  const commenterModal = new CommenterModal();
});
