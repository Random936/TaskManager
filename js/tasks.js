function updateNode(id, col) {
   if (!id || !col)
      return 0;

   let paramstr = createParamString([['id', id], ['col', col]]);
   fetch('/api/updatetask.php?' + paramstr);

   return 1;
}

function deleteNodes(e) {
   let id = e.dataTransfer.getData('text');
   let paramstr = createParamString([['id', id]]);
   fetch('/api/deltask.php?' + paramstr);
   document.getElementById(id).remove();
}
