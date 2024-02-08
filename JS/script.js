function changeColor(button) {
    var icon = button.querySelector('i.fa-regular.fa-heart');
    
    // Vérifiez la couleur actuelle de l'icône
    var currentColor = icon.style.color || getComputedStyle(icon).color;

    // Changez la couleur en fonction de la couleur actuelle
    if (currentColor === "red") {
      icon.style.color = "#000000";
    } else {
      icon.style.color = "red";
    }
  }

  // FONCTIONNE AVEC DE L'AJAX ! ! ! ! ! ! J'ai le seum 