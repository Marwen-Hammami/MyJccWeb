// Sélectionner toutes les lignes du tableau
const rows = document.querySelectorAll('tbody tr');
// Ajouter un gestionnaire d'événements à chaque ligne
rows.forEach(row => {
    row.addEventListener('click', () => {
      // Récupérer l'identifiant de l'hôtel à partir de la première cellule de la ligne sélectionnée
      const id = row.cells[0].innerText;
  
      // Rediriger l'utilisateur vers l'URL {{path('update',{'id':l.id})}}
      const url = "path('update_hotel', { 'id': ${id} })"
      window.location.href = url;
    });
  });
