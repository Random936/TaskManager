function createParamString(params) {
   let obj = new URLSearchParams();
   for (let i = 0; i < params.length; i++)
      obj.set(params[i][0], params[i][1]);

   return obj.toString();
}
