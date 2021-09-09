function submitOnEnter(e) {
   console.log(e)
   if (e.key === "Enter" && !e.shiftKey) {
      console.log(this.parentNode.submit())
   }
}

let textarea = document.querySelectorAll('textarea');
textarea.forEach((elem) => {
   elem.addEventListener('keypress', submitOnEnter);
})
