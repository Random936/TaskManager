
document.addEventListener('DOMContentLoaded', () => {
   function handleDragStart(e) {
      e.dataTransfer.dropEffect = "move";
      e.dataTransfer.setData("text", e.target.id);
   }

   function allowDrop(e) {
      e.preventDefault();
   }

   function handleDrop(e) {
      e.preventDefault();
      let id = e.dataTransfer.getData("text");

      if (updateNode(id, this.style.gridColumn[0]))
         this.appendChild(document.getElementById(id));
   }

   let elems = document.querySelectorAll("div[draggable=\"true\"]");
   elems.forEach((elem) => {
      elem.addEventListener('dragstart', handleDragStart); 
   })

   let columns = document.querySelectorAll(".drop-area");
   columns.forEach((elem) => {
      elem.addEventListener('dragover', allowDrop);
      elem.addEventListener('drop', handleDrop); 
   })
})
