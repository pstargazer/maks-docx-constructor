import './bootstrap';

const spoilers = document.querySelectorAll('.spoiler');

spoilers.forEach(spoiler => {
   spoiler.addEventListener('click', e => {
        e.preventDefault();
        spoiler.classList.toggle('bg-black')
   })
})

const inputsArr = []
const inputs = document.querySelectorAll(['.form-control', 'select'])
// console.log(Array.from(inputs.values()))
// const selects = document.querySelectorAll('select')
const form = document.querySelector('form')
/*
console.log(inputs.values())
let inp = inputs.values()
for(el in inputs.values()) {
   console.log( el )
}
*/

function setPercent(percent){
   console.log(percent)
   document.querySelector('#form-progress').setAttribute('style', `min-height:10px; width:${percent}%`)
}

function computePercent() {
   let filledInps = inputsArr.reduce((prev,curr,idx)=>{
      // console.log(inputsArr[idx].value);
      if(Boolean(inputsArr[idx].value)) return ++prev;
      else return prev
   },0)
   let percent = Math.trunc(filledInps/inputsArr.length*100); 
   return percent
}

function updateBar() {
   setPercent(computePercent())
}

inputs.forEach(el => {
   if(el.hasAttribute('required')){
      let idx = inputsArr.push(el)
      el.setAttribute('data-id', idx)
      // console.log(el);
      el.addEventListener('input', e => {
         updateBar()
      })
   }

}) 


form.addEventListener('submit',evt => { 
   // evt.preventDefault()
   // alert('sdf')
})