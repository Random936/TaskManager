function removeRow(elem) {
   let id = elem.parentNode.id;
   elem.parentNode.remove();
   fetch('api/delproj.php?' + createParamString([['proj', id]]));
}

function inputDropdown(id) {
   let input = document.getElementById(id);
   if (input.style.display == "block") {
      input.style.display = "none";
      return;
   }

   input.style.display = "block";
}
